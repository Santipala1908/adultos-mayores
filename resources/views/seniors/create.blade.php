<x-app-layout>
    <div class="max-w-lg mx-auto py-6">
        <h1 class="text-2xl font-bold mb-4">Registrar Adulto Mayor</h1>

        <form action="{{ route('seniors.store') }}" method="POST" class="space-y-4">
            @csrf

            <div>
                <label class="block font-medium">Nombre</label>
                <input type="text" name="nombre" value="{{ old('nombre') }}"
                       class="w-full border rounded p-2" required>
            </div>

            <div>
                <label class="block font-medium">Edad</label>
                <input type="number" name="edad" value="{{ old('edad') }}"
                       class="w-full border rounded p-2" required>
            </div>

            <div>
                <label class="block font-medium">Dirección</label>
                <input type="text" name="direccion" value="{{ old('direccion') }}"
                       class="w-full border rounded p-2">
            </div>

            <div>
                <label class="block font-medium">Teléfono</label>
                <input type="text" name="telefono" value="{{ old('telefono') }}"
                       class="w-full border rounded p-2">
            </div>

            <div>
                <label class="block font-medium">Estado de salud</label>
                <input type="text" name="estado_salud" value="{{ old('estado_salud') }}"
                       class="w-full border rounded p-2">
            </div>

            <!-- Botón mejorado -->
            <div class="pt-4">
                <button type="submit"
                        class="bg-red-600 hover:bg-red-700 text-white px-3 py-1 rounded-lg text-sm">
                    Guardar
                </button>
            </div>
        </form>
    </div>
</x-app-layout>
