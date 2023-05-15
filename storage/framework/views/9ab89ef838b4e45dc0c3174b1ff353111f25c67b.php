<head><link rel="stylesheet" href="<?php echo e(asset("../../css/app.css")); ?>"></head>
<div id="login-container">
        <!-- Session Status -->
        <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.auth-session-status','data' => ['class' => 'mb-4','status' => session('status')]]); ?>
<?php $component->withName('auth-session-status'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['class' => 'mb-4','status' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(session('status'))]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
        <!-- Validation Errors -->

        <div id="login-form-container">
            <a id="login-main-btn" href="<?php echo e(route("main")); ?>">
                <svg
                    viewBox="0 0 165.79539 37.999989"
                    version="1.1"
                    id="svg5-login"
                    inkscape:version="1.2.2 (732a01da63, 2022-12-09)"
                    sodipodi:docname="logoAjustado.svg"
                    xmlns:inkscape="http://www.inkscape.org/namespaces/inkscape"
                    xmlns:sodipodi="http://sodipodi.sourceforge.net/DTD/sodipodi-0.dtd"
                    xmlns="http://www.w3.org/2000/svg"
                    xmlns:svg="http://www.w3.org/2000/svg">
                    <sodipodi:namedview
                        id="namedview7"
                        pagecolor="#ffffff"
                        bordercolor="#000000"
                        borderopacity="0.25"
                        inkscape:showpageshadow="2"
                        inkscape:pageopacity="0.0"
                        inkscape:pagecheckerboard="0"
                        inkscape:deskcolor="#d1d1d1"
                        inkscape:document-units="mm"
                        showgrid="false"
                        inkscape:zoom="0.76969697"
                        inkscape:cx="346.88976"
                        inkscape:cy="296.87008"
                        inkscape:window-width="1920"
                        inkscape:window-height="1051"
                        inkscape:window-x="-9"
                        inkscape:window-y="-9"
                        inkscape:window-maximized="1"
                        inkscape:current-layer="layer1" />
                    <defs
                        id="defs2" />
                    <g
                        inkscape:label="Capa 1"
                        inkscape:groupmode="layer"
                        id="layer1"
                        transform="translate(-9.6851654,-10.913053)">
                        <text
                        xml:space="preserve"
                        style="font-style:normal;font-variant:normal;font-weight:normal;font-stretch:normal;font-size:36.7px;font-family:'Helsa Display';-inkscape-font-specification:'Helsa Display, Normal';font-variant-ligatures:normal;font-variant-caps:normal;font-variant-numeric:normal;font-variant-east-asian:normal;fill:#e1c699;fill-opacity:1;stroke-width:2.89151;stroke-dasharray:2.89151, 17.3491"
                        x="10.247646"
                        y="35.251579"
                        id="olgamartint"
                        transform="scale(1.5,1.2210165)"><tspan
                            sodipodi:role="line"
                            id="tspan287"
                            style="font-style:normal;font-variant:normal;font-weight:normal;font-stretch:normal;font-size:36.7px;font-family:'Helsa Display';-inkscape-font-specification:'Helsa Display, Normal';font-variant-ligatures:normal;font-variant-caps:normal;font-variant-numeric:normal;font-variant-east-asian:normal;fill:#e1c699;fill-opacity:1;stroke-width:2.89151"
                            x="-10.247646"
                            y="35.251579">Olgamartint</tspan></text>
                        <text
                        xml:space="preserve"
                        style="font-style:normal;font-variant:normal;font-weight:normal;font-stretch:normal;font-size:16.9333px;font-family:'Aristotelica Pro Text';-inkscape-font-specification:'Aristotelica Pro Text, Normal';font-variant-ligatures:normal;font-variant-caps:normal;font-variant-numeric:normal;font-variant-east-asian:normal;fill:#000000;fill-opacity:1;stroke-width:2.20872;stroke-dasharray:2.20872, 13.2523"
                        x="83.612518"
                        y="24.198959"
                        id="ilustraciones"
                        transform="scale(0.90493069,1.105057)"><tspan
                            sodipodi:role="line"
                            id="tspan9907"
                            style="font-style:normal;font-variant:normal;font-weight:normal;font-stretch:normal;font-size:16.9333px;font-family:'Aristotelica Pro Text';-inkscape-font-specification:'Aristotelica Pro Text, Normal';font-variant-ligatures:normal;font-variant-caps:normal;font-variant-numeric:normal;font-variant-east-asian:normal;fill:#000000;fill-opacity:1;stroke-width:2.20872"
                            x="120"
                            y="24.198959">Ilustraciones</tspan></text>
                        <text
                        xml:space="preserve"
                        style="font-style:normal;font-variant:normal;font-weight:normal;font-stretch:normal;font-size:16.9333px;font-family:'Aristotelica Pro Text';-inkscape-font-specification:'Aristotelica Pro Text, Normal';font-variant-ligatures:normal;font-variant-caps:normal;font-variant-numeric:normal;font-variant-east-asian:normal;fill:#000000;fill-opacity:1;stroke-width:2.20872;stroke-dasharray:2.20872, 13.2523"
                        x="83.612518"
                        y="38.624622"
                        id="personalizadas"
                        transform="scale(0.90493069,1.105057)"><tspan
                            sodipodi:role="line"
                            id="tspan9907-0"
                            style="font-style:normal;font-variant:normal;font-weight:normal;font-stretch:normal;font-size:16.9333px;font-family:'Aristotelica Pro Text';-inkscape-font-specification:'Aristotelica Pro Text, Normal';font-variant-ligatures:normal;font-variant-caps:normal;font-variant-numeric:normal;font-variant-east-asian:normal;fill:#000000;fill-opacity:1;stroke-width:2.20872"
                            x="120"
                            y="39">Personalizadas</tspan></text>
                    </g>
                </svg>
            </a>
            <form method="POST" action="<?php echo e(route('login')); ?>" class="login-form">
                <?php echo csrf_field(); ?>

                <!-- Email Address -->
                <div id="login-items">
                    <div id="login-datos">
                        <div class="login-item">
                            <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.label','data' => ['for' => 'email']]); ?>
<?php $component->withName('label'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['for' => 'email']); ?><?php echo app('translator')->get("app.etq_emailUsu"); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                            <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.input','data' => ['id' => 'email','class' => 'block mt-1 w-full','type' => 'email','name' => 'email','value' => old('email'),'required' => true,'autofocus' => true]]); ?>
<?php $component->withName('input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['id' => 'email','class' => 'block mt-1 w-full','type' => 'email','name' => 'email','value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(old('email')),'required' => true,'autofocus' => true]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                        </div>
        
                        <!-- Password -->
                        <div class="login-item">
                            <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.label','data' => ['for' => 'password']]); ?>
<?php $component->withName('label'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['for' => 'password']); ?><?php echo app('translator')->get("app.etq_contraUsu"); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                            <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.input','data' => ['id' => 'password','class' => 'block mt-1 w-full','type' => 'password','name' => 'password','required' => true,'autocomplete' => 'current-password']]); ?>
<?php $component->withName('input'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['id' => 'password','class' => 'block mt-1 w-full','type' => 'password','name' => 'password','required' => true,'autocomplete' => 'current-password']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                        </div>
                    </div>

                    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.auth-validation-errors','data' => ['class' => 'login-item','errors' => $errors]]); ?>
<?php $component->withName('auth-validation-errors'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['class' => 'login-item','errors' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($errors)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
    
                    
    
                    <div id="login-btns" class="flex items-center justify-end mt-4">
                        
                        <a id="btn-registrar" href="<?php echo e(route("register")); ?>"><b><?php echo app('translator')->get("app.etq_registrarse"); ?></b></a>
                        <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.button','data' => ['id' => 'btn-iniciarSesion']]); ?>
<?php $component->withName('button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['id' => 'btn-iniciarSesion']); ?>
                            <?php echo app('translator')->get("app.etq_iniciarSesion"); ?>
                         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                    </div>
                </div>
                
            </form>
        </div>

        <div id="login-img-container">
            <img id="imgLogin" src="<?php echo e(asset("storage/img/imgLogin.jpg")); ?>" draggable="false"/>
        </div>
</div>
<?php /**PATH C:\xampp\htdocs\ProyectoFinal\resources\views/auth/login.blade.php ENDPATH**/ ?>