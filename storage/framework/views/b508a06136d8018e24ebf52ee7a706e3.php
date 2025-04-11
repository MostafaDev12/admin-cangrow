

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
            <div class="title_lines">
                <h1>
                  <?php echo e($blog->{'title_' . $sign}); ?>   
                </h1>
            </div>
            <div class="row">
                <div class="col-12 col-lg-6 col-md-6 mb-5">
                    <div class="pt-5 wow animate__animated animate__fadeInRight" data-wow-delay="1s" data-wow-duration="1s">
                        
                        <p>   <?php echo $blog->{'details_' . $sign}; ?>   </p>
                      
                    </div>
                </div>
                <div class="col-12 col-lg-6 col-md-6 mb-5">
                    <div class="text-center wow animate__animated animate__fadeInLeft" data-wow-delay="1s" data-wow-duration="1s">
                        <img width="400px" height="400px" class="m-auto" src="<?php echo e($blog->photo_url); ?>" alt="">
                    </div>
                </div>
               
            </div>
        </div>
    </div>
    <div class="service text-center p-5">
        <div class="container-fluid">
          <div class="title_lines">
            <h1>
              <?php echo e(__('احدث المقالات')); ?>

            </h1>
        </div>
            <div class="swiper mySwiper">
                <div class="swiper-wrapper">


                  <?php $__currentLoopData = App\Models\Blog::orderBy('blog_date', 'desc')->where('id','!=',$blog->id)->limit(6)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k=> $blogg): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <?php
                   $date = \Carbon\Carbon::parse($blog->blog_date);
 
                  $k++
                  ?>
                     
                  <div class="swiper-slide">
                    <div class="card" style="width: 18rem;">
                        <img class="card-img-top" src="<?php echo e($blogg->photo_url); ?>" alt="Card image cap">
                        <div class="card-body">
                          <h5 class="card-title"><?php echo e($blogg->{'title_' . $sign}); ?> </h5>
                    
                          <a href="<?php echo e(route('single-blog.index',['year'=> $date->year,'month'=> $date->month,'day'=> $date->day,'blog' => $blogg->{'slug_' . $sign}])); ?>" class="btn"><?php echo e(__('المزيد')); ?></a>
                        </div>
                      </div>
                  </div>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
                    

                </div>
                <div class="swiper-pagination"></div>
              </div>

        </div>
    </div>
    
    <?php echo $__env->make('includes.contact-form',['classes' => 'p-5'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
 
    <?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.front', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\admin-cangrows\resources\views/front/details-blog.blade.php ENDPATH**/ ?>