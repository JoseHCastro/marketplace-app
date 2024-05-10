<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermisosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Crear permisos
        Permission::create(['name' => 'crear usuario']);
        Permission::create(['name' => 'eliminar usuario']);
        Permission::create(['name' => 'editar usuario']);
        Permission::create(['name' => 'configuración de administrador']);
    }
}
