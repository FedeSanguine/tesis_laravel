<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NoticiasXarticulosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('noticias_x_articulos')->insert([
            [
                'noticias_id' => 1,
                'articulos_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'noticias_id' => 1,
                'articulos_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'noticias_id' => 2,
                'articulos_id' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],


        ]);
    }
}
