<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ServiceSection;

class ServiceSectionsSeeder extends Seeder
{
    public function run()
    {
        ServiceSection::create([
            'title' => 'Bizning Xizmatlarimiz',
            'text_1' => 'Bizning tajribamiz va ko\'nikmalarimiz sizga eng yaxshi xizmatni taqdim etish uchun mo\'ljallangan. Bizning xizmatlarimiz, sizga yuqori sifatli va tezkor echimlar taqdim etishga yordam beradi.',
            'image' => '',
            'sub_title' => 'Mahsulotlarimizni ishlab chiqish va taqdim etish bo\'yicha bizning yondashuvimiz',
            'text_2' => 'Mahsulotlarimizni yaratishda zamonaviy texnologiyalarni qo\'llab-quvvatlaymiz va har doim eng so\'nggi innovatsiyalarni taqdim etishga intilamiz.',
        ]);

        $this->command->info('Service Sections seeded successfully! 🤩');
    }
}
