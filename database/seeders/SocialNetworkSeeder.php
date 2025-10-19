<?php

namespace Database\Seeders;

use App\Models\SocialNetwork;
use Illuminate\Database\Seeder;

class SocialNetworkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $socialNetworks = [
            [
                'name' => 'Facebook',
                'icon' => 'heroicon-o-globe-alt',
                'base_url' => 'https://facebook.com/',
                'is_active' => true,
                'order' => 1,
            ],
            [
                'name' => 'Instagram',
                'icon' => 'heroicon-o-camera',
                'base_url' => 'https://instagram.com/',
                'is_active' => true,
                'order' => 2,
            ],
            [
                'name' => 'Telegram',
                'icon' => 'heroicon-o-paper-airplane',
                'base_url' => 'https://t.me/',
                'is_active' => true,
                'order' => 3,
            ],
            [
                'name' => 'YouTube',
                'icon' => 'heroicon-o-video-camera',
                'base_url' => 'https://youtube.com/',
                'is_active' => true,
                'order' => 4,
            ],
            [
                'name' => 'Twitter (X)',
                'icon' => 'heroicon-o-at-symbol',
                'base_url' => 'https://twitter.com/',
                'is_active' => true,
                'order' => 5,
            ],
            [
                'name' => 'LinkedIn',
                'icon' => 'heroicon-o-briefcase',
                'base_url' => 'https://linkedin.com/in/',
                'is_active' => true,
                'order' => 6,
            ],
            [
                'name' => 'TikTok',
                'icon' => 'heroicon-o-musical-note',
                'base_url' => 'https://tiktok.com/@',
                'is_active' => true,
                'order' => 7,
            ],
            [
                'name' => 'WhatsApp',
                'icon' => 'heroicon-o-phone',
                'base_url' => 'https://wa.me/',
                'is_active' => true,
                'order' => 8,
            ],
        ];

        foreach ($socialNetworks as $network) {
            SocialNetwork::create($network);
        }
    }
}
