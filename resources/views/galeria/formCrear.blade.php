@extends("layouts.app")

@section("content")

    <div id="cuerpo">
        <div id="galeria-titulo"><i>@lang("app.galeria_crear")</i></div>
        <div id="galeria-form-container">
            <form action="{{ route("galeria.creaGaleria") }}" method="post">
                @csrf
                <div class="galeria-item">
                    <label for="nomGal">@lang("app.galeria_form_nomGal")</label>
                    <input type="string" name="nomGal" class="galeria-form-input"/>
                </div>

                <div class="galeria-item">
                    <textarea class="galeria-form-input" name="desGal" cols="38" rows="5" placeholder="@lang("app.galeria_form_desGal")"></textarea>
                </div>

                <div class="galeria-btns galeria-item" style="margin-left:0;margin-right:0;">
                    <a id="btn-cancelar" class="btn-borrar" href="{{ route("galeria.mostrar") }}">@lang("app.form_cancelar")</a>
                    <button type="submit" class="btn-crear">@lang("app.galeria_crear")</button>
                </div>
            </form>
        </div>
    </div>

@endsection