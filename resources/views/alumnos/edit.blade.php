<x-layouts::app :title="__('Editar Alumno')">
    <div class="p-6 max-w-4xl mx-auto">
        {{-- Encabezado --}}
        <div class="flex items-center justify-between mb-8">
            <div>
                <h1 class="text-2xl font-bold text-white">Editar Expediente</h1>
                <p class="text-sm text-zinc-400 mt-1">Actualiza la información personal y académica del alumno.</p>
            </div>
            <a href="{{ route('alumnos.index') }}" class="flex items-center gap-2 text-sm text-zinc-400 hover:text-white transition-colors">
                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                </svg>
                Regresar al listado
            </a>
        </div>

        {{-- Formulario --}}
        <div class="bg-[#1e1e2e] border border-white/10 rounded-2xl overflow-hidden shadow-2xl">
            <div class="p-8">
                <form action="{{ route('alumnos.update', $alumno->id) }}" method="POST" class="space-y-6">
                    @csrf
                    @method('PUT')

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        {{-- Nombre --}}
                        <div class="space-y-2">
                            <label class="text-sm font-medium text-zinc-300">Nombre(s)</label>
                            <input type="text" name="nombre" value="{{ old('nombre', $alumno->nombre) }}" required 
                                class="w-full bg-black/20 border border-white/10 rounded-xl px-4 py-2.5 text-white focus:ring-2 focus:ring-indigo-500 focus:border-transparent outline-none transition-all placeholder-zinc-600">
                            @error('nombre') <p class="text-xs text-red-500 mt-1">{{ $message }}</p> @enderror
                        </div>

                        {{-- Apellido --}}
                        <div class="space-y-2">
                            <label class="text-sm font-medium text-zinc-300">Apellido(s)</label>
                            <input type="text" name="apellido" value="{{ old('apellido', $alumno->apellido) }}" required 
                                class="w-full bg-black/20 border border-white/10 rounded-xl px-4 py-2.5 text-white focus:ring-2 focus:ring-indigo-500 focus:border-transparent outline-none transition-all placeholder-zinc-600">
                            @error('apellido') <p class="text-xs text-red-500 mt-1">{{ $message }}</p> @enderror
                        </div>

                        {{-- CURP / Matrícula --}}
                        <div class="space-y-2">
                            <label class="text-sm font-medium text-zinc-300">CURP / Matrícula</label>
                            <input type="text" name="curp_matricula" value="{{ old('curp_matricula', $alumno->curp_matricula) }}" required 
                                class="w-full bg-black/20 border border-white/10 rounded-xl px-4 py-2.5 text-white font-mono focus:ring-2 focus:ring-indigo-500 outline-none transition-all">
                            @error('curp_matricula') <p class="text-xs text-red-500 mt-1">{{ $message }}</p> @enderror
                        </div>

                        {{-- Correo Electrónico --}}
                        <div class="space-y-2">
                            <label class="text-sm font-medium text-zinc-300">Correo Electrónico</label>
                            <input type="email" name="email" value="{{ old('email', $alumno->email) }}" required 
                                class="w-full bg-black/20 border border-white/10 rounded-xl px-4 py-2.5 text-white focus:ring-2 focus:ring-indigo-500 outline-none transition-all">
                            @error('email') <p class="text-xs text-red-500 mt-1">{{ $message }}</p> @enderror
                        </div>

                        {{-- Estatus --}}
                        <div class="space-y-2">
                            <label class="text-sm font-medium text-zinc-300">Estatus Académico</label>
                            <div class="relative">
                                <select name="estatus" class="w-full bg-black/20 border border-white/10 rounded-xl px-4 py-2.5 text-white focus:ring-2 focus:ring-indigo-500 outline-none appearance-none transition-all">
                                    <option value="Activo" {{ old('estatus', $alumno->estatus) == 'Activo' ? 'selected' : '' }} class="bg-[#1e1e2e]">Activo</option>
                                    <option value="Inactivo" {{ old('estatus', $alumno->estatus) == 'Inactivo' ? 'selected' : '' }} class="bg-[#1e1e2e]">Inactivo</option>
                                </select>
                                <div class="absolute inset-y-0 right-0 flex items-center px-4 pointer-events-none text-zinc-500">
                                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="pt-6 border-t border-white/5 flex gap-3">
                        <button type="submit" class="flex-1 bg-indigo-600 hover:bg-indigo-500 text-white font-bold py-3 rounded-xl transition-all shadow-lg shadow-indigo-500/20 active:scale-[0.98]">
                            Guardar Cambios
                        </button>
                        <a href="{{ route('alumnos.index') }}" class="px-6 py-3 bg-white/5 hover:bg-white/10 text-zinc-300 rounded-xl transition-all">
                            Cancelar
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-layouts::app>