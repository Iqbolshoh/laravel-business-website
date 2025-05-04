<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\AboutItem;

class AboutItemSeeder extends Seeder
{
    public function run(): void
    {
        $items = [
            'Har bir mijozlarimizga uning talabiga binoan sifatli xizmat ko\'rsatamiz va ularning ehtiyojlariga javob berishga intilamiz.',
            'Innovatsion yechimlar ishlab chiqamiz va zamonaviy texnologiyalarni qo\'llaymiz.',
            'Har bir loyiha uchun individual yondashuvni tanlaymiz va yangiliklar taklif etamiz.',
            'Har qanday muammo uchun tajribali mutaxassislarimiz yordam beradi.',
            'Qo\'llab-quvvatlash xizmatimiz mijozlarimiz uchun doim ochiq.',
            'Innovatsion yondashuvlar orqali xizmatlar sifatini oshiramiz.',
            'Har bir loyiha uchun maxsus strategiyalar ishlab chiqamiz.',
            'Mijozlarimizga yangi imkoniyatlar yaratishda ko\'maklashamiz.',
        ];

        foreach ($items as $item) {
            AboutItem::create([
                'about_id' => 1,
                'bullet_point' => $item,
            ]);
        }

        $this->command->info('About items seeded successfully!');
    }
}
