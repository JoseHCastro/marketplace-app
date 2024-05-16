<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Anuncio extends Model
{

  //protected $guarded = ['id','created_at','updated_at'];
  /* protected $guarded = ['']; */
  protected $table = 'anuncios';
  protected $fillable = [
    'titulo',
    'descripcion',
    'precio',
    'fecha_publicacion',
    'fecha_expiracion',
    'visitas',
    'condicion_id',
    'categoria_id',
    'moneda_id',
    'user_id',
    'disponible',
    'habilitado',

  ];

  use HasFactory;

  //ok
  public function categoria()
  {
    return $this->belongsTo(Categoria::class);
  }

  public function estado()
  {
    return $this->belongsTo('App\Models\Estado', 'estado_id');
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


  //user
  public function usuario()
  {

    return $this->belongsTo(User::class, 'user_id');
  }
}
