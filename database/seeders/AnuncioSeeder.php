<?php

namespace Database\Seeders;

use App\Models\Anuncio;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AnuncioSeeder extends Seeder
{
  /**
   * Run the database seeds.
   */
  public function run(): void
  {
    //----------------------------------------
    $anuncio1 = Anuncio::create([
      'titulo' => 'motocicleta en venta',
      'descripcion' => 'moto con papeles al dia 😎',
      'precio' => 10000,
      'fecha_publicacion' => '2024-04-11',
      'fecha_expiracion' => '2024-05-11',
      'visitas' => 0,
      'categoria_id' => 4,
      'condicion_id' => 1,
      'moneda_id' => 1,
      'user_id' => 5,
      'disponible' => true,
      'habilitado' => true,

    ]);

    $anuncio2 = Anuncio::create([
      'titulo' => 'motocicleta navi en venta',
      'descripcion' => 'moto con papeles al dia mas informacion a 68817977',
      'precio' => 9000,
      'fecha_publicacion' => '2024-03-12',
      'fecha_expiracion' => '2024-04-12',
      'visitas' => 0,
      'categoria_id' => 4,
      'condicion_id' => 1,
      'moneda_id' => 1,
      'user_id' => 1,
      'disponible' => true,
      'habilitado' => true,

    ]);

    $anuncio3 = Anuncio::create([
      'titulo' => 'vehiculo en venta',
      'descripcion' => 'movilidad corolla 2019, 4 puertas, 5 pasajeros, 4 cilindros, 1.8 cc, papeles al dia',
      'precio' => 18000,
      'fecha_publicacion' => '2024-04-17',
      'fecha_expiracion' => '2024-05-17',
      'visitas' => 0,
      'categoria_id' => 3,
      'condicion_id' => 2,
      'moneda_id' => 2,
      'user_id' => 3,
      'disponible' => true,
      'habilitado' => true,

    ]);

    $anuncio4 = Anuncio::create([
      'titulo' => 'Oportunidad de inversio en la zona norte G77',
      'descripcion' => '. Superficie del terreno de 1000m2.
      . Uso de suelo vivienda.
      . Precio por metro cuadrado USD 205.',
      'precio' => 20500,
      'fecha_publicacion' => '2024-02-15',
      'fecha_expiracion' => '2024-03-15',
      'visitas' => 0,
      'categoria_id' => 7,
      'condicion_id' => 1,
      'moneda_id' => 2,
      'user_id' => 4,
      'disponible' => true,
      'habilitado' => true,

    ]);

    $anuncio5 = Anuncio::create([
      'titulo' => 'Casa de 2 plantas sobre Av. Sexto anillo Diagonal España',
      'descripcion' => 'Hermosa casa de dos plantas.
      Casa ideal para tu negocio.
      PLANTA BAJA CONSTA DE:
      . 1 baño.
      . Cocina.
      . Living comedor.
      
      PLANTA ALTA CONSTA DE:
      . 2 dormitorios.
      . 1 baño.
      . Cocina.
      . Lavanderia y galeria.
      ',
      'precio' => 250000,
      'fecha_publicacion' => '2024-04-06',
      'fecha_expiracion' => '2024-05-06',
      'visitas' => 0,
      'categoria_id' => 5,
      'condicion_id' => 1,
      'moneda_id' => 2,
      'user_id' => 5,
      'disponible' => true,
      'habilitado' => true,
    ]);

    $anuncio6 = Anuncio::create([
      'titulo' => 'Se da habitacion en alquiler Zona la ramada.',
      'descripcion' => 'Se da una habitación en alquiler.
      . Dimensiones: 5x5 mts.
      . Baño compartido.
      . Costo de alquiler mensual 600bs.
      . Costo de servicios básicos: viene incluido en el alquiler.',
      'precio' => 600,
      'fecha_publicacion' => '2024-04-11',
      'fecha_expiracion' => '2024-05-11',
      'visitas' => 0,
      'categoria_id' => 6,
      'condicion_id' => 1,
      'moneda_id' => 1,
      'user_id' => 6,
      'disponible' => true,
      'habilitado' => true,

    ]);

    $anuncio7 = Anuncio::create([
      'titulo' => 'Gran auto',
      'descripcion' => '. Aire Acondicionado.
      . Bolsas de aire conductor.
      . Frenos asistidos.
      . Equipo de audio.
      . Bolsas de aire pasajero',
      'precio' => 11200,
      'fecha_publicacion' => '2024-01-02',
      'fecha_expiracion' => '2024-02-02',
      'visitas' => 0,
      'categoria_id' => 3,
      'condicion_id' => 2,
      'moneda_id' => 2,
      'user_id' => 3,
      'disponible' => true,
      'habilitado' => true,

    ]);


    /* $anuncio Nro = Anuncio::create([
      'titulo' => 'motocicleta en venta',
      'descripcion' => 'moto con papeles al dia 😎',
      'precio' => 10000,
      'fecha_publicacion' => '2024-04-11',
      'fecha_expiracion' => '2024-05-11',
      'visitas' => 0,
      'categoria_id' => 1,
      'condicion_id' => 1,
      'moneda_id' => 1,
      'user_id' => 5,
      'disponible' => true,
      'habilitado' => true,

    ]); */
  }
}
