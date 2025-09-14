<x-app-layout>
    <div class="max-w-lg mx-auto py-6">
        <h1 class="text-2xl font-bold mb-4">Registrar Recordatorio</h1>

        <form action="{{ route('recordatorios.store') }}" method="POST" class="space-y-4">
            @csrf

            <!-- Selección de Adulto Mayor -->
            <div>
                <label class="block font-medium">Adulto Mayor</label>
                <select name="senior_id" class="w-full border rounded p-2" required>
                    <option value="">Seleccione...</option>
                    @foreach($seniors as $senior)
                        <option value="{{ $senior->id }}" {{ old('senior_id') == $senior->id ? 'selected' : '' }}>
                            {{ $senior->nombre }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div>
                <label class="block font-medium">Título</label>
                <input type="text" name="titulo" value="{{ old('titulo') }}"
                       class="w-full border rounded p-2" required>
            </div>

            <div>
                <label class="block font-medium">Descripción</label>
                <textarea name="descripcion" rows="3"
                          class="w-full border rounded p-2">{{ old('descripcion') }}</textarea>
            </div>

            <div>
                <label class="block font-medium">Fecha y hora</label>
                <input type="datetime-local" name="fecha_hora" value="{{ old('fecha_hora') }}"
                       class="w-full border rounded p-2" required>
            </div>

            <div>
                <label class="block font-medium">Estado</label>
                <select name="estado" class="w-full border rounded p-2">
                    <option value="pendiente" {{ old('estado') == 'pendiente' ? 'selected' : '' }}>Pendiente</option>
                    <option value="completado" {{ old('estado') == 'completado' ? 'selected' : '' }}>Completado</option>
                </select>
            </div>

            <div class="pt-4">
                <button type="submit"
                        class="bg-red-600 hover:bg-red-700 text-white font-bold py-1 px-3 rounded-lg transition">
                    Guardar
                </button>
            </div>
        </form>
    </div>
</x-app-layout>