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

        //PERMISO PARA MODULO ADMINISTRACIÓN--------------------------------------------------
        Permission::create(['name' => 'configuracion administrador'])->assignRole([$role1]);
        //PERMISOS PARA GESTIONAR USUARIOS--------------------------------------------------
        Permission::create(['name' => 'ver listado de usuarios'])->assignRole([$role1]);
        Permission::create(['name' => 'crear usuario'])->assignRole([$role1]);
        Permission::create(['name' => 'eliminar usuario'])->assignRole([$role1]);
        Permission::create(['name' => 'editar usuario'])->assignRole([$role1]);
        Permission::create(['name' => 'mostrar usuario'])->assignRole([$role1]);
        //PERMISOS PARA GESTIONAR MEMBRESIAS
        Permission::create(['name' => 'ver listado de membresias'])->assignRole([$role1]);
        Permission::create(['name' => 'crear membresia'])->assignRole([$role1]);
        Permission::create(['name' => 'eliminar membresia'])->assignRole([$role1]);
        Permission::create(['name' => 'editar membresia'])->assignRole([$role1]);
        //PERMISOS PARA GESTIONAR ROLES
        Permission::create(['name' => 'ver listado de roles'])->assignRole([$role1]);
        Permission::create(['name' => 'crear rol'])->assignRole([$role1]);
        Permission::create(['name' => 'eliminar rol'])->assignRole([$role1]);
        Permission::create(['name' => 'editar rol'])->assignRole([$role1]);
        //PERMISOS PARA ROLES DE USUARIO
        Permission::create(['name' => 'ver listado de roles de usuario'])->assignRole([$role1]);
        Permission::create(['name' => 'ver roles'])->assignRole([$role1]);
        Permission::create(['name' => 'asignar roles'])->assignRole([$role1]);
        //PERMISOS PARA BITACORA
        Permission::create(['name' => 'ver listado bitacora'])->assignRole([$role1]);
        Permission::create(['name' => 'reporte bitacora pdf'])->assignRole([$role1]);
        Permission::create(['name' => 'reporte bitacora excel'])->assignRole([$role1]);
        //PERMISOS PARA BACKUPS
        Permission::create(['name' => 'ver listado backup'])->assignRole([$role1]);
        Permission::create(['name' => 'crear backup'])->assignRole([$role1]);
        Permission::create(['name' => 'eliminar backup'])->assignRole([$role1]);
        Permission::create(['name' => 'descargar backup'])->assignRole([$role1]);
        //PERMISOS PARA RESTORE
        Permission::create(['name' => 'ver listado restore'])->assignRole([$role1]);
        Permission::create(['name' => 'restore'])->assignRole([$role1]);
        //PERMISO MODULO ANUNCIOS
        Permission::create(['name' => 'modulo anuncios'])->assignRole([$role1,$role2]);
        //PERMISOS PARA ANUNCIOS
        Permission::create(['name' => 'ver listado de anuncios'])->assignRole([$role1,$role2]);
        Permission::create(['name' => 'crear anuncio'])->assignRole([$role1,$role2]);
        Permission::create(['name' => 'eliminar anuncio'])->assignRole([$role1,$role2]);
        Permission::create(['name' => 'editar anuncio'])->assignRole([$role1,$role2]);
        Permission::create(['name' => 'mas acciones anuncio'])->assignRole([$role1,$role2]);
        Permission::create(['name' => 'reporte anuncio pdf'])->assignRole([$role1,$role2]);
        Permission::create(['name' => 'reporte anuncio excel'])->assignRole([$role1,$role2]);
        //PERMISOS PARA CATEGORIAS
        Permission::create(['name' => 'ver listado de categorias'])->assignRole([$role1]);
        Permission::create(['name' => 'crear categoria'])->assignRole([$role1]);
        Permission::create(['name' => 'eliminar categoria'])->assignRole([$role1]);
        Permission::create(['name' => 'editar categoria'])->assignRole([$role1]);
        //PERMISOS PARA ETIQUETAS
        Permission::create(['name' => 'ver listado de etiquetas'])->assignRole([$role1]);
        Permission::create(['name' => 'crear etiqueta'])->assignRole([$role1]);
        Permission::create(['name' => 'eliminar etiqueta'])->assignRole([$role1]);
        Permission::create(['name' => 'editar etiqueta'])->assignRole([$role1]);
        //PERMISOS PARA MODULO SERVICIOS
        Permission::create(['name' => 'modulo servicios'])->assignRole([$role1]);
        //PERMISOS PARA SERVICIOS
        Permission::create(['name' => 'ver listado de servicios'])->assignRole([$role1]);
        Permission::create(['name' => 'crear servicio'])->assignRole([$role1]);
        Permission::create(['name' => 'eliminar servicio'])->assignRole([$role1]);
        Permission::create(['name' => 'editar servicio'])->assignRole([$role1]);
        //PERMISOS PARA COMENTARIOS
        Permission::create(['name' => 'eliminar comentario'])->assignRole([$role1,$role2]);
        Permission::create(['name' => 'comentar'])->assignRole([$role1,$role2]);

    }
}
