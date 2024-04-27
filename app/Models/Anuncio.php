<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Anuncio extends Model
{

  //protected $guarded = ['id','created_at','updated_at'];
  protected $guarded = [''];
  protected $table = 'anuncios';
  /* protected $fillable = [

    'user_id',
    'titulo',
    'descripcion',
    'precio'

  ]; */

  use HasFactory;

  public function categoria()
  {
    return $this->hasOne(Categoria::class);
  }

  public function estado()
  {
    return $this->hasOne(Estado::class);
  }

  public function Moneda()
  {
    return $this->hasOne(Moneda::class);
  }

  public function condicion()
  {
    return $this->hasOne(Condicion::class);
  }

  public function etiquetas()
  {
    return $this->belongsToMany(Etiqueta::class);
  }

  public function servicios()
  {
    return $this->belongsToMany(servicios::class);
  }
}
