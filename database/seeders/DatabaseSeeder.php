<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(UsersTableSeeder::class);
        $this->call(MapBaseLayerSeeder::class);
        $this->call(MapOverlayLayerSeeder::class);
        $this->call(SituationSeeder::class);
    }
}
