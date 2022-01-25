<?php

namespace Database\Seeders;

use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Seeder;

class CreateAdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => 'Admin', 
            'email' => 'admin@domain.com',
            'password' => bcrypt('12345678')
        ]);
    
        $role = Role::create([
            'name' => 'Admin',
        ]);
     
        $permissions = Permission::pluck('id','id')->all();
   
        $role->syncPermissions($permissions);
     
        $user->assignRole([$role->id]);

        $user = User::create([
            'name' => 'User', 
            'email' => 'user@domain.com',
            'password' => bcrypt('12345678')
        ]);
    
        $role = Role::create([
            'name' => 'User',
        ]);
     
        $permissions = Permission::pluck('id','id')->all();
   
        $role->syncPermissions($permissions);
     
        $user->assignRole([$role->id]);
    }
}
