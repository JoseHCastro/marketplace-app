<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pago extends Model
{
    use HasFactory;

    protected $fillable = [
        'fecha_pago',
        'monto',
        'anuncio_id',
        'user_id',
        'membresia_id'
    ];

    public function anuncio()
    {
        return $this->belongsTo(Anuncio::class);
    }

    public function usuario()
    {
        return $this->belongsTo(User::class);
    }

    public function membresia()
    {
        return $this->belongsTo(Membresia::class);
    }
}
