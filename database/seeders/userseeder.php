<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class userseeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         $user = [
            [
                "name" => 'chaeunwoo',
                "email" => 'chaeunwoo@gmail.com',
                "password" => "0793234234",
            ],
            [
               "name" => 'leeminhoje',
                "email" => 'leeminhoje@gmail.com',
                "password" => "0793234234",
            ],
             [
              "name" => 'choihyunwooki',
                "email" => 'choihyunwooki@gmail.com',
                "password" => "123456789",
            ],
            [
               "name" => 'hvanginyeop',
                "email" => 'hvanginyeop@gmail.com',
                "password" => "0793234234",
            ],
             [
                 "name" => 'yimsiwan',
                "email" => 'yimsiwan@gmail.com',
                "password" => "0793234234",
            ],
            [ "name" => 'samir',
                "email" => 'samir@gmail.com',
                "password" => "0793234234",
            ],
          
        ];

        DB::table('users')->insert($user);
    }
}
