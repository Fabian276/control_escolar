<x-layouts::app :title="__('Editar Grupo')">
    <div class="p-6 max-w-3xl mx-auto">
        <div class="mb-8">
            <h1 class="text-2xl font-bold text-white">Editar Grupo: {{ $grupo->grado }}°{{ $grupo->nombre_grupo }}</h1>
            <p class="text-sm text-zinc-400 mt-1">Modifica los detalles de la sección escolar.</p>
        </div>

        <form action="{{ route('grupos.update', $grupo->id) }}" method="POST" class="space-y-6">
            @csrf
            @method('PUT') {{-- ESTO ES VITAL PARA EDITAR --}}
            
            <div class="bg-[#1e1e2e] border border-white/10 rounded-2xl p-6 shadow-xl">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    
                    <div class="space-y-2">
                        <label class="text-sm font-medium text-zinc-300">Nombre del Grupo</label>
                        <input type="text" name="nombre_grupo" value="{{ $grupo->nombre_grupo }}" required 
                            class="w-full bg-black/20 border border-white/10 rounded-xl px-4 py-2.5 text-white outline-none focus:ring-2 focus:ring-orange-500 transition">
                    </div>

                    <div class="space-y-2">
                        <label class="text-sm font-medium text-zinc-300">Grado / Semestre</label>
                        <select name="grado" required class="w-full bg-black/20 border border-white/10 rounded-xl px-4 py-2.5 text-white outline-none focus:ring-2 focus:ring-orange-500 transition">
                            @foreach(range(1, 12) as $g)
                                <option value="{{ $g }}" {{ $grupo->grado == $g ? 'selected' : '' }}>{{ $g }}° Grado</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="space-y-2">
                        <label class="text-sm font-medium text-zinc-300">Turno</label>
                        <select name="turno" required class="w-full bg-black/20 border border-white/10 rounded-xl px-4 py-2.5 text-white outline-none focus:ring-2 focus:ring-orange-500 transition">
                            <option value="Matutino" {{ $grupo->turno == 'Matutino' ? 'selected' : '' }}>Matutino</option>
                            <option value="Vespertino" {{ $grupo->turno == 'Vespertino' ? 'selected' : '' }}>Vespertino</option>
                        </select>
                    </div>

                    <div class="space-y-2">
                        <label class="text-sm font-medium text-zinc-300">Aula</label>
                        <input type="text" name="aula" value="{{ $grupo->aula }}" 
                            class="w-full bg-black/20 border border-white/10 rounded-xl px-4 py-2.5 text-white outline-none focus:ring-2 focus:ring-orange-500 transition">
                    </div>

                </div>

                <div class="mt-8 pt-6 border-t border-white/5 flex flex-col sm:flex-row gap-3">
                    <button type="submit" class="flex-1 bg-orange-600 hover:bg-orange-500 text-white font-bold py-3 rounded-xl transition shadow-lg shadow-orange-900/20">
                        Actualizar Cambios
                    </button>
                    <a href="{{ route('grupos.index') }}" class="flex-1 bg-zinc-800 hover:bg-zinc-700 text-white text-center font-bold py-3 rounded-xl transition">
                        Cancelar
                    </a>
                </div>
            </div>
        </form>
    </div>
</x-layouts::app>