<?php

namespace App\Listeners;

use App\Models\Bitacora;
use Illuminate\Auth\Events\Login;


class LogSuccessfulLogin
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
    public function handle(Login $event)
    {
        // Obtener el usuario que se ha logueado
        $user = $event->user;

        // Registrar en la bitácora
        date_default_timezone_set("America/La_Paz");

        $bitacora = new Bitacora();
        $bitacora->usuario = $user->name;
        $bitacora->hora = now();
        $bitacora->evento = 'Login';
        $bitacora->contexto = 'Sesion';
        $bitacora->descripcion = 'El usuario ha iniciado sesión';
        $bitacora->origen = 'Web';
        $bitacora->ip = request()->ip();
        $bitacora->save();
    }
}
