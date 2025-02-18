<!DOCTYPE html>
<html lang="en" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <?php

        $ps = App\Models\Pagesetting::find(1);

    ?>




<meta property="og:title" content="<?php echo e($gs->{'title_' . $sign}); ?>">
<meta property="og:description" content="Engage teams, schools, and social groups with SABEQ's interactive challenge-based games. Start building your custom game today!">
<meta property="og:image" content="<?php echo e($gs->{'logo_' . $sign}); ?>">
<meta property="og:url" content="<?php echo e(url('/')); ?>">
<meta property="og:type" content="website">



    <?php if(isset($page->meta_tag) && isset($page->meta_description)): ?>
        <meta name="keywords" content="<?php echo e($page->meta_tag); ?>">
        <meta name="description" content="<?php echo e($page->meta_description); ?>">
        <title><?php echo $__env->yieldContent('title'); ?> -

            <?php echo e($gs->{'title_' . $sign}); ?>


        </title>
    <?php elseif(isset($blog->meta_tag) && isset($blog->meta_description)): ?>
        <meta name="keywords" content="<?php echo e($blog->meta_tag); ?>">
        <meta name="description" content="<?php echo e($blog->meta_description); ?>">
    <?php else: ?>
        <meta name="+author" content=" <?php echo e($gs->{'title_' . $sign}); ?>">
        <title>
            <?php echo $__env->yieldContent('title'); ?>
        </title>
    <?php endif; ?>



    <script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "Organization",
      "url": "<?php echo e(url('/')); ?>",
      "logo": "<?php echo e($gs->{'logo_' . $sign}); ?>"
    }
    </script>
    <script type="application/ld+json">
  {
    "@context": "https://schema.org",
    "@type": "Organization",
    "name": "<?php echo e($gs->{'title_' . $sign}); ?>",
    "url": "<?php echo e(url('/')); ?>",
    "description": "",
    "image": "<?php echo e($gs->{'logo_' . $sign}); ?>",
      "logo": "<?php echo e($gs->{'logo_' . $sign}); ?>",
      "sameAs": ["<?php echo e(App\Models\Socialsetting::find(1)->facebook); ?>", "<?php echo e(App\Models\Socialsetting::find(1)->twitter); ?>", "<?php echo e(App\Models\Socialsetting::find(1)->instagram); ?>"],
    "telephone": "",
    "address": {
      "@type": "PostalAddress",
      "streetAddress": "",
      "addressLocality": "",
      "addressRegion": "Cairo",
      "postalCode": "11341",
      "addressCountry": "Egypt"
    }
  }
</script>



    <?php echo $__env->yieldContent('gsearch'); ?>
    <!-- Google Font -->

    <!-- favicon -->
    <link rel="icon" type="image/x-icon" href="<?php echo e($gs->favicon); ?>" />
    <!-- bootstrap -->

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Oswald&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">


    <link rel="stylesheet" href="<?php echo e(asset('front/dr-shams/')); ?>/css/style.css">



    <link rel="stylesheet" href="<?php echo e(asset('build/css/toastr.css')); ?>">

    <?php echo $__env->yieldContent('css'); ?>


</head>

