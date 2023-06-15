@extends("layouts.app")

@section("content")

    <div id="cuerpo">
        <div id="imagen-container"></div>
        <div id="imagen-form-container">
            <form action="{{ route("imagen.guardar") }}" method="post" enctype="multipart/form-data">
                @csrf
                <input type="hidden" value="{{$galeria->idGal}}" name="idGal"/>
                <input type="file" name="imagen"/>
                <div class="galeria-btns imagen-btns" style="margin-left:0;margin-right:0;">
                    <a id="btn-cancelar" class="btn-borrar" href="{{ route("galeria.modificar",$galeria->idGal) }}">@lang("app.form_cancelar")</a>
                    <button type="submit" class="btn-crear">@lang("app.galeria_crear")</button>
                </div>
            </form>
        </div>
    </div>

@endsection