<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Permission::firstOrCreate(['name' => 'view hotels', 'guard_name' => 'web']);
        Permission::firstOrCreate(['name' => 'create hotels', 'guard_name' => 'web']);
        Permission::firstOrCreate(['name' => 'edit hotels', 'guard_name' => 'web']);
        Permission::firstOrCreate(['name' => 'delete hotels', 'guard_name' => 'web']);

        $admin = Role::firstOrCreate(['name' => 'admin']);
        $users = Role::firstOrCreate(['name' => 'user']);

        $user = User::find(1);
        $user->assignRole('admin');
    }
}
