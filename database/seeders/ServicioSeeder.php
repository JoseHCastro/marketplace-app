<?php

namespace Database\Seeders;

use App\Models\servicios;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ServicioSeeder extends Seeder
{
  /**
   * Run the database seeds.
   */
  public function run(): void
  {
    //

    $servicio = servicios::create([
      'titulo' => 'Destaca en categorias de anuncios',
      'descripcion' => 'Elige este destacado para que tu anuncio aparezca en la parte superior de la categoria seleccionada, y haz que todas las personas que visiten la categoria vean tu anuncio.',
      'precio' => '100',
    ]);
    $servicio = servicios::create([
      'titulo' => 'Destaca en el marketplace principal',
      'descripcion' => 'Elige este destacado para que tu anuncio aparezca en la parte superior de la pagina principal del marketplace, y haz que todas las personas que visiten el marketplace vean tu anuncio.',
      'precio' => '150',
    ]);

    $servicio = servicios::create([
      'titulo' => 'Destaca tu Anuncio',
      'descripcion' => 'Elige esta opción y destaca tu anuncio en la parte superior de la categoria seleccionada, y en la pagina principal del marketplace. Incluye Oferta 1 y Oferta 2.',
      'precio' => '200',
    ]);
  }
}
