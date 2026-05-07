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
                "student_id" => 1,
                "sinf_id" => 2
            ],
            [
                "amount" => 10000,
                "student_id" => 2,
                "sinf_id" => 2
            ],
            [
                "amount" => 550,
                "student_id" => 1,
                "sinf_id" => 1
            ],
        ];
        DB::table('payments')->insert($payments);
    }
}
