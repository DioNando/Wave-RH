<?php

namespace Database\Seeders;

use App\Enums\UserRole;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Réinitialisation des caches de rôles et permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // Création des rôles de base
        $adminRole = Role::create(['name' => UserRole::ADMIN->value, 'guard_name' => 'web']);
        $userRole = Role::create(['name' => UserRole::USER->value, 'guard_name' => 'web']);

        // Création de quelques permissions de base
        Permission::create(['name' => 'manage users', 'guard_name' => 'web']);
        Permission::create(['name' => 'manage roles', 'guard_name' => 'web']);
        Permission::create(['name' => 'manage collaborateurs', 'guard_name' => 'web']);
        Permission::create(['name' => 'view dashboard', 'guard_name' => 'web']);

        // Attribution des permissions au rôle admin
        $adminRole->givePermissionTo(Permission::all());

        // Attribution des permissions au rôle user
        $userRole->givePermissionTo(['view dashboard']);
    }
}
