@extends("layouts.app")

@section("content")

    <div id="cuerpo">
        <div id="galeria-titulo">
            <i>@lang("app.galeria")</i>
        </div>
            @if(Auth::check() && (Auth::user()->tipoUsu == "admin"))
                <div>
                    <div><a class="btn-crear" href="{{route("galeria.formCrear")}}">@lang("app.galeria_crear")</a></div>
                </div>
                {{-- <div>
                    <form action="{{ route("imagen.resizeAll") }}" method="post">
                        @csrf
                        <button type="submit" class="btn-modificar">Resize all images</button>
                    </form>
                </div> --}}
                
                <div id="galeria-container-galerias">
                    {{-- @empty($galerias)
                        <h1 style="color:ivory;">No se encuentran galerías</h1>
                    @else
                        
                    @endempty --}}
                    @foreach ($galerias as $galeria)
                        <div class="galeria-mostrar">
                            <div class="galeria-item-container">
                                <h2 class="galeria-item galeria-item-nomGal"><b>{{$galeria->nomGal}}</b></h2>
                                <p class="galeria-item">{{$galeria->desGal}}</p>
                                <div class="galeria-btns">
                                    <a class="enlace btn-modificar" href="{{ route("galeria.modificar",$galeria->idGal) }}">@lang("app.etq_modificar")</a>
                                    <form action="{{ route("galeria.borrar",$galeria->idGal) }}" method="post">
                                        @csrf
                                        <button type="submit" class="btn-borrar">@lang("app.etq_borrar")</button>
                                    </form>
                                </div>
                            </div>
                            <div class="galeria-imagenes-container">
                                @php
                                        $imagenes = $galeria->getImagenes()->getResults()->all();
                                        $cant = count($imagenes);
                                        if(count($imagenes) > 4) {
                                            $cant = 4;
                                        }
                                @endphp
                                @for ($i = 0; $i < $cant; $i++)
                                    <img class="galeria-imagen" src="{{asset("storage/img/{$imagenes[$i]->rutaImg}")}}" draggable="false"/>
                                @endfor
                                {{-- @foreach ($galeria->getImagenes()->getResults()->all() as $imagen)
                                    <img class="galeria-imagen" src="{{asset("storage/img/{$imagen->rutaImg}")}}"/>
                                @endforeach --}}
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                {{-- Vista de los no registrados y clientes --}}
            @endif
    </div>

@endsection