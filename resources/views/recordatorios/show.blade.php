<x-app-layout>
    <div class="max-w-lg mx-auto py-6">
        <h1 class="text-2xl font-bold mb-4">Detalles del Recordatorio</h1>

        <div class="bg-white shadow rounded-lg p-6 space-y-4">
            <div>
                <h2 class="font-medium text-gray-700">Título:</h2>
                <p class="text-gray-900">{{ $recordatorio->titulo }}</p>
            </div>

            <div>
                <h2 class="font-medium text-gray-700">Descripción:</h2>
                <p class="text-gray-900">{{ $recordatorio->descripcion ?? 'Sin descripción' }}</p>
            </div>

            <div>
                <h2 class="font-medium text-gray-700">Fecha y hora:</h2>
                <p class="text-gray-900">{{ \Carbon\Carbon::parse($recordatorio->fecha_hora)->format('d/m/Y H:i') }}</p>
            </div>

            <div>
                <h2 class="font-medium text-gray-700">Estado:</h2>
                <p class="text-gray-900 capitalize">{{ $recordatorio->estado }}</p>
            </div>

            <div class="pt-4 flex space-x-2">
                <a href="{{ route('recordatorios.edit', $recordatorio->id) }}"
                   class="bg-red-600 hover:bg-red-700 text-white font-bold py-1 px-3 rounded-lg transition">
                   Editar
                </a>

                <form action="{{ route('recordatorios.destroy', $recordatorio->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit"
                            class="bg-red-600 hover:bg-red-700 text-white font-bold py-2 px-4 rounded-lg transition"
                            onclick="return confirm('¿Estás seguro de eliminar este recordatorio?')">
                        Eliminar
                    </button>
                </form>

                <a href="{{ route('recordatorios.index') }}"
                   class="bg-red-600 hover:bg-red-700 text-white font-bold py-1 px-3 rounded-lg transition">
                   Volver
                </a>
            </div>
        </div>
    </div>
</x-app-layout>