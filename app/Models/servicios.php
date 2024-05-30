<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Servicios extends Model
{
  use HasFactory;

  protected $table = 'servicios';

  protected $fillable = [
    'titulo',
    'descripcion',
    'precio',
  ];


  public function anuncios()
  {
    return $this->belongsToMany(Anuncio::class, 'anuncio_servicios', 'servicios_id', 'anuncio_id')->withPivot('fecha_inicio', 'fecha_fin');
  }
}
