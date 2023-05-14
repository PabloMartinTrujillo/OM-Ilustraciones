

<?php $__env->startSection("js"); ?>
    <script src="<?php echo e(asset('js/animacionGaleria.js')); ?>" defer></script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection("content"); ?>
    <div id="main-container">
        <div id="main-cabecera">
            <div id="main-video-container">
                <video id="video" src="<?php echo e(asset("video/video.mp4")); ?>" muted autoplay loop></video>
                <div id="filtro"></div>
            </div>
            
        </div>
        <div id="main-galeria-container">
            <h1 id="galeria-titulo"><i><?php echo app('translator')->get("app.galeria"); ?></i></h1>
            <?php $__currentLoopData = App\Models\Galeria::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $galeria): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="main-galeria">
                    <div class="galeria-item-nomGal main-nomGal"><b><?php echo e($galeria->nomGal); ?></b></div>
                    <div class="main-galeria-imagenes-container">
                        <?php $__currentLoopData = $galeria->getImagenes()->getResults()->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $imagen): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <img class="main-galeria-imagen" src="<?php echo e(asset("storage/img/$imagen->rutaImg")); ?>"/>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make("layouts.app", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\ProyectoFinal\resources\views/main.blade.php ENDPATH**/ ?>