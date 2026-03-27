<x-layouts::app :title="__('Materias')">
<div class="flex flex-col gap-6 p-6">

    {{-- Header --}}
    <div>
        <h1 class="text-2xl font-bold text-white">Materias</h1>
        <p class="text-sm text-gray-400 mt-1">Administra las materias del plan de estudios.</p>
    </div>

    {{-- Stats Cards --}}
    <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
        <div class="bg-[#1e1e2e] border border-white/10 rounded-xl p-4 flex items-center gap-4">
            <div class="bg-violet-500/20 text-violet-400 rounded-lg p-3">
                <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                </svg>
            </div>
            <div>
                <p class="text-xs text-gray-400">Total Materias</p>
                <p class="text-2xl font-bold text-white">{{ $totalMaterias ?? 0 }}</p>
            </div>
        </div>
        <div class="bg-[#1e1e2e] border border-white/10 rounded-xl p-4 flex items-center gap-4">
            <div class="bg-green-500/20 text-green-400 rounded-lg p-3">
                <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
            </div>
            <div>
                <p class="text-xs text-gray-400">Activas</p>
                <p class="text-2xl font-bold text-white">{{ $activas ?? 0 }}</p>
            </div>
        </div>
        <div class="bg-[#1e1e2e] border border-white/10 rounded-xl p-4 flex items-center gap-4">
            <div class="bg-blue-500/20 text-blue-400 rounded-lg p-3">
                <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                </svg>
            </div>
            <div>
                <p class="text-xs text-gray-400">Créditos Totales</p>
                <p class="text-2xl font-bold text-white">{{ $totalCreditos ?? 0 }}</p>
            </div>
        </div>
    </div>

    {{-- Toolbar --}}
    <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between gap-3">
        <div class="relative w-full sm:w-72">
            <svg class="absolute left-3 top-1/2 -translate-y-1/2 w-4 h-4 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-4.35-4.35M17 11A6 6 0 105 11a6 6 0 0012 0z"/>
            </svg>
            <input type="text" placeholder="Buscar materia..." class="w-full bg-[#1e1e2e] border border-white/10 text-white text-sm rounded-lg pl-9 pr-4 py-2 focus:outline-none focus:ring-2 focus:ring-violet-500 placeholder-gray-500"/>
        </div>
        <a href="{{ route('materias.create') }}" class="flex items-center gap-2 bg-violet-600 hover:bg-violet-500 transition text-white text-sm font-medium px-4 py-2 rounded-lg">
            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
            </svg>
            Nueva Materia
        </a>
    </div>

    {{-- Grid de Materias --}}
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
        @forelse($materias ?? [] as $materia)
        <div class="bg-[#1e1e2e] border border-white/10 rounded-xl p-5 flex flex-col gap-4 hover:border-violet-500/40 transition group">
            <div class="flex items-start justify-between">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 rounded-lg bg-violet-600/20 text-violet-400 flex items-center justify-center font-bold text-sm">
                        {{ strtoupper(substr($materia->nombre_materia, 0, 2)) }}
                    </div>
                    <div>
                        <p class="text-white font-semibold text-sm">{{ $materia->nombre_materia }}</p>
                        <p class="text-gray-400 text-xs">Clave: {{ $materia->codigo_materia ?? '—' }}</p>
                    </div>
                </div>
                @if(($materia->estatus ?? 'Activo') === 'Activo')
                    <span class="inline-flex items-center gap-1 px-2 py-0.5 rounded-full text-xs bg-green-500/15 text-green-400 border border-green-500/20">
                        <span class="w-1.5 h-1.5 rounded-full bg-green-400 animate-pulse"></span> Activa
                    </span>
                @else
                    <span class="inline-flex items-center gap-1 px-2 py-0.5 rounded-full text-xs bg-gray-500/15 text-gray-400 border border-gray-500/20">
                        <span class="w-1.5 h-1.5 rounded-full bg-gray-400"></span> Inactiva
                    </span>
                @endif
            </div>

            <div class="grid grid-cols-2 gap-2 text-xs">
                <div class="bg-white/5 rounded-lg px-3 py-2">
                    <p class="text-gray-400">Créditos</p>
                    <p class="text-white font-semibold">{{ $materia->creditos ?? '0' }} pts</p>
                </div>
                <div class="bg-white/5 rounded-lg px-3 py-2">
                    <p class="text-gray-400">Estado</p>
                    <p class="text-white font-semibold">{{ $materia->estatus ?? 'N/A' }}</p>
                </div>
            </div>

            <div class="flex items-center justify-between pt-1 border-t border-white/5">
                <p class="text-xs text-gray-500 truncate pr-4">{{ $materia->descripcion ?? 'Materia del plan de estudios' }}</p>
                
                {{-- Acciones (Editar y Eliminar) --}}
                <div class="flex gap-1 opacity-0 group-hover:opacity-100 transition">
                    {{-- Editar --}}
                    <a href="{{ route('materias.edit', $materia->id) }}" class="p-1.5 rounded-lg hover:bg-violet-500/20 text-gray-400 hover:text-violet-400 transition" title="Editar">
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                        </svg>
                    </a>

                    {{-- Eliminar --}}
                    <form action="{{ route('materias.destroy', $materia->id) }}" method="POST" onsubmit="return confirm('¿Estás seguro de eliminar esta materia?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="p-1.5 rounded-lg hover:bg-red-500/20 text-gray-400 hover:text-red-400 transition" title="Eliminar">
                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                            </svg>
                        </button>
                    </form>
                </div>
            </div>
        </div>
        @empty
        {{-- Estado vacío --}}
        <div class="col-span-1 sm:col-span-2 lg:col-span-3 py-16 text-center">
            <div class="flex flex-col items-center gap-3 text-gray-500">
                <svg class="w-12 h-12 opacity-30" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                </svg>
                <p class="text-sm">No hay materias registradas aún.</p>
                <a href="{{ route('materias.create') }}" class="text-violet-400 hover:underline text-xs">+ Agregar la primera</a>
            </div>
        </div>
        @endforelse
    </div>

</div>
</x-layouts::app>