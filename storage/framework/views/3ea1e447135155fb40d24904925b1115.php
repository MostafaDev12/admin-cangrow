

<?php $__env->startSection('title'); ?>
   
<?php echo e(__('الخدمات')); ?>  -  <?php echo e($gs->{'title_' . $sign}); ?>

     
<?php $__env->stopSection(); ?>

<?php $__env->startSection('gsearch'); ?>
    <meta property="og:image" content=" <?php echo e($gs->{'logo_' . $sign}); ?>" />
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>


    <div class="service mt-5 pt-5">
        <div class="container pt-5">
            <div class="title_lines">
                <h1>
                <?php echo e(__('خدمتنا')); ?>

                </h1>
            </div>
            <div class="row pt-5 text-center">

              <?php $__currentLoopData = $services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-12 col-lg-3 col-md-3 mb-3">
                    
                    <div class="position-relative">
                         <div class="card">
                        <img class="card-img-top" src="<?php echo e($service->photo_url); ?>" alt="Card image cap">
                        <div class="card-body">
                          <h5 class="card-title">   <?php echo e($service->{'title_' . $sign}); ?></h5>
                    
                          <a href="<?php echo e(route('single-service.index',['slug' => $service->{'slug_' . $sign} ])); ?>" class="btn"><?php echo e(__('المزيد')); ?></a>
                        </div>
                      </div>
                   </div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  
                 
            </div>
        </div>
    </div>

    <?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.front', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\admin-cangrows\resources\views/front/services.blade.php ENDPATH**/ ?>