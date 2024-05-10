<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Crear el rol de administrador
        Role::create(['name' => 'administrador']);

        // Crear el rol de usuario
        Role::create(['name' => 'usuario']);
    }
}
