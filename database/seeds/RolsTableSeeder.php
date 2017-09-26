<?php

use App\Rol;
use Illuminate\Database\Seeder;

class RolsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Rol::create(["descripcion" => "admin"]);
        Rol::create(["descripcion" => "user"]);
        Rol::create(["descripcion" => "editor"]);
    }
}
