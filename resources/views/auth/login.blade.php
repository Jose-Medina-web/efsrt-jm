<x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <x-authentication-card-logo />
        </x-slot>

        <x-validation-errors class="mb-4" />

        @session('status')
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ $value }}
            </div>
        @endsession

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <h1 style="color: #143967; font-size: 30px; text-align:center" class="mb-10 mt-7"><b>INICIAR SESIÓN</b></h1>
            <div>
                <x-label style="color: #143967;" for="email" value="{{ __('Email') }}" />
                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            </div>

            <div class="mt-4">
                <x-label style="color: #143967;" for="password" value="{{ __('Constraseña') }}" />
                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
            </div>

            {{-- <div class="block mt-4">
                <label for="remember_me" class="flex items-center">
                    <x-checkbox id="remember_me" name="remember" />
                    <span class="ms-2 text-sm text-gray-600" style="color: #143967;">{{ __('Ver Contraseña') }}</span>
                </label>
            </div> --}}

            <label for="mostrar" class="flex items-center">
                <input class="form-check mt-2" style="border-radius: 3px" type="checkbox" id="mostrar" name="mostrar" onclick="MostrarContraseña()" />
                <span class="ms-2 text-sm text-gray-600 mt-2" style="color: #143967;">Ver Contraseña</span>
            </label>
            

            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" style="color: #143967;" href="{{ route('password.request') }}">
                        {{ __('¿Olvidaste tu contraseña?') }}
                    </a>
                @endif

                <x-button class="ms-4" style="background-color: #143967">
                    {{ __('Iniciar') }}
                </x-button>
            </div>
        </form>
    </x-authentication-card>
</x-guest-layout>

<script>
    function MostrarContraseña() {
        const passwordInput = document.getElementById('password');
        const checkbox = document.getElementById('mostrar');

        // Cambiar el tipo del input según el estado del checkbox
        if (checkbox.checked) {
            passwordInput.type = 'text'; // Mostrar la contraseña
        } else {
            passwordInput.type = 'password'; // Ocultar la contraseña
        }
    }
</script>
