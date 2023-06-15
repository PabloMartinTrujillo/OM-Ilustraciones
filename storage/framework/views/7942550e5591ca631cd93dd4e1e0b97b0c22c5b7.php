

<?php $__env->startSection("content"); ?>

    <div id="cuerpo">
        <form id="perfil-container" action="<?php echo e(route("usuario.guardarMod")); ?>" method="post" style="height:55vh;">
            <?php echo csrf_field(); ?>
            <input type="hidden" value="<?php echo e($usuario->idUsu); ?>" name="idUsu"/>
            <?php if(Auth::user()->tipoUsu == "admin"): ?>
                <div class="perfil-datos">
                    <label for="tipo" class="perfil-datos-dato"><b><?php echo app('translator')->get("app.etq_tipoUsu"); ?></b></label>
                    <select name="tipo" class="perfil-datos-dato">
                        <option value="admin" <?php if($usuario->tipoUsu == "admin"): ?> selected <?php endif; ?>><?php echo app('translator')->get("app.etq_tipoUsuAdmin"); ?></option>
                        <option value="cliente" <?php if($usuario->tipoUsu == "cliente"): ?> selected <?php endif; ?>><?php echo app('translator')->get("app.etq_tipoUsuCliente"); ?></option>
                    </select>
                </div>
            <?php endif; ?>
            <div class="perfil-datos">
                <label for="nombre" class="perfil-datos-dato"><b><?php echo app('translator')->get("app.usuario_nombreUsu"); ?></b></label>
                <input type="text" class="perfil-datos-dato" name="nombre" value="<?php echo e($usuario->nomUsu); ?>" />
            </div>
            <div class="perfil-datos">
                <label for="email" class="perfil-datos-dato"><b><?php echo app('translator')->get("app.etq_emailUsu"); ?></b></label>
                <input type="text" class="perfil-datos-dato" name="email" value="<?php echo e($usuario->email); ?>" />
            </div>
            <div class="perfil-datos">
                <label for="password" class="perfil-datos-dato"><b><?php echo app('translator')->get("app.etq_contraUsu"); ?></b></label>
                <input type="password" class="perfil-datos-dato" name="password" value="" />
            </div>
            <?php if(Auth::user()->tipoUsu == "admin"): ?>
                <div class="perfil-datos">
                    <label for="fechaCreacion" class="perfil-datos-dato"><b><?php echo app('translator')->get("app.etq_creadoUsu"); ?></b></label>
                    <input type="text" class="perfil-datos-dato" name="fechaCreacion" value="<?php echo e($usuario->fechaCreacionUsu); ?>" disabled/>
                </div>
            <?php endif; ?>
            <div class="perfil-datos">
                <a class="btn-borrar" href="<?php echo e(route("usuario.perfil")); ?>"><?php echo app('translator')->get("app.form_cancelar"); ?></a>
                <button class="btn-modificar" type="submit"><?php echo app('translator')->get("app.form_enviar"); ?></button>
            </div>
        </form>
    </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make("layouts.app", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\ProyectoFinal\resources\views/usuario/modificar.blade.php ENDPATH**/ ?>