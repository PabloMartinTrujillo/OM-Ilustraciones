

<?php $__env->startSection("js"); ?>

    

    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

<?php $__env->stopSection(); ?>

<?php $__env->startSection("content"); ?>

    <div id="cuerpo">

        <form id="form-encargos-container" action="<?php echo e(route("encargo.compraEnc")); ?>" method="post" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>
            <div id="form-encargos-form">
                <div class="form-encargos-div">
                    <p class="form-encargos-texto"><?php echo app('translator')->get("app.encargo_imagen"); ?></p>
                    <p class="form-encargos-texto"><?php echo app('translator')->get("app.etq_estiloEnc"); ?></p>
                    <p class="form-encargos-texto"><?php echo app('translator')->get("app.etq_numPersonasEnc"); ?></p>
                    <p class="form-encargos-texto"><?php echo app('translator')->get("app.etq_tamEnc"); ?></p>
                    <p class="form-encargos-texto"><?php echo app('translator')->get("app.etq_cantidadEnc"); ?></p>
                    <p class="form-encargos-texto"><?php echo app('translator')->get("app.etq_fecha_entrega"); ?></p>
                </div>
                <div class="form-encargos-div" style="color:black;">
                    <input type="file" name="imagen" style="color:white;"/>
                    <select name="estilo">
                        <option value="todoColor"><?php echo app('translator')->get("app.form_estilo_aTodoColor"); ?></option>
                        <option value="contornoNegroColor"><?php echo app('translator')->get("app.form_estilo_contornoNegro+Color"); ?></option>
                        <option value="lineaSimple"><?php echo app('translator')->get("app.form_estilo_lineaSimple"); ?></option>
                        <option value="minimalista"><?php echo app('translator')->get("app.form_estilo_minimalista"); ?></option>
                    </select>
                    <input type="number" name="numPersonas" min="1">
                    <select name="tamano">
                        <option value="digital"><?php echo app('translator')->get("app.form_tamEnc_digital"); ?></option>
                        <option value="A3"><?php echo app('translator')->get("app.form_tamEnc_a3"); ?></option>
                        <option value="A4"><?php echo app('translator')->get("app.form_tamEnc_a4"); ?></option>
                        <option value="A5"><?php echo app('translator')->get("app.form_tamEnc_a5"); ?></option>
                    </select>
                    <input type="number" name="cantidad" min="1">
                    <input type="text" id="datepicker" name="fechaEntrega">
                </div>
            </div>
            <div id="form-encargos-comentario">
                <div class="form-encargos-comentario-item">
                    <p class="form-encargos-texto"><?php echo app('translator')->get("app.form_comentario"); ?></p>
                </div>
                <div class="form-encargos-comentario-item">
                    <textarea name="comentario" style="color:black;" rows="5" cols="35"></textarea>
                </div>
            </div>
            <div>
                <input required type="checkbox" name="checkbox"/>
                <label for="checkbox"><?php echo app('translator')->get("app.encargo_checkbox"); ?></label>
            </div>
            <div id="form-encargos-btns">
                <button name="addToCart" class="btn-modificar" style="color:black; padding:2%;" type="submit"><?php echo app('translator')->get("app.addCarrito"); ?></button>
                <button name="makeOrder" class="btn-crear" style="border:1px solid black;" type="submit"><?php echo app('translator')->get("app.encargo_crear"); ?></button>
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

<?php $__env->stopSection(); ?>
<?php echo $__env->make("layouts.app", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH T:\xampp\htdocs\ProyectoFinal\resources\views/encargo/crear.blade.php ENDPATH**/ ?>