<x-app-layout>
    <div class="max-w-lg mx-auto py-6">
        <h1 class="text-2xl font-bold mb-4 text-center">Asignar Nueva Cita</h1>

        <!-- Botón de volver -->
        <div class="flex justify-center mb-4">
            <a href="{{ route('citas.index') }}"
               class="bg-gray-600 hover:bg-gray-700 text-white px-4 py-2 rounded-lg text-sm">
                Volver a Citas
            </a>
        </div>

        <!-- Mostrar errores de validación -->
        @if ($errors->any())
            <div class="mb-4 p-3 bg-red-100 text-red-800 rounded">
                <ul class="list-disc list-inside text-sm">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Formulario -->
        <form action="{{ route('citas.store') }}" method="POST" class="space-y-4">
            @csrf

            <!-- Selección de Adulto Mayor -->
            <div>
                <label class="block font-medium">Adulto Mayor</label>
                <select name="senior_id" class="w-full border rounded p-2" required>
                    <option value="">-- Seleccione un adulto mayor --</option>
                    @foreach($seniors as $senior)
                        <option value="{{ $senior->id }}" {{ old('senior_id') == $senior->id ? 'selected' : '' }}>
                            {{ $senior->nombre }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Título -->
            <div>
                <label class="block font-medium">Título</label>
                <input type="text" name="titulo" value="{{ old('titulo') }}"
                       class="w-full border rounded p-2" required>
            </div>

            <!-- Descripción -->
            <div>
                <label class="block font-medium">Descripción</label>
                <textarea name="descripcion" rows="3"
                          class="w-full border rounded p-2">{{ old('descripcion') }}</textarea>
            </div>

            <!-- Fecha y Hora -->
            <div>
                <label class="block font-medium">Fecha y hora</label>
                <input type="datetime-local" name="fecha_hora" value="{{ old('fecha_hora') }}"
                       class="w-full border rounded p-2" required>
            </div>

            <!-- Estado -->
            <div>
                <label class="block font-medium">Estado</label>
                <select name="estado" class="w-full border rounded p-2" required>
                    <option value="pendiente" {{ old('estado') == 'pendiente' ? 'selected' : '' }}>Pendiente</option>
                    <option value="completada" {{ old('estado') == 'completada' ? 'selected' : '' }}>Completada</option>
                    <option value="cancelada" {{ old('estado') == 'cancelada' ? 'selected' : '' }}>Cancelada</option>
                </select>
            </div>

            <!-- Botón Guardar -->
            <div class="pt-4 text-center">
                <button type="submit"
                        class="bg-red-600 hover:bg-red-700 text-white font-bold py-2 px-4 rounded-lg transition">
                    Guardar Cita
                </button>
            </div>
        </form>
    </div>
</x-app-layout>
