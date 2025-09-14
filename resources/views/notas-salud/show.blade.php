<x-app-layout>
    <div class="max-w-lg mx-auto py-6">
        <h1 class="text-2xl font-bold mb-4 text-center">Detalle de la Nota de Salud</h1>

        <div class="bg-white p-6 rounded shadow space-y-3">
            <p><strong>Fecha:</strong> {{ $nota->fecha_nota }}</p>
            <p><strong>Adulto Mayor:</strong> {{ $nota->senior->nombre ?? 'Sin asignar' }}</p>
            <p><strong>Observación:</strong> {{ $nota->observacion }}</p>
            <p><strong>Registrado por:</strong> {{ $nota->registradoPor->name ?? 'N/A' }}</p>
        </div>

        <div class="mt-4 flex justify-between">
            <a href="{{ route('notas-salud.index') }}"
               class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded-lg text-sm">
                Volver
            </a>
            <a href="{{ route('notas-salud.edit', $nota->id) }}"
               class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded-lg text-sm">
                Editar
            </a>
        </div>
    </div>
</x-app-layout>