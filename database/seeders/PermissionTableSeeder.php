<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // $permissions = [  
        //     // general
        //     "create",
        //     "edit",
        //     "delete", 
        // ];
        // foreach($permissions as $permission){
        //     Permission::create(['name'=> $permission ]);
        // };
        $permissions = [  
            // general
            "create",
            "edit",
            "delete",
            // roles
            // 'role-list',
            // 'role-create',
            // 'role-edit',
            // 'role-delete',

    
        ];
        foreach($permissions as $permission){
            Permission::create(['name'=> $permission]);
        };
        
    }
} 
