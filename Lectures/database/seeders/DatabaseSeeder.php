<?php

namespace Database\Seeders;

use App\Models\city;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        // City::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        // city::factory()->count(10)->create();
        city::factory()->count(10)->create();
        $this->call([
            StudentSeeder::class,
            // CitySeeder::class,
        ]);
    }
}
