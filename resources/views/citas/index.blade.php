<x-app-layout>
    <div class="max-w-5xl mx-auto py-6">
        <h1 class="text-2xl font-bold mb-4 text-center">Lista de Citas</h1>

        <!-- Navegación -->
        <div class="flex justify-center space-x-4 mb-6">
            <a href="{{ route('seniors.index') }}"
               class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded-lg text-sm">Adultos Mayores</a>
            <a href="{{ route('recordatorios.index') }}"
               class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded-lg text-sm">Recordatorios</a>
            <a href="{{ route('notas-salud.index') }}"
               class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded-lg text-sm">Notas de Salud</a>
        </div>

        <div class="flex justify-center mb-4">
            <a href="{{ route('citas.create') }}"
               class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded-lg">Nueva Cita</a>
        </div>

        @if(session('success'))
            <div class="mb-4 p-3 bg-green-100 text-green-800 rounded text-center">{{ session('success') }}</div>
        @endif

        <div class="bg-white shadow overflow-hidden sm:rounded-lg">
            <table class="w-full text-center divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3">Título</th>
                        <th class="px-6 py-3">Fecha y Hora</th>
                        <th class="px-6 py-3">Adulto Mayor</th>
                        <th class="px-6 py-3">Estado</th>
                        <th class="px-6 py-3">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($citas as $cita)
                        <tr>
                            <td class="px-6 py-4">{{ $cita->titulo }}</td>
                            <td class="px-6 py-4">{{ $cita->fecha_hora }}</td>
                            <td class="px-6 py-4">{{ $cita->senior->nombre }}</td>
                            <td class="px-6 py-4 capitalize">{{ $cita->estado }}</td>
                            <td class="px-6 py-4 space-x-2">
                                <a href="{{ route('citas.show', $cita->id) }}"
                                   class="bg-red-600 hover:bg-red-700 text-white px-3 py-1 rounded-lg text-sm">Ver</a>
                                <a href="{{ route('citas.edit', $cita->id) }}"
                                   class="bg-red-600 hover:bg-red-700 text-white px-3 py-1 rounded-lg text-sm">Editar</a>
                                <form action="{{ route('citas.destroy', $cita->id) }}" method="POST" class="inline">
                                    @csrf @method('DELETE')
                                    <button type="submit"
                                            onclick="return confirm('¿Eliminar esta cita?')"
                                            class="bg-red-600 hover:bg-red-700 text-white px-3 py-1 rounded-lg text-sm">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-6 py-4 text-center text-gray-500">No hay citas registradas.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
