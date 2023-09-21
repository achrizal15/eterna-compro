<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class BannerPermission extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $role = Role::findById(1);
        $role->givePermissionTo([
            Permission::create(['name' => 'read banner']),
            Permission::create(['name' => 'update banner']),
            Permission::create(['name' => 'delete banner']),
            Permission::create(['name' => 'create banner']),
        ]);
    }
}