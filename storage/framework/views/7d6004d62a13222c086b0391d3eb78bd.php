    


<?php $__env->startSection('title'); ?>
   
<?php echo e(__('مقالات')); ?>  -  <?php echo e($gs->{'title_' . $sign}); ?>

     
<?php $__env->stopSection(); ?>

<?php $__env->startSection('gsearch'); ?>
    <meta property="og:image" content=" <?php echo e($gs->{'logo_' . $sign}); ?>" />
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>

    <div class="blogs text-center mt-5 pt-5">
        <div class="container pt-5">
            <div class="title_lines">
                <h1>
                    <?php echo e(__('مقالات')); ?> 
                </h1>
            </div>
            <div class="row pt-5">

                <?php $__currentLoopData = $blogs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $blog): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-12 col-lg-3 col-md-3 mb-3">
                    <?php
                    $date = \Carbon\Carbon::parse($blog->blog_date);

                ?>
                    <div class="position-relative">
                         <div class="card" style="width: 18rem;">
                            <span>  <?php echo e(optional($blog->category)->{'title_' . $sign}); ?> </span>
                        <img class="card-img-top" src="<?php echo e($blog->photo_url); ?>" alt="Card image cap">
                        <div class="card-body">
                          <h5 class="card-title"><?php echo e($blog->{'title_' . $sign}); ?></h5>
                         <p class="card-text"><?php echo e($blog->{'short_details_' . $sign}); ?>   </p>

                          <a href="<?php echo e(route('single-blog.index',['year'=> $date->year,'month'=> $date->month,'day'=> $date->day,'blog' => $blog->{'slug_' . $sign}])); ?>" class="btn"><?php echo e(__('المزيد')); ?></a>
                        </div>
                      </div>
                   </div>
                </div>

                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                
               
                
            </div>
            <?php echo e($blogs->links('includes.pagination.custom')); ?>

        </div>
    </div>
     <?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.front', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\admin-cangrows\resources\views/front/blogs.blade.php ENDPATH**/ ?>