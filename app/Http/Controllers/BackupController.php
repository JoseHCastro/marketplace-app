<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Backup\Tasks\Backup\BackupJobFactory;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Log;

class BackupController extends Controller
{
      /**
     * Handle the creation of a new backup.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function index()
    {
        $disk = Storage::disk('backups');
        $files = $disk->allFiles();  // Asegúrate de que 'allFiles' o 'files' obtiene todos los archivos necesarios.
        $backups = [];

        foreach ($files as $file) {
            if (substr($file, -4) === '.zip') {
                $backups[] = [
                    'file_name' => basename($file),
                    'file_size' => $disk->size($file),
                    'last_modified' => $disk->lastModified($file),
                    'file_path' => $file,  // Agrega el path completo aquí
                ];
            }
        }
        return view('backups.index', compact('backups'));
    }

    public function create()
    {
        try {
            // Ejecutar el comando de backup
            Artisan::call('backup:run');
            // Redirigir al usuario a la página de listado de backups con un mensaje de éxito
            return redirect()->route('backups.index')->with('success', 'Backup creado correctamente.');
        } catch (\Exception $e) {
            // En caso de error durante el proceso de backup, captura la excepción y redirige con un mensaje de error
            return redirect()->route('backups.index')->with('error', 'Error al crear el backup: ' . $e->getMessage());
        }
    }

    public function delete($file_name)
    {
        $disk = Storage::disk('backups');
        $file_path = "Laravel/" . $file_name; 
    
        if ($disk->exists($file_path)) {
            $disk->delete($file_path);
            return redirect()->back()->with('success', 'Respaldo eliminado correctamente!');
        } else {
            return redirect()->back()->with('error', 'El archivo de respaldo no existe!');
        }
    }
    
    public function download($file_name)
    {
        $disk = Storage::disk('backups');
        $file_path = "Laravel/" . $file_name; // Asegúrate de incluir el subdirectorio si es necesario
    
        if ($disk->exists($file_path)) {
            $file_contents = $disk->get($file_path);
            $download_name = basename($file_path); // Opcional: renombra el archivo para la descarga
            return response()->streamDownload(function() use ($file_contents) {
                echo $file_contents;
            }, $download_name);
        } else {
            return redirect()->back()->with('error', 'El archivo no existe.');
        }
    }
}
