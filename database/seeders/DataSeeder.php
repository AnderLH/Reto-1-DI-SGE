<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DataSeeder extends Seeder
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
        
        DB::table("categories")->insert([
            ["name"=> "easy","created_at"=> now(),],
            ["name"=> "intermediate","created_at"=> now(),],
            ["name"=> "hard","created_at"=> now(),],
        ]);

        DB::table("priorities")->insert([
            ["name"=> "priorities1","created_at"=> now(),],
            ["name"=> "priorities2","created_at"=> now(),],
            ["name"=> "priorities3","created_at"=> now(),],
        ]);

        DB::table('statuses')->insert([
            ["name"=>"En progreso","created_at"=>now(),],
            ["name"=>"Completado","created_at"=>now(),],
            ["name"=>"Pendiente","created_at"=>now(),],
        ]);

        DB::table('users')->insert([
            "name"=> "baichun",
            "email"=>"baichun@elorrieta.com",
            "email_verified_at"=> now(),
            "password"=>" ",
            "departament_id"=>"1",
            'created_at'=> now(),
            
        ]);

        DB::table('incidents')->insert([
            "title" => "incidencia1",
            "text"=>"texto1",
            "departament_id" => "1",
            "status"=>"1",
            "priority"=>"1",
            "category"=>"1",
            "minutes"=>"1",
            'created_at'=> now(),
        ]);

        DB::table('coments') ->insert([
            "incident_id"=>"1",
            "coment"=>"comentario1",
            "created_at"=> now(),
            
        ]);
    }
}
