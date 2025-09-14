<x-app-layout>
    <div class="max-w-lg mx-auto py-6">
        <h1 class="text-2xl font-bold mb-4 text-center">Editar Nota de Salud</h1>

        <!-- Mensajes de error -->
        @if ($errors->any())
            <div class="mb-4 p-3 bg-red-100 text-red-800 rounded">
                <ul class="list-disc pl-5">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('notas-salud.update', $nota->id) }}" method="POST" class="space-y-4 bg-white p-6 rounded shadow">
            @csrf
            @method('PUT')

            <!-- Selección de Senior -->
            <div>
                <label class="block font-medium mb-1">Adulto Mayor</label>
                <select name="senior_id" class="w-full border rounded p-2" required>
                    @foreach ($seniors as $senior)
                        <option value="{{ $senior->id }}" {{ $nota->senior_id == $senior->id ? 'selected' : '' }}>
                            {{ $senior->nombre }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Observación -->
            <div>
                <label class="block font-medium mb-1">Observación</label>
                <textarea name="observacion" rows="4"
                          class="w-full border rounded p-2"
                          required>{{ old('observacion', $nota->observacion) }}</textarea>
            </div>

            <!-- Fecha -->
            <div>
                <label class="block font-medium mb-1">Fecha de la Nota</label>
                <input type="date" name="fecha_nota" value="{{ old('fecha_nota', $nota->fecha_nota) }}"
                       class="w-full border rounded p-2" required>
            </div>

            <!-- Botones -->
            <div class="flex justify-between">
                <a href="{{ route('notas-salud.index') }}"
                   class="bg-gray-600 hover:bg-gray-700 text-white px-4 py-2 rounded-lg">
                    Cancelar
                </a>
                <button type="submit"
                        class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg">
                    Actualizar
                </button>
            </div>
        </form>
    </div>
</x-app-layout>