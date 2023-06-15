

<?php $__env->startSection("content"); ?>

    <div id="cuerpo">
        <div id="galeria-titulo"><i><?php echo app('translator')->get("app.galeria_crear"); ?></i></div>
        <div id="galeria-form-container">
            <form action="<?php echo e(route("galeria.creaGaleria")); ?>" method="post">
                <?php echo csrf_field(); ?>
                <div class="galeria-item">
                    <label for="nomGal"><?php echo app('translator')->get("app.galeria_form_nomGal"); ?></label>
                    <input type="string" name="nomGal" class="galeria-form-input"/>
                </div>

                <div class="galeria-item">
                    <textarea class="galeria-form-input" name="desGal" cols="38" rows="5" placeholder="<?php echo app('translator')->get("app.galeria_form_desGal"); ?>"></textarea>
                </div>

                <div class="galeria-btns galeria-item" style="margin-left:0;margin-right:0;">
                    <a id="btn-cancelar" class="btn-borrar" href="<?php echo e(route("galeria.mostrar")); ?>"><?php echo app('translator')->get("app.form_cancelar"); ?></a>
                    <button type="submit" class="btn-crear"><?php echo app('translator')->get("app.galeria_crear"); ?></button>
                </div>
            </form>
        </div>
    </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make("layouts.app", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH T:\xampp\htdocs\ProyectoFinal\resources\views/galeria/formCrear.blade.php ENDPATH**/ ?>