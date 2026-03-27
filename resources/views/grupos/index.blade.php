<x-layouts::app :title="__('Grupos')">
<div class="flex flex-col gap-6 p-6">

    {{-- Header --}}
    <div>
        <h1 class="text-2xl font-bold text-white">Grupos</h1>
        <p class="text-sm text-gray-400 mt-1">Organiza y gestiona los grupos escolares.</p>
    </div>

    {{-- Stats --}}
    <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
        <div class="bg-[#1e1e2e] border border-white/10 rounded-xl p-4 flex items-center gap-4">
            <div class="bg-orange-500/20 text-orange-400 rounded-lg p-3">
                <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a4 4 0 00-5-5M9 20H4v-2a4 4 0 015-5m6-4a4 4 0 11-8 0 4 4 0 018 0z"/></svg>
            </div>
            <div>
                <p class="text-xs text-gray-400">Total Grupos</p>
                <p class="text-2xl font-bold text-white">{{ $totalGrupos ?? 0 }}</p>
            </div>
        </div>
        <div class="bg-[#1e1e2e] border border-white/10 rounded-xl p-4 flex items-center gap-4">
            <div class="bg-green-500/20 text-green-400 rounded-lg p-3">
                <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
            </div>
            <div>
                <p class="text-xs text-gray-400">Activos</p>
                <p class="text-2xl font-bold text-white">{{ $activos ?? 0 }}</p>
            </div>
        </div>
        <div class="bg-[#1e1e2e] border border-white/10 rounded-xl p-4 flex items-center gap-4">
            <div class="bg-blue-500/20 text-blue-400 rounded-lg p-3">
                <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197"/></svg>
            </div>
            <div>
                <p class="text-xs text-gray-400">Total Alumnos</p>
                <p class="text-2xl font-bold text-white">{{ $totalAlumnos ?? 0 }}</p>
            </div>
        </div>
    </div>

    {{-- Toolbar --}}
    <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between gap-3">
        <div class="relative w-full sm:w-72">
            <svg class="absolute left-3 top-1/2 -translate-y-1/2 w-4 h-4 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path d="M21 21l-4.35-4.35M17 11A6 6 0 105 11a6 6 0 0012 0z"/></svg>
            <input type="text" placeholder="Buscar grupo..." class="w-full bg-[#1e1e2e] border border-white/10 text-white text-sm rounded-lg pl-9 pr-4 py-2 focus:ring-orange-500 outline-none"/>
        </div>
        <a href="{{ route('grupos.create') }}" class="flex items-center gap-2 bg-orange-600 hover:bg-orange-500 transition text-white text-sm font-medium px-4 py-2 rounded-lg shadow-lg shadow-orange-900/20">
            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path d="M12 4v16m8-8H4"/></svg>
            Nuevo Grupo
        </a>
    </div>

    {{-- Grid de Grupos (Dinamico) --}}
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
        @forelse($grupos as $grupo)
            <div class="bg-[#1e1e2e] border border-white/10 rounded-2xl p-5 hover:border-orange-500/50 transition group shadow-xl">
                <div class="flex justify-between items-start mb-4">
                    <div class="bg-orange-500/10 text-orange-400 px-3 py-1 rounded-lg text-lg font-bold">
                        {{ $grupo->grado }}° {{ $grupo->nombre_grupo }}
                    </div>
                    <span class="text-[10px] uppercase tracking-widest bg-zinc-800 text-zinc-400 px-2 py-1 rounded border border-white/5">
                        {{ $grupo->turno }}
                    </span>
                </div>
                
                <div class="space-y-2 mb-4">
                    <div class="flex justify-between text-sm">
                        <span class="text-gray-500">Aula:</span>
                        <span class="text-gray-300 font-medium">{{ $grupo->aula ?? 'N/A' }}</span>
                    </div>
                </div>

                <div class="pt-4 border-t border-white/5 flex justify-end gap-2">
                    <a href="{{ route('grupos.edit', $grupo->id) }}" class="p-2 hover:bg-white/5 rounded-lg text-gray-400 hover:text-orange-400 transition">
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
                    </a>
                </div>
            </div>
        @empty
            <div class="col-span-1 sm:col-span-2 lg:col-span-3 py-16 text-center">
                <div class="flex flex-col items-center gap-3 text-gray-500">
                    <svg class="w-12 h-12 opacity-30" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path d="M17 20h5v-2a4 4 0 00-5-5M9 20H4v-2a4 4 0 015-5m6-4a4 4 0 11-8 0 4 4 0 018 0z"/></svg>
                    <p class="text-sm">No hay grupos registrados aún.</p>
                    <a href="{{ route('grupos.create') }}" class="text-orange-400 hover:underline text-xs">+ Crear el primero</a>
                </div>
            </div>
        @endforelse
    </div>

</div>
</x-layouts::app>