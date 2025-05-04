<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\About;

class AboutSeeder extends Seeder
{
    public function run(): void
    {
        About::create([
            'title' => 'Bizning xizmatlarimiz',
            'text_1' => "Biz har tomonlama Siz uchun 'Qayta tiklanuvchi' manbalar (Quyosh panellar, Shamol generatorlari, kichik GES va h.k) yordamida ishlovchi arxitektura dizaynini va yangicha maxsulot yaratishga tayyormiz.Jamoamiz har doim eng yaxshi natijalarga erishish uchun harakat qiladi. Biz o'z tajribamizni rivojlantirib, mijozlarimizga eng samarali yechimlarni taklif etamiz.",
            'text_2' => "Mijozlarimiz bilan uzoq muddatli va ishonchli hamkorlikni rivojlantirish bizning asosiy maqsadimizdir.",
            'image' => '',
        ]);

        $this->command->info('About seeded successfully!');
    }
}
