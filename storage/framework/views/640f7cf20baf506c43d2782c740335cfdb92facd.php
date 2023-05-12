

<?php $__env->startSection("content"); ?>

<div id="cuerpo">
    <div id="galeria-titulo"><?php echo e($galeria->nomGal); ?></div>
    <div>
        <div><a class="btn-crear" href="<?php echo e(route("imagen.addImg",$galeria->idGal)); ?>"><?php echo app('translator')->get("app.galeria_addImg"); ?></a></div>
    </div>
    <div id="galeria-container-imagenes">
        <?php $__currentLoopData = $galeria->getImagenes()->getResults()->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $imagen): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php
            // $imgResized = Image::make(asset("storage/img/".$imagen->rutaImg));
        ?>
            <img class="galeria-imagen" src="<?php echo e(asset("storage/img/{$imagen->rutaImg}")); ?>"/>
            
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make("layouts.app", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\ProyectoFinal\resources\views/galeria/modificar.blade.php ENDPATH**/ ?>