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

  //ok
  public function categoria()
  {
    return $this->belongsTo(Categoria::class);
  }

  public function estado()
  {
    return $this->hasOne(Estado::class);
  }

  //ok
  public function Moneda()
  {
    return $this->belongsTo(Moneda::class);
  }

  //ok
  public function condicion()
  {
    return $this->belongsTo(Condicion::class);
  }

  public function etiquetas()
  {
    return $this->belongsToMany(Etiqueta::class);
  }

  public function servicios()
  {
    return $this->belongsToMany(servicios::class);
  }

  //ok
  public function imagen()
  {
    return  $this->morphOne('App\Models\Image', 'imageable');
  }
}
