<x-app-layout>
    <div class="max-w-lg mx-auto py-6">
        <h1 class="text-2xl font-bold mb-4">Detalle del Adulto Mayor</h1>

        <div class="bg-white p-4 rounded shadow">
            <p><strong>Nombre:</strong> {{ $senior->nombre }}</p>
            <p><strong>Edad:</strong> {{ $senior->edad }}</p>
            <p><strong>Dirección:</strong> {{ $senior->direccion }}</p>
            <p><strong>Teléfono:</strong> {{ $senior->telefono }}</p>
            <p><strong>Estado de salud:</strong> {{ $senior->estado_salud }}</p>
        </div>

        <div class="mt-4 flex space-x-2">
            <!-- Botón Editar en morado -->
            <a href="{{ route('seniors.edit', $senior) }}"
               class="bg-red-600 hover:bg-red-700 text-white px-3 py-1 rounded-lg text-sm">
               Editar
            </a>

            <!-- Botón Volver en cian -->
            <a href="{{ route('seniors.index') }}"
               class="bg-red-600 hover:bg-red-700 text-white px-3 py-1 rounded-lg text-sm">
               Volver
            </a>
        </div>
    </div>
</x-app-layout>
