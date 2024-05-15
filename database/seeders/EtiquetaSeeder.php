<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Etiqueta;

class EtiquetaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //1
        $etiqueta = Etiqueta::create([
            'name'=>'NEGOCIABLE',
            'precio'=> 10.00,
        ]);

        $etiqueta = Etiqueta::create([
            'name'=>'EN OFERTA',
            'precio'=> 10.00,
        ]);

        $etiqueta = Etiqueta::create([
            'name'=>'NUEVO',
            'precio'=> 10.00,
        ]);

        $etiqueta = Etiqueta::create([
            'name'=>'PROMOCION',
            'precio'=> 10.00,
        ]);

        $etiqueta = Etiqueta::create([
            'name'=>'DE OCACION',
            'precio'=> 10.00,
        ]);

        $etiqueta = Etiqueta::create([
            'name'=>'REMATO',
            'precio'=> 10.00,
        ]);
    }
}
