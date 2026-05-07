<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SalarySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $salaries = [
            [
                'year' => date("Y"),
                'month' => Carbon::now()->monthsInYear(),
                'day' => Carbon::now()->daysInMonth(),
                "amount" => 16000,
                "teacher_id" => 1
            ],
            [
                'year' => date("Y"),
                'month' => Carbon::now()->monthsInYear(),
                'day' => Carbon::now()->daysInMonth(),
                "amount" => 17000,
                "teacher_id" => 2
            ],
        ];
        DB::table('salaries')->insert($salaries);
    }
}
