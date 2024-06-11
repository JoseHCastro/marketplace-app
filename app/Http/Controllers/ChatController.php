<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Mensaje;

class ChatController extends Controller
{
    public function getUserChats()
    {
        $user = Auth::user();

        // Obtener todos los mensajes donde el usuario es parte (ya sea sender o receiver)
        $mensajes = Mensaje::where('user1_id', $user->id)
                      ->orWhere('user2_id', $user->id)
                      ->with(['anuncio.usuario', 'sender', 'receiver'])
                      ->get()
                      ->groupBy('anuncio_id');

        // Transformar los datos para que coincidan con la estructura esperada
        $response = $mensajes->map(function ($mensajes, $anuncioId) use ($user) {
            $anuncio = $mensajes->first()->anuncio;
            $lastMessage = $mensajes->sortByDesc('created_at')->first();

            // Determinar el rol del usuario en la conversación
            $isSender = $mensajes->first()->user1_id == $user->id;

            return [
                'anuncio_id' => $anuncio->id,
                'anuncio_title' => $anuncio->titulo,
                'anuncio_price' => $anuncio->precio,
                'seller_id' => $anuncio->usuario->id,
                'seller_name' => $anuncio->usuario->name,
                'buyer_id' => $isSender ? $mensajes->first()->user2_id : $mensajes->first()->user1_id,
                'last_message' => $lastMessage->contenido,
                'has_new_messages' => $mensajes->where('read_at', null)->isNotEmpty(),
            ];
        })->values();

        return response()->json($response);
    }
}
