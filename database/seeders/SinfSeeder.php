<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SinfSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $sinfs = [
            [
                "title" => "English File",
                "start_date" => now(),
                "end_date" => Carbon::parse("2026-08-07"),
                "description" => "Intermediate English class",
                "banner_url" => "Sinfs/intermediate english.jpg",
                "teacher_id" => 1
            ],
            [
                "title" => "Web Developement",
                "start_date" => now(),
                "end_date" => Carbon::parse("2026-08-07"),
                "description" => "Learning web basics, HTML, CSS, JavaScript",
                "banner_url" => "Sinfs/webdevelopement beginning.jpg",
                "teacher_id" => 2
            ],
        ];
        DB::table('sinfs')->insert($sinfs);
    }
}
