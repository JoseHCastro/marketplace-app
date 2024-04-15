<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\servicios;


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
<<<<<<< HEAD
        $this->call(UserSeeder::class);
        servicios::Factory(8)->create();
=======
        $this->call([
            UserSeeder::class,
            EtiquetaSeeder::class,
        ]);
>>>>>>> 8fd95c8b5faf3ce5edd3ef8875e6f4a891123bfc
    }
}
