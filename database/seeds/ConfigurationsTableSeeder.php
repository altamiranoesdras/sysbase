<?php

use Illuminate\Database\Seeder;

class ConfigurationsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('configurations')->delete();
        
        \DB::table('configurations')->insert(array (
            0 => 
            array (
                'id' => 1,
                'key' => 'locale',
                'value' => 'es',
                'created_at' => '2017-05-21 08:41:01',
                'updated_at' => '2017-05-30 08:49:42',
                'deleted_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'key' => 'nombre_negocio',
                'value' => 'Empresa',
                'created_at' => '2017-05-21 08:45:22',
                'updated_at' => '2017-05-27 17:32:10',
                'deleted_at' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'key' => 'dire_negocio',
                'value' => '2av 1-29 Zona 4',
                'created_at' => '2017-05-25 12:07:46',
                'updated_at' => '2017-05-25 12:07:46',
                'deleted_at' => NULL,
            ),
            3 => 
            array (
                'id' => 4,
                'key' => 'muni_negocio',
                'value' => 'Sanarate',
                'created_at' => '2017-05-25 12:08:01',
                'updated_at' => '2017-05-25 12:08:01',
                'deleted_at' => NULL,
            ),
            4 => 
            array (
                'id' => 5,
                'key' => 'depto_negocio',
                'value' => 'El Progreso',
                'created_at' => '2017-05-25 12:08:22',
                'updated_at' => '2017-05-25 12:08:22',
                'deleted_at' => NULL,
            ),
            5 => 
            array (
                'id' => 6,
                'key' => 'pais_negocio',
                'value' => 'Guatemala',
                'created_at' => '2017-05-25 12:08:55',
                'updated_at' => '2017-05-25 12:08:55',
                'deleted_at' => NULL,
            ),
            6 => 
            array (
                'id' => 7,
                'key' => 'mail_negocio',
                'value' => 'ejemplo@ejemplo.com',
                'created_at' => '2017-05-25 12:09:24',
                'updated_at' => '2017-05-25 12:09:24',
                'deleted_at' => NULL,
            ),
            7 => 
            array (
                'id' => 8,
                'key' => 'tel_negocio',
                'value' => '1234-5678',
                'created_at' => '2017-05-25 12:11:00',
                'updated_at' => '2017-05-25 12:11:00',
                'deleted_at' => NULL,
            ),
            8 => 
            array (
                'id' => 9,
                'key' => 'pdf_render',
                'value' => 'snappy',
                'created_at' => '2017-06-01 09:05:31',
                'updated_at' => '2017-06-01 09:05:31',
                'deleted_at' => NULL,
            )
        ));
        
        
    }
}