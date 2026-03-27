<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request; 
use App\Models\Materia;

class MateriaController extends Controller
{
    public function index()
    {
        $materias = Materia::all();
        $totalMaterias = $materias->count();
        $activas = $materias->where('estatus', 'Activo')->count();
        $totalCreditos = $materias->sum('creditos');

        return view('materias.index', compact('materias', 'totalMaterias', 'activas', 'totalCreditos'));
    }

    public function create()
    {
        return view('materias.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre_materia' => 'required|string|max:100',
            'codigo_materia' => 'required|string|unique:materias',
            'creditos' => 'required|integer|min:1|max:50',
        ]);

        Materia::create([
            'nombre_materia' => $request->nombre_materia,
            'codigo_materia' => $request->codigo_materia,
            'creditos' => $request->creditos,
            'estatus' => 'Activo',
        ]);

        return redirect()->route('materias.index')->with('status', 'Materia registrada correctamente.');
    }
    public function edit($id)
    {
        $materia = Materia::findOrFail($id);
        return view('materias.edit', compact('materia'));
    }

    
    public function update(Request $request, $id)
    {
        $materia = Materia::findOrFail($id);
        
        $request->validate([
            'nombre_materia' => 'required|string|max:100',
            'codigo_materia' => 'required|string|unique:materias,codigo_materia,' . $id,
            'creditos' => 'required|integer|min:1',
            'estatus' => 'required|in:Activo,Inactivo'
        ]);

        $materia->update($request->all());

        return redirect()->route('materias.index')->with('status', 'Materia actualizada correctamente.');
    }

    
    public function destroy($id)
    {
        $materia = Materia::findOrFail($id);
        $materia->delete();

        return redirect()->route('materias.index')->with('status', 'Materia eliminada del sistema.');
    }
}