<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CartItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('cart_items')->insert([
            [
                'articulos_id' => 1,
                'quantity' => 0 ,
                'created_at' => now(),
                'updated_at' => now(),
            ],
         
        ]);
    }
}
