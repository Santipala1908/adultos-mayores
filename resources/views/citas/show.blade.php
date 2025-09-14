<x-app-layout>
    <div class="max-w-lg mx-auto py-6">
        <h1 class="text-2xl font-bold mb-4 text-center">Detalle de la Cita</h1>

        <!-- Contenedor principal -->
        <div class="bg-white p-6 rounded-lg shadow-md text-center">
            <p><strong>Adulto Mayor:</strong> {{ $cita->senior->nombre ?? 'Sin asignar' }}</p>
            <p><strong>Título:</strong> {{ $cita->titulo }}</p>
            <p><strong>Descripción:</strong> {{ $cita->descripcion ?? 'Sin descripción' }}</p>
            <p><strong>Fecha y Hora:</strong> {{ $cita->fecha_hora }}</p>
            <p><strong>Estado:</strong> 
                <span class="capitalize">{{ $cita->estado }}</span>
            </p>
            <p><strong>Registrado por:</strong> {{ $cita->registradoPor->name ?? 'N/A' }}</p>
        </div>

        <!-- Botones de acciones -->
        <div class="mt-6 flex justify-center space-x-4">
            <a href="{{ route('citas.edit', $cita->id) }}"
               class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg text-sm">
                Editar
            </a>

            <form action="{{ route('citas.destroy', $cita->id) }}" method="POST" onsubmit="return confirm('¿Seguro deseas eliminar esta cita?')">
                @csrf
                @method('DELETE')
                <button type="submit"
                        class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded-lg text-sm">
                    Eliminar
                </button>
            </form>

            <a href="{{ route('citas.index') }}"
               class="bg-gray-600 hover:bg-gray-700 text-white px-4 py-2 rounded-lg text-sm">
                Volver
            </a>
        </div>
    </div>
</x-app-layout>
