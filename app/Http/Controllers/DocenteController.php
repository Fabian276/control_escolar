<?php

namespace App\Http\Controllers;

use App\Models\Docente;
use Illuminate\Http\Request;

class DocenteController extends Controller
{
    public function index()
    {
        $docentes = Docente::all();
    
    $totalDocentes = $docentes->count();
    $activos = $docentes->where('estatus', 'Activo')->count();
    $inactivos = $docentes->where('estatus', 'Inactivo')->count();

    return view('docentes.index', compact('docentes', 'totalDocentes', 'activos', 'inactivos'));
    }

    public function create()
    {
        return view('docentes.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:100',
            'apellido' => 'required|string|max:100',
            'email' => 'required|email|unique:docentes',
            'especialidad' => 'required|string|max:100',
        ]);

        Docente::create([
            'nombre' => $request->nombre,
            'apellido' => $request->apellido,
            'email' => $request->email,
            'especialidad' => $request->especialidad,
            'estatus' => 'Activo',
        ]);

        return redirect()->route('docentes.index')->with('status', '¡Docente registrado con éxito!');
    }
    public function edit($id)
{
    $docente = Docente::findOrFail($id);
    return view('docentes.edit', compact('docente'));
}

public function update(Request $request, $id)
{
    $docente = Docente::findOrFail($id);
    
    $request->validate([
        'nombre' => 'required|string|max:100',
        'apellido' => 'required|string|max:100',
        'email' => 'required|email|unique:docentes,email,' . $id,
        'telefono' => 'nullable|string|max:20', 
        'especialidad' => 'nullable|string',
        'estatus' => 'required|in:Activo,Inactivo'
    ]);

    $docente->update($request->all());

    return redirect()->route('docentes.index')->with('status', 'Docente actualizado correctamente.');
}
public function destroy($id)
{
    $docente = \App\Models\Docente::findOrFail($id);
        
    $docente->delete();

    return redirect()->route('docentes.index')->with('status', 'Docente eliminado correctamente.');
}
}