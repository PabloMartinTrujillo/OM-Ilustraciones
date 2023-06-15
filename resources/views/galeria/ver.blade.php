@extends("layouts.app")

@section("js")
    <script src="{{asset("js/canvasGaleria.js")}}" defer></script>
@endsection

@section("content")
    <div id="cuerpo">
        <div id="galeria-titulo">{{$galeria->nomGal}}</div>
        <div id="galeria-ver-container">

            <div id="galeria-ver-div-canvas">
                <canvas id="lienzo" width="800" height="500"></canvas>
            </div>
            <div id="galeria-ver-div-galeria">
                @foreach($galeria->getImagenes()->getResults()->all() as $imagen)
                    <div class="galeria-ver-galeria-img">
                        <img class="galeria-ver-img" src="{{asset("storage/img/{$imagen->rutaImg}")}}" draggable="false"/>
                    </div>
                @endforeach
            </div>

        </div>

    </div>

@endsection