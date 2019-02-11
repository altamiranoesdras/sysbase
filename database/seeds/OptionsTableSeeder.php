<?php

use Illuminate\Database\Seeder;

class OptionsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('options')->delete();
        
        \DB::table('options')->insert(array (
            0 => 
            array (
                'id' => 1,
                'padre' => NULL,
                'nombre' => 'Admin',
                'ruta' => NULL,
                'descripcion' => 'Opciones de administración',
                'icono_l' => 'fa-folder',
                'icono_r' => 'fa-angle-left',
                'orden' => 0,
                'is_resource' => 0,
                'created_at' => '2017-07-09 10:35:37',
                'updated_at' => '2018-07-04 22:06:02',
                'deleted_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'padre' => 1,
                'nombre' => 'Usuarios',
                'ruta' => 'users.index',
                'descripcion' => 'Administración de usuarios',
                'icono_l' => 'far fa-circle',
                'icono_r' => '',
                'orden' => 0,
                'is_resource' => 0,
                'created_at' => '2017-07-09 10:35:37',
                'updated_at' => '2018-10-26 09:48:30',
                'deleted_at' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'padre' => 1,
                'nombre' => 'Opciones',
                'ruta' => 'options.index',
                'descripcion' => 'Administración de las opciones del menu',
                'icono_l' => 'far fa-circle',
                'icono_r' => '',
                'orden' => 1,
                'is_resource' => 0,
                'created_at' => '2017-07-09 10:35:37',
                'updated_at' => '2018-10-26 11:05:13',
                'deleted_at' => NULL,
            ),
            3 => 
            array (
                'id' => 4,
                'padre' => 1,
                'nombre' => 'Roles',
                'ruta' => 'rols.index',
                'descripcion' => 'Administración de los roles de los usuarios',
                'icono_l' => 'far fa-circle',
                'icono_r' => '',
                'orden' => 3,
                'is_resource' => 0,
                'created_at' => '2017-07-09 10:35:37',
                'updated_at' => '2018-10-26 11:05:13',
                'deleted_at' => NULL,
            ),
            4 => 
            array (
                'id' => 5,
                'padre' => NULL,
                'nombre' => 'Ayuda',
                'ruta' => NULL,
                'descripcion' => 'Manual de usuario y tutoriales',
                'icono_l' => 'fa-plus-square',
                'icono_r' => '',
                'orden' => 7,
                'is_resource' => 0,
                'created_at' => '2017-07-09 10:35:37',
                'updated_at' => '2018-06-26 11:36:22',
                'deleted_at' => NULL,
            ),
            5 => 
            array (
                'id' => 6,
                'padre' => NULL,
                'nombre' => 'Acerca De...',
                'ruta' => NULL,
                'descripcion' => '',
                'icono_l' => 'far fa-circle',
                'icono_r' => '',
                'orden' => 8,
                'is_resource' => 0,
                'created_at' => '2017-07-09 10:35:37',
                'updated_at' => '2018-06-26 11:36:22',
                'deleted_at' => NULL,
            ),
            6 => 
            array (
                'id' => 7,
                'padre' => 1,
                'nombre' => 'Configuraciones',
                'ruta' => 'configurations.index',
                'descripcion' => NULL,
                'icono_l' => 'far fa-circle',
                'icono_r' => NULL,
                'orden' => 2,
                'is_resource' => 0,
                'created_at' => '2017-07-11 10:30:19',
                'updated_at' => '2018-10-26 11:05:13',
                'deleted_at' => NULL,
            ),
            7 => 
            array (
                'id' => 8,
                'padre' => NULL,
                'nombre' => 'Notas',
                'ruta' => 'notas.index',
                'descripcion' => NULL,
                'icono_l' => 'fa-book',
                'icono_r' => NULL,
                'orden' => 6,
                'is_resource' => 0,
                'created_at' => '2017-11-07 16:38:35',
                'updated_at' => '2018-06-26 11:36:22',
                'deleted_at' => NULL,
            ),
            8 => 
            array (
                'id' => 9,
                'padre' => NULL,
                'nombre' => 'Prueba pdf',
                'ruta' => 'prueba.pdf',
                'descripcion' => NULL,
                'icono_l' => 'fa-file-pdf',
                'icono_r' => NULL,
                'orden' => 5,
                'is_resource' => 0,
                'created_at' => '2017-11-14 16:55:51',
                'updated_at' => '2018-07-04 22:06:02',
                'deleted_at' => NULL,
            ),
            9 => 
            array (
                'id' => 10,
                'padre' => 1,
                'nombre' => 'Oauth Clients',
                'ruta' => 'oauth.clients',
                'descripcion' => NULL,
                'icono_l' => 'far fa-circle',
                'icono_r' => NULL,
                'orden' => 0,
                'is_resource' => 0,
                'created_at' => '2019-02-11 14:35:11',
                'updated_at' => '2019-02-11 14:35:11',
                'deleted_at' => NULL,
            ),
            10 => 
            array (
                'id' => 11,
                'padre' => 1,
                'nombre' => 'Permisos',
                'ruta' => 'permissions.index',
                'descripcion' => NULL,
                'icono_l' => 'far fa-circle',
                'icono_r' => NULL,
                'orden' => 0,
                'is_resource' => 0,
                'created_at' => '2019-02-11 16:01:25',
                'updated_at' => '2019-02-11 16:01:25',
                'deleted_at' => NULL,
            ),
        ));
        
        
    }
}