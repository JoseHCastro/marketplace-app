<?php

namespace App\Listeners;

use App\Models\Bitacora;
use Illuminate\Auth\Events\Logout;

class LogSuccessfulLogout
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(Logout $event)
    {
        // Obtener el usuario que se ha desconectado
        $user = $event->user;

        // Registrar en la bitácora
        date_default_timezone_set("America/La_Paz");

        $bitacora = new Bitacora();
        $bitacora->usuario = $user->name;
        $bitacora->hora = now();
        $bitacora->evento = 'Logout';
        $bitacora->contexto = 'Sesion';
        $bitacora->descripcion = 'El usuario ha cerrado sesión';
        $bitacora->origen = 'Web';
        $bitacora->ip = request()->ip();
        $bitacora->save();
    }
}
