<?php

namespace App\Http\Controllers;

use App\Exports\BitacoraExport;
use App\Models\Bitacora;
use App\Models\User;
use Illuminate\Http\Request;
use TCPDF;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Collection;

class BitacoraController extends Controller
{
    public function index()
    {
        $registros = Bitacora::all();
        $users = User::all();
        return view('bitacora.index', compact('registros', 'users'));
    }

    public function exportarPDF(Request $request)
    {
        $usuario = User::find($request->input('usuario'));
        $plataforma = $request->input('plataforma');
        $desde = $request->input('desde');
        $hasta = $request->input('hasta');

        $query = Bitacora::query();

        // Aplicar filtros si se proporcionan valores
        if ($usuario !== null) {
            $query->where('usuario', $usuario->name);
        }
        if ($plataforma !== null) {
            $query->where('origen', $plataforma);
        }
        if ($desde !== null && $hasta !== null) {
            $query->whereBetween('hora', [$desde, $hasta]);
        }

        // Obtener las bitácoras según la consulta
        $bitacoras = $query->get();

        // Generar el PDF
        $pdf = new TCPDF();
        $pdf->SetCreator('YourAppName');
        $pdf->SetAuthor('YourName');
        $pdf->SetTitle('Bitacora');
        $pdf->SetSubject('Bitacoras');
        $pdf->SetKeywords('Bitacoras, PDF');
        $pdf->AddPage();
        $html = view('bitacora.PDF', compact('bitacoras'))->render();
        $pdf->writeHTML($html, true, false, true, false, '');
        $pdf->Output('bitacora.pdf', 'D');
    }

    public function exportarExcel(Request $request)
    {
        $usuario = User::find($request->input('usuario'));
        $plataforma = $request->input('plataforma');
        $desde = $request->input('desde');
        $hasta = $request->input('hasta');

        $query = Bitacora::query();

        if ($usuario !== null) {
            $query->where('usuario', $usuario->name);
        }
        if ($plataforma !== null) {
            $query->where('origen', $plataforma);
        }
        if ($desde !== null && $hasta !== null) {
            $query->whereBetween('hora', [$desde, $hasta]);
        }

        $bitacoras = $query->get();

        return Excel::download(new BitacoraExport($bitacoras), 'bitacora.xlsx');
    }
}
