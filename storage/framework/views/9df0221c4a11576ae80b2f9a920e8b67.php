 <?php
     $phones = explode(',', $gs->phones);
     $emails = explode(',', $gs->emails);
     $addresses = json_decode($gs->{'addresses_' . $sign});

     $randomPhone = Arr::random($phones);
 ?>

 
 
 

 
 <div class="contact-info  <?php echo e($classes ?? ''); ?>">
    <div class="container pt-5">
        <div class="title_lines">
            <h1>
                <?php echo e(__('للتواصل معنا')); ?>

            </h1>
        </div>
        <div class="row">
            <div class="col-12 col-lg-6 col-md-6">
                <div class="form-maintenance wow animate__animated animate__fadeInRight " data-wow-delay="1s"
                    data-wow-duration="1s">
                    <form action="<?php echo e(route('front.contact.submit')); ?>" name="appointment" id="email-form"
                    method="POST" autocomplete="off" class="cons-contact-form">
                    <?php echo e(csrf_field()); ?>

                    <div class="form-group w-100">
                        <div class="response w-100"></div>
                    </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="first"> <?php echo e(__('الاسم الاول')); ?> </label>
                                    <input type="text" class="form-control fname" name="name"
                                        placeholder="<?php echo e(__('الاسم الاول')); ?>" id="first" required>
                                </div>
                            </div>
                            <!--  col-md-6   -->

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="last"><?php echo e(__('الاسم الاخير')); ?> </label>
                                    <input type="text" class="form-control" name="last_name"
                                        placeholder="<?php echo e(__('الاسم الاخير')); ?>" id="last">
                                </div>
                            </div>
                            <!--  col-md-6   -->
                        </div>


                        <div class="row">
                            <div class="col-md-6">

                                <div class="form-group">
                                    <label for="email"> <?php echo e(__('البريد الالكتروني')); ?></label>
                                    <input type="email" class="form-control" id="email" name="email"
                                        placeholder="<?php echo e(__('البريد الالكتروني')); ?>">
                                </div>
                            </div>
                            <!--  col-md-6   -->

                            <div class="col-md-6">

                                <div class="form-group">
                                    <label for="phone"> <?php echo e(__('رقم التليفون')); ?></label>
                                    <input type="" class="form-control" id="phone" name="phone"
                                        placeholder=" <?php echo e(__('رقم التليفون')); ?>  " required>
                                </div>
                            </div>
                            <!--  col-md-6   -->
                        </div>
                        <!--  row   -->

                        <div class="row">
                            <div class="col-md-6">

                                <div class="form-group">
                                    <label for="address"> <?php echo e(__('العنوان')); ?></label>
                             <input type="text" class="form-control" id="address" name="address"
                                 placeholder=" <?php echo e(__('العنوان')); ?>" required>
                                </div>
                            </div>
                            <div class="col-md-6">

                                <div class="form-group">
                                    <label for="address"> <?php echo e(__('المنطقة')); ?></label>
                                    <input type="text" class="form-control" id="area" name="area"
                                        placeholder="<?php echo e(__('المنطقة')); ?>" required>
                                </div>
                            </div>
                            <div class="col-md-12 ">
                                <div class="form-group">
                                    <label for="email"> <?php echo e(__('الرساله')); ?></label>
                                    <textarea placeholder=" <?php echo e(__('الرساله')); ?>" class="mt-2" name="text" id=""></textarea>
                                </div>

                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary m-auto d-block mt-3"><?php echo e(__('إرسال')); ?></button>
                    </form>
                </div>
            </div>
            <div class="col-12 col-lg-6 col-md-6">
                <div class="address text-end wow animate__animated animate__fadeInLeft" data-wow-delay="1s"
                    data-wow-duration="1s">
                    <div class="container">
                        <div class="row">

                            <div class="col-12">
                                <div class="info-item">
                                    <img src="<?php echo e($gs->{'logo_' . $sign}); ?>" alt="">
                                    <h5 class="title">   <?php echo e(__('للتواصل معنا')); ?></h5>
                                    <?php $__currentLoopData = $phones; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $phone): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if($phone): ?>
                                        <p>
                                            <a href="tel:+2<?php echo e($phone); ?>"><i class="fas fa-phone"></i>
                                                <?php echo e($phone); ?> </a>
                                        </p>
                                    <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php $__currentLoopData = $emails; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $email): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if($email): ?>
                                        <p>
                                            <a href="mailto:<?php echo e($email); ?>"> <i class="fas fa-envelope"></i>
                                                <?php echo e($email); ?></a>
                                        </p>
                                    <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="info-item">
                                    <h5 class="title">   <?php echo e(__('عناوين فروعنا')); ?> </h5>
                                    <?php $__currentLoopData = $addresses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $address): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                     <p> <i class="fas fa-map-marker-alt"></i> <?php echo e($address); ?> </p>
                                     <br>
                                 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                            </div>
                        </div>
                        <!-- <div class="col-xl-6 col-md-6 col-12">
                <div class="responsive-map">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d55209.93468114526!2d31.2979567!3d30.1336591!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x14586a62912082db%3A0x5ccf0d5b5c2a50!2z2KjYp9iz2YjYs9iMINin2YTZgtmG2KfYt9ixINin2YTYrtmK2LHZitip2Iwg2YXYrdin2YHYuNipINin2YTZgtmE2YrZiNio2YrYqQ!5e0!3m2!1sar!2seg!4v1734002666614!5m2!1sar!2seg" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
            </div> -->
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<?php /**PATH C:\laragon\www\admin-cangrows\resources\views/includes/contact-form.blade.php ENDPATH**/ ?>