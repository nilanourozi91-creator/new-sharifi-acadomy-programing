<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TeacherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $teachers = [
            [
                'last_name' => 'Mohammadi',
                'degree_of_education' => 'bachelor',
                'image_url' => 'Admin/t-2.jpg',
                'phone_number' => "0784324789",
                'bio' => 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Dignissimos inventore libero, obcaecati tempore iste excepturi incidunt, ipsum distinctio natus quos fugit maiores quas consequatur cum maxime corporis? Aut, ipsum accusantium?',
                "user_id" =>12
            ],
            [
                'last_name' => 'Karimi',
                'degree_of_education' => 'bachelor',
                'image_url' => 'Admin/t-1.jpg',
                'phone_number' => "0784325673",
                'bio' => 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Dignissimos inventore libero, obcaecati tempore iste excepturi incidunt, ipsum distinctio natus quos fugit maiores quas consequatur cum maxime corporis? Aut, ipsum accusantium?',
                "user_id" =>13
            ],
             [
                'last_name' => 'kazimi',
                'degree_of_education' => 'bachelor',
                'image_url' => 'Admin/t-2.jpg',
                'phone_number' => "0784324789",
                'bio' => 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Dignissimos inventore libero, obcaecati tempore iste excepturi incidunt, ipsum distinctio natus quos fugit maiores quas consequatur cum maxime corporis? Aut, ipsum accusantium?',
                "user_id" =>14
            ],
            [
                'last_name' => 'qorbani',
                'degree_of_education' => 'bachelor',
                'image_url' => 'Admin/t-1.jpg',
                'phone_number' => "0784325673",
                'bio' => 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Dignissimos inventore libero, obcaecati tempore iste excepturi incidunt, ipsum distinctio natus quos fugit maiores quas consequatur cum maxime corporis? Aut, ipsum accusantium?',
                "user_id" =>15
            ],
             [
                'last_name' => 'rezaie',
                'degree_of_education' => 'bachelor',
                'image_url' => 'Admin/t-2.jpg',
                'phone_number' => "0784324789",
                'bio' => 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Dignissimos inventore libero, obcaecati tempore iste excepturi incidunt, ipsum distinctio natus quos fugit maiores quas consequatur cum maxime corporis? Aut, ipsum accusantium?',
                "user_id" =>16
            ],
            [
                'last_name' => 'akbari',
                'degree_of_education' => 'bachelor',
                'image_url' => 'Admin/t-1.jpg',
                'phone_number' => "0784325673",
                'bio' => 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Dignissimos inventore libero, obcaecati tempore iste excepturi incidunt, ipsum distinctio natus quos fugit maiores quas consequatur cum maxime corporis? Aut, ipsum accusantium?',
                "user_id" =>17
            ],
             [
                'last_name' => 'nasirie',
                'degree_of_education' => 'bachelor',
                'image_url' => 'Admin/t-1.jpg',
                'phone_number' => "0784325673",
                'bio' => 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Dignissimos inventore libero, obcaecati tempore iste excepturi incidunt, ipsum distinctio natus quos fugit maiores quas consequatur cum maxime corporis? Aut, ipsum accusantium?',
                "user_id" =>18
            ],
             [
                'last_name' => 'qambri',
                'degree_of_education' => 'bachelor',
                'image_url' => 'Admin/t-1.jpg',
                'phone_number' => "0784325673",
                'bio' => 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Dignissimos inventore libero, obcaecati tempore iste excepturi incidunt, ipsum distinctio natus quos fugit maiores quas consequatur cum maxime corporis? Aut, ipsum accusantium?',
                "user_id" =>19
            ],
        ];
        DB::table('teachers')->insert($teachers);
    }
}
