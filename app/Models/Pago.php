<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pago extends Model
{
    use HasFactory;
<<<<<<< HEAD
    
    protected $fillable = [
        'fecha_pago', 'monto', 'anuncio_id', 'user_id','stripe_payment_id',
=======

    protected $fillable = [
        'fecha_pago',
        'monto',
        'anuncio_id',
        'user_id',
        'membresia_id'
>>>>>>> 1030e5dc037168be58a3777e3e148ea2e814a528
    ];

    public function anuncio()
    {
        return $this->belongsTo(Anuncio::class);
    }

<<<<<<< HEAD
    public function user()
    {
        return $this->belongsTo(User::class);
    }
=======
    public function usuario()
    {
        return $this->belongsTo(User::class);
    }

    public function membresia()
    {
        return $this->belongsTo(Membresia::class);
    }
>>>>>>> 1030e5dc037168be58a3777e3e148ea2e814a528
}
