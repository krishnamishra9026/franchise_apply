<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    private $permissions = [
        'dashboard',
        'buyers',
        'sellers',
        'stock',
        'orders',
        'invoices',
        'inbox',
        'earnings',
        'user-management',
        'settings'
    ];

    public function run(): void
    {
        foreach ($this->permissions as $permission) {
            Permission::create(['guard_name'=>'administrator','name' => $permission]);
        }
        
        $role = Role::create(['guard_name'=>'administrator','name' => 'Administrator']);

        $permissions = Permission::pluck('id', 'id')->all();
        
        $role->syncPermissions($permissions);
    }
}
