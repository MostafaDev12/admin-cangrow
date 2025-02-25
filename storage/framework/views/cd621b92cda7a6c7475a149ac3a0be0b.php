 <!-- #endregion -->
 

 <?php $__env->startSection('title'); ?>
    
 <?php echo e(__('عن الشركة')); ?>  -  <?php echo e($gs->{'title_' . $sign}); ?>

      
 <?php $__env->stopSection(); ?>
 
 <?php $__env->startSection('gsearch'); ?>
     <meta property="og:image" content=" <?php echo e($gs->{'logo_' . $sign}); ?>" />
 <?php $__env->stopSection(); ?>
 
 
 <?php $__env->startSection('content'); ?>
 
    <div class="about-us mt-5 pt-5">
        <div class="container pt-5">
            <div class="title_lines">
                <h1>
                  <?php echo e(__('عن الشركة')); ?>  
                </h1>
            </div>
            <div class="row">
                <div class="">
                    <div class="text-center animate__animated animate__fadeInRight" data-wow-delay="1s" data-wow-duration="1s">
                        <img width="100%" height="400px" class="m-auto" src="<?php echo e($ps->about_photo); ?>" alt="">
                    </div>
                </div>
                <div class="">
                    <div class="pt-5 animate__animated animate__fadeInLeft " data-wow-delay="0.5s" data-wow-duration="1s">
                        <h2> <?php echo e(__('Cairo solar')); ?> </h2>
                        <p >    <?php echo $ps->about_details_ar; ?>  </p>
                    </div>
                </div>

            </div>
        </div>
    </div>

    
    <div class="mission text-center mt-5 p-5">
        <div class="container-fluid">
            <div class="row">

              <?php $__currentLoopData = $models; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $model): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-12 col-lg-6 col-md-6">
                    <div class="border p-4 mb-3">
                        <img src="<?php echo e($model->photo_url); ?>" width="120px" height="120px" alt="">
                        <h1><?php echo e($model->{'title_' . $sign}  ?? ''); ?></h1>
                        
                        <p>  <?php echo e($model->{'details_' . $sign}  ?? ''); ?>  
                            </p>
                    </div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


            </div>
        </div>
    </div>


    <div class="team p-2">
      <div class="container">
        <div class="title_lines">
          <h1>
              <?php echo e(__('فريقنا')); ?>  
          </h1>
      </div>
        <div class="row">

          <?php $__currentLoopData = $teams; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $team): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <div class="col-12 col-lg-4 col-md-6">
            <div class="div-team">
              
              <h1><?php echo e($team->{'title_' . $sign}  ?? ''); ?></h1>
             
              <p>    <?php echo e($team->{'details_' . $sign}  ?? ''); ?>  </p>
            </div>
          </div>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
 

        </div>
      </div>
    </div>

     <?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.front', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\admin-cangrows\resources\views/front/about.blade.php ENDPATH**/ ?>