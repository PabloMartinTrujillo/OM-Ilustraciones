@extends("layouts.app")

@section("js")
    <script src="{{ asset('js/animacionGaleria.js') }}" defer></script>
@endsection

@section("content")
    <div id="main-container">
        <div id="main-cabecera">
            <div id="main-video-container">
                <video id="video" src="{{ asset("video/video.mp4") }}" muted autoplay loop></video>
                <div id="filtro"></div>
            </div>
            {{-- <div id="titulo">@lang("")Convierte una foto en un regalo especial</div> --}}
        </div>
        <div id="main-galeria-container">
            <h1 id="galeria-titulo"><i>@lang("app.galeria")</i></h1>
            @foreach (App\Models\Galeria::all() as $galeria)
                <div class="main-galeria">
                    <div class="galeria-item-nomGal main-nomGal"><b>{{$galeria->nomGal}}</b></div>
                    <div class="main-galeria-imagenes-container">
                        @foreach ($galeria->getImagenes()->getResults()->all() as $imagen)
                            <img class="galeria-imagen" src="{{ asset("storage/img/$imagen->rutaImg") }}"/>
                        @endforeach
                    </div>
                </div>
            @endforeach
        </div>
    </div>

@endsection