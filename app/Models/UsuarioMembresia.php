<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UsuarioMembresia extends Model
{
    use HasFactory;

    protected  $table = 'usuario_membresias';

    protected $fillable = [
      'usuario_id',
      'membresia_id',
      'fecha_inicio',
      'fecha_final',
    ];
}
