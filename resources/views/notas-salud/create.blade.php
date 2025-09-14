<x-app-layout>
    <div class="max-w-lg mx-auto py-6">
        <h1 class="text-2xl font-bold mb-4 text-center">Registrar Nota de Salud</h1>

        <!-- Mensajes de error -->
        @if ($errors->any())
            <div class="mb-4 p-3 bg-red-100 text-red-800 rounded">
                <ul class="list-disc pl-5">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('notas-salud.store') }}" method="POST" class="space-y-4 bg-white p-6 rounded shadow">
            @csrf

            <!-- Selección de Senior -->
            <div>
                <label class="block font-medium mb-1">Adulto Mayor</label>
                <select name="senior_id" class="w-full border rounded p-2" required>
                    <option value="">-- Selecciona un adulto mayor --</option>
                    @foreach ($seniors as $senior)
                        <option value="{{ $senior->id }}" {{ old('senior_id') == $senior->id ? 'selected' : '' }}>
                            {{ $senior->nombre }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Observación -->
            <div>
                <label class="block font-medium mb-1">Observación</label>
                <textarea name="observacion" rows="4"
                          class="w-full border rounded p-2"
                          required>{{ old('observacion') }}</textarea>
            </div>

            <!-- Fecha -->
            <div>
                <label class="block font-medium mb-1">Fecha de la Nota</label>
                <input type="date" name="fecha_nota" value="{{ old('fecha_nota') }}"
                       class="w-full border rounded p-2" required>
            </div>

            <!-- Botones -->
            <div class="flex justify-between">
                <a href="{{ route('notas-salud.index') }}"
                   class="bg-red-600 hover:bg-red-700 text-white px-3 py-1 rounded-lg text-sm">
                    Cancelar
                </a>
                <button type="submit"
                        class="bg-red-600 hover:bg-red-700 text-white px-3 py-1 rounded-lg text-sm">
                    Guardar
                </button>
            </div>
        </form>
    </div>
</x-app-layout>