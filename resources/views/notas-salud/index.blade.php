<x-app-layout>
    <div class="max-w-6xl mx-auto py-6">
        <h1 class="text-2xl font-bold mb-4 text-center">Lista de Notas de Salud</h1>

        <!-- Navegación -->
        <div class="flex justify-center space-x-4 mb-6">
            <a href="{{ route('seniors.index') }}"
               class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded-lg text-sm">Adultos Mayores</a>
            <a href="{{ route('recordatorios.index') }}"
               class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded-lg text-sm">Recordatorios</a>
            <a href="{{ route('citas.index') }}"
               class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded-lg text-sm">Citas</a>
        </div>

        <div class="flex justify-center mb-4">
            <a href="{{ route('notas-salud.create') }}"
               class="bg-red-600 hover:bg-red-700 text-white px-3 py-1 rounded-lg text-sm">Nueva Nota</a>
        </div>

        @if(session('success'))
            <div class="mb-4 p-3 bg-green-100 text-green-800 rounded text-center">{{ session('success') }}</div>
        @endif

        <div class="flex justify-center">
            <div class="bg-white shadow overflow-hidden sm:rounded-lg w-full max-w-5xl">
                <table class="w-full text-center divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3">Fecha</th>
                            <th class="px-6 py-3">Adulto Mayor</th>
                            <th class="px-6 py-3">Observación</th>
                            <th class="px-6 py-3">Registrado Por</th>
                            <th class="px-6 py-3">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($notas as $nota)
                            <tr>
                                <td class="px-6 py-4">{{ $nota->fecha_nota }}</td>
                                <td class="px-6 py-4">{{ $nota->senior->nombre ?? 'Sin asignar' }}</td>
                                <td class="px-6 py-4">{{ Str::limit($nota->observacion, 40) }}</td>
                                <td class="px-6 py-4">{{ $nota->registradoPor->name ?? 'N/A' }}</td>
                                <td class="px-6 py-4 space-x-2">
                                    <a href="{{ route('notas-salud.show', $nota->id) }}"
                                       class="bg-red-600 hover:bg-red-700 text-white px-3 py-1 rounded-lg text-sm">Ver</a>
                                    <a href="{{ route('notas-salud.edit', $nota->id) }}"
                                       class="bg-red-600 hover:bg-red-700 text-white px-3 py-1 rounded-lg text-sm">Editar</a>
                                    <form action="{{ route('notas-salud.destroy', $nota->id) }}" method="POST" class="inline-block">
                                        @csrf @method('DELETE')
                                        <button type="submit"
                                                onclick="return confirm('¿Eliminar esta nota?')"
                                                class="bg-red-600 hover:bg-red-700 text-white px-3 py-1 rounded-lg text-sm">Eliminar</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="px-6 py-4 text-center text-gray-500">No hay notas de salud registradas.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
