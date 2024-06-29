<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Illuminate\Database\Seeder;
use Database\Seeders\UserSeeder;
use Database\Seeders\EtiquetaSeeder;
use Database\Seeders\ImagenAnuncioSeeder;



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
      RoleSeeder::class,
      MembresiaSeeder::class,
      UserSeeder::class,
      EtiquetaSeeder::class,
      MonedaSeeder::class,
      CondicionSeeder::class,
      EstadoSeeder::class,
      CategoriaSeeder::class,
      ServicioSeeder::class,
      AnuncioSeeder::class,
      ImagenAnuncioSeeder::class,
      BitacoraSeeder::class,

    ]);
  }
}
