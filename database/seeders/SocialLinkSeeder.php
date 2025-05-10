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
        $socialLinks = [
            ['title' => 'Email', 'icon' => 'fas fa-envelope', 'link' => 'mailto:', 'value' => 'iilhomjonov777@gmail.com', 'is_active' => true],
            ['title' => 'Phone', 'icon' => 'fas fa-phone', 'link' => 'tel:', 'value' => '+998997799333', 'is_active' => true],
            ['title' => 'Telegram', 'icon' => 'fab fa-telegram', 'link' => 'https://t.me/', 'value' => 'iqbolshoh_777', 'is_active' => true],
            ['title' => 'Facebook', 'icon' => 'fab fa-facebook', 'link' => 'https://facebook.com/', 'value' => null, 'is_active' => false],
            ['title' => 'Instagram', 'icon' => 'fab fa-instagram', 'link' => 'https://instagram.com/', 'value' => 'iqbolshoh_777', 'is_active' => true],
            ['title' => 'WhatsApp', 'icon' => 'fab fa-whatsapp', 'link' => 'https://wa.me/', 'value' => null, 'is_active' => false],
            ['title' => 'X (Twitter)', 'icon' => 'fab fa-x-twitter', 'link' => 'https://twitter.com/', 'value' => null, 'is_active' => false],
            ['title' => 'LinkedIn', 'icon' => 'fab fa-linkedin', 'link' => 'https://linkedin.com/in/', 'value' => null, 'is_active' => false],
            ['title' => 'TikTok', 'icon' => 'fab fa-tiktok', 'link' => 'https://tiktok.com/', 'value' => null, 'is_active' => false],
            ['title' => 'YouTube', 'icon' => 'fab fa-youtube', 'link' => 'https://youtube.com/', 'value' => null, 'is_active' => false],
        ];

        foreach ($socialLinks as $link) {
            SocialLink::create($link);
        }

        $this->command->info('Social Links seeded successfully!');
    }
}
