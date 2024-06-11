<?php

namespace App\Http\Controllers;

use App\Models\Mensaje;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class MensajeController extends Controller
{
    public function index(Request $request)
    {
        $user1Id = $request->query('user1_id');
        $user2Id = $request->query('user2_id');
        $anuncioId = $request->query('anuncio_id');

        $mensajes = Mensaje::where('anuncio_id', $anuncioId)
            ->orderBy('created_at', 'asc')
            ->get();

        return response()->json($mensajes);
    }

    public function store(Request $request)
    {
        if (!Auth::check()) {
            Log::error('User not authenticated');
            return response()->json(['error' => 'User not authenticated'], 401);
        }

        $validatedData = $request->validate([
            'contenido' => 'required|string',
            'user2_id' => 'required|exists:users,id',
            'anuncio_id' => 'required|exists:anuncios,id',
        ]);

        $validatedData['user1_id'] = Auth::id(); // Usar el ID del usuario autenticado

        try {
            $mensaje = Mensaje::create($validatedData);
            return response()->json($mensaje, 201);
        } catch (\Exception $e) {
            Log::error('Failed to create message: ' . $e->getMessage());
            return response()->json(['error' => 'Failed to create message'], 500);
        }
    }
}
