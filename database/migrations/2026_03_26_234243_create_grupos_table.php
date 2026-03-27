<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
{
    Schema::create('grupos', function (Blueprint $table) {
        $table->id();
        $table->string('nombre_grupo'); 
        $table->enum('turno', ['Matutino', 'Vespertino']);
        $table->integer('grado'); 
        $table->string('aula')->nullable(); 
        $table->timestamps();
    });
}
    public function down(): void
    {
        Schema::dropIfExists('grupos');
    }
};
