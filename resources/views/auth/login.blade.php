<x-guest-layout> 
    <style>
        body {
            background: linear-gradient(135deg, #667eea, #764ba2);
        }
        .card {
            animation: fadeInUp 0.8s ease-in-out;
        }
        .btn-custom {
            background: linear-gradient(90deg, #ff416c, #ff4b2b);
            color: white;
        }
        .btn-custom:hover {
            background: linear-gradient(90deg, #ff4b2b, #ff416c);
            transform: scale(1.05);
            transition: all 0.3s ease;
        }
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>

    <div class="min-h-screen flex items-center justify-center px-4">
        <div class="w-full max-w-md p-8 bg-white bg-opacity-90 rounded-3xl shadow-xl card">
            <x-auth-session-status class="mb-6" :status="session('status')" />

            <h2 class="text-3xl font-extrabold text-gray-900 mb-8 text-center">🔐 Iniciar sesión</h2>

            <form method="POST" action="{{ route('login') }}" novalidate>
                @csrf

                <div class="mb-6">
                    <x-input-label for="email" :value="__('Email')" />
                    <x-text-input id="email" class="w-full rounded-lg border px-4 py-3" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" placeholder="tucorreo@ejemplo.com"/>
                    <x-input-error :messages="$errors->get('email')" class="mt-2 text-sm text-red-600" />
                </div>

                <div class="mb-6">
                    <x-input-label for="password" :value="__('Password')" />
                    <x-text-input id="password" class="w-full rounded-lg border px-4 py-3" type="password" name="password" required autocomplete="current-password" placeholder="********"/>
                    <x-input-error :messages="$errors->get('password')" class="mt-2 text-sm text-red-600" />
                </div>

                <div class="flex items-center mb-8">
                    <input id="remember_me" name="remember" type="checkbox" class="h-5 w-5 text-indigo-600 border-gray-300 rounded"/>
                    <label for="remember_me" class="ml-3 text-sm text-gray-800 cursor-pointer">Recordarme</label>
                </div>

                <div class="flex items-center justify-between">
                    @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}" class="text-sm font-medium text-indigo-700 hover:underline">
                            ¿Olvidaste tu contraseña?
                        </a>
                    @endif

                    <button type="submit" class="btn-custom px-8 py-3 rounded-lg shadow-lg">
                        Ingresar
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-guest-layout>
