<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('comments') ->insert([
            [
                "incident_id"=>"1",
                "text"=>"A mí también me ha ocurrido eso",
                "created_at"=> now(),
                "user_id" => "1",
            ],
            [
                "incident_id" => "2",
                "text" => "¡Espero que encuentren una solución pronto!",
                "created_at" => now(),
                "user_id" => "5",
            ],
            [
                "incident_id" => "3",
                "text" => "Este problema parece ser recurrente",
                "created_at" => now(),
                "user_id" => "2",
            ],
            [
                "incident_id" => "4",
                "text" => "¿Alguien más ha experimentado esto?",
                "created_at" => now(),
                "user_id" => "3",
            ],
            [
                "incident_id" => "4",
                "text" => "Por favor, proporciona más detalles sobre el problema",
                "created_at" => now(),
                "user_id" => "4",
            ],
            [
                "incident_id" => "5",
                "text" => "Necesitamos una solución urgente para esto",
                "created_at" => now(),
                "user_id" => "1",
            ],
            [
                "incident_id" => "6",
                "text" => "He encontrado una posible solución, ¿alguien más lo ha intentado?",
                "created_at" => now(),
                "user_id" => "5",
            ],
            [
                "incident_id" => "7",
                "text" => "Este problema me está afectando en el trabajo",
                "created_at" => now(),
                "user_id" => "2",
            ],
            [
                "incident_id" => "8",
                "text" => "Gracias al equipo de soporte por resolver mi problema tan rápido",
                "created_at" => now(),
                "user_id" => "3",
            ],
            [
                "incident_id" => "9",
                "text" => "¡Espero que todos tengan un buen día!",
                "created_at" => now(),
                "user_id" => "4",
            ],
            [
                "incident_id" => "10",
                "text" => "¿Alguien sabe cómo puedo cambiar mi contraseña?",
                "created_at" => now(),
                "user_id" => "1",
            ],
        ]);
    }
}
