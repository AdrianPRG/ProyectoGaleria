<link href="<?php echo e(asset('css/piezas.css')); ?>" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<div class="galeria">
    <?php $__currentLoopData = $piezas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pieza): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="pieza">
            <h2><?php echo e($pieza->nombre); ?></h2>
            <img src="<?php echo e($pieza->imagen); ?>" alt="<?php echo e($pieza->nombre); ?>">
            
            <div class="seccion">
                <img src="<?php echo e(asset('storage/imagenesApp/star.png')); ?>" alt="Puntuación">
                <p class="tipo"><b>Puntuacion: <?php echo e($pieza->puntuacion); ?></b></p>
            </div>

            <div class="seccion">
                <img src="<?php echo e(asset('storage/imagenesApp/tipo.png')); ?>" alt="Tipo">
                <p class="tipo"><b>Tipo de Pieza: <?php echo e($pieza->tipo); ?></b></p>
            </div>

            <div class="seccion">
                <img src="<?php echo e(asset('storage/imagenesApp/marca.png')); ?>" alt="Marca">
                <p class="marca">Marca de pieza: <?php echo e($pieza->marca); ?></p>
                <!-- Enlace para ir a fabricante
                <a href="fabricante/<?php echo e($pieza->fabricante_id); ?>">Marca</a> -->

            </div>
            <a href=""><i class="fa fa-eye"></i></a>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div><?php /**PATH C:\xampp\htdocs\DES\ProyectoGaleria\resources\views/piezas.blade.php ENDPATH**/ ?>