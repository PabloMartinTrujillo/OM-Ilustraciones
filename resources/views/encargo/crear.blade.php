@extends("layouts.app")

@section("js")

    {{-- <script src="{{ asset('js/minFechaCalendario.js') }}" defer></script> --}}

    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

@endsection

@section("content")

    <div id="cuerpo">

        <form id="form-encargos-container" action="{{route("encargo.compraEnc")}}" method="post" enctype="multipart/form-data">
            @csrf
            <div id="form-encargos-form">
                <div class="form-encargos-div">
                    <p class="form-encargos-texto">@lang("app.encargo_imagen")</p>
                    <p class="form-encargos-texto">@lang("app.etq_estiloEnc")</p>
                    <p class="form-encargos-texto">@lang("app.etq_numPersonasEnc")</p>
                    <p class="form-encargos-texto">@lang("app.etq_tamEnc")</p>
                    <p class="form-encargos-texto">@lang("app.etq_cantidadEnc")</p>
                    <p class="form-encargos-texto">@lang("app.etq_fecha_entrega")</p>
                </div>
                <div class="form-encargos-div" style="color:black;">
                    <input type="file" name="imagen" style="color:white;"/>
                    <select name="estilo">
                        <option value="todoColor">@lang("app.form_estilo_aTodoColor")</option>
                        <option value="contornoNegroColor">@lang("app.form_estilo_contornoNegro+Color")</option>
                        <option value="lineaSimple">@lang("app.form_estilo_lineaSimple")</option>
                        <option value="minimalista">@lang("app.form_estilo_minimalista")</option>
                    </select>
                    <input type="number" name="numPersonas" min="1">
                    <select name="tamano">
                        <option value="digital">@lang("app.form_tamEnc_digital")</option>
                        <option value="A3">@lang("app.form_tamEnc_a3")</option>
                        <option value="A4">@lang("app.form_tamEnc_a4")</option>
                        <option value="A5">@lang("app.form_tamEnc_a5")</option>
                    </select>
                    <input type="number" name="cantidad" min="1">
                    <input type="text" id="datepicker" name="fechaEntrega">
                </div>
            </div>
            <div id="form-encargos-comentario">
                <div class="form-encargos-comentario-item">
                    <p class="form-encargos-texto">@lang("app.form_comentario")</p>
                </div>
                <div class="form-encargos-comentario-item">
                    <textarea name="comentario" style="color:black;" rows="5" cols="35"></textarea>
                </div>
            </div>
            <div>
                <input required type="checkbox" name="checkbox"/>
                <label for="checkbox">@lang("app.encargo_checkbox")</label>
            </div>
            <div id="form-encargos-btns">
                <button name="addToCart" class="btn-modificar" style="color:black; padding:2%;" type="submit">@lang("app.addCarrito")</button>
                <button name="makeOrder" class="btn-crear" style="border:1px solid black;" type="submit">@lang("app.encargo_crear")</button>
            </div>
        </form>

    </div>

    <script>

        $(function() {
            var hoy = new Date();
            var fechaInicio = new Date(hoy.getFullYear(), hoy.getMonth(), hoy.getDate() + 7);
            
            let diasDisabled = <?php echo $diasDisabled; ?>;
            
            $("#datepicker").datepicker({
                dateFormat: 'yy-mm-dd',
                minDate: fechaInicio,
                beforeShowDay: function(date) {
                    var dia = date.getDay();
                    if (dia === 0) {
                        return [false];
                    }
                    var formattedDate = $.datepicker.formatDate('yy-mm-dd', date);
                    if (diasDisabled.indexOf(formattedDate) > -1) {
                        return [false];
                    }
                    return [true];
                    }
                });
            });

    </script>

@endsection