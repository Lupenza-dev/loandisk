<?php

namespace Database\Seeders\version1;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WorkFlowTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('workflow_modules')->truncate();

        DB::table('workflow_modules')->insert(array(
            0 =>
                array(
                    'id' => 1,
                    'name' => "Loan Assesment",
                    'description' => "Loan Application , Loan Assessment and Approval Workflow",
                    'is_active' => true,
                    'created_at' => '2024-03-27 03:04:00',
                    'updated_at' => '2024-03-27 03:04:00',
                ),
            1 =>
                array(
                    'id' => 2,
                    'name' => "Penalty Waiver Flow",
                    'description' => "Penalty Waiver Request",
                    'is_active' => true,
                    'created_at' => '2024-03-27 03:04:00',
                    'updated_at' => '2024-03-27 03:04:00',
                ),
          
            ));

            DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        }
}