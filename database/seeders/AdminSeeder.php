<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Admin;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
            $user = User::create([
                'name' => 'Admin', 
                'email' => 'eslam@admin.com',
                'password' => Hash::make('password'),
                'type'     => "admin",
                'roles_name' => 'admin'
                ]);
      
            $role = Role::create(['name' => 'admin']);
       
            $permissions = Permission::pluck('id','id')->all();
      
            $role->syncPermissions($permissions);
       
            $user->assignRole([$role->id]);


      
    }
}
