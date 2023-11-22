<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NoticiasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('noticias')->insert([
            [
                'noticias_id' => 1,
                'titulo' => 'Nuevos Ingresos para PS4',
                'fecha' => '2023-05-18',
                'descripcion' => 'Se agregaron el GTA V y el nuevo juego de basquet el NBA2k22',
                'imagen' => null,
                'descripcion_imagen' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'noticias_id' => 2,
                'titulo' => 'Nuevos Ingresos para Xbox One',
                'fecha' => '2023-05-18',
                'descripcion' => 'Se agrego el Assasins Cred Valhala a nuestro catalogo, no te lo podes perder!',
                'imagen' => null,
                'descripcion_imagen' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'noticias_id' => 3,
                'titulo' => 'Nuevos Ingresos para Xbox One',
                'fecha' => '2023-05-20',
                'descripcion' => 'Se agregaron el Call of duty Modern Warfare y el Battefield V nuestro catalogo, no te lo podes perder!',
                'imagen' => null,
                'descripcion_imagen' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'noticias_id' => 4,
                'titulo' => 'Nuevos Ingresos para PS4',
                'fecha' => '2023-05-18',
                'descripcion' => 'Se agrego el increible juego Elden Ring a nuestro catalogo que esperar para comprarlo! ',
                'imagen' => null,
                'descripcion_imagen' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
