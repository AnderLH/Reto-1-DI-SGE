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
            ["name"=> "High Priority","created_at"=> now(),],
            ["name"=> "Medium Priority","created_at"=> now(),],
            ["name"=> "Low Priority","created_at"=> now(),],
        ]);

        DB::table('statuses')->insert([
            ["name"=>"En progreso","created_at"=>now(),],
            ["name"=>"Completado","created_at"=>now(),],
            ["name"=>"Pendiente","created_at"=>now(),],
        ]);

        DB::table('users')->insert([[
            "name"=> "ander",
            "email"=>"ander@elorrieta.com",
            "email_verified_at"=> now(),
            "password"=>bcrypt('12345678'),
            "departament_id"=>"1",
            'created_at'=> now(),
        ],
        [
            "name"=> "baichun",
            "email"=>"baichun@elorrieta.com",
            "email_verified_at"=> now(),
            "password"=>bcrypt('147258369'),
            "departament_id"=>"1",
            'created_at'=> now(),
        ],
        [
            "name"=> "guest",
            "email"=>"guest@elorrieta.com",
            "email_verified_at"=> now(),
            "password"=>bcrypt('963852741'),
            "departament_id"=>"2",
            'created_at'=> now(),
        ]
            
        ]);

        DB::table('incidents')->insert([
            ["title" => "Bug pagina web","text"=>"No crea un usuario en el register","user_id" => "1","departament_id" => "1","status_id"=>"1","priority_id"=>"2","category_id"=>"1","minutes"=>"30",'created_at'=> now(),],
            ["title" => "Problema con la función de búsqueda", "text" => "La función de búsqueda no encuentra resultados","user_id" => "2", "departament_id" => "3", "status_id" => "1", "priority_id" => "2", "category_id" => "2", "minutes" => "60", 'created_at' => now(),],
            ["title" => "Error en la página de inicio", "text" => "La página de inicio no carga correctamente","user_id" => "1", "departament_id" => "2", "status_id" => "2", "priority_id" => "3", "category_id" => "1", "minutes" => "45", 'created_at' => now(),],
            ["title" => "Error en la página de contacto", "text" => "El formulario de contacto no envía correos electrónicos","user_id" => "2", "departament_id" => "1", "status_id" => "1", "priority_id" => "1", "category_id" => "3", "minutes" => "20", 'created_at' => now(),],
            [
                "title" => "Problema con la carrito de compras",
                "text" => "El carrito de compras no guarda los productos seleccionados",
                "user_id" => "2",
                "departament_id" => "4",
                "status_id" => "1",
                "priority_id" => "2",
                "category_id" => "2",
                "minutes" => "40",
                "created_at" => now(),
            ],
            [
                "title" => "Error en la funcionalidad de chat en vivo",
                "text" => "Los mensajes del chat en vivo no se envían correctamente",
                "user_id" => "2",
                "departament_id" => "2",
                "status_id" => "1",
                "priority_id" => "2",
                "category_id" => "2",
                "minutes" => "55",
                "created_at" => now(),
            ],
            [
                "title" => "Problema de seguridad en la aplicación móvil",
                "text" => "La aplicación móvil muestra datos sensibles sin autenticación",
                "user_id" => "1",
                "departament_id" => "3",
                "status_id" => "2",
                "priority_id" => "3",
                "category_id" => "1",
                "minutes" => "70",
                "created_at" => now(),
            ],
            [
                "title" => "Error en la generación de informes",
                "text" => "La generación de informes falla con grandes conjuntos de datos",
                "user_id" => "2",
                "departament_id" => "4",
                "status_id" => "1",
                "priority_id" => "1",
                "category_id" => "2",
                "minutes" => "25",
                "created_at" => now(),
            ]
            
        ]);

        DB::table('comments') ->insert([
            [
                "incident_id"=>"1",
                "text"=>"comentario1",
                "created_at"=> now(),
                "user_id" => "1",
            ],
            [
                "incident_id"=>"2",
                "text"=>"comentario2",
                "created_at"=> now(),
                "user_id" => "1",
            ],
            [
                "incident_id"=>"3",
                "text"=>"comentario3",
                "created_at"=> now(),
                "user_id" => "1",
            ]
            
        ]);

        
    }
}
