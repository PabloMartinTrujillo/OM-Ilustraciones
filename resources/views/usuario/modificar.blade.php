@extends("layouts.app")

@section("content")

    <div id="cuerpo">
        <form id="perfil-container" action="{{route("usuario.guardarMod")}}" method="post" style="height:55vh;">
            @csrf
            <input type="hidden" value="{{$usuario->idUsu}}" name="idUsu"/>
            @if(Auth::user()->tipoUsu == "admin")
                <div class="perfil-datos">
                    <label for="tipo" class="perfil-datos-dato"><b>@lang("app.etq_tipoUsu")</b></label>
                    <select name="tipo" class="perfil-datos-dato">
                        <option value="admin" @if($usuario->tipoUsu == "admin") selected @endif>@lang("app.etq_tipoUsuAdmin")</option>
                        <option value="cliente" @if($usuario->tipoUsu == "cliente") selected @endif>@lang("app.etq_tipoUsuCliente")</option>
                    </select>
                </div>
            @endif
            <div class="perfil-datos">
                <label for="nombre" class="perfil-datos-dato"><b>@lang("app.usuario_nombreUsu")</b></label>
                <input type="text" class="perfil-datos-dato" name="nombre" value="{{$usuario->nomUsu}}" />
            </div>
            <div class="perfil-datos">
                <label for="email" class="perfil-datos-dato"><b>@lang("app.etq_emailUsu")</b></label>
                <input type="text" class="perfil-datos-dato" name="email" value="{{$usuario->email}}" />
            </div>
            <div class="perfil-datos">
                <label for="password" class="perfil-datos-dato"><b>@lang("app.etq_contraUsu")</b></label>
                <input type="password" class="perfil-datos-dato" name="password" value="" />
            </div>
            <div class="perfil-datos">
                <label for="confirmPassword" class="perfil-datos-dato"><b>@lang("app.etq_contraUsu")</b></label>
                <input type="password" class="perfil-datos-dato" name="confirmPassword" value="" />
            </div>
            @if(Auth::user()->tipoUsu == "admin")
                <div class="perfil-datos">
                    <label for="fechaCreacion" class="perfil-datos-dato"><b>@lang("app.etq_creadoUsu")</b></label>
                    <input type="text" class="perfil-datos-dato" name="fechaCreacion" value="{{$usuario->fechaCreacionUsu}}" disabled/>
                </div>
            @endif
            <div class="perfil-datos">
                <a class="btn-borrar" href="{{route("usuario.perfil")}}">@lang("app.form_cancelar")</a>
                <button class="btn-modificar" type="submit">@lang("app.form_enviar")</button>
            </div>
        </form>
    </div>

@endsection