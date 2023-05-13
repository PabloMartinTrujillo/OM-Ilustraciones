

<?php $__env->startSection("js"); ?>
    <script src="<?php echo e(asset('js/interfazImg.js')); ?>" defer></script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection("content"); ?>

<div id="cuerpo">
    <div id="galeria-titulo"><?php echo e($galeria->nomGal); ?></div>
    <div>
        <div><a class="btn-crear" href="<?php echo e(route("imagen.addImg",$galeria->idGal)); ?>"><?php echo app('translator')->get("app.galeria_addImg"); ?></a></div>
    </div>
    <div id="galeria-container-imagenes">
        <?php $__currentLoopData = $galeria->getImagenes()->getResults()->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $imagen): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="flex-div">
                <img src="<?php echo e(asset("storage/img/{$imagen->rutaImg}")); ?>"/>
                <div class="galeria-imagen-interfaz">
                    <form action="<?php echo e(route("imagen.borrar",["idGal" => $galeria->idGal, "idImg" => $imagen->idImg])); ?>" method="post">
                        <?php echo csrf_field(); ?>
                        <button class="imagen-btn-borrar" type="submit"><?php echo app('translator')->get("app.etq_borrar"); ?></button>
                    </form>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make("layouts.app", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\ProyectoFinal\resources\views/galeria/modificar.blade.php ENDPATH**/ ?>