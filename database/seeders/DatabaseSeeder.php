<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use App\Models\Anuncio;
use App\Models\servicios;
use Illuminate\Database\Seeder;
use Database\Seeders\UserSeeder;
use Database\Seeders\EtiquetaSeeder;


class DatabaseSeeder extends Seeder
{
  /**
   * Seed the application's database.
   */
  public function run(): void
  {

    // \App\Models\User::factory(10)->create();

    // \App\Models\User::factory()->create([
    //     'name' => 'Test User',
    //     'email' => 'test@example.com',
    // ]);



    $this->call([
      UserSeeder::class,
      EtiquetaSeeder::class,
      MonedaSeeder::class,
      CondicionSeeder::class,
      EstadoSeeder::class,
      CategoriaSeeder::class,
      ServicioSeeder::class,
      AnuncioSeeder::class
    ]);
  }
}
