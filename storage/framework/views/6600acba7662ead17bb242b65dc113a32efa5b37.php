

<?php $__env->startSection("content"); ?>

    <div id="cuerpo">
        <div id="galeria-titulo">
            <i><?php echo app('translator')->get("app.galeria"); ?></i>
        </div>
            <?php if(Auth::check() && (Auth::user()->tipoUsu == "admin")): ?>
                <div>
                    <div><a class="btn-crear" href="<?php echo e(route("galeria.formCrear")); ?>"><?php echo app('translator')->get("app.galeria_crear"); ?></a></div>
                </div>
                
                <div id="galeria-container-galerias">
                    
                    <?php $__currentLoopData = $galerias; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $galeria): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="galeria-mostrar">
                            <div class="galeria-item-container">
                                <h2 class="galeria-item galeria-item-nomGal"><b><?php echo e($galeria->nomGal); ?></b></h2>
                                <p class="galeria-item"><?php echo e($galeria->desGal); ?></p>
                                <div class="galeria-btns">
                                    <a class="enlace btn-modificar" href="<?php echo e(route("galeria.modificar",$galeria->idGal)); ?>"><?php echo app('translator')->get("app.etq_modificar"); ?></a>
                                    <form action="<?php echo e(route("galeria.borrar",$galeria->idGal)); ?>" method="post">
                                        <?php echo csrf_field(); ?>
                                        <button type="submit" class="btn-borrar"><?php echo app('translator')->get("app.etq_borrar"); ?></button>
                                    </form>
                                </div>
                            </div>
                            <div class="galeria-imagenes-container">
                                <?php
                                        $imagenes = $galeria->getImagenes()->getResults()->all();
                                        $cant = count($imagenes);
                                        if(count($imagenes) > 4) {
                                            $cant = 4;
                                        }
                                ?>
                                <?php for($i = 0; $i < $cant; $i++): ?>
                                    <img class="galeria-imagen" src="<?php echo e(asset("storage/img/{$imagenes[$i]->rutaImg}")); ?>" draggable="false"/>
                                <?php endfor; ?>
                                
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            <?php else: ?>
                
            <?php endif; ?>
    </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make("layouts.app", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\ProyectoFinal\resources\views/galeria/main.blade.php ENDPATH**/ ?>