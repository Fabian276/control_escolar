<x-layouts::app :title="__('Nuevo Grupo')">
    <div class="p-6 max-w-3xl mx-auto">
        <div class="mb-8">
            <h1 class="text-2xl font-bold text-white">Crear Nuevo Grupo</h1>
            <p class="text-sm text-zinc-400 mt-1">Define los detalles de la nueva sección escolar.</p>
        </div>

        {{-- Errores de validación --}}
        @if ($errors->any())
            <div class="mb-6 p-4 bg-red-500/20 border border-red-500/50 rounded-xl text-red-400 text-sm">
                <ul class="list-disc pl-5">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('grupos.store') }}" method="POST" class="space-y-6">
            @csrf
            
            <div class="bg-[#1e1e2e] border border-white/10 rounded-2xl p-6 shadow-xl">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    
                    {{-- Nombre del Grupo --}}
                    <div class="space-y-2">
                        <label class="text-sm font-medium text-zinc-300">Nombre del Grupo (Letra o Número)</label>
                        <input type="text" name="nombre_grupo" placeholder="Ej: A, B o 101" required 
                            class="w-full bg-black/20 border border-white/10 rounded-xl px-4 py-2.5 text-white outline-none focus:ring-2 focus:ring-orange-500 transition">
                    </div>

                    {{-- Grado --}}
                    <div class="space-y-2">
                        <label class="text-sm font-medium text-zinc-300">Grado / Semestre</label>
                        <select name="grado" required class="w-full bg-black/20 border border-white/10 rounded-xl px-4 py-2.5 text-white outline-none focus:ring-2 focus:ring-orange-500 transition">
                            <option value="">Selecciona grado</option>
                            @foreach(range(1, 12) as $g)
                                <option value="{{ $g }}">{{ $g }}° Grado</option>
                            @endforeach
                        </select>
                    </div>

                    {{-- Turno --}}
                    <div class="space-y-2">
                        <label class="text-sm font-medium text-zinc-300">Turno</label>
                        <select name="turno" required class="w-full bg-black/20 border border-white/10 rounded-xl px-4 py-2.5 text-white outline-none focus:ring-2 focus:ring-orange-500 transition">
                            <option value="Matutino">Matutino</option>
                            <option value="Vespertino">Vespertino</option>
                        </select>
                    </div>

                    {{-- Aula --}}
                    <div class="space-y-2">
                        <label class="text-sm font-medium text-zinc-300">Aula (Opcional)</label>
                        <input type="text" name="aula" placeholder="Ej: Laboratorio 2, Aula B-4" 
                            class="w-full bg-black/20 border border-white/10 rounded-xl px-4 py-2.5 text-white outline-none focus:ring-2 focus:ring-orange-500 transition">
                    </div>

                </div>

                <div class="mt-8 pt-6 border-t border-white/5 flex flex-col sm:flex-row gap-3">
                    <button type="submit" class="flex-1 bg-orange-600 hover:bg-orange-500 text-white font-bold py-3 rounded-xl transition shadow-lg shadow-orange-900/20">
                        Guardar Grupo
                    </button>
                    <a href="{{ route('grupos.index') }}" class="flex-1 bg-zinc-800 hover:bg-zinc-700 text-white text-center font-bold py-3 rounded-xl transition">
                        Cancelar
                    </a>
                </div>
            </div>
        </form>
    </div>
</x-layouts::app>