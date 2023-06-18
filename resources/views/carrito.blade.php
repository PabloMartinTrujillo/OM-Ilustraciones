@extends("layouts.app")

@section("content")

    <div id="cuerpo">
        <div id="main-encargos-container" style="min-height:500px;">
            @if($carrito == null)
                <p class="carrito-titulo" style="color:black;">@lang("app.noCarrito")</p>
            @else
                @php $precio = 0; @endphp
                @foreach(App\Models\Encargo::where('idCar','=',$carrito->idCar)->get()->all() as $encargo)
                    @php $precio+= $encargo->precio; @endphp
                @endforeach
                <div class="carrito-container">
                    <div class="carrito-titulo-btn">
                        <p class="carrito-titulo">@lang("app.carrito") {{ $carrito->fechaCar }}</p>
                        <p class="carrito-titulo"><b>{{$precio}}€</b></p>
                        <form action="{{route("carrito.encargar")}}" method="post" style="margin-right:3vw;">
                            @csrf
                            <input type="hidden" name="idCar" value="{{$carrito->idCar}}"/>
                            <input type="hidden" name="carritoView"/>
                            <button class="btn-modificar carrito-encargar" type="submit">@lang("app.encargar_carrito")</button>
                        </form>
                    </div>
                    <div class="encargos-container">   
                        @foreach(App\Models\Encargo::where('idCar','=',$carrito->idCar)->get()->all() as $encargo)
                            <div class="encargo-container">
                                @if($carrito->estado == "comprando")
                                    <form class="encargo-papelera-form" action="{{route("encargo.eliminar")}}" method="post">
                                        @csrf
                                        <input type="hidden" name="rutaCarrito" value=""/>
                                        <input type="hidden" name="idEnc" value="{{$encargo->idEnc}}"/>
                                        <button class="encargo-papelera w100-h100" type="submit"></button>
                                    </form>
                                @endif
                                <div class="encargo-item">
                                    <div class="encargo-item-datos">
                                        <p><b>@lang("app.etq_estiloEnc")</b></p>
                                        <p><b>@lang("app.etq_numPersonasEnc")</b></p>
                                        <p><b>@lang("app.etq_tamEnc")</b></p>
                                    </div>
                                    <div class="encargo-item-datos">
                                        <p>{{ $encargo->estiloEnc }}</p>
                                        <p>{{ $encargo->numPerEnc }}</p>
                                        <p>{{ $encargo->tamEnc }}</p>
                                    </div>
                                </div>
                                <div class="encargo-item">
                                    <!-- <img src="{{asset("storage/img/{$encargo->imagenEnc}")}}"/> -->
                                    <div class="encargo-item-datos">
                                        <p><b>@lang("app.etq_cantidadEnc")</b></p>
                                        <p><b>@lang("app.etq_fecha_entrega")</b></p>
                                        <p><b>@lang("app.etq_comentario")</b></p>
                                    </div>
                                    <div class="encargo-item-datos">
                                        <p>{{ $encargo->cantEnc }}</p>
                                        <p>{{ $encargo->fecha_entrega }}</p>
                                        <p>{{ $encargo->comEnc }}</p>
                                    </div>
                                </div>
                                <div class="encargo-item" style="margin-left:auto;">
                                    <img src="{{asset("storage/img/{$encargo->imagenEnc}")}}"/>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif
        </div>
    </div>

@endsection