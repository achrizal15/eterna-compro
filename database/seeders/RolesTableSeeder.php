<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = Role::create(['name' => 'admin']);
        $user = Role::create(['name' => 'user']);
        $velicia = User::create([
            'name' => 'Velicia',
            'email' => 'velicia@eterna.com',
            'password' => bcrypt('123'),
        ]);
        $anonym = User::create([
            'name' => 'user',
            'email' => 'user@eterna.com',
            'password' => bcrypt('123'),
        ]);
        Permission::create(['name' => 'read dashboard']);
        Permission::create(['name' => 'create user']);
        Permission::create(['name' => 'edit user']);
        Permission::create(['name' => 'read user']);
        Permission::create(['name' => 'delete user']);
        $user->syncPermissions([
            'read dashboard',
        ]);
        $admin->syncPermissions([
            'read dashboard',
            'delete user',
            'read user',
            'edit user',
            'create user'
        ]);
        $velicia->assignRole('admin');
        $anonym->assignRole('user');
    }
}