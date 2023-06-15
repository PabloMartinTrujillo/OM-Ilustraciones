

<?php $__env->startSection("content"); ?>

    <div id="cuerpo">
        <div id="imagen-addAOtraGaleria-container">
            <?php
                $galerias = App\Models\Galeria::all();
                $galeriaImg = App\Models\Galeria::find($idGal);
                $imagenEn = DB::table("galeria_imagen")->select("idGal")->where("idImg", "=", $imagen->idImg)->get()->all();
            ?>

            <img src="<?php echo e(asset("storage/img/" . $imagen->rutaImg)); ?>"/>
            <form id="imagen-addAOtraGaleria-form" action="<?php echo e(route("imagen.addAOtraGaleria",["idImg" => $imagen->idImg, "idGal" => $idGal])); ?>" method="post">
                <?php echo csrf_field(); ?>
                <select name="galeria" class="imagen-addAOtraGaleria-form-select">
                    <?php $__currentLoopData = $galerias; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $galeria): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if($galeria->idGal != $galeriaImg->idGal): ?>
                            <option value="<?php echo e($galeria->idGal); ?>"><?php echo e($galeria->nomGal); ?></option>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
                <div id="imagen-addAOtraGaleria-btns">
                    <a class="imagen-btn-cancelar" href="<?php echo e(route("galeria.modificar",$idGal)); ?>"><?php echo app('translator')->get("app.form_cancelar"); ?></a>
                    <button class="btn-crear" style="border: 1px solid black" type="submit"><?php echo app('translator')->get("app.galeria_addImg"); ?></button>
                </div>
            </form>
        </div>
    </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make("layouts.app", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\ProyectoFinal\resources\views/imagen/addAOtraGaleria.blade.php ENDPATH**/ ?>