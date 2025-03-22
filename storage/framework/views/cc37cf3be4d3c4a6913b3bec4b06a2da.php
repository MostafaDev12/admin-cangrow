<?php $__env->startSection('title'); ?>
   
<?php echo e(__('فيديوهاتنا')); ?>  -  <?php echo e($gs->{'title_' . $sign}); ?>

     
<?php $__env->stopSection(); ?>

<?php $__env->startSection('gsearch'); ?>
    <meta property="og:image" content=" <?php echo e($gs->{'logo_' . $sign}); ?>" />
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>

    <div class="videos mt-5 pt-5">
        <div class="container pt-5">
            <div class="title_lines">
                <h1>
 <?php echo e(__('فيديوهاتنا')); ?>

                </h1>
            </div>
            <div class="row pt-5">
                <?php $__currentLoopData = $videos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $video): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-12 col-lg-4 col-md-4 mb-3">
                    <div>
                        <iframe width="400px" height="250px" src="<?php echo e($video->youtube_url); ?>" frameborder="0" allowfullscreen></iframe>
                        <h2 class="desc-video"><?php echo e($video->{'title_' . $sign}); ?> </h2>
                        
                   </div>
                </div>
                
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </div>
   <?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.front', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\admin-cangrows\resources\views/front/videos.blade.php ENDPATH**/ ?>