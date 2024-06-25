<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mensaje extends Model
{
    use HasFactory;

    protected $fillable = [
        'contenido', 'user1_id', 'user2_id', 'anuncio_id',
    ];

    public function sender()
    {
        return $this->belongsTo(User::class, 'user1_id');
    }

    public function receiver()
    {
        return $this->belongsTo(User::class, 'user2_id');
    }

    public function anuncio()
    {
        return $this->belongsTo(Anuncio::class);
    }
}
