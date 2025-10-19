<?php

namespace Database\Seeders;

use App\Enums\UserRole;
use App\Models\Organization;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class OrganizationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Test organization admin user yaratamiz
        $user = User::create([
            'first_name' => 'Tashkilot',
            'last_name' => 'Admin',
            'phone_number' => '998901111111', // +998 90 111 11 11
            'password' => Hash::make('password'),
            'role' => UserRole::ORGANIZATION,
        ]);

        // Organization yaratamiz
        $organization = Organization::create([
            'name' => 'Test Tashkiloti',
            'tin' => '123456789',
            'address' => 'Toshkent shahar, Chilonzor tumani',
            'is_active' => true,
            'user_id' => $user->id,
        ]);
    }
}
