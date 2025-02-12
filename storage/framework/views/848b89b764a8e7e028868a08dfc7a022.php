 
  
   


<?php $__env->startSection('title'); ?>
   
        <?php echo e($gs->{'title_' . $sign}); ?>

     
<?php $__env->stopSection(); ?>

<?php $__env->startSection('gsearch'); ?>
    <meta property="og:image" content=" <?php echo e($gs->{'logo_' . $sign}); ?>" />
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>
<div class="slider-phone  d-block  d-md-none">
    <div class="title-doc  wow animate__animated animate__fadeInLeft" data-wow-delay="1s" data-wow-duration="1s">
      <h1>دكتور عبدالرحمن شمس</h1>
      <p>مدرس طب وجراحة العيون جامعة عين شمس
        <br>
        دكتوراه طب وجراحة العيون جامعة عين شمس
        <br>
        استشاري جراحات المياه البيضاء وتصحيح الابصار وعلاج جفاف العيون
      </p>
      <button>اتصل بنا</button>
    </div>
  </div>

  <div class="slider d-md-block d-none" style="background-image: url('<?php echo e($sliders->{'photo'}  ?? ''); ?>');">
    <div class="title-doc  wow animate__animated animate__fadeInLeft" data-wow-delay="1s" data-wow-duration="1s" >
      <h1> <?php echo e($sliders->{'title_' . $sign}  ?? ''); ?> </h1>
      <?php echo $sliders->{'details_' . $sign}  ?? ''; ?>

      <button  onclick="window.location.href='<?php echo e(route('contact.index')); ?>'"> <?php echo e(__('اتصل بنا')); ?>  </button>
    </div>
  </div>


  <div class="about-us bg-white">
    <div class="container position-top box p-5">
      <div class="row">
        <div class="col-12 col-lg-4 col-md-6">
          <div class="p-5 wow animate__animated animate__fadeInLeft" data-wow-delay="1s" data-wow-duration="1s">
            <p> <?php echo e(__('لماذا يعد دكتور عبدالرحمن شمس')); ?> </p>
            <p> <?php echo e(__('افضل دكتور عيون في مصر')); ?> </p>
            <button  onclick="window.location.href='<?php echo e(route('about.index')); ?>'"> <?php echo e(__('عن الدكتور')); ?>  </button>
          </div>
        </div>
        <div class="col-12 col-lg-8 col-md-6">
          <div class="wow animate__animated animate__fadeInRight" data-wow-delay="1s" data-wow-duration="1s">
            <ul>
              <?php $__currentLoopData = $points; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $point): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <li>  <?php echo e($point->{'title_' . $sign}  ?? ''); ?></li>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            
              

            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="about-us-2 bg-white " style="background-color: #f7f7f7 !important;">
    <div class="container p-5">
      <div class="row mb-5">
        <div class="col-12 col-lg-6 col-md-6">
          <div class="pt-5 wow animate__animated animate__fadeInRight" data-wow-delay="1s" data-wow-duration="1s">
            <h1>  <?php echo e($ps->{'portfolio_title_' . $sign}  ?? ''); ?>     </h1>
            <p class="fw-bold">    
              <?php echo $ps->{'portfolio_details_' . $sign}  ?? ''; ?> 
            </p>
          </div>
        </div>
        <div class="col-12 col-lg-6 col-md-6">
          <div class="wow animate__animated animate__fadeInLeft" data-wow-delay="1s" data-wow-duration="1s">
            <img src="<?php echo e($ps->portfolio_photo); ?> " alt="">
          </div>
        </div>
      </div>
      <div class="row mt-5 fw-bold">
        <div class="col-12 col-lg-6">
          <div class="wow animate__animated animate__fadeInRight" data-wow-delay="1s" data-wow-duration="1s">
            <p>   <?php echo e(__('يرجى التواصل معنا أو ارسال رسالة على واتساب على رقم 01118886541')); ?> </p>
          </div>
        </div>
        <div class="col-12 col-lg-6">
          <div class="wow animate__animated animate__fadeInLeft" data-wow-delay="1s" data-wow-duration="1s">
            <p> <?php echo e(__('يشمل مركز دكتور عبدالرحمن شمس افضل دكتور عيون في السعودية ومصر احدث اجهزة الفحص وغرف عمليات جراحية مجهزة بأحدث الميكروسكوبات الجراحية وافضل الاجهزة في عمليات المياه البيضاء وزراعة العدسات و تصحيح الابصار وزراعة القرنية')); ?> </p>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="service text-center p-5 wow animate__animated animate__fadeInDown" data-wow-delay="1s"
    data-wow-duration="1s">
    <div class="container">
      <div class="fw-bold">
        <h1>
          <?php echo e(__('الخدمات')); ?>

        </h1>
      </div>
      <div class="swiper mySwiper mt-4 p-3">
        <div class="swiper-wrapper">

          <?php $__currentLoopData = $services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            
          <div class="swiper-slide">
            <div class="card">
              <img class="card-img-top" src="<?php echo e($service->photo); ?>" alt="Card image cap">
              <div class="card-body">
                <a href="<?php echo e(route('single-service.index',['slug' => $service->{'slug_' . $sign} ])); ?>">  <?php echo e($service->{'title_' . $sign}); ?> </a>
              </div>
            </div>
          </div>

          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  

        </div>
        <div class="swiper-pagination"></div>
      </div>

    </div>
  </div>
  <div class="about-us-3 " style="background-color: #f7f7f7;">
    <div class="container ">
      <div class="row mb-5">
        <div class="col-12 col-lg-6 col-md-6 pt-5">
          <div class="pt-5 mt-4 wow animate__animated animate__fadeInRight" data-wow-delay="1s" data-wow-duration="1s">
            <h1 class="fw-bold fs-3 mb-3"><?php echo e(__('احجز الان كشفك اون لاين')); ?></h1>
            <p class="fw-bold mb-4">   <?php echo e(__('تقدر تحجز كشفك اون لاين مع الدكتور عبدالرحمن املي كل البيانات وهيتم التواصل معاك لتاكيد ميعاد الحجز')); ?> </p>
            <button  onclick="window.location.href='<?php echo e(route('book.index')); ?>'">   <?php echo e(__('حجز الان')); ?></button>
          </div>
        </div>
        <div class="col-12 col-lg-6 col-md-6">
          <div class="wow animate__animated animate__fadeInRight" data-wow-delay="1s" data-wow-duration="1s">
            <img src="<?php echo e(asset('front/dr-shams/')); ?>/img/dc.webp" alt="">
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="service-2 text-center">
    <!-- <div class="overlay">
      
    </div> -->
    <div class="container">
      <div>
        <h1> <?php echo e(__('افضل دكتور عيون وليزك في مصر')); ?> </h1>
        <p>  <?php echo e(__('تواصل الان واحجز ميعاد كشفك مع افضل طبيب عيون ف القاهره')); ?>  </p>
        <button  onclick="window.location.href='<?php echo e(route('contact.index')); ?>'">  <?php echo e(__('اتصل الان')); ?>   </button>
      </div>
      <div class="row">

        <?php $__currentLoopData = $models; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $model): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          
        <div class="col-12 col-lg-4 col-md-6">
          <div class="div-service wow animate__animated animate__fadeInDown" data-wow-delay="1s" data-wow-duration="1s">
            <i class="fas fa-eye"></i>
            <h2>   <?php echo e($model->{'title_' . $sign}  ?? ''); ?> </h2>
            <p> <?php echo e($model->{'details_' . $sign}  ?? ''); ?> </p>
          </div>
        </div>

        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
 
      </div>
    </div>
  </div>
  <div class="blog p-5">
    <div class="container">
      <div class="text-center">
        <span>  <?php echo e(__('اراء العملاء')); ?>  </span>
        <h1 class="fs-3">
          <?php echo e(__('ماذا قال عملاءنا')); ?> 
        </h1>
      </div>
      <div class="swiper mySwiper mt-5">
        <div class="swiper-wrapper">

          <?php $__currentLoopData = $reviews; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $review): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            
          <div class="swiper-slide">
            <div class="card">

              <img class="card-img-top" src="<?php echo e($review->photo); ?>" alt="Card image cap">

            </div>
          </div>

          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
           

        </div>
        <div class="swiper-pagination"></div>
      </div>

    </div>
  </div>
  <div class="pannar">
    <div class="container">
      <div class="row">
        <div class="col-6">
          <p>  <?php echo e(__('هل تريد حجز موعد وسنتواصل معك')); ?>     </p>
        </div>
        <div class="col-6">
          <button   onclick="window.location.href='<?php echo e(route('book.index')); ?>'"> <?php echo e(__('احجز الان')); ?>   </button>
        </div>
      </div>
    </div>
  </div>

  <?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.front', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\admin-cangrows\resources\views/front/index.blade.php ENDPATH**/ ?>