<?php

namespace Database\Seeders;

use Database\Seeders\AmenitySeeder;
use Database\Seeders\CoworkingAmenitySeeder;
use Database\Seeders\CoworkingSeeder;
use Database\Seeders\PlanSeeder;
use Database\Seeders\SpaceSeeder;
use Database\Seeders\UserSeeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
   public function run(): void
{
    $this->call([
        UserSeeder::class,
        CoworkingSeeder::class,
        PlanSeeder::class,
        SpaceSeeder::class,
        AmenitySeeder::class,
        CoworkingAmenitySeeder::class,
    ]);
}
}
