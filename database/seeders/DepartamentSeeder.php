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
            ["name" => "Investigación y desarrollo", "created_at" => now()],
            ["name" => "Producción", "created_at" => now()],
            ["name" => "Recursos Humanos", "created_at" => now()],
            ["name" => "Ventas", "created_at" => now()],
            ["name" => "Marketing", "created_at" => now()],
            ["name" => "Servicio al Cliente", "created_at" => now()],
            ["name" => "Finanzas", "created_at" => now()],
        ]);
    }
}
