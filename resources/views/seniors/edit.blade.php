<x-app-layout>
    <div class="max-w-lg mx-auto py-6">
        <h1 class="text-2xl font-bold mb-4">Editar Adulto Mayor</h1>

        <form action="{{ route('seniors.update', $senior) }}" method="POST" class="space-y-4">
            @csrf
            @method('PUT')

            <div>
                <label class="block font-medium">Nombre</label>
                <input type="text" name="nombre" value="{{ old('nombre', $senior->nombre) }}"
                       class="w-full border rounded p-2" required>
            </div>

            <div>
                <label class="block font-medium">Edad</label>
                <input type="number" name="edad" value="{{ old('edad', $senior->edad) }}"
                       class="w-full border rounded p-2" required>
            </div>

            <div>
                <label class="block font-medium">Dirección</label>
                <input type="text" name="direccion" value="{{ old('direccion', $senior->direccion) }}"
                       class="w-full border rounded p-2">
            </div>

            <div>
                <label class="block font-medium">Teléfono</label>
                <input type="text" name="telefono" value="{{ old('telefono', $senior->telefono) }}"
                       class="w-full border rounded p-2">
            </div>

            <div>
                <label class="block font-medium">Estado de salud</label>
                <input type="text" name="estado_salud" value="{{ old('estado_salud', $senior->estado_salud) }}"
                       class="w-full border rounded p-2">
            </div>

            <div class="pt-4 flex space-x-2">
                <!-- Botón Actualizar -->
                <button type="submit"
                        class="bg-red-600 hover:bg-red-700 text-white px-3 py-1 rounded-lg text-sm">
                    Actualizar
                </button>

                <!-- Botón Cancelar -->
                <a href="{{ route('seniors.index') }}"
                   class="bg-red-600 hover:bg-red-700 text-white px-3 py-1 rounded-lg text-sm">
                    Cancelar
                </a>
            </div>
        </form>
    </div>
</x-app-layout>