<?php

use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Models\Permission::class,1)->create(['name' => 'Crear Usuario']);
        factory(\App\Models\Permission::class,1)->create(['name' => 'Listar Usuarios']);
        factory(\App\Models\Permission::class,1)->create(['name' => 'Editar Usuario']);
        factory(\App\Models\Permission::class,1)->create(['name' => 'Eliminar Usuario']);
        factory(\App\Models\Permission::class,1)->create(['name' => 'Ver Usuario']);
    }
}
