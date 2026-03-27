<x-layouts::app :title="__('Nueva Inscripción')">
    <div class="p-6 max-w-5xl mx-auto">
        <div class="mb-8">
            <h1 class="text-2xl font-bold text-white">Nueva Inscripción</h1>
            <p class="text-sm text-zinc-400 mt-1">Asigna un alumno a una materia y docente.</p>
        </div>

        {{-- Bloque de errores para diagnóstico --}}
        @if ($errors->any())
            <div class="mb-6 p-4 bg-red-500/20 border border-red-500/50 rounded-xl text-red-400 text-sm">
                <ul class="list-disc pl-5">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {{-- UN SOLO FORM BIEN DEFINIDO --}}
        <form action="{{ route('inscripciones.store') }}" method="POST" class="space-y-6">
            @csrf
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                
                <div class="lg:col-span-2 space-y-6">
                    <div class="bg-[#1e1e2e] border border-white/10 rounded-2xl p-6 shadow-xl">
                        <div class="space-y-4">
                            {{-- Selector Alumno --}}
                            <div class="space-y-2">
                                <label class="text-sm font-medium text-zinc-300">Alumno</label>
                                <select name="alumno_id" required class="w-full bg-black/20 border border-white/10 rounded-xl px-4 py-3 text-white focus:ring-2 focus:ring-purple-500 outline-none appearance-none">
                                    <option value="">-- Seleccione un alumno --</option>
                                    @foreach($alumnos as $alumno)
                                        <option value="{{ $alumno->id }}">{{ $alumno->apellido }}, {{ $alumno->nombre }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                {{-- Selector Materia --}}
                                <div class="space-y-2">
                                    <label class="text-sm font-medium text-zinc-300">Materia</label>
                                    <select name="materia_id" required class="w-full bg-black/20 border border-white/10 rounded-xl px-4 py-3 text-white focus:ring-2 focus:ring-purple-500 outline-none appearance-none">
                                        <option value="">-- Seleccione materia --</option>
                                        @foreach($materias as $materia)
                                            <option value="{{ $materia->id }}">{{ $materia->nombre_materia }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                {{-- Selector Docente --}}
                                <div class="space-y-2">
                                    <label class="text-sm font-medium text-zinc-300">Docente</label>
                                    <select name="docente_id" required class="w-full bg-black/20 border border-white/10 rounded-xl px-4 py-3 text-white focus:ring-2 focus:ring-purple-500 outline-none appearance-none">
                                        <option value="">-- Seleccione docente --</option>
                                        @foreach($docentes as $docente)
                                            <option value="{{ $docente->id }}">{{ $docente->nombre }} {{ $docente->apellido }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="lg:col-span-1">
                    <div class="bg-[#1e1e2e] border border-white/10 rounded-2xl p-6 shadow-xl space-y-4">
                        <div class="space-y-2">
                            <label class="text-sm font-medium text-zinc-300">Periodo Escolar</label>
                            <input type="text" name="periodo" value="2026-1" required class="w-full bg-black/20 border border-white/10 rounded-xl px-4 py-2.5 text-white outline-none focus:ring-2 focus:ring-purple-500">
                        </div>

                        <div class="space-y-2">
                            <label class="text-sm font-medium text-zinc-300">Estatus Inicial</label>
                            <select name="estatus" class="w-full bg-black/20 border border-white/10 rounded-xl px-4 py-2.5 text-white outline-none focus:ring-2 focus:ring-purple-500">
                                <option value="Cursando">Cursando</option>
                                <option value="Aprobado">Aprobado</option>
                            </select>
                        </div>

                        <button type="submit" class="w-full bg-purple-600 hover:bg-purple-500 text-white font-bold py-3 rounded-xl transition mt-4">
                            Guardar Inscripción
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</x-layouts::app>