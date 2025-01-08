<?php

namespace Database\Seeders\version1;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RegionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {   
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('regions')->truncate();

        DB::table('regions')->insert([
            ['id' => 1, 'name' => 'Mtwara', 'code' => 'MT'],
            ['id' => 2, 'name' => 'Lindi', 'code' => 'LI'],
            ['id' => 3, 'name' => 'Tanga', 'code' => 'TN'],
            ['id' => 4, 'name' => 'Ruvuma', 'code' => 'RV'],
            ['id' => 5, 'name' => 'Mbeya', 'code' => 'MB'],
            ['id' => 6, 'name' => 'Singida', 'code' => 'SD'],
            ['id' => 7, 'name' => 'Dodoma', 'code' => 'DO'],
            ['id' => 8, 'name' => 'Tabora', 'code' => 'TB'],
            ['id' => 9, 'name' => 'Pwani', 'code' => 'PW'],
            ['id' => 10, 'name' => 'Morogoro', 'code' => 'MO'],
            ['id' => 11, 'name' => 'Iringa', 'code' => 'IG'],
            ['id' => 13, 'name' => 'Njombe', 'code' => 'NJ'],
            ['id' => 14, 'name' => 'Kilimanjaro', 'code' => 'KL'],
            ['id' => 15, 'name' => 'Songwe', 'code' => 'SN'],
            ['id' => 16, 'name' => 'Katavi', 'code' => 'KA'],
            ['id' => 17, 'name' => 'Shinyanga', 'code' => 'SY'],
            ['id' => 18, 'name' => 'Kigoma', 'code' => 'KM'],
            ['id' => 20, 'name' => 'Manyara', 'code' => 'MY'],
            ['id' => 21, 'name' => 'Arusha', 'code' => 'AR'],
            ['id' => 23, 'name' => 'Kagera', 'code' => 'KG'],
            ['id' => 24, 'name' => 'Geita', 'code' => 'GE'],
            ['id' => 25, 'name' => 'Mara', 'code' => 'MA'],
            ['id' => 26, 'name' => 'Mwanza', 'code' => 'MZ'],
            ['id' => 30, 'name' => 'Dar es salaam', 'code' => 'DS'],
            ['id' => 31, 'name' => 'Simiyu', 'code' => 'SI'],
            ['id' => 32, 'name' => 'Rukwa', 'code' => 'RU'],
        ]);

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

    }
}
