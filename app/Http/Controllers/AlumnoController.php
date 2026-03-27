<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Alumno;

class AlumnoController extends Controller
{
public function index()
{
    $alumnos = Alumno::all();
    return view('alumnos.index', compact('alumnos'));
} 

public function create()
{
    return view('alumnos.create');
}


public function store(Request $request)
{
    
    $request->validate([
        'nombre' => 'required|string|max:100',
        'apellido' => 'required|string|max:100',
        'email' => 'required|email|unique:alumnos',
        'curp_matricula' => 'required|string|unique:alumnos',
    ]);

    
    \App\Models\Alumno::create([
        'nombre' => $request->nombre,
        'apellido' => $request->apellido,
        'email' => $request->email,
        'curp_matricula' => $request->curp_matricula,
        'estatus' => 'Activo', 
    ]);

    
    return redirect()->route('alumnos.index');
}
public function edit($id)
    {
        $alumno = Alumno::findOrFail($id);
        return view('alumnos.edit', compact('alumno'));
    }

   public function update(Request $request, $id)
{
    $alumno = Alumno::findOrFail($id);
    
    $request->validate([
        'nombre' => 'required|string|max:100',
        'apellido' => 'required|string|max:100', // Cambiado a required para evitar el error 23502
        'curp_matricula' => 'required|string|unique:alumnos,curp_matricula,' . $id,
        'email' => 'required|email',
        'estatus' => 'required|in:Activo,Inactivo'
    ]);

    $alumno->update($request->all());

    return redirect()->route('alumnos.index')->with('status', 'Alumno actualizado con éxito.');
}

    public function destroy($id)
    {
        $alumno = Alumno::findOrFail($id);
        $alumno->delete();

        return redirect()->route('alumnos.index')->with('status', 'Alumno eliminado.');
    }
}