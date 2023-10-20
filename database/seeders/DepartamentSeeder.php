<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class DepartamentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('departaments')->insert([
            ["name"=>"Departamento1","created_at"=>now(),],
            ["name"=>"Departamento2","created_at"=>now(),],
            ["name"=>"Departamento3","created_at"=>now(),],
            ["name"=>"Departamento4","created_at"=>now(),],
            ["name"=>"Departamento5","created_at"=>now(),],
        ]);
    }
}
