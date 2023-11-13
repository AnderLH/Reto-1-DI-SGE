<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                "name"=> "guest",
                "email"=>"guest@elorrieta.com",
                "email_verified_at"=> now(),
                "password"=>bcrypt('963852741'),
                "departament_id"=>"1",
                'created_at'=> now(),
            ],
            [
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
                "name" => "diana",
                "email" => "diana@elorrieta.com",
                "email_verified_at" => now(),
                "password" => bcrypt('diana123'),
                "departament_id" => "2",
                'created_at' => now(),
            ],
            [
                "name" => "carlos",
                "email" => "carlos@elorrieta.com",
                "email_verified_at" => now(),
                "password" => bcrypt('carlos456'),
                "departament_id" => "3",
                'created_at' => now(),
            ],
            [
                "name" => "eve",
                "email" => "eve@elorrieta.com",
                "email_verified_at" => now(),
                "password" => bcrypt('eve789'),
                "departament_id" => "3",
                'created_at' => now(),
            ]
        ]);
    }
}
