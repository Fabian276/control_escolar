<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AlumnoController;
use App\Http\Controllers\DocenteController;
use App\Http\Controllers\MateriaController;
use App\Http\Controllers\InscripcionController;
use App\Http\Controllers\GrupoController;
Route::get('/', function () {
    if (auth()->check()) {
        return redirect()->route('dashboard');
    }
    return redirect()->route('login');
})->name('home');

Route::get('dashboard', function () {

    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth', 'verified'])->group(function () {
    
     // --- INSCRIPCIONES ---
    Route::resource('inscripciones', InscripcionController::class);
     
    // --- GRUPOS ---
    Route::resource('grupos', GrupoController::class);

    // --- ALUMNOS ---
    Route::get('/alumnos', [AlumnoController::class, 'index'])->name('alumnos.index');
    Route::get('/alumnos/crear', [AlumnoController::class, 'create'])->name('alumnos.create'); // Muestra el formulario
    Route::post('/alumnos/guardar', [AlumnoController::class, 'store'])->name('alumnos.store');   // Guarda en la DB
    Route::resource('alumnos', AlumnoController::class)->except(['show']);

    // --- DOCENTES ---
    Route::get('/docentes', [DocenteController::class, 'index'])->name('docentes.index');
    Route::get('/docentes/crear', [DocenteController::class, 'create'])->name('docentes.create');
    Route::post('/docentes/guardar', [DocenteController::class, 'store'])->name('docentes.store');
    Route::resource('docentes', DocenteController::class)->except(['show']);

    // --- MATERIAS ---
    Route::get('/materias', [MateriaController::class, 'index'])->name('materias.index');
    Route::get('/materias/crear', [MateriaController::class, 'create'])->name('materias.create');
    Route::post('/materias/guardar', [MateriaController::class, 'store'])->name('materias.store');
    Route::resource('materias', MateriaController::class);

    Route::view('calificaciones', 'calificaciones.index')->name('calificaciones.index');
    Route::view('asistencia', 'asistencia.index')->name('asistencia.index');
    Route::view('reportes', 'reportes.index')->name('reportes.index');
    Route::view('configuracion', 'configuracion.index')->name('configuracion.index');
});

require __DIR__.'/settings.php';
