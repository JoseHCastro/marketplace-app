<?php

namespace App\Http\Controllers;

use App\Models\Bitacora;
use Illuminate\Http\Request;

class BitacoraController extends Controller
{
    public function index()
    {
        $registros = Bitacora::all();
        return view('bitacora.index', compact('registros'));
    }
}
