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

        DB::table('users')->insert([[
            "name"=> "user1",
            "email"=>"user1@elorrieta.com",
            "email_verified_at"=> now(),
            "password"=>"12345678",
            "departament_id"=>"1",
            'created_at'=> now(),
        ],
        [
            "name"=> "user2",
            "email"=>"user2@elorrieta.com",
            "email_verified_at"=> now(),
            "password"=>"147258369",
            "departament_id"=>"1",
            'created_at'=> now(),
        ]
            
        ]);

        DB::table('incidents')->insert([
            ["title" => "Bug pagina web","text"=>"No crea un usuario en el register","user_id" => "1","departament_id" => "1","status"=>"1","priority"=>"2","category"=>"1","minutes"=>"30",'created_at'=> now(),],
            ["title" => "Problema con la función de búsqueda", "text" => "La función de búsqueda no encuentra resultados","user_id" => "2", "departament_id" => "3", "status" => "1", "priority" => "2", "category" => "2", "minutes" => "60", 'created_at' => now(),],
            ["title" => "Error en la página de inicio", "text" => "La página de inicio no carga correctamente","user_id" => "1", "departament_id" => "2", "status" => "2", "priority" => "3", "category" => "1", "minutes" => "45", 'created_at' => now(),],
            ["title" => "Error en la página de contacto", "text" => "El formulario de contacto no envía correos electrónicos","user_id" => "2", "departament_id" => "1", "status" => "1", "priority" => "1", "category" => "3", "minutes" => "20", 'created_at' => now(),],
        ]);

        DB::table('coments') ->insert([
            "incident_id"=>"1",
            "coment"=>"comentario1",
            "created_at"=> now(),
            
        ]);
    }
}
