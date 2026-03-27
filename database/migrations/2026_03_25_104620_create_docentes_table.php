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
    Schema::create('docentes', function (Table $table) {
        $table->id();
        $table->string('nombre');
        $table->string('apellido');
        $table->string('numero_empleado')->unique();
        $table->string('correo')->unique();
        $table->string('especialidad')->nullable();
        $table->enum('estatus', ['Activo', 'Inactivo'])->default('Activo');
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('docentes');
    }
};
