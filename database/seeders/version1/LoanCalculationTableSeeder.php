<?php

namespace Database\Seeders\version1;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LoanCalculationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('loan_calculations')->truncate();


        DB::table('loan_calculations')->insert(array(
            0 =>
                array(
                    'id' => 1,
                    'name' => "Compound Interest Method",
                    'created_at' => '2024-03-27 03:04:00',
                    'updated_at' => '2024-03-27 03:04:00',
                ),
            1 =>
                array(
                    'id' => 2,
                    'name' => "Reducing Balance Calculation",
                    'created_at' => '2024-03-27 03:04:00',
                    'updated_at' => '2024-03-27 03:04:00',
                ),
            2 =>
                array(
                    'id' => 3,
                    'name' => "Fixed Interest Method",
                    'created_at' => '2024-03-27 03:04:00',
                    'updated_at' => '2024-03-27 03:04:00',
                ),
            3 =>
                array(
                    'id' => 4,
                    'name' => "Payday Method",
                    'created_at' => '2024-03-27 03:04:00',
                    'updated_at' => '2024-03-27 03:04:00',
                ),
            ));

            DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        }
}