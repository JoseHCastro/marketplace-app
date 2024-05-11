<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\SupportMail;

class SupportController extends Controller
{
    public function send(Request $request)
    {
        $request->validate([
            'description' => 'required|string',
        ]);
        // Lógica para manejar la entrada del formulario
        $data = $request->all();

        Mail::to('taniavaldadonozo@gmail.com')->send(new SupportMail($data));
    
        return back()->with('success', 'Su solicitud de soporte ha sido enviada.');
    }
}
 