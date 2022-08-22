<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">

                <img viewBox="0 0 316 316" class="w-30 h-23 fill-current text-gray-500" src="img/logo3.png" width="250"
                    height="250">
            </a>
        </x-slot>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email Address -->
            <div>
                <x-label for="email" :value="__('Email')" />

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                    required autofocus />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('Senha')" />

                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required
                    autocomplete="current-password" />
            </div>


            <!-- Remember Me -->
            <div class="block mt-4 b-5 ">
                <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me" type="checkbox"
                        class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                        name="remember">
                    <span class="ml-2 text-sm text-gray-600">{{ __('Lembrar') }}</span>
                </label>
            </div>
            <!-- Login social -->
            <div class="row">
                <div class="col-lg-6 col-md-6 col-xs-12 col-sm-6 ml-20">
                    <a class="btn btn-outline-dark" href="{{ route('facebook-auth') }}" role="button"
                        style="text-transform:none">
                        <img width="20px" style="margin-bottom:3px; margin-right:5px" alt="Google sign-in"
                            src="https://upload.wikimedia.org/wikipedia/commons/thumb/5/51/Facebook_f_logo_%282019%29.svg/640px-Facebook_f_logo_%282019%29.svg.png" />
                        Login com Facebook
                    </a>
                </div>
                <div class="col-md-3">
                    <a class="btn btn-outline-dark" href="{{ route('google-auth') }}" role="button"
                        style="text-transform:none">
                        <img width="20px" style="margin-bottom:3px; margin-right:5px" alt="Google sign-in"
                            src="https://upload.wikimedia.org/wikipedia/commons/thumb/5/53/Google_%22G%22_Logo.svg/512px-Google_%22G%22_Logo.svg.png" />
                        Login com Google
                    </a>
                </div>
            </div>
            <div class="flex items-center justify-center mt-4">
                <x-button class="ml-6">
                    {{ __('Entrar') }}
                </x-button>
            </div>

            <!-- Minified CSS and JS -->
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
                integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
                crossorigin="anonymous">
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
                integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
            </script>

            <div class="flex items-left mt-4 justify-center">
                <div class="flex items-center justify-left mt-4">
                    @if (Route::has('password.request'))
                        <a class="underline text-sm text-gray-600 hover:text-gray-900"
                            href="{{ route('password.request') }}">
                            {{ __('Esqueci minha senha!  ') }}
                        </a>
                    @endif
                </div>

                <div class="flex items-center justify-right mt-4">
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}"
                            class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Criar conta! </a>
                    @endif
                </div>


            </div>

        </form>
    </x-auth-card>
</x-guest-layout>
