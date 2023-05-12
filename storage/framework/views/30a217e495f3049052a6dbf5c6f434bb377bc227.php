<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

        <title><?php echo e(config('app.name', 'Olgamartínt')); ?></title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        
        <link rel="stylesheet" href="<?php echo e(asset('/css/app.css')); ?>">
        

        <!-- Scripts -->
            
        <script src="<?php echo e(asset('js/app.js')); ?>" defer></script>
    </head>
    
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
            

            <!-- Page Heading -->
            
            <nav> 

                <div id="nav" class="header">
                    
                    <a class="enlace" href="<?php echo e(route("main")); ?>"><?php echo app('translator')->get("app.btn_inicio"); ?></a>
                    <a class="enlace" href=""><?php echo app('translator')->get("app.btn_encargos"); ?></a>

                    <?php if(Auth::check()): ?>
                        
                        <a class="enlace" href="">
                            <?php if(Auth::user()->tipoUsu == "cliente"): ?> <?php echo app('translator')->get("app.btn_perfil"); ?>
                                <?php else: ?> <?php echo app('translator')->get("app.admin_usuarios"); ?>
                                <?php endif; ?>
                        </a>

                        
                        <a class="enlace" href="<?php echo e(route("galeria.mostrar")); ?>"><?php echo app('translator')->get("app.btn_galeria"); ?></a>
                        
                        <div class="divSaludoLogOut">
                            <div class="self-center mr-4"><?php echo app('translator')->get("app.saludo"); ?><?php echo e(Auth::user()->nomUsu); ?></div>
                            <div class="self-center mr-4">
                                <form action="<?php echo e(route("logout")); ?>" method="post">
                                    <?php echo csrf_field(); ?>
                                    <button class="btn-salir"><?php echo app('translator')->get("app.btn_salir"); ?></button>
                                </form>
                            </div>
                        </div>

                    <?php else: ?>
                        <div><?php echo app('translator')->get("app.invitado"); ?></div>
                        
                        <a class="enlace" href="<?php echo e(route("galeria.mostrar")); ?>"><?php echo app('translator')->get("app.btn_galeria"); ?></a>
                        <div class="flex flex-row">
                            <div class="self-center mr-4">
                                <form action="<?php echo e(route("login")); ?>" method="get">
                                    <button class="btn-salir px-3 py-1.5 rounded-lg"><?php echo app('translator')->get("app.btn_iniciarSesion"); ?></button>
                                </form>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </nav>

            <!-- Page Content -->
            <main>
                <?php echo $__env->yieldContent("content"); ?>
            </main>
        </div>
    </body>
</html>
<?php /**PATH C:\xampp\htdocs\ProyectoFinal\resources\views/layouts/app.blade.php ENDPATH**/ ?>