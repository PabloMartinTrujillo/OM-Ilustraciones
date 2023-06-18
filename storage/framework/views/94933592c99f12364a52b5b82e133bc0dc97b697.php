

<?php $__env->startSection("content"); ?>

    <div id="cuerpo">
        <div id="main-encargos-container" style="min-height:500px;">
            <?php if($carrito == null): ?>
                <p class="carrito-titulo" style="color:black;"><?php echo app('translator')->get("app.noCarrito"); ?></p>
            <?php else: ?>
                <?php $precio = 0; ?>
                <?php $__currentLoopData = App\Models\Encargo::where('idCar','=',$carrito->idCar)->get()->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $encargo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php $precio+= $encargo->precio; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <div class="carrito-container">
                    <div class="carrito-titulo-btn">
                        <p class="carrito-titulo"><?php echo app('translator')->get("app.carrito"); ?> <?php echo e($carrito->fechaCar); ?></p>
                        <p class="carrito-titulo"><b><?php echo e($precio); ?>€</b></p>
                        <form action="<?php echo e(route("carrito.encargar")); ?>" method="post" style="margin-right:3vw;">
                            <?php echo csrf_field(); ?>
                            <input type="hidden" name="idCar" value="<?php echo e($carrito->idCar); ?>"/>
                            <input type="hidden" name="carritoView"/>
                            <button class="btn-modificar carrito-encargar" type="submit"><?php echo app('translator')->get("app.encargar_carrito"); ?></button>
                        </form>
                    </div>
                    <div class="encargos-container">   
                        <?php $__currentLoopData = App\Models\Encargo::where('idCar','=',$carrito->idCar)->get()->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $encargo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="encargo-container">
                                <?php if($carrito->estado == "comprando"): ?>
                                    <form class="encargo-papelera-form" action="<?php echo e(route("encargo.eliminar")); ?>" method="post">
                                        <?php echo csrf_field(); ?>
                                        <input type="hidden" name="rutaCarrito" value=""/>
                                        <input type="hidden" name="idEnc" value="<?php echo e($encargo->idEnc); ?>"/>
                                        <button class="encargo-papelera w100-h100" type="submit"></button>
                                    </form>
                                <?php endif; ?>
                                <div class="encargo-item">
                                    <div class="encargo-item-datos">
                                        <p><b><?php echo app('translator')->get("app.etq_estiloEnc"); ?></b></p>
                                        <p><b><?php echo app('translator')->get("app.etq_numPersonasEnc"); ?></b></p>
                                        <p><b><?php echo app('translator')->get("app.etq_tamEnc"); ?></b></p>
                                    </div>
                                    <div class="encargo-item-datos">
                                        <p><?php echo e($encargo->estiloEnc); ?></p>
                                        <p><?php echo e($encargo->numPerEnc); ?></p>
                                        <p><?php echo e($encargo->tamEnc); ?></p>
                                    </div>
                                </div>
                                <div class="encargo-item">
                                    <!-- <img src="<?php echo e(asset("storage/img/{$encargo->imagenEnc}")); ?>"/> -->
                                    <div class="encargo-item-datos">
                                        <p><b><?php echo app('translator')->get("app.etq_cantidadEnc"); ?></b></p>
                                        <p><b><?php echo app('translator')->get("app.etq_fecha_entrega"); ?></b></p>
                                        <p><b><?php echo app('translator')->get("app.etq_comentario"); ?></b></p>
                                    </div>
                                    <div class="encargo-item-datos">
                                        <p><?php echo e($encargo->cantEnc); ?></p>
                                        <p><?php echo e($encargo->fecha_entrega); ?></p>
                                        <p><?php echo e($encargo->comEnc); ?></p>
                                    </div>
                                </div>
                                <div class="encargo-item" style="margin-left:auto;">
                                    <img src="<?php echo e(asset("storage/img/{$encargo->imagenEnc}")); ?>"/>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make("layouts.app", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH T:\xampp\htdocs\ProyectoFinal\resources\views/carrito.blade.php ENDPATH**/ ?>