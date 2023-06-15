

<?php $__env->startSection("js"); ?>
    <script src="<?php echo e(asset("js/canvasGaleria.js")); ?>" defer></script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection("content"); ?>
    <div id="cuerpo">
        <div id="galeria-titulo"><?php echo e($galeria->nomGal); ?></div>
        <div id="galeria-ver-container">

            <div id="galeria-ver-div-canvas">
                <canvas id="lienzo" width="800" height="500"></canvas>
            </div>
            <div id="galeria-ver-div-galeria">
                <?php $__currentLoopData = $galeria->getImagenes()->getResults()->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $imagen): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="galeria-ver-galeria-img">
                        <img class="galeria-ver-img" src="<?php echo e(asset("storage/img/{$imagen->rutaImg}")); ?>" draggable="false"/>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>

        </div>

    </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make("layouts.app", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH T:\xampp\htdocs\ProyectoFinal\resources\views/galeria/ver.blade.php ENDPATH**/ ?>