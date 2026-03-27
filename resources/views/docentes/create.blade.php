<x-layouts::app :title="__('Nuevo Docente')">
    <div class="p-6 max-w-2xl mx-auto space-y-6">
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-2xl font-bold text-zinc-900 dark:text-white">Registrar Nuevo Docente</h1>
                <p class="text-sm text-zinc-500 dark:text-zinc-400">Ingresa los datos del personal académico.</p>
            </div>
            <a href="{{ route('docentes.index') }}" class="text-sm font-medium text-zinc-500 hover:text-zinc-700">Cancelar</a>
        </div>

        <div class="rounded-xl border border-zinc-200 bg-white p-6 shadow-sm dark:border-zinc-700 dark:bg-zinc-800">
            <form action="{{ route('docentes.store') }}" method="POST" class="space-y-4">
                @csrf
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div class="space-y-2">
                        <label class="text-sm font-medium text-zinc-700 dark:text-zinc-300">Nombre(s)</label>
                        <input type="text" name="nombre" required class="w-full rounded-lg border border-zinc-300 bg-white px-3 py-2 text-sm dark:bg-zinc-900 dark:text-white">
                    </div>
                    <div class="space-y-2">
                        <label class="text-sm font-medium text-zinc-700 dark:text-zinc-300">Apellidos</label>
                        <input type="text" name="apellido" required class="w-full rounded-lg border border-zinc-300 bg-white px-3 py-2 text-sm dark:bg-zinc-900 dark:text-white">
                    </div>
                </div>

                <div class="space-y-2">
                    <label class="text-sm font-medium text-zinc-700 dark:text-zinc-300">Correo Institucional</label>
                    <input type="email" name="email" required class="w-full rounded-lg border border-zinc-300 bg-white px-3 py-2 text-sm dark:bg-zinc-900 dark:text-white">
                </div>

                <div class="space-y-2">
                    <label class="text-sm font-medium text-zinc-700 dark:text-zinc-300">Especialidad (Área)</label>
                    <input type="text" name="especialidad" placeholder="Ej: Ciencias de la Computación" required class="w-full rounded-lg border border-zinc-300 bg-white px-3 py-2 text-sm dark:bg-zinc-900 dark:text-white">
                </div>

                <div class="pt-4">
                    <button type="submit" class="w-full inline-flex items-center justify-center px-4 py-2 bg-indigo-600 hover:bg-indigo-700 text-white text-sm font-medium rounded-lg transition-all hover:scale-[1.02] shadow-md">
                        <flux:icon.plus class="w-4 h-4 mr-2" />
                        Guardar Docente
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-layouts::app>