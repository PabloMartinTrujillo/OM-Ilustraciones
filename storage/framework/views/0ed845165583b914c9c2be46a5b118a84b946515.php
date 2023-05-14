

<?php $__env->startSection("content"); ?>

    <div id="cuerpo">
        <div id="imagen-container"></div>
        <div id="imagen-form-container">
            <form action="<?php echo e(route("imagen.guardar")); ?>" method="post" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <input type="hidden" value="<?php echo e($galeria->idGal); ?>" name="idGal"/>
                <div>
                    <label for="nomImg"><?php echo app('translator')->get("app.imagen_nom"); ?></label>
                    <input type="string" name="nomImg" class="galeria-form-input"/>
                </div>
                <div>
                    <textarea name="desImg" cols="38" rows="5" placeholder="<?php echo app('translator')->get("app.imagen_des"); ?>" class="galeria-form-input"></textarea>
                </div>
                <input type="file" name="imagen"/>
                <div class="galeria-btns imagen-btns" style="margin-left:0;margin-right:0;">
                    <a id="btn-cancelar" class="btn-borrar" href="<?php echo e(route("galeria.modificar",$galeria->idGal)); ?>"><?php echo app('translator')->get("app.form_cancelar"); ?></a>
                    <button type="submit" class="btn-crear"><?php echo app('translator')->get("app.galeria_crear"); ?></button>
                </div>
            </form>
        </div>
    </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make("layouts.app", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\ProyectoFinal\resources\views/imagen/addImg.blade.php ENDPATH**/ ?>