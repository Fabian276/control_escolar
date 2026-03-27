<x-layouts::app :title="__('Alumnos')">
    <div class="p-6 space-y-6">
        <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
            <div>
                <h1 class="text-2xl font-bold text-zinc-900 dark:text-white">Listado de Alumnos</h1>
                <p class="text-sm text-zinc-500 dark:text-zinc-400">Pasa el mouse para ver el efecto zoom.</p>
            </div>
            <a href="{{ route('alumnos.create') }}" class="inline-flex items-center justify-center px-4 py-2 bg-indigo-600 hover:bg-indigo-700 text-white text-sm font-medium rounded-lg transition-all hover:scale-105 active:scale-95">
                <flux:icon.plus class="w-4 h-4 mr-2" />
                Nuevo Alumno
            </a>
        </div>

        {{-- Alerta de éxito --}}
        @if(session('status'))
            <div class="p-4 mb-4 text-sm text-emerald-500 rounded-lg bg-emerald-500/10 border border-emerald-500/20">
                {{ session('status') }}
            </div>
        @endif

        <div class="overflow-hidden rounded-xl border border-zinc-200 bg-white shadow-sm dark:border-zinc-700 dark:bg-zinc-800">
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="bg-zinc-50 dark:bg-zinc-900/50">
                            <th class="px-6 py-4 text-xs font-semibold uppercase text-zinc-500 dark:text-zinc-400 border-b dark:border-zinc-700">Alumno</th>
                            <th class="px-6 py-4 text-xs font-semibold uppercase text-zinc-500 dark:text-zinc-400 border-b dark:border-zinc-700">CURP / Matrícula</th>
                            <th class="px-6 py-4 text-xs font-semibold uppercase text-zinc-500 dark:text-zinc-400 border-b dark:border-zinc-700">Estatus</th>
                            <th class="px-6 py-4 text-right text-xs font-semibold uppercase text-zinc-500 dark:text-zinc-400 border-b dark:border-zinc-700">Acciones</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-zinc-200 dark:divide-zinc-700">
                        @foreach($alumnos as $alumno)
                            <tr class="group transition-all duration-300 transform hover:scale-[1.015] hover:bg-zinc-100/50 dark:hover:bg-zinc-700/40 cursor-default">
                                <td class="px-6 py-4">
                                    <div class="flex items-center gap-3">
                                        <div class="h-10 w-10 rounded-full bg-indigo-500 flex items-center justify-center text-white text-xs font-bold shadow-md group-hover:rotate-3 transition-transform">
                                            {{ substr($alumno->nombre, 0, 1) }}{{ substr($alumno->apellido ?? '', 0, 1) }}
                                        </div>
                                        <div class="flex flex-col">
                                            <span class="text-sm font-bold text-zinc-900 dark:text-white">
                                                {{ $alumno->nombre }} {{ $alumno->apellido }}
                                            </span>
                                            <span class="text-xs text-zinc-500">{{ $alumno->email }}</span>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 text-sm text-zinc-600 dark:text-zinc-300 font-mono">
                                    {{ $alumno->curp_matricula }}
                                </td>
                                <td class="px-6 py-4">
                                    <span class="px-2 py-1 rounded-md text-xs font-medium {{ ($alumno->estatus ?? 'Activo') == 'Activo' ? 'bg-emerald-500/10 text-emerald-500' : 'bg-red-500/10 text-red-500' }}">
                                        {{ $alumno->estatus ?? 'Activo' }}
                                    </span>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex items-center justify-end gap-2">
                                        {{-- Botón Editar --}}
                                        <a href="{{ route('alumnos.edit', $alumno->id) }}" class="p-2 rounded-lg bg-zinc-100 dark:bg-zinc-800 text-zinc-500 dark:text-zinc-400 hover:bg-indigo-600 hover:text-white transition-colors" title="Editar Alumno">
                                            <flux:icon.pencil-square class="w-4 h-4" />
                                        </a>

                                        {{-- Botón Borrar --}}
                                        <form action="{{ route('alumnos.destroy', $alumno->id) }}" method="POST" onsubmit="return confirm('¿Estás seguro de eliminar a {{ $alumno->nombre }}?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="p-2 rounded-lg bg-zinc-100 dark:bg-zinc-800 text-zinc-500 dark:text-zinc-400 hover:bg-red-600 hover:text-white transition-colors" title="Borrar Alumno">
                                                <flux:icon.trash class="w-4 h-4" />
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-layouts::app>