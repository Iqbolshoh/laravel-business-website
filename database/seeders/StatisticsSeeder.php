<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Statistics;

class StatisticsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Inserting predefined statistics data with icons
        Statistics::create([
            'icon' => 'bi bi-emoji-smile',
            'count' => 50,
            'title' => 'Baxtli Mijozlar',
            'description' => 'Bizning muvaffaqiyatimiz',
        ]);

        Statistics::create([
            'icon' => 'bi bi-journal-richtext',
            'count' => 30,
            'title' => 'Loyihalar',
            'description' => 'Bizning ijodkorligimiz',
        ]);

        Statistics::create([
            'icon' => 'bi bi-headset',
            'count' => 1453,
            'title' => 'Qo\'llab-quvvatlash Soatlari',
            'description' => 'Mijozlarga har doim yordam beramiz',
        ]);

        Statistics::create([
            'icon' => 'bi bi-people',
            'count' => 15,
            'title' => 'Mehnatkashlar',
            'description' => 'Bizning jamoamiz',
        ]);

        $this->command->info('Statistics seeded successfully!');
    }
}
