<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ArticulosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('articulos')->insert([
            [
                'articulos_id' => 1,
                'generos_id' => 2,
                'consolas_id' => 1,
                'nombre' => 'Elden Ring',
                'title' => 'Elden Ring',
                'formato' => 'Digital',
                'descripcion' => 'El videojuego surge de una colaboración entre el director y diseñador Hidetaka Miyazaki y el novelista George R. R. Martin',
                'imagen' => null,
                'descripcion_imagen' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'articulos_id' => 2,
                'generos_id' => 2,
                'consolas_id' => 1,
                'nombre' => 'GTA V',
                'title' => 'GTA V',
                'formato' => 'Digital',
                'descripcion' => 'Es un videojuego de accion en tercera persona desarrollado por Rockstar Games de la acladame serie Grand Theft Auto',
                'imagen' => null,
                'descripcion_imagen' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'articulos_id' => 3,
                'generos_id' => 1,
                'consolas_id' => 1,
                'nombre' => 'NBA 2k22',
                'title' => 'NBA 2k22',
                'formato' => 'Digital',
                'descripcion' => 'NBA 2K22 es un videojuego de simulación de baloncesto de 2021 desarrollado por Visual Concepts y publicado por 2K Sports.',
                'imagen' => null,
                'descripcion_imagen' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'articulos_id' => 4,
                'generos_id' => 1,
                'consolas_id' => 2,
                'nombre' => 'Call of Duty Modern Warfare',
                'title' => 'Call of Duty Modern Warfare',
                'formato' => 'Digital',
                'descripcion' => 'Es un videojuego de disparos en primera persona desarrollado por Infinity Ward y publicado por Activision.',
                'imagen' => null,
                'descripcion_imagen' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'articulos_id' => 5,
                'generos_id' => 2,
                'consolas_id' => 2,
                'nombre' => 'Battlefield V',
                'title' => 'Battlefield V',
                'formato' => 'Digital',
                'descripcion' => 'Battlefield V es un videojuego de disparos y acción bélica en primera persona​ desarrollado por EA y distribuido por Electronic Arts.',
                'imagen' => null,
                'descripcion_imagen' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'articulos_id' => 6,
                'generos_id' => 1,
                'consolas_id' => 2,
                'nombre' => 'Assassins Creed Valhalla',
                'title' => 'Assassins Creed Valhalla',
                'formato' => 'Digital',
                'descripcion' => 'Es el decimosegundo en importancia, y el vigesimosegundo lanzado dentro de la saga de Assassin Creed,',
                'imagen' => null,
                'descripcion_imagen' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
