<x-guest-layout>
    <div id="login-container">
        
        <div id="login-form-container">
            {{-- <a id="login-main-btn" href="{{ route("main") }}">
                <svg
                    viewBox="0 0 165.79539 37.999989"
                    version="1.1"
                    id="svg5-login"
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
                        transform="scale(0.81898978,1.2210165)"><tspan
                            sodipodi:role="line"
                            id="tspan287"
                            style="font-style:normal;font-variant:normal;font-weight:normal;font-stretch:normal;font-size:36.7px;font-family:'Helsa Display';-inkscape-font-specification:'Helsa Display, Normal';font-variant-ligatures:normal;font-variant-caps:normal;font-variant-numeric:normal;font-variant-east-asian:normal;fill:#e1c699;fill-opacity:1;stroke-width:2.89151"
                            x="-35.247646"
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
                            x="135"
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
                            x="135"
                            y="39">Personalizadas</tspan></text>
                    </g>
                </svg>
            </a> --}}
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
            <img class="imgLogin" src="{{asset("storage/img/imgLogin.jpg")}}" draggable="false"/>
        </div>
    </div>
</x-guest-layout>
