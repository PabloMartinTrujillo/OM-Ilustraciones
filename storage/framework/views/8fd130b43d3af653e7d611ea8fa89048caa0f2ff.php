

<?php $__env->startSection("content"); ?>
    <div id="main-container">
        <div id="main-cabecera">
            <div id="main-video-container">
                <video id="video" src="<?php echo e(asset("video/video.mp4")); ?>" muted autoplay loop></video>
                <div id="filtro"></div>
            </div>
            
        </div>
        <div id="main-cuerpo">
            
        </div>
    </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make("layouts.app", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\ProyectoFinal\resources\views/main.blade.php ENDPATH**/ ?>