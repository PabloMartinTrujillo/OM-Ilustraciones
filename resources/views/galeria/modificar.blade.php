@extends("layouts.app")

@section("js")
    <script src="{{ asset('js/interfazImg.js') }}" defer></script>
@endsection

@section("content")

<div id="cuerpo">
    <div id="galeria-titulo">{{$galeria->nomGal}}</div>
    <div>
        <div><a class="btn-crear" href="{{route("imagen.addImg",$galeria->idGal)}}">@lang("app.galeria_addImg")</a></div>
    </div>
    <div id="galeria-container-imagenes">
        @foreach ($galeria->getImagenes()->getResults()->all() as $imagen)
            <div class="flex-div">
                <img src="{{ asset("storage/img/{$imagen->rutaImg}") }}"/>
                <div class="galeria-imagen-interfaz">
                    <form action="{{ route("imagen.borrar",["idGal" => $galeria->idGal, "idImg" => $imagen->idImg]) }}" method="post">
                        @csrf
                        <button class="imagen-btn-borrar" type="submit">@lang("app.etq_borrar")</button>
                    </form>
                </div>
            </div>
        @endforeach
    </div>
</div>

@endsection