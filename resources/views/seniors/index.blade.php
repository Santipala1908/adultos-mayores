<x-app-layout>
    <div class="flex items-center justify-center min-h-screen">
        <div class="w-full max-w-5xl bg-white p-6 rounded-lg shadow-lg text-center">
            <h1 class="text-2xl font-bold mb-4">Adultos Mayores</h1>

            <!-- Navegación -->
            <div class="flex justify-center space-x-4 mb-6">
                <a href="{{ route('recordatorios.index') }}"
                   class="bg-red-600 hover:bg-red-700 text-white px-3 py-1 rounded-lg text-sm">Recordatorios</a>
                <a href="{{ route('notas-salud.index') }}"
                   class="bg-red-600 hover:bg-red-700 text-white px-3 py-1 rounded-lg text-sm">Notas de Salud</a>
                <a href="{{ route('citas.index') }}"
                   class="bg-red-600 hover:bg-red-700 text-white px-3 py-1 rounded-lg text-sm">Citas</a>
            </div>

            <!-- Botón para crear un nuevo registro -->
            <div class="flex justify-center mb-4">
                <a href="{{ route('seniors.create') }}"
                   class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded-lg text-sm">
                    Nuevo
                </a>
            </div>

            <!-- Mensaje de éxito -->
            @if(session('success'))
                <div class="mt-4 p-3 bg-green-100 text-green-800 rounded">
                    {{ session('success') }}
                </div>
            @endif

            <!-- Tabla de registros -->
            <div class="overflow-x-auto">
                <table class="w-full mt-6 border border-gray-300 text-center">
                    <thead>
                        <tr class="bg-gray-200">
                            <th class="px-4 py-2 border">Nombre</th>
                            <th class="px-4 py-2 border">Edad</th>
                            <th class="px-4 py-2 border">Teléfono</th>
                            <th class="px-4 py-2 border">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($seniors as $senior)
                        <tr class="border-t hover:bg-gray-50">
                            <td class="px-4 py-2 border">{{ $senior->nombre }}</td>
                            <td class="px-4 py-2 border">{{ $senior->edad }}</td>
                            <td class="px-4 py-2 border">{{ $senior->telefono }}</td>
                            <td class="px-4 py-2 border space-x-2">
                                <a href="{{ route('seniors.show', $senior) }}"
                                   class="bg-red-600 hover:bg-red-700 text-white px-3 py-1 rounded-lg text-sm">Ver</a>
                                <a href="{{ route('seniors.edit', $senior) }}"
                                   class="bg-red-600 hover:bg-red-700 text-white px-3 py-1 rounded-lg text-sm">Editar</a>
                                <form action="{{ route('seniors.destroy', $senior) }}" method="POST" class="inline">
                                    @csrf @method('DELETE')
                                    <button type="submit"
                                            onclick="return confirm('¿Eliminar este registro?')"
                                            class="bg-red-600 hover:bg-red-700 text-white px-3 py-1 rounded-lg text-sm">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="4" class="py-4 text-gray-500">No hay adultos mayores registrados.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
