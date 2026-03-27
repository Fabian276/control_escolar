<x-layouts::app :title="__('Editar Inscripción')">
    <div class="p-6 max-w-5xl mx-auto">
        <div class="mb-8">
            <h1 class="text-2xl font-bold text-white">Editar Inscripción</h1>
            <p class="text-sm text-zinc-400 mt-1">Actualiza la información de la materia o el estatus del alumno.</p>
        </div>

        @if ($errors->any())
            <div class="mb-6 p-4 bg-red-500/20 border border-red-500/50 rounded-xl text-red-400 text-sm">
                <ul class="list-disc pl-5">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('inscripciones.update', $inscripcion->id) }}" method="POST" class="space-y-6">
            @csrf
            @method('PUT') {{-- FUNDAMENTAL PARA EDITAR --}}

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                <div class="lg:col-span-2 space-y-6">
                    <div class="bg-[#1e1e2e] border border-white/10 rounded-2xl p-6 shadow-xl">
                        <div class="space-y-4">
                            {{-- Selector Alumno --}}
                            <div class="space-y-2">
                                <label class="text-sm font-medium text-zinc-300">Alumno</label>
                                <select name="alumno_id" required class="w-full bg-black/20 border border-white/10 rounded-xl px-4 py-3 text-white focus:ring-2 focus:ring-purple-500 outline-none appearance-none">
                                    @foreach($alumnos as $alumno)
                                        <option value="{{ $alumno->id }}" {{ $inscripcion->alumno_id == $alumno->id ? 'selected' : '' }}>
                                            {{ $alumno->apellido }}, {{ $alumno->nombre }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                {{-- Selector Materia --}}
                                <div class="space-y-2">
                                    <label class="text-sm font-medium text-zinc-300">Materia</label>
                                    <select name="materia_id" required class="w-full bg-black/20 border border-white/10 rounded-xl px-4 py-3 text-white focus:ring-2 focus:ring-purple-500 outline-none appearance-none">
                                        @foreach($materias as $materia)
                                            <option value="{{ $materia->id }}" {{ $inscripcion->materia_id == $materia->id ? 'selected' : '' }}>
                                                {{ $materia->nombre_materia }} {{-- Usando el nombre correcto de Postgres --}}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                {{-- Selector Docente --}}
                                <div class="space-y-2">
                                    <label class="text-sm font-medium text-zinc-300">Docente</label>
                                    <select name="docente_id" required class="w-full bg-black/20 border border-white/10 rounded-xl px-4 py-3 text-white focus:ring-2 focus:ring-purple-500 outline-none appearance-none">
                                        @foreach($docentes as $docente)
                                            <option value="{{ $docente->id }}" {{ $inscripcion->docente_id == $docente->id ? 'selected' : '' }}>
                                                {{ $docente->nombre }} {{ $docente->apellido }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="lg:col-span-1 space-y-4">
                    <div class="bg-[#1e1e2e] border border-white/10 rounded-2xl p-6 shadow-xl space-y-4">
                        <div class="space-y-2">
                            <label class="text-sm font-medium text-zinc-300">Periodo Escolar</label>
                            <input type="text" name="periodo" value="{{ $inscripcion->periodo }}" required class="w-full bg-black/20 border border-white/10 rounded-xl px-4 py-2.5 text-white outline-none focus:ring-2 focus:ring-purple-500">
                        </div>

                        <div class="space-y-2">
                            <label class="text-sm font-medium text-zinc-300">Estatus</label>
                            <select name="estatus" class="w-full bg-black/20 border border-white/10 rounded-xl px-4 py-2.5 text-white outline-none focus:ring-2 focus:ring-purple-500">
                                <option value="Cursando" {{ $inscripcion->estatus == 'Cursando' ? 'selected' : '' }}>Cursando</option>
                                <option value="Aprobado" {{ $inscripcion->estatus == 'Aprobado' ? 'selected' : '' }}>Aprobado</option>
                                <option value="Reprobado" {{ $inscripcion->estatus == 'Reprobado' ? 'selected' : '' }}>Reprobado</option>
                                <option value="Baja" {{ $inscripcion->estatus == 'Baja' ? 'selected' : '' }}>Baja</option>
                            </select>
                        </div>

                        <button type="submit" class="w-full bg-purple-600 hover:bg-purple-500 text-white font-bold py-3 rounded-xl transition mt-4 shadow-lg shadow-purple-500/20">
                            Actualizar Cambios
                        </button>
                        
                        <a href="{{ route('inscripciones.index') }}" class="block text-center text-xs text-zinc-500 hover:text-zinc-300 transition">
                            Cancelar y volver
                        </a>
                    </div>
                </div>
            </div>
        </form>
    </div>
</x-layouts::app>