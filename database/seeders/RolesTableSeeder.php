<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::find(1);
        $permission = Permission::create(['name' => 'read dashboard']);
        $user->assignRole(Role::create(['name' => 'Dashboard'])->givePermissionTo([
            $permission
        ]));
        $user->givePermissionTo($permission);
    }
}