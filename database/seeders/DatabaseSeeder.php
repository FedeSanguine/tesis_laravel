<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(NoticiasSeeder::class);
        $this->call(GeneroSeeder::class);
        $this->call(ConsolaSeeder::class);
        $this->call(ArticulosSeeder::class);
        $this->call(NoticiasXarticulosSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(UsuariosXArticulosSeeder::class);

    }
}
