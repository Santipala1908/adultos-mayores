<x-guest-layout>
    <style>
        body {
            background: linear-gradient(120deg, #89f7fe, #66a6ff);
        }
        .card {
            animation: fadeIn 1s ease-in-out;
        }
        .btn-custom {
            background: linear-gradient(90deg, #36d1dc, #5b86e5);
            color: white;
        }
        .btn-custom:hover {
            background: linear-gradient(90deg, #5b86e5, #36d1dc);
            transform: scale(1.05);
            transition: all 0.3s ease;
        }
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: scale(0.95);
            }
            to {
                opacity: 1;
                transform: scale(1);
            }
        }
    </style>

    <div class="min-h-screen flex items-center justify-center px-4">
        <div class="w-full max-w-md bg-white bg-opacity-90 backdrop-blur-md rounded-3xl shadow-lg p-8 border card">
            <h2 class="text-3xl font-extrabold text-gray-900 mb-8 text-center">📝 Crear cuenta</h2>

            <form method="POST" action="{{ route('register') }}" novalidate>
                @csrf

                <div class="mb-6">
                    <x-input-label for="name" :value="__('Name')" />
                    <x-text-input id="name" class="w-full rounded-lg border px-4 py-3" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" placeholder="Tu nombre completo"/>
                    <x-input-error :messages="$errors->get('name')" class="mt-2 text-sm text-red-600" />
                </div>

                <div class="mb-6">
                    <x-input-label for="email" :value="__('Email')" />
                    <x-text-input id="email" class="w-full rounded-lg border px-4 py-3" type="email" name="email" :value="old('email')" required autocomplete="username" placeholder="tucorreo@ejemplo.com"/>
                    <x-input-error :messages="$errors->get('email')" class="mt-2 text-sm text-red-600" />
                </div>

                <div class="mb-6">
                    <x-input-label for="password" :value="__('Password')" />
                    <x-text-input id="password" class="w-full rounded-lg border px-4 py-3" type="password" name="password" required autocomplete="new-password" placeholder="********"/>
                    <x-input-error :messages="$errors->get('password')" class="mt-2 text-sm text-red-600" />
                </div>

                <div class="mb-8">
                    <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
                    <x-text-input id="password_confirmation" class="w-full rounded-lg border px-4 py-3" type="password" name="password_confirmation" required autocomplete="new-password" placeholder="********"/>
                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2 text-sm text-red-600" />
                </div>

                <div class="flex items-center justify-between">
                    <a href="{{ route('login') }}" class="text-sm text-indigo-600 hover:underline font-medium">
                        ¿Ya tienes cuenta?
                    </a>

                    <button type="submit" class="btn-custom px-6 py-3 rounded-lg shadow-lg">
                        Registrarse
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-guest-layout>
