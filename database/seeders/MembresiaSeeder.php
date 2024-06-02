<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Membresia;

class MembresiaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $membresia = Membresia::create([
            'titulo'=>'MEMBRESIA EMPRESARIAL',
            'descripcion'=>'DURACION DE 1 AÑO',
            'precio'=> 100.00,
        ]);

        $membresia = Membresia::create([
            'titulo'=>'MEMBRESIA ESTANDAR',
            'descripcion'=>'DURACION DE 2 MESES',
            'precio'=> 10.00,
        ]);

        $membresia = Membresia::create([
            'titulo'=>'MEMBRESIA INICIAL',
            'descripcion'=>'DURACION DE 1 MES',
            'precio'=> 00.00,
        ]);

    }
}
