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
                'key' => 'app.name',
                'value' => 'SYSBASE',
                'created_at' => '2017-05-21 08:41:01',
                'updated_at' => '2017-05-30 08:49:42',
                'deleted_at' => NULL,
            )
        ));
        
        
    }
}