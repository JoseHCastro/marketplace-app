<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\Process\Process;
use Symfony\Component\Process\Exception\ProcessFailedException;

class RestoreController extends Controller
{
    public function index()
    {
        $disk = Storage::disk('backups');
        $files = $disk->allFiles();
        $backups = collect($files)->map(function ($file) use ($disk) {
            return [
                'file_name' => basename($file),
                'file_size' => $disk->size($file),
                'last_modified' => $disk->lastModified($file),
            ];
        });
        return view('restore.index', ['backups' => $backups]);
    }

    public function uploadAndRestore(Request $request)
    {
        $request->validate([
            'backup_file' => 'required|file|mimes:zip'
        ]);
    
        $file = $request->file('backup_file');
        $disk = Storage::disk('backups');
        $uploadedFilePath = $disk->path('Laravel/' . $file->getClientOriginalName());
        $file->move($disk->path('Laravel'), $file->getClientOriginalName());
    
        try {
            $this->restoreFromPath('Laravel/' . $file->getClientOriginalName());
            return back()->with('success', 'Backup restaurado correctamente.');
        } catch (\Exception $e) {
            return back()->with('error', 'Error al restaurar el backup: ' . $e->getMessage());
        }
    }

    public function restoreFromPath($filePath)
    {
        $zip = new \ZipArchive;
        $disk = Storage::disk('backups');
    
        if (substr($filePath, 0, 8) !== 'Laravel/') {
            $filePath = 'Laravel/' . $filePath;
        }
    
        $fullPath = $disk->path($filePath);
    
        if ($zip->open($fullPath) === TRUE) {
            $extractPath = storage_path('app/backup_extract');
            $zip->extractTo($extractPath);
            $zip->close();
    
            $sqlFiles = glob($extractPath . '/db-dumps/*.sql'); // Ajusta esta ruta según tu estructura
    
            if (!empty($sqlFiles)) {
                $sqlPath = $sqlFiles[0]; // Asume que solo hay un archivo SQL y lo usa
                if (file_exists($sqlPath)) {
                    try {
                        $this->restoreDatabase($sqlPath);
                        return redirect()->route('restore.index')->with('success', 'Backup restaurado correctamente.');
                    } catch (\Exception $e) {
                        return redirect()->route('restore.index')->with('error', 'Error al restaurar la base de datos: ' . $e->getMessage());
                    }
                } else {
                    return redirect()->route('restore.index')->with('error', 'Archivo SQL no encontrado después de la descompresión.');
                }
            } else {
                return redirect()->route('restore.index')->with('error', 'Archivo SQL no encontrado en la ruta de extracción.');
            }
        } else {
            return redirect()->route('restore.index')->with('error', 'No se pudo abrir el archivo ZIP.');
        }
    }

    public function restoreDatabase($pathToSqlFile)
    {
        if (file_exists($pathToSqlFile)) {
            $command = "mysql --user=" . env('DB_USERNAME') . " --password=" . env('DB_PASSWORD') . " " . env('DB_DATABASE') . " < " . $pathToSqlFile;
            $output = [];
            $return_var = NULL;
            exec($command, $output, $return_var);
            if ($return_var != 0) {
                throw new \Exception('Error al ejecutar el script SQL: ' . implode("\n", $output));
            }
        } else {
            throw new \Exception('El archivo SQL no existe en la ruta descomprimida.');
        }
    }
}
