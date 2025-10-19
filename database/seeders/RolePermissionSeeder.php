<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // Create roles
        $superAdminRole = Role::create(['name' => 'super_admin']);
        $organizationAdminRole = Role::create(['name' => 'organization_admin']);

        // Create Super Admin User
        $superAdmin = User::create([
            'name' => 'Super Admin',
            'email' => 'admin@kindergarten.uz',
            'password' => Hash::make('password'),
            'email_verified_at' => now(),
        ]);
        $superAdmin->assignRole($superAdminRole);

        // Create Test Organization Admin User
        $orgAdmin = User::create([
            'name' => 'Test Bog\'cha Admin',
            'email' => 'bogcha@kindergarten.uz',
            'password' => Hash::make('password'),
            'email_verified_at' => now(),
        ]);
        $orgAdmin->assignRole($organizationAdminRole);
    }
}
