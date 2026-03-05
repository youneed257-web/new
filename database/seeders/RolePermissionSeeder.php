<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = [
            'edit articles',
            'delete records',
            'api'
        ];

        foreach ($permissions as $perm) {
            Permission::firstOrCreate([
                'name' => $perm,
                'guard_name' => 'web',
            ]);
        }

        $manager = Role::firstOrCreate(['name' => 'manager', 'guard_name' => 'web']);
        $author = Role::firstOrCreate(['name' => 'author', 'guard_name' => 'web']);

        $manager->syncPermissions(['edit articles', 'delete records']);
        $author->syncPermissions(['edit articles']);
    }
}
