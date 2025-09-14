<x-app-layout>
    <div class="max-w-5xl mx-auto py-6">
        <h1 class="text-2xl font-bold mb-4 text-center">Lista de Recordatorios</h1>

        <!-- Navegación -->
        <div class="flex justify-center space-x-4 mb-6">
            <a href="{{ route('seniors.index') }}"
               class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded-lg text-sm">Adultos Mayores</a>
            <a href="{{ route('notas-salud.index') }}"
               class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded-lg text-sm">Notas de Salud</a>
            <a href="{{ route('citas.index') }}"
               class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded-lg text-sm">Citas</a>
        </div>

        <!-- Botón para crear un nuevo recordatorio -->
        <div class="flex justify-center mb-4">
            <a href="{{ route('recordatorios.create') }}"
               class="bg-red-600 hover:bg-red-700 text-white font-bold py-2 px-4 rounded-lg transition">Nuevo Recordatorio</a>
        </div>

        @if(session('success'))
            <div class="mb-4 p-3 bg-green-100 text-green-800 rounded text-center">{{ session('success') }}</div>
        @endif

        <!-- Tabla -->
        <div class="bg-white shadow overflow-hidden sm:rounded-lg">
            <table class="w-full text-center divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3">Título</th>
                        <th class="px-6 py-3">Fecha y Hora</th>
                        <th class="px-6 py-3">Estado</th>
                        <th class="px-6 py-3">Adulto Mayor</th>
                        <th class="px-6 py-3">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($recordatorios as $recordatorio)
                        <tr>
                            <td class="px-6 py-4">{{ $recordatorio->titulo }}</td>
                            <td class="px-6 py-4">{{ $recordatorio->fecha_hora }}</td>
                            <td class="px-6 py-4 capitalize">{{ $recordatorio->estado }}</td>
                            <td class="px-6 py-4">{{ $recordatorio->senior->nombre ?? 'Sin asignar' }}</td>
                            <td class="px-6 py-4 space-x-2">
                                <a href="{{ route('recordatorios.show', $recordatorio->id) }}"
                                   class="bg-red-600 hover:bg-red-700 text-white font-bold py-1 px-3 rounded-lg transition">Ver</a>
                                <a href="{{ route('recordatorios.edit', $recordatorio->id) }}"
                                   class="bg-red-600 hover:bg-red-700 text-white font-bold py-1 px-3 rounded-lg transition">Editar</a>
                                <form action="{{ route('recordatorios.destroy', $recordatorio->id) }}" method="POST" class="inline-block">
                                    @csrf @method('DELETE')
                                    <button type="submit"
                                            class="bg-red-600 hover:bg-red-700 text-white font-bold py-1 px-3 rounded-lg transition"
                                            onclick="return confirm('¿Estás seguro de eliminar este recordatorio?')">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-6 py-4 text-center text-gray-500">No hay recordatorios registrados.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
