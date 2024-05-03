<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::create(
            [
            'name' => 'eslambadawy', 
            'email' => 'eslambadawy957@yahoo.com',
            'password' => Hash::make('12345678'),
            'roles_name' => ["moderator"],
            // 'Status' => 'مفعل',
            ]);
      
            // $role = Role::create(['name' => 'moderator' , 'guard_name' => "admin" ]);
       
            // $permissions = Permission::pluck('id','id')->all();
      
            // $role->syncPermissions($permissions);
       
            // $user->assignRole([$role->id]);
    }
}
