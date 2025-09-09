<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
/**
 * Migración para crear la tabla de pilotos del sistema de carreras
 * Define la estructura de datos con constraints apropiados
 */
return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pilots', function (Blueprint $table) {
            $table->id(); // Auto-incremental
            $table->string('name'); // Nombre del piloto
            $table->enum('origin_city', ['LA', 'Tokio']); // Ciudades permitidas
            $table->integer('nitro_level'); // Nivel de nitro
            $table->timestamps(); // Para auditoria
        });
    }
    public function down(): void
    {
        Schema::dropIfExists('pilots');
    }
};