

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
    <div class="header-title ">
        <div class="overlay d-flex justify-content-center align-items-center">
           <?php if(!empty(optional($blog->category)->{'title_' . $sign} )): ?> <a href="<?php echo e(route('blogs-category.index',$blog->category->{'slug_' . $sign})); ?>" class=""><?php echo e(optional($blog->category)->{'title_' . $sign}); ?></a> <?php endif; ?>

            <h1> <?php echo e($blog->{'title_' . $sign}); ?>   </h1>
        </div>

    </div>
    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-8 col-md-6">
                    <div class="fw-bold">
                        <img class="mb-4" width="100%" src="<?php echo e($blog->photo); ?>" alt="">
                        
                        <p>   <?php echo $blog->{'details_' . $sign}; ?>   </p>
                     
                    </div>
                </div>
                <div class="col-12 col-lg-4 col-md-6 box">
                    <div class=" p-4">
                        <div class="blog-div">
                            <h2> <?php echo e(__('احدث المقالات')); ?></h2>
                            <hr>

                            <?php $__currentLoopData = App\Models\Blog::orderBy('blog_date', 'desc')->where('id','!=',$blog->id)->limit(6)->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k=> $blogg): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php
                            $k++
                            ?>
                            <div class="d-flex justify-content-between">
                                <div class="pt-2">
                                    <h3> <a href="<?php echo e(route('single-blog.index',$blogg->{'slug_' . $sign})); ?>"> <?php echo e($blogg->{'title_' . $sign}); ?> </a> </h3>
                                    <span><?php echo e($blogg->blog_date); ?></span>
                                </div>
                                <img class="mb-4" src="<?php echo e($blogg->photo); ?>" alt="">
                            </div>

                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
                              
                        </div>
                        <div class="mb-4">
                            <a href="">
                                <img src="<?php echo e(asset('front/dr-shams/')); ?>/img/asa.webp" width="100%" alt="">
                            </a>
                        </div>
                        <form action="<?php echo e(route('front.contact.submit')); ?>" name="appointment" id="email-form" method="POST" autocomplete="off" class="cons-contact-form">
                            <?php echo e(csrf_field()); ?>

                            <div class="form-group w-100">
                              <div class="response w-100"></div>
                            </div>
                            <h3 class="fw-bold fs-5 mb-4"> <?php echo e(__('تواصل معنا')); ?></h3>
                            <div class=" mb-3">
                                <div class="col-12">
                                    <label for="name" class="form-label"><?php echo e(__('الاسم')); ?></label>
                                    <input type="text" id="name" class="form-control w-100 fname" placeholder="<?php echo e(__(key: 'ادخل اسمك')); ?>">
                                </div>
                            </div>
                            <div class=" mb-3">
                                <div class="col-12">
                                    <label for="email" class="form-label"><?php echo e(__('البريد الالكتروني')); ?></label>
                                    <input type="email" id="email" name="email" class="form-control" placeholder="<?php echo e(__('الايميل')); ?>">
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="details" class="form-label"><?php echo e(__('الرسالة')); ?></label>
                                <textarea id="details" name="text" class="form-control" rows="4"
                                    placeholder="<?php echo e(__('اكتب الرسالة')); ?>"></textarea>
                            </div>
                            <input type="hidden" name="blog" value="<?php echo e($blog->{'title_' . $sign}); ?>">
                            <?php if($gs->is_capcha == 1): ?>

                            <ul class="captcha-area">
                              <li>
                                <p><img style="width: 180px;" class="codeimg1" src="<?php echo e(asset("assets/images/capcha_code.png")); ?>" alt=""> <i class="fas fa-sync-alt pointer refresh_code"></i></p>
                            
                              </li>
                              <li>
                                <input name="codes" type="text" class="input-field" placeholder="<?php echo e(__('ادخل الكود')); ?>" required="">
                            
                              </li>
                            </ul>
                            
                            <?php endif; ?>
                            <div class="text-center">
                                <button type="submit" class="btn btn-submit w-100 mt-3 px-5">  <?php echo e(__('إرسال')); ?><i class="fa-solid fa-envelope text-white"></i> </button>
                            </div>
                        </form>
                        <?php
                        $phones =  explode(',', $gs->phones);
                         
                        $randomPhone = Arr::random($phones);
                        ?>
                         <div class="mt-4 mb-4">
                            <i class="fas fa-phone"></i><a class="mb-3" href="tel:+2<?php echo e($randomPhone); ?>"><?php echo e($randomPhone); ?></a> <br>
                            <br>
                            <i class="fab fa-whatsapp"></i><a href="http://wa.me/2<?php echo e($randomPhone); ?>"><?php echo e($randomPhone); ?></a><br>
                        </div>
                       
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
<?php echo $__env->make('layouts.front', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\admin-cangrows\resources\views/front/details-blog.blade.php ENDPATH**/ ?>