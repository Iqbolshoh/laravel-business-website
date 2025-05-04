<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Service;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Service::create([
            'title' => 'Bizning xizmatlarimiz',
            'description' => 'Xizmatlarimizda har bir mijoz uchun individual yechimlar mavjud.',
            'icon' => 'bi bi-activity',
        ]);

        Service::create([
            'title' => 'O\'ziga xos yechimlar',
            'description' => 'Bizning xizmatlarimiz har bir mijozning ehtiyojlariga mos keladigan o\'ziga xos yechimlar taqdim etadi.',
            'icon' => 'bi bi-broadcast',
        ]);

        Service::create([
            'title' => 'Innovatsion yondashuvlar',
            'description' => 'Biz innovatsion yondashuvlar yordamida sizning muammolaringizni hal etamiz.',
            'icon' => 'bi bi-easel',
        ]);

        Service::create([
            'title' => 'Tez va samarali xizmatlar',
            'description' => 'Xizmatlarimiz tez va samarali, shuningdek, sifatga yuqori e\'tibor qaratadi.',
            'icon' => 'bi bi-bounding-box-circles',
        ]);

        Service::create([
            'title' => 'Mutaxassis maslahatlari',
            'description' => 'Bizning mutaxassislarimiz sizga eng yaxshi maslahatlar beradi.',
            'icon' => 'bi bi-calendar4-week',
        ]);

        Service::create([
            'title' => 'Mijozlar bilan muloqot',
            'description' => 'Mijozlar bilan samimiy muloqot olib boramiz. Sizni doimo tinglaymiz.',
            'icon' => 'bi bi-chat-square-text',
        ]);

        $this->command->info('Services seeded successfully!');
    }
}
