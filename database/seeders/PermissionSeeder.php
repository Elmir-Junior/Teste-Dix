<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            ['name' => 'admin_view', 'description' => 'Visualiza'],
            ['name' => 'admin_create', 'description' => 'Criar'],
            ['name' => 'admin_edit', 'description' => 'Editar'],
            ['name' => 'admin_delete', 'description' => 'Deletar']
        ];
        foreach ($permissions as $permissions) {
            Permission::firstOrCreate([
                'name' => $permissions['name'],
                'description' => $permissions['description']
            ])->assignRole('Admin');
        }
    }
}
