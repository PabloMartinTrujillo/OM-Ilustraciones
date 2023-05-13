<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Olgamartínt') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        {{-- Styles --}}
        <link rel="stylesheet" href="{{ asset('/css/app.css') }}">

        <!-- Scripts -->
            {{-- @vite(['resources/css/app.css', 'resources/js/app.js']) --}}
        <script src="{{ asset('js/app.js') }}" defer></script>
        @yield("js")
    </head>
    
    <body class="font-sans antialiased">
        {{-- <div class="min-h-screen bg-gray-100"> --}}
            {{-- @include('layouts.navigation') --}}

            <!-- Page Heading -->
            
                <div id="nav">
                    {{-- <form action="{{ route("main") }}" method="post">
                        @csrf
                        <button class="btn-enlace" type="submit">@lang("app.btn_inicio")</button>
                    </form>
                    <form action="{{ route("encargo.listar") }}" method="post">
                        @csrf
                        <button class="btn-enlace" type="submit">@lang("app.btn_encargos")</button>
                    </form> --}}
                    <a class="enlaceNav" href="{{route("main")}}">@lang("app.btn_inicio")</a>
                    <a class="enlaceNav" href="{{-- {{route("encargo.listar")}} --}}">@lang("app.btn_encargos")</a>

                    @if(Auth::check())
                        {{-- <form action="{{ route("usuario.listar") }}" method="post">
                            @csrf
                            <button class="btn-enlace" type="submit">
                                @if(Auth::user()->tipoUsu == "cliente") @lang("app.btn_perfil")
                                @else @lang("app.admin_usuarios")
                                @endif
                            </button>
                        </form> --}}
                        <a class="enlaceNav" href="{{-- {{route("")}} --}}">
                            @if(Auth::user()->tipoUsu == "cliente") @lang("app.btn_perfil")
                                @else @lang("app.admin_usuarios")
                                @endif
                        </a>

                        {{-- <form action="{{route("galeria.mostrar")}}" method="post">
                            @csrf
                            <button class="btn-enlace" type="submit">@lang("app.btn_galeria")</button>
                        </form> --}}
                        <a class="enlaceNav" href="{{route("galeria.mostrar")}}">@lang("app.btn_galeria")</a>
                        
                        <div class="divSaludoLogOut">
                            <div class="self-center mr-4">@lang("app.saludo"){{ Auth::user()->nomUsu }}</div>
                            <div class="self-center mr-4">
                                <form action="{{ route("logout") }}" method="post">
                                    @csrf
                                    <button class="btn-salir">@lang("app.btn_salir")</button>
                                </form>
                            </div>
                        </div>

                    @else
                        <div>@lang("app.invitado")</div>
                        {{-- <form action="{{route("galeria.mostrar")}}" method="post">
                            <button class="btn-enlace" type="submit">@lang("app.btn_galeria")</button>
                        </form> --}}
                        <a class="enlaceNav" href="{{route("galeria.mostrar")}}">@lang("app.btn_galeria")</a>
                        <div class="flex flex-row">
                            <div class="self-center mr-4">
                                <form action="{{ route("login") }}" method="get">
                                    <button class="btn-salir px-3 py-1.5 rounded-lg">@lang("app.btn_iniciarSesion")</button>
                                </form>
                            </div>
                        </div>
                    @endif
                </div>

            <!-- Page Content -->
            <main>
                @yield("content")
            </main>
        {{-- </div> --}}
    </body>
</html>
