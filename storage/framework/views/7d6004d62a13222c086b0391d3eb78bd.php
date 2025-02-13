  


<?php $__env->startSection('title'); ?>
   
<?php echo e(__('مقالات')); ?>  -  <?php echo e($gs->{'title_' . $sign}); ?>

     
<?php $__env->stopSection(); ?>

<?php $__env->startSection('gsearch'); ?>
    <meta property="og:image" content=" <?php echo e($gs->{'logo_' . $sign}); ?>" />
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>

 <div class="header-title ">
     <div class="overlay d-flex justify-content-center align-items-center">
         <h1><?php echo e(__('مقالات')); ?></h1>
     </div>

 </div>
 <div class="blogs">
     <div class="container">
         <div class="row pt-5">

          <?php $__currentLoopData = $blogs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $blog): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
             <div class="col-12 col-lg-4 col-md-4 mb-3">
                 <div class="box blogs-div ">
                     <div>
                         <a href="<?php echo e(route('single-blog.index',$blog->{'slug_' . $sign})); ?>"><img src="<?php echo e($blog->photo); ?>" alt=""></a>
                     </div>
                     <div class="p-4">
                         <h2 class="fw-bold"> <a href="<?php echo e(route('single-blog.index',$blog->{'slug_' . $sign})); ?>"> <?php echo e($blog->{'title_' . $sign}); ?> </a></h2>
                         <p class="fw-bold"> <?php echo e($blog->{'short_details_' . $sign}); ?> </p>
                         <a href="<?php echo e(route('single-blog.index',$blog->{'slug_' . $sign})); ?>"><span class="mt-3 d-block"> <?php echo e(__('المزيد')); ?><i
                                     class="fa-solid fa-angles-left"></i></span></a>
                         <hr>
                         <p class="date-blogs"> <?php echo e($blog->blog_date); ?> </p>
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