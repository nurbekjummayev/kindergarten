<?php

namespace Database\Seeders;

use App\Enums\UserRole;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class SuperAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'first_name' => 'Super',
            'last_name' => 'Admin',
            'phone_number' => '998901234567', // +998 90 123 45 67
            'password' => Hash::make('password'),
            'role' => UserRole::SUPER_ADMIN,
        ]);
    }
}
