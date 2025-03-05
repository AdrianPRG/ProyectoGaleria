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
        //De esta tabla, sacamos la puntuacion media de cada producto
        //Pero principalmente, lo que guarda la puntuacion individual de un usuario sobre una pieza
        Schema::create('puntuacion', function (Blueprint $table) {
            $table->id();
            $table->integer('puntuacion');
            $table->foreignId('pieza_id')->constrained('pieza')->onDelete('cascade');
            $table->foreignId('usuario_id')->constrained('usuario')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('puntuacion');
    }
};
