<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\SocialLink;

class SocialLinkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $links = [
            ['title' => 'Email', 'icon' => 'fas fa-envelope', 'value' => '', 'is_active' => true,],
            ['title' => 'Phone', 'icon' => 'fas fa-phone', 'value' => '', 'is_active' => true,],
            ['title' => 'Telegram', 'icon' => 'fab fa-telegram', 'value' => '', 'is_active' => true,],
            ['title' => 'Facebook', 'icon' => 'fab fa-facebook', 'value' => '', 'is_active' => true,],
            ['title' => 'Instagram', 'icon' => 'fab fa-instagram', 'value' => '', 'is_active' => true,],
            ['title' => 'WhatsApp', 'icon' => 'fab fa-whatsapp', 'value' => '', 'is_active' => false,],
            ['title' => 'X', 'icon' => 'fab fa-x', 'value' => '', 'is_active' => false,],
            ['title' => 'LinkedIn', 'icon' => 'fab fa-linkedin', 'value' => '', 'is_active' => false,],
            ['title' => 'TikTok', 'icon' => 'fab fa-tiktok', 'value' => '', 'is_active' => false,],
            ['title' => 'YouTube', 'icon' => 'fab fa-youtube', 'value' => '', 'is_active' => false,],
        ];

        foreach ($links as $link) {
            SocialLink::create($link);
        }

        $this->command->info('Social Links seeded successfully!');
    }
}
