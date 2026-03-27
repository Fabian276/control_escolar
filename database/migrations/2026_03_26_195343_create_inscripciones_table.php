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
    Schema::create('inscripciones', function (Blueprint $table) {
        $table->id();
        
        // Relaciones con las otras tablas
        $table->foreignId('alumno_id')->constrained('alumnos')->onDelete('cascade');
        $table->foreignId('docente_id')->constrained('docentes')->onDelete('cascade');
        $table->foreignId('materia_id')->constrained('materias')->onDelete('cascade');

        // Datos del curso
        $table->string('periodo'); // Ej: "Enero-Junio 2026"
        $table->decimal('calificacion', 5, 2)->nullable(); // Permitir nulo al inicio
        $table->enum('estatus', ['Cursando', 'Aprobado', 'Reprobado', 'Baja'])->default('Cursando');

        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inscripciones');
    }
};
