<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Moneda;

class MonedaSeeder extends Seeder
{
  /**
   * Run the database seeds.
   */
  public function run(): void
  {
    //
    $moneda = Moneda::create([
      'nombre' => 'Bs',
    ]);

    $moneda = Moneda::create([
      'nombre' => '$us',
    ]);
  }
}
