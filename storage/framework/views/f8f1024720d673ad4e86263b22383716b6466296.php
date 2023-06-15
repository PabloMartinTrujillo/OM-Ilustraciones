

<?php $__env->startSection("content"); ?>

    <div id="cuerpo">
        <?php if(Auth::user()->tipoUsu == "admin"): ?>
            
            <div id="buscador">
                <form action="<?php echo e(route("usuario.perfil")); ?>" method="post">
                    <?php echo csrf_field(); ?>
                    <input type="text" name="email" style="width:70%;color:black;" placeholder="<?php echo app('translator')->get("app.buscar_email"); ?>"/>
                    <button type="submit" id="btn-buscador"><?php echo app('translator')->get("app.buscar"); ?></button>
                </form>
            </div>

            <div id="usuarios-container">
                <div class="usuarios-categorias-container">
                    <div class="usuarios-datos"><b><?php echo app('translator')->get("app.usuario_tipoUsu"); ?></b></div>
                    <div class="usuarios-datos"><b><?php echo app('translator')->get("app.usuario_nombreUsu"); ?></b></div>
                    <div class="usuarios-datos"><b><?php echo app('translator')->get("app.usuario_emailUsu"); ?></b></div>
                    <div class="usuarios-datos"><b><?php echo app('translator')->get("app.usuario_creacionUsu"); ?></b></div>
                    <div class="usuarios-btns"></div>
                </div>

                <?php $__currentLoopData = $usuarios; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $usuario): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="usuarios-datos-container usuarios-usuario">
                        <div class="usuarios-datos"><?php echo e($usuario->tipoUsu); ?></div>
                        <div class="usuarios-datos"><?php echo e($usuario->nomUsu); ?></div>
                        <div class="usuarios-datos"><?php echo e($usuario->email); ?></div>
                        <div class="usuarios-datos"><?php echo e($usuario->fechaCreacionUsu); ?></div>
                        <div class="usuarios-btns">
                            <form action="<?php echo e(route("usuario.modificar", $usuario->idUsu)); ?>" method="get">
                                <button class="btn-modificar" style="padding:2%; color:black;" type="submit"><?php echo app('translator')->get("app.etq_modificar"); ?></button>
                            </form>
                            <form action="<?php echo e(route("usuario.borrar", $usuario->idUsu)); ?>" method="post">
                                <?php echo csrf_field(); ?>
                                <button class="btn-borrar" style="padding: 2%;color:black;" type="submit"><?php echo app('translator')->get("app.etq_borrar"); ?></button>
                            </form>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                
                <?php echo e($usuarios->links()); ?>

            </div>

        <?php else: ?>

            <div id="perfil-container">
                <div class="perfil-datos">
                    <div class="perfil-datos-dato">
                        <b><?php echo app('translator')->get("app.usuario_nombreUsu"); ?></b>
                    </div>
                    <div class="perfil-datos-dato">
                        <?php echo e($usuario->nomUsu); ?>

                    </div>
                    <!-- <form class="perfil-datos-btn" action="" method="get">
                        <button class="btn-modificar" type="submit"><?php echo app('translator')->get("app.perfil_btn-cambiar"); ?></button>
                    </form> -->
                </div>
                <div class="perfil-datos">
                    <div class="perfil-datos-dato">
                        <b><?php echo app('translator')->get("app.etq_contraUsu"); ?></b>
                    </div>
                    <div class="perfil-datos-dato">
                        **********
                    </div>
                    <!-- <form class="perfil-datos-btn" action="" method="get">
                        <button class="btn-modificar" type="submit"><?php echo app('translator')->get("app.perfil_btn-cambiar"); ?></button>
                    </form> -->
                </div>
                <div class="perfil-datos">
                    <div class="perfil-datos-dato">
                        <b><?php echo app('translator')->get("app.etq_emailUsu"); ?></b>
                    </div>
                    <div class="perfil-datos-dato">
                        <?php echo e($usuario->email); ?>

                    </div>
                    <!-- <div class="perfil-datos-btn"></div> -->
                </div>
                <div class="perfil-datos">
                    <div class="perfil-datos-dato">
                        <b><?php echo app('translator')->get("app.etq_creadoUsu"); ?></b>
                    </div>
                    <div class="perfil-datos-dato">
                        <?php echo e($usuario->fechaCreacionUsu); ?>

                    </div>
                    <!-- <div class="perfil-datos-btn"></div> -->
                </div>
            </div>

        <?php endif; ?>
    </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make("layouts.app", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH T:\xampp\htdocs\ProyectoFinal\resources\views/usuario/perfil.blade.php ENDPATH**/ ?>