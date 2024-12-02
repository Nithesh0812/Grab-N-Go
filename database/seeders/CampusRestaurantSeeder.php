<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Log;
use App\Models\Campus;
use App\Models\Restaurant;

class CampusRestaurantSeeder extends Seeder
{
    public function run()
    {
        Log::info('Starting seeding campuses and restaurants.');

        // Create campuses
        $untCampus = Campus::create(['name' => 'UNT Main Campus']);
        Log::info('Created Campus: ' . $untCampus->name);

        $discoveryParkCampus = Campus::create(['name' => 'Discovery Park Campus']);
        Log::info('Created Campus: ' . $discoveryParkCampus->name);

        // Create restaurants for UNT Main Campus
        $restaurants = [
            'Chick-fil-A',
            'Burger King',
            'Fuzzys',
            'Starbucks'
        ];

        foreach ($restaurants as $restaurantName) {
            $restaurant = Restaurant::create(['name' => $restaurantName, 'campus_id' => $untCampus->id]);
            Log::info('Created Restaurant: ' . $restaurant->name);
        }

        // Create one restaurant for Discovery Park Campus
        $restaurant = Restaurant::create(['name' => 'Basic', 'campus_id' => $discoveryParkCampus->id]);
        Log::info('Created Restaurant: ' . $restaurant->name);

        $sqlFilePath = database_path('seeders/sql/script.sql');

        if (file_exists($sqlFilePath)) {
            // Read the SQL file
            $sql = file_get_contents($sqlFilePath);

            try {
                // Run the SQL file
                DB::unprepared($sql);
                Log::info('Successfully seeded campuses and restaurants from SQL file.');
            }
            catch(\Exception $e){
                  Log::error('Error seeding from SQL file: ' . $e->getMessage());
            }}

        Log::info('Seeding completed successfully.');
    }
}
