<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('admins')->insert([
            'last_name' => 'Hassani',
            'image_url' => 'Admin/1.png',
            'user_id' => 1,
            'bio' => 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Dignissimos inventore libero, obcaecati tempore iste excepturi incidunt, ipsum distinctio natus quos fugit maiores quas consequatur cum maxime corporis? Aut, ipsum accusantium?'
        ]);
    }
}
