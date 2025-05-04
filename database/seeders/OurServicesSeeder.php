<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\OurServices;

class OurServicesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $services = [
            [
                'service_name' => 'Hududga mos ravshda mahsulot',
                'skill_level' => 95,
            ],
            [
                'service_name' => 'Mobil tezkorlik bilan ta\'labga nisbatan taklif berish',
                'skill_level' => 85,
            ],
            [
                'service_name' => 'Xavfsizlik',
                'skill_level' => 80,
            ],
            [
                'service_name' => 'Ma’lumotlar Bazasi',
                'skill_level' => 95,
            ],
            [
                'service_name' => 'Kreativ Eco arxitektura',
                'skill_level' => 75,
            ],
        ];

        foreach ($services as $service) {
            OurServices::create($service);
        }

        $this->command->info('OurServices seeded successfully!');
    }
}
