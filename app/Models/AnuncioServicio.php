<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnuncioServicio extends Model
{


  use HasFactory;
  protected $table = 'anuncio_servicios';

  protected $fillable = [
    'anuncio_id',
    'servicios_id',
    'fecha_inicio',
    'fecha_fin'
    
  ];
}
