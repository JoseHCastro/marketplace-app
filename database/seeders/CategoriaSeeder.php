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
      /*'url' => 'assets/images/vehiculos.jpg', */
      'descripcion' => 'Encuentra tu hogar ideal. Explora una amplia variedad de propiedades en venta o alquiler, desde acogedores apartamentos hasta espaciosas casas familiares. ¡Encuentra el lugar perfecto para ti!"',
    ]);
    $categoria = Categoria::create([
      'nombre' => 'Inmuebles', //categoria padre
     /* 'url' => 'assets/images/inmuebles.jpg',*/
      'descripcion' => 'Descubre el vehículo de tus sueños.  Desde elegantes autos deportivos hasta robustos vehículos todo terreno, tenemos una amplia selección de opciones para cada estilo y presupuesto. ¡Encuentra tu próximo viaje aquí!',
    ]);

    $subcategoria = Categoria::create([
      'nombre' => 'Autos', //categoria padre
      'url' => 'assets/images/vehiculos.jpg',
      'descripcion' => 'Explora nuestra variedad de automóviles nuevos y usados para cada presupuesto.',
      'padre_id' => 1,
    ]);

    $subcategoria = Categoria::create([
      'nombre' => 'Motos', //categoria padre
      'url' => 'assets/images/motos.jpg',
      'descripcion' => 'Descubre nuestra selección de motocicletas para todos los estilos y necesidades.',
      'padre_id' => 1,
    ]);

    $subcategoria = Categoria::create([
      'nombre' => 'Casas', //categoria padre
      'url' => 'assets/images/casas.jpg',
      'descripcion' => 'Encuentra la casa de tus sueños entre nuestra oferta de propiedades residenciales.',
      'padre_id' => 2,
    ]);

    $subcategoria = Categoria::create([
      'nombre' => 'Cuartos/Habitacione/Piezas ', //categoria padre
      'url' => 'assets/images/Cuartos.jpg',
      'descripcion' => 'Encuentra cuartos disponibles para alquilar, perfectos para tu próxima estadía.',
      'padre_id' => 2,
    ]);

    $subcategoria = Categoria::create([
      'nombre' => 'Lotes y terrenos', //categoria padre
      'url' => 'assets/images/lotes.jpg',
      'descripcion' => 'Descubre lotes de terreno ideales para construir la casa o negocio de tus sueños.',
      'padre_id' => 2,
    ]);
  }
}
