<?php

use App\Models\Role;
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
        Role::create(["name" => "developer"]);
        Role::create(["name" => "superadmin"]);
        Role::create(["name" => "admin"]);
        Role::create(["name" => "empleado"]);
    }
}
