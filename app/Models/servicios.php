<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class servicios extends Model
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
    return $this->belongsToMany(Anuncio::class);
  }
}
