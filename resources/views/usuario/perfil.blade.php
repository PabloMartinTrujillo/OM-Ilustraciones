@extends("layouts.app")

@section("content")

    <div id="cuerpo">
        @if(Auth::user()->tipoUsu == "admin")
            {{--@dd($usuarios)--}}
            <div id="buscador">
                <form action="{{ route("usuario.perfil") }}" method="post">
                    @csrf
                    <input type="text" name="email" style="width:70%;color:black;" placeholder="@lang("app.buscar_email")"/>
                    <button type="submit" id="btn-buscador">@lang("app.buscar")</button>
                </form>
            </div>

            <div id="usuarios-container">
                <div class="usuarios-categorias-container">
                    <div class="usuarios-datos"><b>@lang("app.usuario_tipoUsu")</b></div>
                    <div class="usuarios-datos"><b>@lang("app.usuario_nombreUsu")</b></div>
                    <div class="usuarios-datos"><b>@lang("app.usuario_emailUsu")</b></div>
                    <div class="usuarios-datos"><b>@lang("app.usuario_creacionUsu")</b></div>
                    <div class="usuarios-btns"></div>
                </div>

                @foreach($usuarios as $usuario)
                    <div class="usuarios-datos-container usuarios-usuario">
                        <div class="usuarios-datos">{{$usuario->tipoUsu}}</div>
                        <div class="usuarios-datos">{{$usuario->nomUsu}}</div>
                        <div class="usuarios-datos">{{$usuario->email}}</div>
                        <div class="usuarios-datos">{{$usuario->fechaCreacionUsu}}</div>
                        <div class="usuarios-btns">
                            <form action="{{ route("usuario.modificar", $usuario->idUsu) }}" method="get">
                                <button class="btn-modificar" style="padding:2%; color:black;" type="submit">@lang("app.etq_modificar")</button>
                            </form>
                            <form action="{{ route("usuario.borrar", $usuario->idUsu) }}" method="post">
                                @csrf
                                <button class="btn-borrar" style="padding: 2%;color:black;" type="submit">@lang("app.etq_borrar")</button>
                            </form>
                        </div>
                    </div>
                @endforeach
                
                {{ $usuarios->links() }}
            </div>

        @else

            <div id="perfil-container">
                <div class="perfil-datos">
                    <div class="perfil-datos-dato">
                        <b>@lang("app.usuario_nombreUsu")</b>
                    </div>
                    <div class="perfil-datos-dato">
                        {{ $usuario->nomUsu }}
                    </div>
                    <!-- <form class="perfil-datos-btn" action="" method="get">
                        <button class="btn-modificar" type="submit">@lang("app.perfil_btn-cambiar")</button>
                    </form> -->
                </div>
                <div class="perfil-datos">
                    <div class="perfil-datos-dato">
                        <b>@lang("app.etq_contraUsu")</b>
                    </div>
                    <div class="perfil-datos-dato">
                        **********
                    </div>
                    <!-- <form class="perfil-datos-btn" action="" method="get">
                        <button class="btn-modificar" type="submit">@lang("app.perfil_btn-cambiar")</button>
                    </form> -->
                </div>
                <div class="perfil-datos">
                    <div class="perfil-datos-dato">
                        <b>@lang("app.etq_emailUsu")</b>
                    </div>
                    <div class="perfil-datos-dato">
                        {{ $usuario->email }}
                    </div>
                    <!-- <div class="perfil-datos-btn"></div> -->
                </div>
                <div class="perfil-datos">
                    <div class="perfil-datos-dato">
                        <b>@lang("app.etq_creadoUsu")</b>
                    </div>
                    <div class="perfil-datos-dato">
                        {{ $usuario->fechaCreacionUsu }}
                    </div>
                    <!-- <div class="perfil-datos-btn"></div> -->
                </div>
            </div>

        @endif
    </div>

@endsection