<body>

  <?php
  $phones =  explode(',', $gs->phones);
  $emails =   explode(',', $gs->emails);
  $addresses =  json_decode($gs->{'addresses_' . $sign});

  $randomPhone = Arr::random($phones);
  ?>
    <div class="header-social text-center">
        <div class="container">
            <div class="row">
                <div class="col-4">
                    <div class="d-flex justify-content-center justify-content-evenly">
                      <?php if(App\Models\Socialsetting::find(1)->f_status == 1): ?>   <a target="_blank"  href="<?php echo e(App\Models\Socialsetting::find(1)->facebook); ?>"> <i class="fab fa-facebook"></i></a>  <?php endif; ?>
                      <?php if(App\Models\Socialsetting::find(1)->ystatus == 1): ?>    <a target="_blank"  href="<?php echo e(App\Models\Socialsetting::find(1)->youtube); ?>"> <i class="fab fa-youtube"></i></a>  <?php endif; ?>
                      <?php if(App\Models\Socialsetting::find(1)->t_status == 1): ?>    <a target="_blank"  href="<?php echo e(App\Models\Socialsetting::find(1)->twitter); ?>">  <i class="fab fa-instagram"></i></a>  <?php endif; ?>
                      <?php if(App\Models\Socialsetting::find(1)->d_status == 1): ?>     <a target="_blank"  href="<?php echo e(App\Models\Socialsetting::find(1)->dribble); ?>">  <i class="fab fa-tiktok"></i></a>  <?php endif; ?>
                    </div>
                </div>
                <div class="col-4">
                    <a target="_blank"  href="http://wa.me/2<?php echo e($randomPhone); ?>"><i class="fab fa-whatsapp"></i> <?php echo e($randomPhone); ?></a>
                </div>
                <div class="col-4">
                    <a href="tel:+2<?php echo e($randomPhone); ?>"><i class="fas fa-phone"></i> <?php echo e($randomPhone); ?> </a>
                </div>
            </div>
        </div>
    </div>
    <div class="header">
        <nav class="navbar navbar-expand-lg bg-white">
            <div class="container-fluid">
                <a class="navbar-brand wow animate__animated animate__fadeInDown" data-wow-delay="1s"
                    data-wow-duration="1s" href="<?php echo e(route('front.index', $sign)); ?>"><img
                        src="<?php echo e($gs->{'logo_' . $sign}); ?>" alt="RGS Logo"></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavDropdown">
                    <ul class="navbar-nav wow animate__animated animate__fadeInDown" data-wow-delay="1s"
                        data-wow-duration="1s">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page"
                                href="<?php echo e(route('front.index')); ?>"><?php echo e(__('الرئيسية')); ?> </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo e(route('about.index')); ?>"><?php echo e(__('عن الشركة')); ?></a>
                        </li>





                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="<?php echo e(route('services.index')); ?>" id="servicesDropdown" role="button"
                                aria-expanded="false">
                                <?php echo e(__('الخدمات')); ?>

                            </a>
                            <ul class="dropdown-menu" aria-labelledby="servicesDropdown">

                                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li class="dropdown">
                                <a  <?php if(count($category->services) > 0): ?> <?php endif; ?>   class="dropdown-item dropdown-toggle" href="#"><?php echo e($category->{'title_' . $sign}); ?></a>
                                <?php if(count($category->services) > 0): ?>
                                <ul class="dropdown-menu"> 
                                    
                                
                                    <?php $__currentLoopData = $category->services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li><a class="dropdown-item" href="<?php echo e(route('single-service.index',['slug' => $service->{'slug_' . $sign} ])); ?>"><?php echo e($service->{'title_' . $sign}); ?>  </a></li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    
                                </ul>
                                <?php endif; ?>
                                </li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                

                                <?php $__currentLoopData = $servicesWithoutCats; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li class="dropdown">
                                <a    class="dropdown-item dropdown-toggle" href="<?php echo e(route('single-service.index',['slug' => $service->{'slug_' . $sign} ])); ?>"><?php echo e($service->{'title_' . $sign}); ?></a>
                              
                                </li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                
                            </ul>
                       </li>


                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo e(route('videos.index')); ?>"><?php echo e(__('الفيديوهات')); ?></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo e(route('blogs.index')); ?>"><?php echo e(__('المقالات')); ?></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo e(route('book.index')); ?>"> <?php echo e(__('احجز الان')); ?>  </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo e(route('contact.index')); ?>">   <?php echo e(__('اتصل بنا')); ?></a>
                        </li>

                    </ul>
                </div>
            </div>
        </nav>
    </div>



    <?php echo $__env->yieldContent('content'); ?>



    <section class="footer-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 ">
                    <div class="logo">
                        <img src="<?php echo e($gs->{'logo_' . $sign}); ?>" alt="RGS Logo">
                    </div>
                    <p class="branch-info fw-bold">
                      <?php echo e($gs->{'footer_' . $sign}); ?>

                    </p>
                </div>
                <div class="col-lg-2 col-md-6 ">
                    <h1><?php echo e(__('روابط هامة')); ?></h1>
                    <ul class="list-unstyled">
                        <li><a href="<?php echo e(route('front.index')); ?>"><?php echo e(__('الرئيسية')); ?></a></li>
                        <li><a href="<?php echo e(route('about.index')); ?>"> <?php echo e(__('عن الشركة')); ?> </a></li>
                        <li><a href="<?php echo e(route('services.index')); ?>"> <?php echo e(__('الخدمات')); ?></a></li>
                        <li><a href="<?php echo e(route('videos.index')); ?>"><?php echo e(__('الفيديوهات')); ?></a></li>
                        <li><a href="<?php echo e(route('book.index')); ?>"><?php echo e(__('احجز الان')); ?></a></li>
                        <li><a href="<?php echo e(route('contact.index')); ?>">    <?php echo e(__('اتصل بنا')); ?></a></li>
                    </ul>
                </div>
                <div class="col-lg-3 col-md-6 ">
                    <h1> <?php echo e(__('الخدمات')); ?></h1>
                    <ul class="list-unstyled">
                      <?php $__currentLoopData = $services->shuffle()->take(6); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <li><a href="<?php echo e(route('single-service.index',['slug' => $service->{'slug_' . $sign} ])); ?>"> <?php echo e($service->{'title_' . $sign}); ?>  </a></li>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                     
                       

                    </ul>
                </div>
                <!-- تواصل معنا -->
                <div class="col-lg-4 col-md-6 ">
                    <h1> <?php echo e(__('تواصل معنا')); ?></h1>
                    <p class="contact-info">
                      <?php $__currentLoopData = $phones; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $phone): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
 
                      <i class="fas fa-phone"></i><a href="tel:+2<?php echo e($phone); ?>"><?php echo e($phone); ?></a> <br>

                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                     <?php $__currentLoopData = $phones; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $phone): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                      <i class="fab fa-whatsapp"></i><a target="_blank"  href="http://wa.me/2<?php echo e($phone); ?>" target="_blank"><?php echo e($phone); ?></a><br>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                      <?php $__currentLoopData = $addresses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $address): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <i class="fas fa-location"></i> <a href="#">   <?php echo e($address); ?>   </a>
                        <br>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </p>
                </div>
            </div>
            <hr>
            <p class="text-center fw-bold">جميع الحقوق محفوظة © <?php echo e(date('Y')); ?>  <a target="_blank" href="https://cangrowonline.com">CanGrow Digital Marketing Agency</a>      </p>
        </div>
    </section>
    <div class="social-media">
        <ul class="custom">

           <?php if(App\Models\Socialsetting::find(1)->f_status == 1): ?>   <a href="<?php echo e(App\Models\Socialsetting::find(1)->facebook); ?>" target="_blank"> <i class="fab fa-facebook"></i></a>  <?php endif; ?>
                      <?php if(App\Models\Socialsetting::find(1)->ystatus == 1): ?>    <a href="<?php echo e(App\Models\Socialsetting::find(1)->youtube); ?>" target="_blank"> <i class="fab fa-youtube"></i></a>  <?php endif; ?>
                      <?php if(App\Models\Socialsetting::find(1)->t_status == 1): ?>    <a href="<?php echo e(App\Models\Socialsetting::find(1)->twitter); ?>" target="_blank">  <i class="fab fa-instagram"></i></a>  <?php endif; ?>
                      <?php if(App\Models\Socialsetting::find(1)->d_status == 1): ?>     <a href="<?php echo e(App\Models\Socialsetting::find(1)->dribble); ?>" target="_blank">  <i class="fab fa-tiktok"></i></a>  <?php endif; ?>

        </ul>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.2/jquery.min.js"
        integrity="sha512-tWHlutFnuG0C6nQRlpvrEhE4QpkG1nn2MOUMWmUeRePl4e3Aki0VB6W1v3oLjFtd0hVOtRQ9PHpSfN6u6/QXkQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js"
        integrity="sha512-HGOnQO9+SP1V92SrtZfjqxxtLmVzqZpjFFekvzZVWoiASSQgSr4cw9Kqd2+l8Llp4Gm0G8GIFJ4ddwZilcdb8A=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js"
        integrity="sha512-Eak/29OTpb36LLo2r47IpVzPBLXnAMPAVypbSZiZ4Qkf8p/7S/XRG5xp7OKWPPYfJT6metI+IORkR5G8F900+g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        new WOW().init();
    </script>
    <script>
        let lastScrollTop = 0;
        const header = document.querySelector('.header');

        window.addEventListener('scroll', () => {
            const currentScroll = window.pageYOffset;

            if (currentScroll > lastScrollTop) {
                // Scroll Down
                header.classList.add('hidden');
            } else {
                // Scroll Up
                header.classList.remove('hidden');
            }

            lastScrollTop = currentScroll <= 0 ? 0 : currentScroll; // For Mobile or negative scrolling
        });
        const headerSocial = document.querySelector('.header-social');

        // استماع لحدث التمرير
        window.addEventListener('scroll', () => {
            if (window.scrollY > headerSocial.offsetHeight) {
                // إضافة كلاس عندما يتم التمرير
                document.body.classList.add('scrolled');
            } else {
                // إزالة الكلاس عندما نعود للأعلى
                document.body.classList.remove('scrolled');
            }
        });
    </script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.0.7/js/swiper.min.js"
        integrity="sha512-vKtlh10whXT2NhAshnxhceCdwq/bMyMrfeZ3p2IaF89qGCwbC94ATb7Qyg8cFs8EL3Hgz9bJBF++ZWfKn4ligg=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lazysizes/3.0.0-rc3/lazysizes.min.js"
        integrity="sha512-HMnm5Dp1stoEycrUKuMyGDHIudidstU6uRwRgRxPbl2jNxU9xS2B0XLon7xowk3ZitrjNw7WIbQwXroIwY33sw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.13.2/jquery-ui.min.js"
        integrity="sha512-57oZ/vW8ANMjR/KQ6Be9v/+/h6bq9/l3f0Oc7vn6qMqyhvPd1cvKBRWWpzu0QoneImqr2SkmO4MSqU+RpHom3Q=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        var swiper = new Swiper(".service  .mySwiper", {
            autoplay: {
                delay: 3000,
            },
            loop: true,
            slidesPerView: 4,
            spaceBetween: 20,
            breakpoints: {
                // when window width is >= 320px
                320: {
                    slidesPerView: 1,
                    spaceBetween: 20
                },
                // when window width is >= 480px
                480: {
                    slidesPerView: 1,
                    spaceBetween: 30
                },
                // when window width is >= 640px
                640: {
                    slidesPerView: 1,
                    spaceBetween: 40
                },
                1024: {
                    slidesPerView: 4,
                    spaceBetween: 20
                }
            }
        });
        var swiper = new Swiper(".blog .mySwiper", {
            autoplay: {
                delay: 3000,
            },
            loop: true,
            slidesPerView: 4,
            spaceBetween: 20,

            breakpoints: {
                // when window width is >= 320px
                320: {
                    slidesPerView: 1,
                    spaceBetween: 20
                },
                // when window width is >= 480px
                480: {
                    slidesPerView: 1,
                    spaceBetween: 30
                },
                // when window width is >= 640px
                640: {
                    slidesPerView: 1,
                    spaceBetween: 40
                },
                1024: {
                    slidesPerView: 3,
                    spaceBetween: 20
                }
            }
        });
    </script>


    <script src="<?php echo e(asset('build/js/toastr.js')); ?>"></script>

    <script type="text/javascript">
        var mainurl = "<?php echo e(url('/' . $sign)); ?>";
        var mainurl2 = "<?php echo e(url('/')); ?>";
        var gs = <?php echo json_encode($gs); ?>;
        var langg = <?php echo json_encode($sign); ?>;
        var mainurl2 = "<?php echo e(url('/')); ?>";

        $(".selectors").on('change', function() {
            var url = $(this).val();
            window.location = url;
        });
    </script>
    <Script>
        $(document).on('submit', '#subscribeform', function(e) {
            e.preventDefault();
            console.log(12);
            $('#sub-btn').prop('disabled', true);
            console.log(13);
            $.ajax({
                method: "POST",
                url: $(this).prop('action'),
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                success: function(data) {
                    console.log(14);
                    if ((data.errors)) {
                        console.log(15);
                        $('.alert-danger').show();
                        $('.alert-danger ul').html('');
                        for (var error in data.errors) {
                            $('.alert-danger ul').append('<li>' + data.errors[error] + '</li>');
                        }

                    } else {
                        console.log(16);
                        toastr.success(langg.subscribe_success);
                        $('.alert-danger').hide();
                        $('.alert-success').show();
                        $('.alert-success p').html(langg.subscribe_success);

                    }

                    $('#sub-btn').prop('disabled', false);


                }

            });

        });
    </script>


    <script>
        $(document).on('submit', '#email-form', function(e) {
            e.preventDefault();
            $('.gocover').show();
            $('.submit-btn').prop('disabled', true);
            var name = $('.fname').val();



            if (name == '') {
                $('#email-form .response').html(
                    '<div class="failed alert alert-warning">Please fill the required fields.</div>');
                $('button.submit-btn').prop('disabled', false);
                return false;
            }

            $.ajax({
                method: "POST",
                url: $(this).prop('action'),
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                beforeSend: function() {
                    $('#email-form .response').html(
                        '<div class="text-info">Loading...</div>'
                    );
                    console.log(1);
                },
                success: function(data) {
                    console.log(2);
                    if ((data.errors)) {
                        console.log(3);
                        $('.alert-success').hide();
                        $('.alert-danger').show();
                        $('#email-form .response').html('');
                        for (var error in data.errors) {
                            console.log(4);
                            $('#email-form .response').append('<li>' + data.errors[error] + '</li>')
                        }
                        $('#email-form input[type=text], #email-form input[type=email], #email-form textarea')
                            .eq(0).focus();
                        $('#email-form .refresh_code').trigger('click');

                    } else {
                        console.log(5);
                        $('.alert-danger').hide();
                        $('.alert-success').show();
                        $('#email-form .response').html(data);
                        $('#email-form input[type=text], #email-form input[type=email], #email-form textarea')
                            .eq(0).focus();
                        $('#email-form input[type=text], #email-form input[type=email], #email-form textarea')
                            .val('');
                        $('#email-form .refresh_code').trigger('click');

                    }
                    console.log(6);
                    $('.gocover').hide();
                    $('button.submit-btn').prop('disabled', false);
                }

            });

        });


        $(document).on('submit', '#appointment-form', function(e) {
            e.preventDefault();
            $('.gocover').show();
            $('.submit-btn').prop('disabled', true);
            var name = $('.fname').val();



            if (name == '') {
                $('#appointment-form .response').html(
                    '<div class="failed alert alert-warning">Please fill the required fields.</div>');
                $('button.submit-btn').prop('disabled', false);
                return false;
            }

            $.ajax({
                method: "POST",
                url: $(this).prop('action'),
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                beforeSend: function() {
                    $('#appointment-form .response').html(
                        '<div class="text-info"><img src="<?php echo e(asset('assets/images/preloader.gif')); ?>"> Loading...</div>'
                    );
                    console.log(1);
                },
                success: function(data) {
                    console.log(2);
                    if ((data.errors)) {
                        console.log(3);
                        $('.alert-success').hide();
                        $('.alert-danger').show();
                        $('#appointment-form .response').html('');
                        for (var error in data.errors) {
                            console.log(4);
                            $('#appointment-form .response').append('<li>' + data.errors[error] +
                                '</li>')
                        }
                        $('#appointment-form input[type=text], #appointment-form input[type=email], #appointment-form textarea')
                            .eq(0).focus();
                        $('#appointment-form .refresh_code').trigger('click');

                    } else {
                        console.log(5);
                        $('.alert-danger').hide();
                        $('.alert-success').show();
                        $('#appointment-form .response').html(data);
                        $('#appointment-form input[type=text], #appointment-form input[type=email], #appointment-form textarea')
                            .eq(0).focus();
                        $('#appointment-form input[type=text], #appointment-form input[type=email], #appointment-form textarea')
                            .val('');
                        $('#appointment-form .refresh_code').trigger('click');

                    }
                    console.log(6);
                    $('.gocover').hide();
                    $('button.submit-btn').prop('disabled', false);
                }

            });

        });

        $('.refresh_code').on("click", function() {
            $.get(mainurl2 + '/contact/refresh_code', function(data, status) {
                $('.codeimg1').attr("src", mainurl2 + "/assets/images/capcha_code.png?time=" + Math
                    .random());
            });
        })
    </script>


    <?php echo $__env->yieldContent('js'); ?>
</body>

</html>
<?php /**PATH C:\laragon\www\admin-cangrows\resources\views/layouts/front.blade.php ENDPATH**/ ?>