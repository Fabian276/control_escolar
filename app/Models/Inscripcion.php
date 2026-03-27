<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Inscripcion extends Model
{
    protected $table = 'inscripciones'; 

    protected $fillable = [
        'alumno_id',
        'docente_id',
        'materia_id',
        'periodo',
        'calificacion',
        'estatus'
    ];
    public function alumno() { return $this->belongsTo(Alumno::class); }
    public function materia() { return $this->belongsTo(Materia::class); }
    public function docente() { return $this->belongsTo(Docente::class); }
}