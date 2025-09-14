<x-app-layout>
    <div class="max-w-7xl mx-auto py-12 px-6">
        <h1 class="text-3xl font-bold text-center mb-10">Panel Principal</h1>

        <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
            <!-- Card Adultos Mayores -->
            <a href="{{ route('seniors.index') }}"
               class="block bg-white shadow-lg rounded-xl p-6 text-center hover:shadow-2xl transition">
                <div class="text-red-600 text-5xl mb-4">👴</div>
                <h2 class="text-xl font-bold mb-2">Adultos Mayores</h2>
                <p class="text-gray-600">Gestiona la información de los adultos mayores.</p>
            </a>

            <!-- Card Recordatorios -->
            <a href="{{ route('recordatorios.index') }}"
               class="block bg-white shadow-lg rounded-xl p-6 text-center hover:shadow-2xl transition">
                <div class="text-blue-600 text-5xl mb-4">⏰</div>
                <h2 class="text-xl font-bold mb-2">Recordatorios</h2>
                <p class="text-gray-600">Administra los recordatorios de cada adulto mayor.</p>
            </a>

            <!-- Card Notas de Salud -->
            <a href="{{ route('notas-salud.index') }}"
               class="block bg-white shadow-lg rounded-xl p-6 text-center hover:shadow-2xl transition">
                <div class="text-green-600 text-5xl mb-4">🩺</div>
                <h2 class="text-xl font-bold mb-2">Notas de Salud</h2>
                <p class="text-gray-600">Lleva un registro de las notas de salud.</p>
            </a>

            <!-- Card Citas -->
            <a href="{{ route('citas.index') }}"
               class="block bg-white shadow-lg rounded-xl p-6 text-center hover:shadow-2xl transition">
                <div class="text-purple-600 text-5xl mb-4">📅</div>
                <h2 class="text-xl font-bold mb-2">Citas</h2>
                <p class="text-gray-600">Gestiona las citas programadas para los adultos mayores.</p>
            </a>
        </div>
    </div>
</x-app-layout>
