<link href="{{ asset('css/register.css') }}" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

<x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <img src="{{ asset('storage/imagenesApp/logo.png') }}" width="100px" height="100px" alt="Mi Logo" />
        </x-slot>

        <x-validation-errors class="mb-4" />
    
        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Campo de Nombre -->
            <div class="campoRegistro">
                <div class="divCampo">
                    <i class="bi bi-person"></i>
                    <div class="input-container">
                        <x-label for="name" value="{{ __('Nombre') }}" />
                        <x-input id="name" class="campoText" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                    </div>
                </div>
            </div>

            <!-- Campo de Email -->
            <div class="campoRegistro">
                <div class="divCampo">
                    <i class="bi bi-envelope"></i> <!-- Icono de email -->
                    <div class="input-container">
                        <x-label for="email" value="{{ __('Email') }}" />
                        <x-input id="email" class="campoText" type="email" name="email" :value="old('email')" required autocomplete="username" />
                    </div>
                </div>
            </div>

            <!-- Campo de Contraseña -->
            <div class="campoRegistro">
                <div class="divCampo">
                    <i class="bi bi-lock"></i> <!-- Icono de contraseña -->
                    <div class="input-container">
                        <x-label for="password" value="{{ __('Contraseña') }}" />
                        <x-input id="password" class="campoText" type="password" name="password" required autocomplete="new-password" />
                    </div>
                </div>
            </div>

            <!-- Campo de Confirmación de Contraseña -->
            <div class="campoRegistro">
                <div class="divCampo">
                    <i class="bi bi-lock"></i> <!-- Icono de contraseña -->
                    <div class="input-container">
                        <x-label for="password_confirmation" value="{{ __('Confirmar Contraseña') }}" />
                        <x-input id="password_confirmation" class="campoText" type="password" name="password_confirmation" required autocomplete="new-password" />
                    </div>
                </div>
            </div>

            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                <div class="mt-4">
                    <x-label for="terms">
                        <div class="flex items-center">
                            <x-checkbox name="terms" id="terms" required />
                            <div class="ms-2">
                                {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                        'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">'.__('Terms of Service').'</a>',
                                        'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">'.__('Privacy Policy').'</a>',
                                ]) !!}
                            </div>
                        </div>
                    </x-label>
                </div>
            @endif

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                    {{ __('¿Ya registrado?') }}
                </a>

                <x-button class="ms-4">
                    {{ __('Registrarme') }}
                </x-button>
            </div>
        </form>
    </x-authentication-card>
</x-guest-layout>
