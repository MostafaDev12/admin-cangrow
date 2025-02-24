   
   


<?php $__env->startSection('title'); ?>
   
        <?php echo e($gs->{'title_' . $sign}); ?>

     
<?php $__env->stopSection(); ?>

<?php $__env->startSection('gsearch'); ?>
    <meta property="og:image" content=" <?php echo e($gs->{'logo_' . $sign}); ?>" />
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>

  <div class="slider">
    <div class="swiper mySwiper">
      <div class="swiper-wrapper">

        <?php $__currentLoopData = $sliders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $slider): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          
        <!-- Slide 1 -->
        <div class="swiper-slide">
          <div class="overlay"></div>
          <div class="slide-content">
            <h1> <?php echo e($slider->{'title_' . $sign}  ?? ''); ?></h1>
          </div>
          <img src="<?php echo e($slider->{'photo_url'}  ?? ''); ?>" loading="lazy" alt="Slide Image">
        </div>
  
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </div>

      <!-- Pagination -->
      <div class="swiper-pagination"></div>
    </div>
  </div>

  <div class="about-us">
    <div class="container">
      <div class="title_lines">
        <h1>
           <?php echo e(__('نبذه عننا')); ?>

        </h1>
      </div>
      <div class="row">
        <div class="col-12 col-lg-6 col-md-6">
          <div class="  wow animate__animated animate__fadeInRight" data-wow-delay="1s" data-wow-duration="1s">
            <h2> <?php echo e($ps->{'portfolio_title_' . $sign}  ?? ''); ?>   </h2>
            <p >  <?php echo $ps->{'portfolio_details_' . $sign}  ?? ''; ?>  </p>
          </div>
        </div>
        <div class="col-12 col-lg-6 col-md-6">
          <div class="text-center wow animate__animated animate__fadeInLeft" data-wow-delay="1s" data-wow-duration="1s">
            <img width="100%" height="100%" class="m-auto" src="<?php echo e($ps->portfolio_photo); ?>" alt="">
          </div>
        </div>
      </div>
    </div>
  </div>


  <div class="service  p-5">
    <div class="container-fluid">
      <div class="title_lines">
        <h1>
            <?php echo e(__('خدمتنا')); ?>

        </h1>
      </div>
      <div class="row">

        <?php $__currentLoopData = $services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="col-12 col-lg-4 col-md-4">
          <div class="card wow animate__animated animate__zoomIn shadow-lg">
            <img class="card-img-top" src="<?php echo e($service->photo_url); ?>" alt="Card image cap">
            <div class="card-body text-center">
              <h5 class="card-title fw-bold"> <?php echo e($service->{'title_' . $sign}); ?></h5>
              <a href="<?php echo e(route('single-service.index',['slug' => $service->{'slug_' . $sign} ])); ?>" class="btn px-4 py-2 mt-2">     <?php echo e(__('المزيد')); ?>  </a>
            </div>
          </div>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  
      </div>

    </div>
  </div>


  <div class="blog p-5">
    <div class="container-fluid">
      <div class="title_lines">
        <h1>
            <?php echo e(__('مقالات')); ?>

        </h1>
      </div>
      <div class="row">
        <?php $__currentLoopData = $blogs->take(6); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $blog): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="col-12 col-lg-4 col-md-4">
          <div class="card">
            <span>   </span>
            <img class="card-img-top" src="<?php echo e($blog->photo_url); ?>" alt="Card image cap">
            <div class="card-body">
              <h5 class="card-title"> <?php echo e($blog->{'title_' . $sign}); ?>  </h5>
              <p class="card-text"><?php echo e($blog->{'short_details_' . $sign}); ?> </p>

              <a href="<?php echo e(route('single-blog.index',$blog->{'slug_' . $sign})); ?>" class="btn">       <?php echo e(__('المزيد')); ?> <i class="fa-solid fa-arrow-left"></i></a>
            </div>
          </div>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        
      </div>
    </div>
  </div>


  <div class="videos p-5">
    <div class="container-fluid">
      <div class="title_lines">
        <h1>
          <?php echo e(__('فيديوهاتنا')); ?>

        </h1>
      </div>
      <div class="row">

        <?php $__currentLoopData = $videos->take(3); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $video): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="col-12 col-lg-4 col-md-4">
          <div>
            <iframe width="100%" height="300px" src="<?php echo e($video->youtube_url); ?>"
              title="YouTube video player" frameborder="0"
              allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
              referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
          </div>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        
        
      </div>
    </div>
  </div>

  <div class="certificate p-5 ">
    <div class="container-fluid">
        <div class="title_lines">
            <h1>
                 <?php echo e(__('شهاداتنا')); ?>

            </h1>
        </div>
        <div class="row pt-5">

          <?php $__currentLoopData = $reviews->take(4); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $review): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-12 col-lg-3 col-md-3 mb-3">
                
                <div class="position-relative">
                    <div class="overlay">
                        
                    </div>
                    <img src="<?php echo e($review->photo_url); ?>" alt="">
               </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
</div>


<?php echo $__env->make('includes.contact-form',['classes' => 'p-5'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
 

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.front', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\admin-cangrows\resources\views/front/index.blade.php ENDPATH**/ ?>