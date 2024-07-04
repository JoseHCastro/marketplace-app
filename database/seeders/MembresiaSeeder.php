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
        //1
        $membresia = Membresia::create([
            'titulo'=>'MEMBRESIA INICIAL',
            'descripcion'=>'DURACION DE 1 MES',
            'precio'=> 00.00,
            'duracion'=>30,
            'etiqueta'=>'0',
        ]);
        //2
        $membresia = Membresia::create([
            'titulo'=>'MEMBRESIA ESTANDAR',
            'descripcion'=>'DURACION DE 1 MES',
            'precio'=> 10.00,
            'duracion'=>30,
            'etiqueta'=>'1',
        ]);
        //3
        $membresia = Membresia::create([
            'titulo'=>'MEMBRESIA EMPRESARIAL',
            'descripcion'=>'DURACION DE 1 AÑO',
            'precio'=> 90.00,
            'duracion'=>365,
            'etiqueta'=>'1',
        ]);


    }
}
