<?php

namespace App\Http\Controllers;

use App\Models\Inscripcion;
use App\Models\Alumno;
use App\Models\Docente;
use App\Models\Materia;
use Illuminate\Http\Request;

class InscripcionController extends Controller
{
public function index()
{
    $inscripciones = Inscripcion::with(['alumno', 'materia', 'docente'])->get();
    
    $total = $inscripciones->count();
    $activas = $inscripciones->where('estatus', 'Cursando')->count();
    $aprobadas = $inscripciones->where('estatus', 'Aprobado')->count();
    $bajas = $inscripciones->where('estatus', 'Baja')->count();

    return view('inscripciones.index', compact(
        'inscripciones', 
        'total', 
        'activas', 
        'aprobadas', 
        'bajas'
    ));
}

    public function create()
    {
        $alumnos = Alumno::where('estatus', 'Activo')->orderBy('apellido')->get();
        $docentes = Docente::where('estatus', 'Activo')->orderBy('apellido')->get();
        $materias = Materia::orderBy('nombre_materia')->get();

        return view('inscripciones.create', compact('alumnos', 'docentes', 'materias'));
    }

   public function store(Request $request)
{
    // 1. Validación relajada para descartar errores de "exists"
    $validated = $request->validate([
        'alumno_id'  => 'required',
        'docente_id' => 'required',
        'materia_id' => 'required',
        'periodo'    => 'required|string',
        'estatus'    => 'required|string',
    ]);

    try {
        // 2. Intentamos crear el registro
        Inscripcion::create([
            'alumno_id'    => $request->alumno_id,
            'docente_id'   => $request->docente_id,
            'materia_id'   => $request->materia_id,
            'periodo'      => $request->periodo,
            'estatus'      => $request->estatus,
            'calificacion' => 0, // Valor por defecto
        ]);

        return redirect()->route('inscripciones.index')->with('success', 'Inscripción guardada correctamente');

    } catch (\Exception $e) {
        // 3. Si la base de datos (PostgreSQL) rechaza algo, lo veremos aquí
        dd("Error en la base de datos: " . $e->getMessage());
    }
}

    // --- MÉTODOS AGREGADOS PARA COMPLETAR EL CRUD ---

    public function edit($id)
    {
        $inscripcion = Inscripcion::findOrFail($id);
        $alumnos = Alumno::where('estatus', 'Activo')->get();
        $docentes = Docente::where('estatus', 'Activo')->get();
        $materias = Materia::orderBy('nombre_materia')->get();

        return view('inscripciones.edit', compact('inscripcion', 'alumnos', 'docentes', 'materias'));
    }

    public function update(Request $request, $id)
    {
        $inscripcion = Inscripcion::findOrFail($id);

        $request->validate([
            'alumno_id' => 'required|exists:alumnos,id',
            'materia_id' => 'required|exists:materias,id',
            'docente_id' => 'required|exists:docentes,id',
            'periodo' => 'required|string',
            'estatus' => 'required|in:Cursando,Aprobado,Reprobado,Baja',
            'calificacion' => 'nullable|numeric|min:0|max:100'
        ]);

        $inscripcion->update($request->all());

        return redirect()->route('inscripciones.index')->with('status', 'Inscripción actualizada correctamente.');
    }

    public function destroy($id)
    {
        $inscripcion = Inscripcion::findOrFail($id);
        $inscripcion->delete();

        return redirect()->route('inscripciones.index')->with('status', 'Inscripción eliminada correctamente.');
    }
}