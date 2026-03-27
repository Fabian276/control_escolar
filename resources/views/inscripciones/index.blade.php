<x-layouts::app :title="__('Inscripciones')">
<div class="flex flex-col gap-6 p-6">

    {{-- Header --}}
    <div>
        <h1 class="text-2xl font-bold text-white">Inscripciones</h1>
        <p class="text-sm text-gray-400 mt-1">Gestiona la inscripción de alumnos a grupos y materias.</p>
    </div>

    {{-- Stats (Usando las variables enviadas desde el controlador) --}}
    <div class="grid grid-cols-1 sm:grid-cols-4 gap-4">
        <div class="bg-[#1e1e2e] border border-white/10 rounded-xl p-4 flex items-center gap-4">
            <div class="bg-cyan-500/20 text-cyan-400 rounded-lg p-3">
                <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/></svg>
            </div>
            <div>
                <p class="text-xs text-gray-400">Total</p>
                <p class="text-2xl font-bold text-white">{{ $total ?? 0 }}</p>
            </div>
        </div>

        <div class="bg-green-500/20 border border-white/10 rounded-xl p-4 flex items-center gap-4">
            <div class="text-green-400 rounded-lg p-3">
                <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
            </div>
            <div>
                <p class="text-xs text-gray-400">Activas</p>
                <p class="text-2xl font-bold text-white">{{ $activas ?? 0 }}</p>
            </div>
        </div>

        <div class="bg-yellow-500/20 border border-white/10 rounded-xl p-4 flex items-center gap-4">
            <div class="text-yellow-400 rounded-lg p-3">
                <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-7.714 2.143L11 21l-2.286-6.857L1 12l7.714-2.143L11 3z"/></svg>
            </div>
            <div>
                <p class="text-xs text-gray-400">Aprobados</p>
                <p class="text-2xl font-bold text-white">{{ $aprobadas ?? 0 }}</p>
            </div>
        </div>

        <div class="bg-red-500/20 border border-white/10 rounded-xl p-4 flex items-center gap-4">
            <div class="text-red-400 rounded-lg p-3">
                <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
            </div>
            <div>
                <p class="text-xs text-gray-400">Bajas</p>
                <p class="text-2xl font-bold text-white">{{ $bajas ?? 0 }}</p>
            </div>
        </div>
    </div>

    {{-- Toolbar --}}
    <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between gap-3">
        <div class="relative w-full sm:w-72">
            <svg class="absolute left-3 top-1/2 -translate-y-1/2 w-4 h-4 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-4.35-4.35M17 11A6 6 0 105 11a6 6 0 0012 0z"/></svg>
            <input type="text" placeholder="Buscar inscripción..." class="w-full bg-[#1e1e2e] border border-white/10 text-white text-sm rounded-lg pl-9 pr-4 py-2 focus:ring-2 focus:ring-cyan-500 outline-none"/>
        </div>
        
        <a href="{{ route('inscripciones.create') }}" class="bg-cyan-600 hover:bg-cyan-500 text-white text-sm font-medium px-4 py-2 rounded-lg flex items-center gap-2 transition">
            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
            Nueva Inscripción
        </a>
    </div>

    {{-- Tabla --}}
    <div class="bg-[#1e1e2e] border border-white/10 rounded-xl overflow-hidden shadow-xl">
        <table class="w-full text-sm text-left">
            <thead>
                <tr class="border-b border-white/10 text-gray-400 text-xs uppercase tracking-wider">
                    <th class="px-6 py-4">Alumno</th>
                    <th class="px-6 py-4">Periodo</th>
                    <th class="px-6 py-4">Materia / Docente</th>
                    <th class="px-6 py-4 text-center">Estatus</th>
                    <th class="px-6 py-4 text-right">Acciones</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-white/5">
                @forelse($inscripciones as $inscripcion)
                <tr class="hover:bg-white/5 transition group">
                    <td class="px-6 py-4">
                        <div class="flex items-center gap-3">
                            <div class="w-9 h-9 rounded-full bg-cyan-600/20 text-cyan-400 flex items-center justify-center font-bold">
                                {{ strtoupper(substr($inscripcion->alumno?->nombre ?? 'A', 0, 1)) }}
                            </div>
                            <div>
                                <p class="text-white font-medium">{{ $inscripcion->alumno?->nombre }} {{ $inscripcion->alumno?->apellido }}</p>
                                <p class="text-gray-500 text-xs">{{ $inscripcion->alumno?->curp_matricula ?? 'S/M' }}</p>
                            </div>
                        </div>
                    </td>
                    <td class="px-6 py-4 text-gray-300">
                        {{ $inscripcion->periodo }}
                    </td>
                    <td class="px-6 py-4">
                        <div class="text-gray-300">{{ $inscripcion->materia?->nombre_materia }}</div>
                        <div class="text-gray-500 text-xs">Prof. {{ $inscripcion->docente?->nombre }}</div>
                    </td>
                    <td class="px-6 py-4 text-center">
                        @php
                            $color = match($inscripcion->estatus) {
                                'Aprobado' => 'bg-green-500/10 text-green-400 border-green-500/20',
                                'Cursando' => 'bg-cyan-500/10 text-cyan-400 border-cyan-500/20',
                                'Baja'     => 'bg-red-500/10 text-red-400 border-red-500/20',
                                default    => 'bg-zinc-500/10 text-zinc-400 border-zinc-500/20',
                            };
                        @endphp
                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium border {{ $color }}">
                            {{ $inscripcion->estatus }}
                        </span>
                    </td>
                    <td class="px-6 py-4 text-right">
                        <div class="flex items-center justify-end gap-2 opacity-0 group-hover:opacity-100 transition">
                            <a href="{{ route('inscripciones.edit', $inscripcion->id) }}" class="p-2 rounded-lg hover:bg-cyan-500/10 text-gray-400 hover:text-cyan-400 transition">
                                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
                            </a>
                            <form action="{{ route('inscripciones.destroy', $inscripcion->id) }}" method="POST" onsubmit="return confirm('¿Seguro que deseas eliminar esta inscripción?')">
                                @csrf @method('DELETE')
                                <button type="submit" class="p-2 rounded-lg hover:bg-red-500/10 text-gray-400 hover:text-red-400 transition">
                                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="px-6 py-20 text-center">
                        <div class="flex flex-col items-center gap-2 text-gray-500">
                            <svg class="w-12 h-12 opacity-20" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/></svg>
                            <p>No se encontraron inscripciones.</p>
                        </div>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
</x-layouts::app>