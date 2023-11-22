<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('noticias_x_articulos', function (Blueprint $table) {
            $table->foreignId('articulos_id')->constrained('articulos', 'articulos_id');
            $table->foreignId('noticias_id')->constrained('noticias', 'noticias_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('noticias_x_articulos');
    }
};
