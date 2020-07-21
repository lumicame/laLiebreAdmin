<?php

use Illuminate\Database\Seeder;
use App\Role;
use App\User;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $role = new Role();
        $role->name = 'admin';
        $role->description = 'Administrator';
        $role->save();

        $role = new Role();
        $role->name = 'store';
        $role->description = 'Negocio';
        $role->save();
        $role = new Role();
        $role->name = 'client';
        $role->description = 'Cliente';
        $role->save();
        
        $user = new User();
        $user->name = 'Administrador';
        $user->email = 'admin@admin.com';
        $user->password = bcrypt('123456');
        $user->save();
        $user->roles()->attach($role);
    }
}
