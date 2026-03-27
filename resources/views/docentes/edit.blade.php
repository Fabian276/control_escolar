<x-layouts::app :title="__('Editar Docente')">
    <div class="p-6 max-w-4xl mx-auto">
        <div class="flex items-center justify-between mb-8">
            <h1 class="text-2xl font-bold text-white">Editar Docente</h1>
            <a href="{{ route('docentes.index') }}" class="text-sm text-zinc-400 hover:text-white transition">Cancelar</a>
        </div>

        <div class="bg-[#1e1e2e] border border-white/10 rounded-2xl p-8 shadow-2xl">
            <form action="{{ route('docentes.update', $docente->id) }}" method="POST" class="space-y-6">
                @csrf
                @method('PUT')

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    {{-- Nombre --}}
                    <div class="space-y-2">
                        <label class="text-sm font-medium text-zinc-300">Nombre(s)</label>
                        <input type="text" name="nombre" value="{{ old('nombre', $docente->nombre) }}" required 
                            class="w-full bg-black/20 border border-white/10 rounded-xl px-4 py-2.5 text-white focus:ring-2 focus:ring-emerald-500 outline-none">
                    </div>

                    {{-- Apellido --}}
                    <div class="space-y-2">
                        <label class="text-sm font-medium text-zinc-300">Apellido(s)</label>
                        <input type="text" name="apellido" value="{{ old('apellido', $docente->apellido) }}" required 
                            class="w-full bg-black/20 border border-white/10 rounded-xl px-4 py-2.5 text-white focus:ring-2 focus:ring-emerald-500 outline-none">
                    </div>

                    {{-- Correo Electrónico (Cambiado por número de empleado que no existe) --}}
                    <div class="space-y-2">
                        <label class="text-sm font-medium text-zinc-300">Correo Electrónico</label>
                        <input type="email" name="email" value="{{ old('email', $docente->email) }}" required 
                            class="w-full bg-black/20 border border-white/10 rounded-xl px-4 py-2.5 text-white focus:ring-2 focus:ring-emerald-500 outline-none">
                    </div>

                    {{-- Estatus --}}
                    <div class="space-y-2">
                        <label class="text-sm font-medium text-zinc-300">Estatus</label>
                        <select name="estatus" class="w-full bg-black/20 border border-white/10 rounded-xl px-4 py-2.5 text-white focus:ring-2 focus:ring-emerald-500 outline-none appearance-none">
                            <option value="Activo" {{ $docente->estatus == 'Activo' ? 'selected' : '' }}>Activo</option>
                            <option value="Inactivo" {{ $docente->estatus == 'Inactivo' ? 'selected' : '' }}>Inactivo</option>
                        </select>
                    </div>

                    {{-- Especialidad --}}
                    <div class="space-y-2">
                        <label class="text-sm font-medium text-zinc-300">Especialidad</label>
                        <input type="text" name="especialidad" value="{{ old('especialidad', $docente->especialidad) }}" 
                            class="w-full bg-black/20 border border-white/10 rounded-xl px-4 py-2.5 text-white focus:ring-2 focus:ring-emerald-500 outline-none">
                    </div>

                    {{-- Teléfono --}}
                    <div class="space-y-2">
                        <label class="text-sm font-medium text-zinc-300">Teléfono de Contacto</label>
                        <input type="text" name="telefono" value="{{ old('telefono', $docente->telefono) }}" 
                            class="w-full bg-black/20 border border-white/10 rounded-xl px-4 py-2.5 text-white focus:ring-2 focus:ring-emerald-500 outline-none">
                    </div>
                </div>

                <button type="submit" class="w-full bg-emerald-600 hover:bg-emerald-500 text-white font-bold py-3 rounded-xl mt-4 transition shadow-lg shadow-emerald-500/20">
                    Guardar Cambios del Docente
                </button>
            </form>
        </div>
    </div>
</x-layouts::app>