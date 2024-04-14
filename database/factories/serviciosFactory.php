<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\servicios>
 */
class serviciosFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $options1 = [
            'servicio 1',
            'servicio 2',
            'servicio 3',
            'servicio 4',


        ];
        $options2 = [
            'descripcion 1',
            'descripcion 2',
            'descripcion 3',
            'descripcion 4',


        ];
        $options3 = [
            '545',
            '76',
            '544',
            '400',


        ];
        return [
           'titulo' => Arr::random($options1),
           'descripcion' => Arr::random($options2), 
           'precio' => Arr::random($options3), 
        ];
    }
}
