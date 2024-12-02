<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     *
     */
    public function run()
    {
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
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
