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
        Schema::create('articulos', function (Blueprint $table) {
            $table->id('articulos_id');
            $table->string('nombre', 100);
            $table->string('title', 100)->nullable();
            $table->string('formato', 100);
            $table->text('descripcion')->nullable();
            $table->string('imagen', 255)->nullable();
            $table->string('descripcion_imagen', 255)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('articulos');
    }
};
