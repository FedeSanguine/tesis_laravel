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
                'nombre' => 'Pupi',
                'refugio' => 'El campito refugio',
                'title' => 'Elden Ring',
                'formato' => '4 años',
                'descripcion' => 'Perro raza mestizo, completamente sano, alergico al tomate',
                'imagen' => '/public/storage/seeder_img/Jack4.jpg',
                'descripcion_imagen' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'articulos_id' => 2,
                'generos_id' => 2,
                'consolas_id' => 1,
                'nombre' => 'Lolo',
                'refugio' => 'El campito refugio',
                'title' => 'GTA V',
                'formato' => '6 meses',
                'descripcion' => 'Caniche mestizo, lleno de alegria esperando su nueva familia',
                'imagen' => null,
                'descripcion_imagen' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'articulos_id' => 3,
                'generos_id' => 1,
                'consolas_id' => 1,
                'nombre' => 'Akira',
                'refugio' => 'El campito refugio',
                'title' => 'NBA 2k22',
                'formato' => '8 años',
                'descripcion' => 'Perro mestizo, el mas grande del refugio busca una familia que le de el amor que tanto necesita',
                'imagen' => null,
                'descripcion_imagen' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'articulos_id' => 4,
                'generos_id' => 1,
                'consolas_id' => 2,
                'nombre' => 'Kiko',
                'refugio' => 'El campito refugio',
                'title' => 'Call of Duty Modern Warfare',
                'formato' => '7 meses',
                'descripcion' => 'Cachorro mestizo, en busca de mucho amor, a la espera de una nueva vida',
                'imagen' => null,
                'descripcion_imagen' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'articulos_id' => 5,
                'generos_id' => 2,
                'consolas_id' => 2,
                'nombre' => 'Jazmin',
                'refugio' => 'El campito refugio',
                'title' => 'Battlefield V',
                'formato' => '2 años',
                'descripcion' => 'Nacio con problemas renales y necesita medicacion, pero eso no la detiene para todo el amor que tiene para dar. ',
                'imagen' => null,
                'descripcion_imagen' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'articulos_id' => 6,
                'generos_id' => 1,
                'consolas_id' => 2,
                'nombre' => 'Roky',
                'refugio' => 'El campito refugio',
                'title' => 'Assassins Creed Valhalla',
                'formato' => '6 meses',
                'descripcion' => 'Cachorro de labrador, completamente sano y con ganas de una familia nueva',
                'imagen' => null,
                'descripcion_imagen' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
