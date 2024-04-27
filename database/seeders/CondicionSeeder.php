<?php

namespace Database\Seeders;

use App\Models\Condicion;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CondicionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
    //
    $condicion = Condicion::create([
      'nombre' => 'Usado',
    ]);

    $condicion = Condicion::create([
      'nombre' => 'Nuevo',
    ]);
    }
}
