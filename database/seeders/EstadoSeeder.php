<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Estado;

class EstadoSeeder extends Seeder
{
  /**
   * Run the database seeds.
   */
  public function run(): void
  {
    //estados para anuncio
    $estado = Estado::create([
      'nombre' => 'Vendido'//anuncio vendido
    ]);
    $estado = Estado::create([
      'nombre' => 'No vendido'//(ó Disponible)por defecto, luego de crear un anucio se colocaria en este estado
    ]);
    $estado = Estado::create([
      'nombre' =>'Deshabilitado'//anuncio deshabilitado, para que no se muestre en la lista de anuncios de lado del homepage
    ]);

    $estado = Estado::create([
      'nombre' =>'Habilitado'//anuncio habilitado, para que se muestre en la lista de anuncios de lado del homepage
    ]);

    //estados para usuario
    $estado = Estado::create([
      'nombre' => 'Activo' //usuario activo
    ]);

    $estado = Estado::create([
      'nombre' => 'Inactivo' //usuario inactivo
    ]);
  }
}
