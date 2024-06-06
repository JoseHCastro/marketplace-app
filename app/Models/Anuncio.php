<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Anuncio extends Model
{
    use HasFactory;

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
        'descuento',
        'posicion_principal',
        'posicion_categoria'
    ];

    // Relación con la categoría
    public function categoria()
    {
        return $this->belongsTo(Categoria::class);
    }

    // Relación con la moneda
    public function moneda()
    {
        return $this->belongsTo(Moneda::class);
    }

    // Relación con la condición
    public function condicion()
    {
        return $this->belongsTo(Condicion::class);
    }

    // Relación con las etiquetas
    public function etiquetas()
    {
        return $this->belongsToMany(Etiqueta::class);
    }

    // Relación con los servicios
    public function servicios()
    {
        return $this->belongsToMany(Servicio::class, 'anuncio_servicios')->withPivot('fecha_inicio', 'fecha_fin');
    }

    // Relación con la imagen
    public function imagen()
    {
        return $this->morphOne(Image::class, 'imageable');
    }

    // Relación con el usuario
    public function usuario()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    // Método para obtener la URL de la imagen del anuncio
    public function getImageUrlAttribute()
    {
        return $this->imagen ? Storage::url($this->imagen->url) : null;
    }
}
