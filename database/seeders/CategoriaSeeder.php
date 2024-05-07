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
      'nombre' => 'Vehiculos', //categoria padre
      'url' => 'assets/images/vehiculos.jpg',
      'descripcion' => 'Encuentra tu hogar ideal. Explora una amplia variedad de propiedades en venta o alquiler, desde acogedores apartamentos hasta espaciosas casas familiares. ¡Encuentra el lugar perfecto para ti!"',
    ]);
    $categoria = Categoria::create([
      'nombre' => 'Inmuebles', //categoria padre
      'url' => 'assets/images/inmuebles.jpg',
      'descripcion' => 'Descubre el vehículo de tus sueños.  Desde elegantes autos deportivos hasta robustos vehículos todo terreno, tenemos una amplia selección de opciones para cada estilo y presupuesto. ¡Encuentra tu próximo viaje aquí!',
    ]);
  }
}
