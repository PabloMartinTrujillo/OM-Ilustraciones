<head><link rel="stylesheet" href="{{asset("../../css/app.css")}}"></head>
<div id="login-container">
        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />
        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <div id="login-form-container">
            <div id="login-main-btn">{{-- Meter logo que lleva al inicio --}}</div>
            <form method="POST" action="{{ route('login') }}" class="login-form">
                @csrf

                <!-- Email Address -->
                <div id="login-items">
                    <div id="login-datos">
                        <div class="login-item">
                            <x-label for="email">@lang("app.etq_emailUsu")</x-label>
                            <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
                        </div>
        
                        <!-- Password -->
                        <div class="login-item">
                            <x-label for="password">@lang("app.etq_contraUsu")</x-label>
                            <x-input id="password" class="block mt-1 w-full"
                                            type="password"
                                            name="password"
                                            required autocomplete="current-password" />
                        </div>
                    </div>
    
                    {{-- <!-- Remember Me -->
                    <div class="block mt-4">
                        <label for="remember_me" class="inline-flex items-center">
                            <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="remember">
                            <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                        </label>
                    </div> --}}
    
                    <div id="login-btns" class="flex items-center justify-end mt-4">
                        {{-- @if (Route::has('password.request'))
                            <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                                {{ __('Forgot your password?') }}
                            </a>
                        @endif --}}
                        <a id="btn-registrar" href="{{route("register")}}"><b>@lang("app.etq_registrarse")</b></a>
                        <x-button id="btn-iniciarSesion">
                            @lang("app.etq_iniciarSesion")
                        </x-button>
                    </div>
                </div>
                
            </form>
        </div>

        <div id="login-img-container">
            <img id="imgLogin" src="{{asset("/img/imgLogin.jpg")}}" draggable="false"/>
        </div>
</div>
