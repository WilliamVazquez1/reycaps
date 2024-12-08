<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use App\Models\User;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
{
    // Crear permisos
    Permission::firstOrCreate(['name' => 'editar productos']);
    Permission::firstOrCreate(['name' => 'eliminar productos']);
    Permission::firstOrCreate(['name' => 'ver productos']);

    // Crear roles y asignar permisos
    $roleAdmin = Role::firstOrCreate(['name' => 'admin']);
    $roleAdmin->givePermissionTo(['editar productos', 'eliminar productos', 'ver productos']);

    $roleUser = Role::firstOrCreate(['name' => 'user']);
    $roleUser->givePermissionTo('ver productos');

    
}
}