<x-layouts::app :title="__('Nueva Materia')">
    <div class="p-6 max-w-2xl mx-auto space-y-6">
        <div class="flex items-center justify-between text-white">
            <div>
                <h1 class="text-2xl font-bold">Nueva Materia</h1>
                <p class="text-sm text-gray-400">Registra una nueva asignatura en el plan de estudios.</p>
            </div>
            <a href="{{ route('materias.index') }}" class="text-sm font-medium text-gray-500 hover:text-gray-300 transition">Cancelar</a>
        </div>

        <div class="bg-[#1e1e2e] border border-white/10 rounded-xl p-6 shadow-xl">
            <form action="{{ route('materias.store') }}" method="POST" class="space-y-4">
                @csrf
                <div class="space-y-2">
                    <label class="text-sm font-medium text-gray-300">Nombre de la Asignatura</label>
                    <input type="text" name="nombre_materia" required placeholder="Ej: Estructura de Datos" 
                        class="w-full bg-black/20 border border-white/10 rounded-lg px-4 py-2 text-white text-sm focus:ring-2 focus:ring-amber-500 focus:outline-none">
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div class="space-y-2">
                        <label class="text-sm font-medium text-gray-300">Código de Materia</label>
                        <input type="text" name="codigo_materia" required placeholder="Ej: COMP-101" 
                            class="w-full bg-black/20 border border-white/10 rounded-lg px-4 py-2 text-white text-sm font-mono focus:ring-2 focus:ring-amber-500 focus:outline-none">
                    </div>
                    <div class="space-y-2">
                        <label class="text-sm font-medium text-gray-300">Créditos</label>
                        <input type="number" name="creditos" required min="1" max="20"
                            class="w-full bg-black/20 border border-white/10 rounded-lg px-4 py-2 text-white text-sm focus:ring-2 focus:ring-amber-500 focus:outline-none">
                    </div>
                </div>

                <div class="pt-4">
                    <button type="submit" class="w-full bg-amber-600 hover:bg-amber-500 text-white font-bold py-2 rounded-lg transition transform active:scale-95 shadow-lg flex items-center justify-center gap-2">
                        <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/></svg>
                        Guardar Materia
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-layouts::app>