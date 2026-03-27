<x-layouts::app :title="__('Editar Materia')">
    <div class="p-6 max-w-2xl mx-auto">
        <div class="flex items-center justify-between mb-6 text-white">
            <h1 class="text-2xl font-bold">Editar: {{ $materia->nombre_materia }}</h1>
            <a href="{{ route('materias.index') }}" class="text-sm text-gray-400 hover:text-white">Regresar</a>
        </div>

        <div class="bg-[#1e1e2e] border border-white/10 rounded-xl p-6 shadow-xl">
            <form action="{{ route('materias.update', $materia->id) }}" method="POST" class="space-y-4">
                @csrf
                @method('PUT')
                
                <div class="space-y-2">
                    <label class="text-sm font-medium text-gray-300">Nombre de la Asignatura</label>
                    <input type="text" name="nombre_materia" value="{{ $materia->nombre_materia }}" required 
                        class="w-full bg-black/20 border border-white/10 rounded-lg px-4 py-2 text-white focus:ring-2 focus:ring-violet-500 outline-none">
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <div class="space-y-2">
                        <label class="text-sm font-medium text-gray-300">Código</label>
                        <input type="text" name="codigo_materia" value="{{ $materia->codigo_materia }}" required 
                            class="w-full bg-black/20 border border-white/10 rounded-lg px-4 py-2 text-white font-mono outline-none">
                    </div>
                    <div class="space-y-2">
                        <label class="text-sm font-medium text-gray-300">Estatus</label>
                        <select name="estatus" class="w-full bg-black/20 border border-white/10 rounded-lg px-4 py-2 text-white outline-none">
                            <option value="Activo" {{ $materia->estatus == 'Activo' ? 'selected' : '' }}>Activo</option>
                            <option value="Inactivo" {{ $materia->estatus == 'Inactivo' ? 'selected' : '' }}>Inactivo</option>
                        </select>
                    </div>
                </div>

                <div class="space-y-2">
                    <label class="text-sm font-medium text-gray-300">Créditos</label>
                    <input type="number" name="creditos" value="{{ $materia->creditos }}" required 
                        class="w-full bg-black/20 border border-white/10 rounded-lg px-4 py-2 text-white outline-none">
                </div>

                <button type="submit" class="w-full bg-violet-600 hover:bg-violet-500 text-white font-bold py-2 rounded-lg mt-4 transition">
                    Guardar Cambios
                </button>
            </form>
        </div>
    </div>
</x-layouts::app>