<?php

namespace Database\Seeders;

use App\Models\Categoria;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategoriaSeeder extends Seeder
{
  /**
   * Run the database seeds.
   */
  public function run(): void
  {
    //
    $categoria = Categoria::create([
      'nombre' => 'Vehiculos',//categoria padre
    ]);
    $categoria = Categoria::create([
      'nombre' => 'Inmuebles',//categoria padre
    ]);
  }
}
