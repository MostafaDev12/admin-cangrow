 


<?php $__env->startSection('title'); ?>
   
<?php echo e($blog->{'title_' . $sign}); ?>   -  <?php echo e($gs->{'title_' . $sign}); ?>

     
<?php $__env->stopSection(); ?>

<?php $__env->startSection('gsearch'); ?>
    <meta property="og:image" content=" <?php echo e($gs->{'logo_' . $sign}); ?>" />
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>
<?php
$phones =  explode(',', $gs->phones);
 
$randomPhone = Arr::random($phones);
?>

    <div class="details mt-5 pt-5">
        <div class="container pt-5">
            <div class="title_lines ">
                <h1>
                  <?php echo e($blog->{'title_' . $sign}); ?>   
                </h1>
            </div>
            <div class="row">
                <div class="col-12 col-lg-12 col-md-6 mb-5">
                    
                        <img
                          class="item"
                          src="<?php echo e($blog->photo_url); ?>"
                          alt=""
                        />
                      
                        
                   
                </div>
                <div class="col-12 col-lg-12 col-md-6 mb-5">
                    <div class="pt-5 wow animate__animated animate__fadeInRight" data-wow-delay="1s" data-wow-duration="1s">
                      <p>   <?php echo $blog->{'details_' . $sign}; ?>   </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
  

<?php echo $__env->make('includes.contact-form',['classes' => 'p-5'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
 

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.front', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\admin-cangrows\resources\views/front/details-blog.blade.php ENDPATH**/ ?>