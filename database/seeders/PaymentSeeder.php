<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PaymentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $payments = [
            [
                "amount" => 10000,
                "student_id" => 37,
                "sinf_id" => 7
            ],
            [
                "amount" => 10000,
                "student_id" => 38,
                "sinf_id" => 8
            ],
            [
                "amount" => 5400,
                "student_id" => 39,
                "sinf_id" => 4
            ],
             [
                "amount" => 14000,
                "student_id" => 40,
                "sinf_id" => 5
            ],
            [
                "amount" => 10300,
                "student_id" => 41,
                "sinf_id" => 6
            ],
            [
                "amount" => 5050,
                "student_id" => 42,
                "sinf_id" => 4
            ],
        ];
        DB::table('payments')->insert($payments);
    }
}
