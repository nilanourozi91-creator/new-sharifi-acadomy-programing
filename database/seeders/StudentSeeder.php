<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $students = [
            [
                "last_name" => 'Hamidi',
                "user_id" => 20,
                "image_url" => "Admin/st-1.jpg",
                "phone_number" => "0793234234",
                "tazkira_no" => "14043534252342"
            ],
            [
                "last_name" => 'Jafari',
                "user_id" => 21,
                "image_url" => "Admin/st-2.jpg",
                "phone_number" => "0793235162",
                "tazkira_no" => "14043534295674"
            ],
             [
                "last_name" => 'Hamidi',
                "user_id" => 22,
                "image_url" => "Admin/st-1.jpg",
                "phone_number" => "0793234234",
                "tazkira_no" => "14043534252342"
            ],
            [
                "last_name" => 'Jafari',
                "user_id" => 23,
                "image_url" => "Admin/st-2.jpg",
                "phone_number" => "0793235162",
                "tazkira_no" => "14043534295674"
            ],
             [
                "last_name" => 'Hamidi',
                "user_id" => 24,
                "image_url" => "Admin/st-1.jpg",
                "phone_number" => "0793234234",
                "tazkira_no" => "14043534252342"
            ],
            [
                "last_name" => 'Jafari',
                "user_id" => 25,
                "image_url" => "Admin/st-2.jpg",
                "phone_number" => "0793235162",
                "tazkira_no" => "14043534295674"
            ],
             [
                "last_name" => 'Hamidi',
                "user_id" => 26,
                "image_url" => "Admin/st-1.jpg",
                "phone_number" => "0793234234",
                "tazkira_no" => "14043534252342"
            ],
            [
                "last_name" => 'Jafari',
                "user_id" => 27,
                "image_url" => "Admin/st-2.jpg",
                "phone_number" => "0793235162",
                "tazkira_no" => "14043534295674"
            ],
             [
                "last_name" => 'Hamidi',
                "user_id" => 49,
                "image_url" => "Admin/st-1.jpg",
                "phone_number" => "0793234234",
                "tazkira_no" => "14043534252342"
            ],
            [
                "last_name" => 'Jafari',
                "user_id" => 50,
                "image_url" => "Admin/st-2.jpg",
                "phone_number" => "0793235162",
                "tazkira_no" => "14043534295674"
            ],
             [
                "last_name" => 'Hamidi',
                "user_id" => 51,
                "image_url" => "Admin/st-1.jpg",
                "phone_number" => "0793234234",
                "tazkira_no" => "14043534252342"
            ],
            [
                "last_name" => 'Jafari',
                "user_id" => 52,
                "image_url" => "Admin/st-2.jpg",
                "phone_number" => "0793235162",
                "tazkira_no" => "14043534295674"
            ],
             [
                "last_name" => 'Hamidi',
                "user_id" => 53,
                "image_url" => "Admin/st-1.jpg",
                "phone_number" => "0793234234",
                "tazkira_no" => "14043534252342"
            ],
            [
                "last_name" => 'Jafari',
                "user_id" => 54,
                "image_url" => "Admin/st-2.jpg",
                "phone_number" => "0793235162",
                "tazkira_no" => "14043534295674"
            ],
          
        ];

        DB::table('students')->insert($students);
    }
}
