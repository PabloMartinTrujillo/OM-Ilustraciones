@extends("layouts.app")

@section("content")

    <div id="cuerpo">
        <div id="galeria-titulo">
            <i>@lang("app.galeria")</i>
        </div>

            @if(Auth::check() && Auth::user()->tipoUsu == "admin")
            <div>
                <div><a class="btn-crear" href="{{route("galeria.formCrear")}}">@lang("app.galeria_crear")</a></div>
            </div>
            @endif

            <div id="galeria-container-galerias">
                @foreach ($galerias as $galeria)
                    <div class="galeria-mostrar">
                        <div class="galeria-item-container">
                            <h2 class="galeria-item galeria-item-nomGal"><b>{{$galeria->nomGal}}</b></h2>
                            <p class="galeria-item">{{$galeria->desGal}}</p>
                            <div class="galeria-btns">
                                @if(Auth::check() == false)
                                    <a class="enlace btn-modificar" href="{{ route("galeria.ver",$galeria->idGal) }}">
                                        @lang("app.galeria_ver")
                                    </a>
                                @else
                                    @if(Auth::user()->tipoUsu == "admin")
                                        <a class="enlace btn-modificar" href="{{ route("galeria.modificar",$galeria->idGal) }}">
                                            @lang("app.etq_modificar")
                                        </a>
                                    @else
                                        <a class="enlace btn-modificar" href="{{ route("galeria.ver",$galeria->idGal) }}">
                                            @lang("app.galeria_ver")
                                        </a>
                                    @endif
                                @endif
                                @if(Auth::check())
                                    @if(Auth::user()->tipoUsu == "admin")
                                    <form action="{{ route("galeria.borrar",$galeria->idGal) }}" method="post">
                                        @csrf
                                        <button type="submit" class="btn-borrar">@lang("app.etq_borrar")</button>
                                    </form>
                                    @endif
                                @endif
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
                        </div>
                    </div>
                @endforeach
            </div>
    </div>

@endsection