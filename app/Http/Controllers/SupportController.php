<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\SupportRequestMail;
use Illuminate\Support\Facades\Mail;

class SupportController extends Controller
{
    public function sendSupportRequest(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'role' => 'required|string',
            'description' => 'required|string|max:1000'
        ]);
    
        try {
            Mail::to('superadmin@example.com')->send(new SupportRequestMail($validated));
            return response()->json(['message' => 'Solicitud enviada correctamente']);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Error al enviar la solicitud'], 500);
        }
    }
}
