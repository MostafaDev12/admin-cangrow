

<?php $__env->startSection('title'); ?>
   
<?php echo e(__('الخدمات')); ?>  -  <?php echo e($gs->{'title_' . $sign}); ?>

     
<?php $__env->stopSection(); ?>

<?php $__env->startSection('gsearch'); ?>
    <meta property="og:image" content=" <?php echo e($gs->{'logo_' . $sign}); ?>" />
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>


    <div class="header-title ">
        <div class="overlay d-flex justify-content-center align-items-center">
            <h1><?php echo e(__('الخدمات')); ?> </h1>
        </div>

    </div>
    <div class="service">
        <div class="container">
            <div class="row pt-5">

              <?php $__currentLoopData = $services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-12 col-lg-4 col-md-4 mb-3">
                    <div class="text-center box service-div ">
                        <div>
                            <img src="<?php echo e($service->photo); ?>" alt="">
                        </div>
                        <div class=" p-5">
                            <h2 class="fw-bold"> <?php echo e($service->{'title_' . $sign}); ?>   </h2>
                            <a href="<?php echo e(route('single-service.index',['slug' => $service->{'slug_' . $sign} ])); ?>"><span class="mt-3 d-block"> <?php echo e(__('المزيد')); ?><i
                                        class="fa-solid fa-angles-left"></i></span></a>
                        </div>
                    </div>
                </div> 
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


            </div>
        </div>
    </div>  

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.front', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\admin-cangrows\resources\views/front/services.blade.php ENDPATH**/ ?>