<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comentario extends Model
{
    use HasFactory;
    protected $fillable = [
        'contenido',
        'hora',
        'fecha',
        'user_id',
        'anuncio_id'
    ];

    public function anuncio()
    {
        return $this->belongsTo(Anuncio::class, 'anuncio_id');
    }

    public function usuario()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
