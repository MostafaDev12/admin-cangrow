 


<?php $__env->startSection('title'); ?>
   
<?php echo e(__('فيديوهات')); ?>  -  <?php echo e($gs->{'title_' . $sign}); ?>

     
<?php $__env->stopSection(); ?>

<?php $__env->startSection('gsearch'); ?>
    <meta property="og:image" content=" <?php echo e($gs->{'logo_' . $sign}); ?>" />
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>


    <div class="header-title ">
        <div class="overlay d-flex justify-content-center align-items-center">
            <h1><?php echo e(__('فيديوهات')); ?></h1>
        </div>

    </div>
    <div class="videos">
        <div class="container">
            <div class="row pt-5">

              <?php $__currentLoopData = $videos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $video): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-12 col-lg-4 col-md-4 mb-3">
                    <div>
                        <iframe width="400" height="315"
                            src="<?php echo e($video->youtube_url); ?>"
                            title="YouTube video player" frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                            referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>

                    </div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                
            </div>
        </div>
    </div>
    
    <?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.front', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/cangrowonline/public_html/dr-shams/resources/views/front/videos.blade.php ENDPATH**/ ?>