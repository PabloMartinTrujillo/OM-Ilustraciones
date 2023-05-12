@extends("layouts.app")

@section("content")

<div id="cuerpo">
    <div id="galeria-titulo">{{$galeria->nomGal}}</div>
    <div>
        <div><a class="btn-crear" href="{{route("imagen.addImg",$galeria->idGal)}}">@lang("app.galeria_addImg")</a></div>
    </div>
    <div id="galeria-container-imagenes">
        @foreach ($galeria->getImagenes()->getResults()->all() as $imagen)
        @php
            // $imgResized = Image::make(asset("storage/img/".$imagen->rutaImg));
        @endphp
            <img class="galeria-imagen" src="{{ asset("storage/img/{$imagen->rutaImg}") }}"/>
            {{-- <div>{{$imgResized->resize(250,250)}}</div> --}}
        @endforeach
    </div>
</div>

@endsection