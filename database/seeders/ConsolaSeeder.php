<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ConsolaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('consolas')->insert([
            [
                'consolas_id' => 1,
                'nombre' => 'Grande',
            ],
            [
                'consolas_id' => 2,
                'nombre' => 'Mediano',
            ],
            [
                'consolas_id' => 3,
                'nombre' => 'Chico',
            ],
        ]);
    }
}
