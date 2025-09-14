<x-app-layout>
    <div class="max-w-lg mx-auto py-6">
        <h1 class="text-2xl font-bold mb-4">Editar Recordatorio</h1>

        <form action="{{ route('recordatorios.update', $recordatorio->id) }}" method="POST" class="space-y-4">
            @csrf
            @method('PUT')

            <!-- Selección del adulto mayor -->
            <div>
                <label class="block font-medium">Adulto Mayor</label>
                <select name="senior_id" class="w-full border rounded p-2" required>
                    @foreach ($seniors as $senior)
                        <option value="{{ $senior->id }}" 
                            {{ old('senior_id', $recordatorio->senior_id) == $senior->id ? 'selected' : '' }}>
                            {{ $senior->nombre }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div>
                <label class="block font-medium">Título</label>
                <input type="text" name="titulo" value="{{ old('titulo', $recordatorio->titulo) }}"
                       class="w-full border rounded p-2" required>
            </div>

            <div>
                <label class="block font-medium">Descripción</label>
                <textarea name="descripcion" rows="3"
                          class="w-full border rounded p-2">{{ old('descripcion', $recordatorio->descripcion) }}</textarea>
            </div>

            <div>
                <label class="block font-medium">Fecha y hora</label>
                <input type="datetime-local" name="fecha_hora" 
                       value="{{ old('fecha_hora', \Carbon\Carbon::parse($recordatorio->fecha_hora)->format('Y-m-d\TH:i')) }}"
                       class="w-full border rounded p-2" required>
            </div>

            <div>
                <label class="block font-medium">Estado</label>
                <select name="estado" class="w-full border rounded p-2">
                    <option value="pendiente" {{ old('estado', $recordatorio->estado) == 'pendiente' ? 'selected' : '' }}>Pendiente</option>
                    <option value="completado" {{ old('estado', $recordatorio->estado) == 'completado' ? 'selected' : '' }}>Completado</option>
                    <option value="cancelado" {{ old('estado', $recordatorio->estado) == 'cancelado' ? 'selected' : '' }}>Cancelado</option>
                </select>
            </div>

            <div class="pt-4">
                <button type="submit"
                        class="bg-red-600 hover:bg-red-700 text-white font-bold py-1 px-3 rounded-lg transition">
                    Actualizar
                </button>
            </div>
        </form>
    </div>
</x-app-layout>