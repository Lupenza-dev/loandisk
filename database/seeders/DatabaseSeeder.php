<?php

namespace Database\Seeders;

use App\Models\User;
use Database\Seeders\version1\DistrictsTableSeeder;
use Database\Seeders\version1\GenderTableSeeder;
use Database\Seeders\version1\IdTypeTableSeeder;
use Database\Seeders\version1\MaritialStatusTableSeeder;
use Database\Seeders\version1\RegionsTableSeeder;
use Database\Seeders\version1\RoleTableSeeder;
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

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $this->call([
            RoleTableSeeder::class,
            GenderTableSeeder::class,
            IdTypeTableSeeder::class,
            MaritialStatusTableSeeder::class,
            RegionsTableSeeder::class,
            DistrictsTableSeeder::class,
            // VisaTypeSeeder::class
        ]);
    }
}
