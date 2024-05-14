<?php

namespace Database\Seeders;

use App\Models\Image;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ImagenAnuncioSeeder extends Seeder
{
  /**
   * Run the database seeds.
   */
  public function run(): void
  {
    //
    $imagen = Image::create([
      'url' => 'public/images/anuncios/RW77JRYq73i9q9M9R93rQzDQeYvCcABQTzi6T0BV.jpg',
      'imageable_id' => 1,
      'imageable_type' => 'App\Models\Anuncio',
    ]);

    $imagen = Image::create([
      'url' => 'public/images/anuncios/FUnkpktL6lOpDmmbyw28soTd6nSi9VDSAaFGb0To.jpg',
      'imageable_id' => 2,
      'imageable_type' => 'App\Models\Anuncio',
    ]);

    $imagen = Image::create([
      'url' => 'public/images/anuncios/zSWugiJWyZbB8OAhn91dMCxdoCoXSmtEl4Ha79zE.jpg',
      'imageable_id' => 3,
      'imageable_type' => 'App\Models\Anuncio',
    ]);

    $imagen = Image::create([
      'url' => 'public/images/anuncios/o8AaFKJIOp37V3nQ9vr9988kulpKveDdYLRlW9s3.jpg',
      'imageable_id' => 4,
      'imageable_type' => 'App\Models\Anuncio',
    ]);

    $imagen = Image::create([
      'url' => 'public/images/anuncios/olGIwPD4mNfKf6EyVIbbIGN6NV1sLzDqRab4vizk.jpg',
      'imageable_id' => 5,
      'imageable_type' => 'App\Models\Anuncio',
    ]);

    $imagen = Image::create([
      'url' => 'public/images/anuncios/VMhd2tAqfHZpX6dZ0MtQCc04I9Bd5Bp6jeGQXUDm.jpg',
      'imageable_id' => 6,
      'imageable_type' => 'App\Models\Anuncio',
    ]);

    $imagen = Image::create([
      'url' => 'public/images/anuncios/Hkdw0Yd0yitWj0C2xsg8KbOJBjT8ez4gcX95e0tt.jpg',
      'imageable_id' => 7,
      'imageable_type' => 'App\Models\Anuncio',
    ]);
  }
}
