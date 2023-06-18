

<?php $__env->startSection("content"); ?>

    <div id="cuerpo">
        
        <div id="main-encargos-container">
        <?php if(Auth::user()->tipoUsu == "admin"): ?>

            <?php if(count($carritos)==0): ?>
                <div id="noEncargos">
                    <b><?php echo app('translator')->get("app.etq_noEncargosDB"); ?></b>
                </div>
                <div style="margin-top:2vh;">
                    <a class="btn-crear" href="<?php echo e(route("encargo.crear")); ?>"><?php echo app('translator')->get("app.encargo_crear"); ?></a>
                </div>
            <?php else: ?>
                <div id="noEncargos">
                    <b><?php echo app('translator')->get("app.etq_encargosDB"); ?></b>
                </div>
                <?php $__currentLoopData = $carritos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $carrito): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="carrito-container">
                    <div class="carrito-titulo-btn">
                        <p class="carrito-titulo"><?php echo app('translator')->get("app.carrito"); ?> <?php echo e($carrito->fechaCar); ?></p>
                        <form action="<?php echo e(route("carrito.aprobar")); ?>" method="post" style="margin-right:3vw;">
                            <?php echo csrf_field(); ?>
                            <input type="hidden" name="idCar" value="<?php echo e($carrito->idCar); ?>"/>
                            <button class="btn-modificar carrito-encargar" type="submit"><?php echo app('translator')->get("app.aceptar_encargo"); ?></button>
                        </form>
                    </div>
                    <div class="encargos-container">   
                    <?php $__currentLoopData = App\Models\Encargo::where('idCar','=',$carrito->idCar)->get()->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $encargo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="encargo-container">
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
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php echo e($carritos->links()); ?>

            <?php endif; ?>
        <?php else: ?>
            <?php if(count($carritos)==0): ?>
                <div id="noEncargos">
                    <b><?php echo app('translator')->get("app.etq_noEncargos"); ?></b>
                </div>
                <div style="margin-top:2vh;">
                    <a class="btn-crear" href="<?php echo e(route("encargo.crear")); ?>"><?php echo app('translator')->get("app.encargo_crear"); ?></a>
                </div>
            <?php else: ?>
                <div style="min-height:40px;">
                    <a class="btn-crear" href="<?php echo e(route("encargo.crear")); ?>"><?php echo app('translator')->get("app.encargo_crear"); ?></a>
                </div>
                <?php $__currentLoopData = $carritos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $carrito): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php $precio = 0; ?>
                    <?php $__currentLoopData = App\Models\Encargo::where('idCar','=',$carrito->idCar)->get()->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $encargo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php $precio+= $encargo->precio; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <div class="carrito-container">
                    <div class="carrito-titulo-btn">
                        <p class="carrito-titulo"><?php echo app('translator')->get("app.carrito"); ?> <?php echo e($carrito->fechaCar); ?></p>
                        <p class="carrito-titulo"><b><?php echo e($precio); ?>€</b></p>
                        <?php if($carrito->estado == "comprando"): ?>
                        <form action="<?php echo e(route("carrito.encargar")); ?>" method="post" style="margin-right:3vw;">
                            <?php echo csrf_field(); ?>
                            <input type="hidden" name="idCar" value="<?php echo e($carrito->idCar); ?>"/>
                            <button class="btn-modificar carrito-encargar" type="submit"><?php echo app('translator')->get("app.encargar_carrito"); ?></button>
                        </form>
                        <?php endif; ?>
                    </div>
                    <div class="encargos-container">   
                    <?php $__currentLoopData = App\Models\Encargo::where('idCar','=',$carrito->idCar)->get()->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $encargo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="encargo-container">
                            <?php if($carrito->estado == "comprando"): ?>
                                <form class="encargo-papelera-form" action="<?php echo e(route("encargo.eliminar")); ?>" method="post">
                                    <?php echo csrf_field(); ?>
                                    <input type="hidden" name="idEnc" value="<?php echo e($encargo->idEnc); ?>">
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
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>
            
        <?php endif; ?>   
        </div>

    </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make("layouts.app", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH T:\xampp\htdocs\ProyectoFinal\resources\views/encargo/main.blade.php ENDPATH**/ ?>