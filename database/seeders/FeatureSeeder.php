<?php

namespace Database\Seeders;

use App\Models\Feature;
use Illuminate\Database\Seeder;

class FeatureSeeder extends Seeder
{
    public function run(): void
    {
        /*
        |-------------------------------------------------------------------------- 
        | Define Feature Data
        |-------------------------------------------------------------------------- 
        | This section defines all features to be inserted into the database.
        */
        $features = [
            [
                'icon_class' => 'bi bi-bounding-box-circles',
                'title' => 'Innovatsion yechimlar',
                'description' => 'Bizning innovatsion yechimlarimiz hayotingizni o‘zgartirishi mumkin.',
            ],
            [
                'icon_class' => 'bi bi-calendar4-week',
                'title' => 'Bepul maslahatlar',
                'description' => 'Bizning mutaxassislarimizdan bepul maslahatlar oling va rivojlaning.',
            ],
            [
                'icon_class' => 'bi bi-broadcast',
                'title' => 'Kuchli tarmoq',
                'description' => 'Bizning tarmog‘imiz orqali ko‘plab imkoniyatlarga ega bo‘ling.',
            ],
        ];

        /*
        |-------------------------------------------------------------------------- 
        | Insert Features into Database
        |-------------------------------------------------------------------------- 
        | This section inserts the feature data into the `features` table.
        */
        collect($features)->each(fn($feature) => Feature::create($feature));

        /*
        |-------------------------------------------------------------------------- 
        | Display Success Message
        |-------------------------------------------------------------------------- 
        | This section displays a confirmation message.
        */
        $this->command->info('Features seeded successfully!');
    }
}
