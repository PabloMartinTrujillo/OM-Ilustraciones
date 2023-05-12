<x-guest-layout>
    <div id="login-container">
        {{-- <div id="login-main-btn">Meter logo que lleva al inicio</div> --}}
        <div id="login-form-container">
            <form method="POST" action="{{ route('register') }}">
                @csrf

                @php
                    $fecha = Carbon\Carbon::now()->toDateTimeString();
                    $fecha = Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $fecha)->format('d/m/Y H:i:s');
                @endphp
                
                <input type="hidden" value="{{ $fecha }}" name="fechaCreacionUsu">

                <div class="register-datos">
                    <!-- Name -->
                    <div class="login-item">
                        <x-label for="nomUsu" :value="__('Name')" />
                        <x-input id="nomUsu" class="block mt-1 w-full" type="text" name="nomUsu" :value="old('name')" required autofocus />
                    </div>

                    <!-- Email Address -->
                    <div class="login-item">
                        <x-label for="email" :value="__('Email')" />
                        <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
                    </div>

                    <!-- Password -->
                    <div class="login-item">
                        <x-label for="password" :value="__('Password')" />
                        <x-input id="password" class="block mt-1 w-full"
                                        type="password"
                                        name="password"
                                        required autocomplete="new-password" />
                    </div>

                    <!-- Confirm Password -->
                    <div class="login-item">
                        <x-label for="password_confirmation" :value="__('Confirm Password')" />
                        <x-input id="password_confirmation" class="block mt-1 w-full"
                                        type="password"
                                        name="password_confirmation" required />
                    </div>
                </div>

                <div id="register-btns" class="register-datos">
                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                        @lang("app.etq_yaRegistrado")
                    </a>
                    <x-button class="ml-4">
                        <b>@lang("app.etq_registrarse")</b>
                    </x-button>
                </div>
            </form>
        </div>
        <div id="login-img-container">
            <img class="imgLogin" src="{{asset("/img/imgLogin.jpg")}}" draggable="false"/>
        </div>
    </div>
</x-guest-layout>
