<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table("categories")->insert([
            ["name" => "Problemas de Hardware", "created_at" => now()],
            ["name" => "Errores de Software", "created_at" => now()],
            ["name" => "Problemas de Red", "created_at" => now()],
            ["name" => "Configuración de Usuario", "created_at" => now()],
            ["name" => "Virus y Malware", "created_at" => now()],
            ["name" => "Actualizaciones Pendientes", "created_at" => now()],
            ["name" => "Pérdida de Datos", "created_at" => now()],
            ["name" => "Acceso Denegado", "created_at" => now()],
            ["name" => "Problemas de Impresión", "created_at" => now()],
        ]);
    }
}
