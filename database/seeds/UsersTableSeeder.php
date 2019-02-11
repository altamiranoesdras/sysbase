<?php

use App\Models\Role;
use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            "username" => "admin",
            "name" => "Administrador",
            "password" => bcrypt("admin")
        ]);


        $user->syncRoles([Role::DEVELOPER,Role::SUPERADMIN,Role::ADMIN]);
    }
}
