<?php

namespace App\Http\Controllers;

use App\Models\Bitacora;
use App\Models\User;
use Illuminate\Http\Request;
use PDF;
use TCPDF;

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
        // Obtener los parámetros de la solicitud
        $usuario = $request->input('usuario');
        $plataforma = $request->input('plataforma');
        $desde = $request->input('desde');
        $hasta = $request->input('hasta');

        // Consulta inicial sin filtros
        $query = Bitacora::query();

        // Aplicar filtros si se proporcionan valores
        if ($usuario !== null) {
            $query->where('usuario', $usuario);
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
}
