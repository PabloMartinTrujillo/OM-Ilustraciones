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
        <script src="{{ asset('js/menuUsuario.js') }}" defer></script>
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
                    <div id="nav-logo">
                        <svg
                            viewBox="0 0 165.79539 37.999989"
                            version="1.1"
                            id="svg5"
                            inkscape:version="1.2.2 (732a01da63, 2022-12-09)"
                            sodipodi:docname="logoAjustado.svg"
                            xmlns:inkscape="http://www.inkscape.org/namespaces/inkscape"
                            xmlns:sodipodi="http://sodipodi.sourceforge.net/DTD/sodipodi-0.dtd"
                            xmlns="http://www.w3.org/2000/svg"
                            xmlns:svg="http://www.w3.org/2000/svg">
                            <sodipodi:namedview
                                id="namedview7"
                                pagecolor="#ffffff"
                                bordercolor="#000000"
                                borderopacity="0.25"
                                inkscape:showpageshadow="2"
                                inkscape:pageopacity="0.0"
                                inkscape:pagecheckerboard="0"
                                inkscape:deskcolor="#d1d1d1"
                                inkscape:document-units="mm"
                                showgrid="false"
                                inkscape:zoom="0.76969697"
                                inkscape:cx="346.88976"
                                inkscape:cy="296.87008"
                                inkscape:window-width="1920"
                                inkscape:window-height="1051"
                                inkscape:window-x="-9"
                                inkscape:window-y="-9"
                                inkscape:window-maximized="1"
                                inkscape:current-layer="layer1" />
                            <defs
                                id="defs2" />
                            <g
                                inkscape:label="Capa 1"
                                inkscape:groupmode="layer"
                                id="layer1"
                                transform="translate(-9.6851654,-10.913053)">
                                <text
                                xml:space="preserve"
                                style="font-style:normal;font-variant:normal;font-weight:normal;font-stretch:normal;font-size:36.7px;font-family:'Helsa Display';-inkscape-font-specification:'Helsa Display, Normal';font-variant-ligatures:normal;font-variant-caps:normal;font-variant-numeric:normal;font-variant-east-asian:normal;fill:#e1c699;fill-opacity:1;stroke-width:2.89151;stroke-dasharray:2.89151, 17.3491"
                                x="10.247646"
                                y="35.251579"
                                id="olgamartint"
                                transform="scale(1.5,1.2210165)"><tspan
                                    sodipodi:role="line"
                                    id="tspan287"
                                    style="font-style:normal;font-variant:normal;font-weight:normal;font-stretch:normal;font-size:36.7px;font-family:'Helsa Display';-inkscape-font-specification:'Helsa Display, Normal';font-variant-ligatures:normal;font-variant-caps:normal;font-variant-numeric:normal;font-variant-east-asian:normal;fill:#e1c699;fill-opacity:1;stroke-width:2.89151"
                                    x="2.747646"
                                    y="35.251579">Olgamartint</tspan></text>
                                <text
                                xml:space="preserve"
                                style="font-style:normal;font-variant:normal;font-weight:normal;font-stretch:normal;font-size:16.9333px;font-family:'Aristotelica Pro Text';-inkscape-font-specification:'Aristotelica Pro Text, Normal';font-variant-ligatures:normal;font-variant-caps:normal;font-variant-numeric:normal;font-variant-east-asian:normal;fill:#000000;fill-opacity:1;stroke-width:2.20872;stroke-dasharray:2.20872, 13.2523"
                                x="83.612518"
                                y="24.198959"
                                id="ilustraciones"
                                transform="scale(0.90493069,1.105057)"><tspan
                                    sodipodi:role="line"
                                    id="tspan9907"
                                    style="font-style:normal;font-variant:normal;font-weight:normal;font-stretch:normal;font-size:16.9333px;font-family:'Aristotelica Pro Text';-inkscape-font-specification:'Aristotelica Pro Text, Normal';font-variant-ligatures:normal;font-variant-caps:normal;font-variant-numeric:normal;font-variant-east-asian:normal;fill:#000000;fill-opacity:1;stroke-width:2.20872"
                                    x="142.5"
                                    y="24.198959">Ilustraciones</tspan></text>
                                <text
                                xml:space="preserve"
                                style="font-style:normal;font-variant:normal;font-weight:normal;font-stretch:normal;font-size:16.9333px;font-family:'Aristotelica Pro Text';-inkscape-font-specification:'Aristotelica Pro Text, Normal';font-variant-ligatures:normal;font-variant-caps:normal;font-variant-numeric:normal;font-variant-east-asian:normal;fill:#000000;fill-opacity:1;stroke-width:2.20872;stroke-dasharray:2.20872, 13.2523"
                                x="83.612518"
                                y="38.624622"
                                id="personalizadas"
                                transform="scale(0.90493069,1.105057)"><tspan
                                    sodipodi:role="line"
                                    id="tspan9907-0"
                                    style="font-style:normal;font-variant:normal;font-weight:normal;font-stretch:normal;font-size:16.9333px;font-family:'Aristotelica Pro Text';-inkscape-font-specification:'Aristotelica Pro Text, Normal';font-variant-ligatures:normal;font-variant-caps:normal;font-variant-numeric:normal;font-variant-east-asian:normal;fill:#000000;fill-opacity:1;stroke-width:2.20872"
                                    x="142.5"
                                    y="39">Personalizadas</tspan></text>
                            </g>
                        </svg>
                    </div>
                    <div id="nav-enlaces">
                        <a class="enlaceNav" href="{{route("main")}}">@lang("app.btn_inicio")</a>

                        @if(Auth::check())
                            {{-- <form action="{{ route("usuario.listar") }}" method="post">
                                @csrf
                                <button class="btn-enlace" type="submit">
                                    @if(Auth::user()->tipoUsu == "cliente") @lang("app.btn_perfil")
                                    @else @lang("app.admin_usuarios")
                                    @endif
                                </button>
                            </form> --}}
                            <a class="enlaceNav" href="{{-- {{route("encargo.listar")}} --}}">@lang("app.btn_encargos")</a>
                            <a class="enlaceNav" href="{{-- {{route("")}} --}}">
                                @if(Auth::user()->tipoUsu == "cliente") @lang("app.btn_perfil")
                                    @else @lang("app.admin_usuarios")
                                    @endif
                            </a>

                            {{-- <form action="{{route("galeria.mostrar")}}" method="post">
                                @csrf
                                <button class="btn-enlace" type="submit">@lang("app.btn_galeria")</button>
                            </form> --}}
                            <a class="enlaceNav" href="{{route("galeria.mostrar")}}">@lang("app.galeria")</a>
                            
                            <div id="nav-usuario">
                                {{-- <div class="" style="border:1px solid black;">@lang("app.saludo"){{ Auth::user()->nomUsu }}</div> --}}
                                <div id="nav-img-profile">
                                    <div id="nav-img-container">
                                        <img src="{{ asset("/img/icoPerfil.png") }}"/>
                                    </div>
                                    <div id="nav-menuUsuario">
                                        <div class="nav-menuUsuario-item"></div>
                                        <div class="nav-menuUsuario-item">
                                            <form action="{{ route("logout") }}" method="post" class="w100-h100">
                                                @csrf
                                                <button type="submit" class="w100-h100">@lang("app.btn_salir")</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                {{-- <div>
                                    <form action="{{ route("logout") }}" method="post">
                                        @csrf
                                        <button class="btn-salir">@lang("app.btn_salir")</button>
                                    </form>
                                </div> --}}
                            </div>

                        @else
                            {{-- <div>@lang("app.invitado")</div> --}}
                            {{-- <form action="{{route("galeria.mostrar")}}" method="post">
                                <button class="btn-enlace" type="submit">@lang("app.btn_galeria")</button>
                            </form> --}}
                            <a class="enlaceNav" href="{{route("galeria.mostrar")}}">@lang("app.btn_galeria")</a>
                            <div>
                                <form action="{{ route("login") }}" method="get">
                                    <button>@lang("app.btn_iniciarSesion")</button>
                                </form>
                            </div>
                        @endif
                    </div>
                </div>

            <!-- Page Content -->
            <main>
                @yield("content")
            </main>
        {{-- </div> --}}
    </body>
</html>
