<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnuncioEtiqueta extends Model
{
  use HasFactory;
  protected  $table = 'anuncio_etiqueta';

  protected $fillable = [
    'anuncio_id',
    'etiqueta_id'
  ];
}
