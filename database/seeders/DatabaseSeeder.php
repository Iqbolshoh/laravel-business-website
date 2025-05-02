<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database with initial data.
     */
    public function run()
    {
        /*
        |--------------------------------------------------------------------------
        | Call UserSeeder
        |--------------------------------------------------------------------------
        | This section triggers the UserSeeder to create initial users in the system
        */
        $this->call(UserSeeder::class);

        /*
        |--------------------------------------------------------------------------
        | Call RolePermissionSeeder
        |--------------------------------------------------------------------------
        | This section triggers the RolePermissionSeeder to set up roles and permissions
        */
        $this->call(RolePermissionSeeder::class);

        /*
        |--------------------------------------------------------------------------
        | Call FeatureSeeder
        |--------------------------------------------------------------------------
        | This section triggers the FeatureSeeder to create homepage feature cards
        | like "Innovatsion yechimlar", "Bepul maslahatlar", and "Kuchli tarmoq"
        */
        $this->call(FeatureSeeder::class);
    }
}
