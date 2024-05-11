<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        $role1=Role::create(['name' => 'administrador']);
        $role2=Role::create(['name' => 'usuario']);
        //PERMISOS PARA GESTIONAR USUARIOS--------------------------------------------------
        Permission::create(['name' => 'ver listado de usuarios'])->syncRoles([$role1]);
        Permission::create(['name' => 'crear usuario'])->syncRoles([$role1]);
        Permission::create(['name' => 'eliminar usuario'])->syncRoles([$role1]);
        Permission::create(['name' => 'editar usuario'])->syncRoles([$role1]);
        Permission::create(['name' => 'mostrar usuario'])->syncRoles([$role1]);
        Permission::create(['name' => 'configuracion administrador'])->syncRoles([$role1]);
        //PERMISOS PARA GESTIONAR USUARIOS-----------------------------------------------FIN
    }
}
