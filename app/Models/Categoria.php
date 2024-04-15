<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    use HasFactory;
    
    protected $table = 'categoria';
    protected $fillable = ['nombre', 'padre_id'];

    // Relación para obtener las subcategorías
    public function subcategoria() {
        return $this->hasMany(Categoria::class, 'padre_id');
    }

    // Relación para obtener la categoría padre
    public function parent() {
        return $this->belongsTo(Categoria::class, 'padre_id');
    }
}
