<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PrioritySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table("priorities")->insert([
            ["name" => "Urgente", "created_at" => now(),],
            ["name" => "Importante", "created_at" => now(),],
            ["name" => "Normal", "created_at" => now(),],
            ["name" => "Baja", "created_at" => now(),],
        ]);
    }
}
