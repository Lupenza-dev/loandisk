<?php

namespace Database\Seeders\version1;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GenderTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('genders')->truncate();


        DB::table('genders')->insert(array(
            0 =>
                array(
                    'id' => 1,
                    'name' => "Male",
                    'created_at' => '2024-03-27 03:04:00',
                    'updated_at' => '2024-03-27 03:04:00',
                ),
            1 =>
                array(
                    'id' => 2,
                    'name' => "Female",
                    'created_at' => '2024-03-27 03:04:00',
                    'updated_at' => '2024-03-27 03:04:00',
                )
            ));

            DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        }
}