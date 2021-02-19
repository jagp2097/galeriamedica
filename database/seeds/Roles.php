<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class Roles extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Reset cached roles and permissions
        app()['cache']->forget('spatie.permission.cache');

        // create permissions
        Permission::create(['name' => 'Agregar pacientes']);
        Permission::create(['name' => 'Editar pacientes']);
        Permission::create(['name' => 'Eliminar pacientes']);
        Permission::create(['name' => 'Ver detalles de pacientes']);
        Permission::create(['name' => 'Agregar álbumes']);
        Permission::create(['name' => 'Editar información de álbumes']);
        Permission::create(['name' => 'Eliminar álbumes']);
        Permission::create(['name' => 'Ver detalles de álbumes']);
        Permission::create(['name' => 'Agregar archivos']);
        Permission::create(['name' => 'Editar información de archivos']);
        Permission::create(['name' => 'Eliminar archivos']);
        Permission::create(['name' => 'Descargar archivos']);
        Permission::create(['name' => 'Realizar busqueda de archivos y pacientes']);

        //Rol de administrador
        $role = Role::create(['name' => 'Administrador']);
        $role->givePermissionTo(Permission::all());
    }
}
