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
        Schema::create('pieza', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('descripcion');
            $table->enum('tipo', ['reloj', 'brujula','collar','pulsera','anillo','pendiente']);
            $table->string('imagen');
            $table->string('marca');
            $table->string('modelo');
            $table->integer('puntuacion');
            $table->foreignId('categoria_id')->constrained('categoria')->onDelete('cascade');
            $table->foreignId('fabricante_id')->constrained('fabricante')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pieza');
    }
};
