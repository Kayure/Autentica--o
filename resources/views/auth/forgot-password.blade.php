<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">

                <img viewBox="0 0 316 316" class="w-30 h-23 fill-current text-gray-500" src="img/logo3.png" width="250"
                    height="250">
            </a>
        </x-slot>

        <div class="mb-4 text-sm text-gray-600">
            {{ __('Esqueceu sua senha? Sem problemas. Digite seu e-mail e enviaremos um link para que possa criar uma nova senha 😀 .') }}
        </div>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <!-- Email Address -->
            <div>
                <x-label for="email" :value="__('Email')" />

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-button>
                    {{ __('ENVIAR LINK PARA REDEFINIR SENHA') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
