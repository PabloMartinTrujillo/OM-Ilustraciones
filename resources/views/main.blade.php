@extends("layouts.app")

@section("content")
    <div id="main-container">
        <div id="main-cabecera">
            <div id="main-video-container">
                <video id="video" src="{{ asset("video/video.mp4") }}" muted autoplay loop></video>
                <div id="filtro"></div>
            </div>
            {{-- <div id="titulo">@lang("")Convierte una foto en un regalo especial</div> --}}
        </div>
        <div id="main-cuerpo">
            {{-- Galería --}}
        </div>
    </div>

@endsection