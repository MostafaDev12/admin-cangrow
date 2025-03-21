   


<?php $__env->startSection('title'); ?>
   
<?php echo e(__('احجز الان')); ?>  -  <?php echo e($gs->{'title_' . $sign}); ?>

     
<?php $__env->stopSection(); ?>

<?php $__env->startSection('gsearch'); ?>
    <meta property="og:image" content=" <?php echo e($gs->{'logo_' . $sign}); ?>" />
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>

    <div class="header-title ">
        <div class="overlay d-flex justify-content-center align-items-center">
            <h1> <?php echo e(__('احجز الان')); ?>  </h1>
        </div>

    </div>

    <div class="contact-form wow animate__animated animate__fadeInUp" data-wow-delay="1s" data-wow-duration="1s">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-6 col-md-6">
                    <div>
                        <img src="<?php echo e(asset('front/dr-shams/')); ?>/img/dc.webp" alt="">
                    </div>
                </div>
                <div class="col-12 col-lg-6 col-md-6">
                    <div class="p-4 pt-5">
                        
                        <form action="<?php echo e(route('front.contact.submit')); ?>" name="appointment" id="email-form" method="POST" autocomplete="off" class="cons-contact-form">
                            <?php echo e(csrf_field()); ?>

                            <div class="form-group w-100">
                              <div class="response w-100"></div>
                            </div>
                            <h3 class="fw-bold fs-5 mb-4"><?php echo e(__('ادخل تفاصيل الحجز')); ?></h3>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="name" class="form-label"><?php echo e(__('الاسم')); ?>*</label>
                                    <input type="text" id="name"  name="name" class="form-control fname" required placeholder="<?php echo e(__(key: 'ادخل اسمك')); ?>">
                                </div>
                                <div class="col-md-6">
                                    <label for="age" class="form-label"><?php echo e(__('السن')); ?></label>
                                    <input type="number" id="age" name="age" class="form-control" placeholder="<?php echo e(__('السن')); ?>">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="mobile" class="form-label"><?php echo e(__('الموبايل')); ?>*</label>
                                    <input type="tel" id="mobile"  name="phone" required class="form-control text-end" placeholder="<?php echo e(__('ادخل رقم الموبيل')); ?>">
                                </div>
                                <div class="col-md-6">
                                    <label for="email" class="form-label">  <?php echo e(__('البريد الالكتروني')); ?> </label>
                                    <input type="email" id="email"  name="email" class="form-control" placeholder="<?php echo e(__('ان وجد')); ?>">
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="specialty" class="form-label"><?php echo e(__('نوع التعب')); ?></label>
                                <input type="text" id="specialty"  name="specialty" class="form-control" placeholder="<?php echo e(__('ادخل اسم التخصص')); ?>">
                            </div>
                            <div class="mb-3">
                                <label for="bookingDate" class="form-label"> <?php echo e(__(' تاريخ الحجز')); ?> </label>
                                <input type="date" id="bookingDate"  name="bookingDate" class="form-control">
                            </div>
                            <input type="hidden" name="reservation" value="1">
                            <div class="mb-3">
                                <label for="details" class="form-label"><?php echo e(__('التفاصيل')); ?></label>
                                <textarea id="details" class="form-control" rows="4" name="text"
                                    placeholder="<?php echo e(__('تفاصيل الحجز')); ?>"></textarea>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-submit w-100 mt-3 px-5">  <?php echo e(__('إرسال')); ?><i class="fa-solid fa-envelope"></i> </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
    $phones =  explode(',', $gs->phones);
    $addresses =  json_decode($gs->{'addresses_' . $sign});
    $randomPhone = Arr::random($phones);
    ?>

    <div class="container mb-5 p-4">
        <div class="text-center">
            <h2 class="fw-bold"><?php echo e(__('هل تريد مساعدة سريعه؟')); ?></h2>
            <p class="fw-bold mt-3"><?php echo e(__('تواصل معنا علي الخط الساخن')); ?></p>
            <?php $__currentLoopData = $phones; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $phone): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                
            <a class="fw-bold fs-5" href="tel:+2<?php echo e($phone); ?>"> <?php echo e($phone); ?> <i class="fas fa-phone"></i></a>

            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
    <div class="contact p-4 mt-3">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-6 col-md-4">
                    <div class="p-4 mt-4 wow animate__animated animate__fadeInLeft" data-wow-delay="1s" data-wow-duration="1s">
                        <span class="mb-3 d-block">  <?php echo e(__('ابقى على تواصل')); ?></span>
                        <p>  <?php echo e(__('يمكنكم زياراتنا ومراسلتنا')); ?></p>
                        <p><?php echo e(__('نعمل علي مدار اليوم لاستقبال طلباتكم')); ?></p>
                    </div>
                </div>
                <div class="col-12 col-lg-3 col-md-4">
                    <div class="text-center mb-3 contact-div p-4 wow animate__animated animate__fadeInDown" data-wow-delay="1s" data-wow-duration="1s">
                        <i class="fas fa-location"></i>
                        <h2><?php echo e(__('العنوان')); ?></h2>
                        <?php $__currentLoopData = $addresses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $address): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                
                        <p> <?php echo e($address); ?>  </p>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
                <div class="col-12 col-lg-3 col-md-4">
                    <div class="text-center contact-div p-4 wow animate__animated animate__fadeInDown" data-wow-delay="1s" data-wow-duration="1s">
                        <i class="fas fa-phone"></i>
                        <h2><?php echo e(__('الموبيل')); ?></h2>
                        <?php $__currentLoopData = $phones; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $phone): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <a href="tel:+2<?php echo e($phone); ?>"><?php echo e($phone); ?></a>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
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
<?php echo $__env->make('layouts.front', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\admin-cangrows\resources\views/front/reservation.blade.php ENDPATH**/ ?>