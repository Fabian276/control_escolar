<x-layouts::app :title="__('Docentes')">
<div class="flex flex-col gap-6 p-6">

    {{-- Header --}}
    <div>
        <h1 class="text-2xl font-bold text-white">Listado de Docentes</h1>
        <p class="text-sm text-gray-400 mt-1">Gestiona el personal docente registrado en el sistema.</p>
    </div>

    {{-- Stats Cards --}}
    <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
        <div class="bg-[#1e1e2e] border border-white/10 rounded-xl p-4 flex items-center gap-4">
            <div class="bg-indigo-500/20 text-indigo-400 rounded-lg p-3">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a4 4 0 00-5-5M9 20H4v-2a4 4 0 015-5m6-4a4 4 0 11-8 0 4 4 0 018 0z"/>
                </svg>
            </div>
            <div>
                <p class="text-xs text-gray-400">Total Docentes</p>
                <p class="text-2xl font-bold text-white">{{ $totalDocentes ?? 0 }}</p>
            </div>
        </div>
        <div class="bg-[#1e1e2e] border border-white/10 rounded-xl p-4 flex items-center gap-4">
            <div class="bg-green-500/20 text-green-400 rounded-lg p-3">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
            </div>
            <div>
                <p class="text-xs text-gray-400">Activos</p>
                <p class="text-2xl font-bold text-white">{{ $activos ?? 0 }}</p>
            </div>
        </div>
        <div class="bg-[#1e1e2e] border border-white/10 rounded-xl p-4 flex items-center gap-4">
            <div class="bg-yellow-500/20 text-yellow-400 rounded-lg p-3">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
            </div>
            <div>
                <p class="text-xs text-gray-400">Inactivos</p>
                <p class="text-2xl font-bold text-white">{{ $inactivos ?? 0 }}</p>
            </div>
        </div>
    </div>

    {{-- Toolbar --}}
    <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between gap-3">
        <div class="relative w-full sm:w-72">
            <svg class="absolute left-3 top-1/2 -translate-y-1/2 w-4 h-4 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-4.35-4.35M17 11A6 6 0 105 11a6 6 0 0012 0z"/>
            </svg>
            <input type="text" placeholder="Buscar docente..." class="w-full bg-[#1e1e2e] border border-white/10 text-white text-sm rounded-lg pl-9 pr-4 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500 placeholder-gray-500"/>
        </div>
        <a href="{{ route('docentes.create') }}" class="flex items-center gap-2 bg-indigo-600 hover:bg-indigo-500 transition text-white text-sm font-medium px-4 py-2 rounded-lg">
            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
            </svg>
            Nuevo Docente
        </a>
    </div>

    {{-- Tabla --}}
    <div class="bg-[#1e1e2e] border border-white/10 rounded-xl overflow-hidden">
        <table class="w-full text-sm text-left">
            <thead>
                <tr class="border-b border-white/10 text-gray-400 text-xs uppercase tracking-wider">
                    <th class="px-6 py-3">Docente</th>
                    <th class="px-6 py-3">RFC / Clave</th>
                    <th class="px-6 py-3">Especialidad</th>
                    <th class="px-6 py-3">Estatus</th>
                    <th class="px-6 py-3 text-right">Acciones</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-white/5">
        @forelse($docentes ?? [] as $docente)
        <tr class="hover:bg-white/5 transition group">
            <td class="px-6 py-4">
                <div class="flex items-center gap-3">
                    <div class="w-9 h-9 rounded-full bg-indigo-600 flex items-center justify-center text-white font-bold text-sm flex-shrink-0">
                        {{ strtoupper(substr($docente->nombre, 0, 1)) }}{{ strtoupper(substr($docente->apellido, 0, 1)) }}
                    </div>
                    <div>
                        <p class="text-white font-medium">{{ $docente->nombre }} {{ $docente->apellido }}</p>
                        <p class="text-gray-400 text-xs">{{ $docente->email ?? $docente->correo }}</p>
                    </div>
                </div>
            </td>
            <td class="px-6 py-4 text-gray-300 font-mono text-xs">
                {{ $docente->numero_empleado ?? 'DOC-' . str_pad($docente->id, 3, '0', STR_PAD_LEFT) }}
            </td>
            <td class="px-6 py-4 text-gray-300">{{ $docente->especialidad ?? '—' }}</td>
            <td class="px-6 py-4">
                @if($docente->estatus === 'Activo')
                    <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-xs font-medium bg-green-500/15 text-green-400 border border-green-500/20">
                        <span class="w-1.5 h-1.5 rounded-full bg-green-400 animate-pulse"></span> Activo
                    </span>
                @else
                    <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-xs font-medium bg-red-500/15 text-red-400 border border-red-500/20">
                        <span class="w-1.5 h-1.5 rounded-full bg-red-400"></span> Inactivo
                    </span>
                @endif
            </td>
            <td class="px-6 py-4 text-right">
                {{-- Las acciones ahora son visibles al pasar el mouse por la fila --}}
                <div class="flex items-center justify-end gap-2 opacity-0 group-hover:opacity-100 transition">
                    
                    {{-- Botón Editar --}}
                    <a href="{{ route('docentes.edit', $docente->id) }}" class="p-1.5 rounded-lg hover:bg-indigo-500/20 text-gray-400 hover:text-indigo-400 transition" title="Editar">
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                        </svg>
                    </a>

                    {{-- Botón Eliminar --}}
                    <form action="{{ route('docentes.destroy', $docente->id) }}" method="POST" onsubmit="return confirm('¿Eliminar al docente {{ $docente->nombre }}?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="p-1.5 rounded-lg hover:bg-red-500/20 text-gray-400 hover:text-red-400 transition" title="Eliminar">
                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                            </svg>
                        </button>
                    </form>
                </div>
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="5" class="px-6 py-12 text-center text-gray-500">
                No hay docentes registrados todavía.
            </td>
        </tr>
        @endforelse
    </tbody>
        </table>
    </div>

</div>
</x-layouts::app>