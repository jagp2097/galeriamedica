<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class CrearRoles extends Seeder
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

        Permission::create(['name' => 'Agregar usuarios']);
        Permission::create(['name' => 'Editar usuarios']);
        Permission::create(['name' => 'Eliminar usuarios junto con su rol y permisos']);
        Permission::create(['name' => 'Asignar roles a los usuarios y sus respectivos permisos']);
        Permission::create(['name' => 'Editar roles de los usuarios y sus respectivos permisos']);
        
    }
}
