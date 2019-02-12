<?php

use App\Models\Configuration;
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


        factory(Configuration::class,1)->create(['key' => 'name','value' => 'ASISTENCIA']);
        factory(Configuration::class,1)->create(['key' => 'tiempo_oculta_alerta','value' => '3000']);
        factory(Configuration::class,1)->create(['key' => 'divisa','value' => 'Q']);
        factory(Configuration::class,1)->create(['key' => 'cantidad_decimales','value' => '2']);
        factory(Configuration::class,1)->create(['key' => 'separador_miles','value' => ',']);
        factory(Configuration::class,1)->create(['key' => 'separador_decimal','value' => '.']);
        factory(Configuration::class,1)->create(['key' => 'cantidad_decimales_precio','value' => '2']);
        factory(Configuration::class,1)->create(['key' => 'mail_pruebas','value' => 'altamiranoesdras@gmail.com']);

    }
}