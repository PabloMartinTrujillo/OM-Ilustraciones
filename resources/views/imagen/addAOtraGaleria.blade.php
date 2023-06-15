@extends("layouts.app")

@section("content")

    <div id="cuerpo">
        <div id="imagen-addAOtraGaleria-container">
            @php
                $galerias = App\Models\Galeria::all();
                $galeriaImg = App\Models\Galeria::find($idGal);
                $imagenEn = DB::table("galeria_imagen")->select("idGal")->where("idImg", "=", $imagen->idImg)->get()->all();
                /* Usar imagenEn para que no aparezcan las galerias donde se encuentra la imagen */
            @endphp

            <img src="{{ asset("storage/img/" . $imagen->rutaImg) }}"/>
            <form id="imagen-addAOtraGaleria-form" action="{{ route("imagen.addAOtraGaleria",["idImg" => $imagen->idImg, "idGal" => $idGal]) }}" method="post">
                @csrf
                <select style="color:black;" name="galeria" class="imagen-addAOtraGaleria-form-select">
                    @foreach ($galerias as $galeria)
                        @if($galeria->idGal != $galeriaImg->idGal)
                            <option value="{{$galeria->idGal}}">{{$galeria->nomGal}}</option>
                        @endif
                    @endforeach
                </select>
                <div id="imagen-addAOtraGaleria-btns">
                    <a class="imagen-btn-cancelar" href="{{ route("galeria.modificar",$idGal) }}">@lang("app.form_cancelar")</a>
                    <button class="btn-crear" style="border: 1px solid black" type="submit">@lang("app.galeria_addImg")</button>
                </div>
            </form>
        </div>
    </div>

@endsection