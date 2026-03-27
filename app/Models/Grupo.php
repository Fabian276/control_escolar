<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Grupo extends Model
{
    protected $fillable = ['nombre_grupo', 'turno', 'grado', 'aula'];

    public function inscripciones()
    {
        return $this->hasMany(Inscripcion::class);
    }
}