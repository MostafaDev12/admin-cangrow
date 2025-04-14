<!DOCTYPE html>
<html lang="en" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <?php

        $ps = App\Models\Pagesetting::find(1);

    ?>




<meta property="og:title" content="<?php echo e($gs->{'title_' . $sign}); ?>">
<meta property="og:description" content="<?php echo e($gs->{'title_' . $sign}); ?>">
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
        <meta property="og:description" content="<?php echo e($blog->meta_description); ?>">
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

 
    
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

  <!-- Bootstrap5 CDN Link -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

  <!-- Font Awesome Link -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

  <!-- Custom CSS Files Link -->
  <link rel="stylesheet" href="<?php echo e(asset('front/dr-heba/')); ?>/css/style.css">
  <link rel="stylesheet" href="<?php echo e(asset('front/dr-heba/')); ?>/css/reponsive.css">
  <link rel="stylesheet" href="<?php echo e(asset('front/dr-heba/')); ?>/css/motion.css">

    <link rel="stylesheet" href="<?php echo e(asset('build/css/toastr.css')); ?>">

    <?php echo $__env->yieldContent('css'); ?>


</head>

  <?php
  $phones =  explode(',', $gs->phones);
  $emails =   explode(',', $gs->emails);
  $addresses =  json_decode($gs->{'addresses_' . $sign});

  $randomPhone = Arr::random($phones);
  ?>
 

 <body data-bs-spy="scroll" data-bs-target=".navbar" data-bs-offset="100" class="loading">
    <!-- Navbar Section -->
    <header>
      <nav class="header-desktop">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
          <div class="container">
            <!-- Brand Logo -->
            <a class="navbar-brand" href="<?php echo e(route('front.index', $sign)); ?>">
              <img src="<?php echo e($gs->{'logo_' . $sign}); ?>" alt="Logo">
            </a>
            <!-- Navbar Content -->
            <div class="collapse navbar-collapse">
              <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                  <a class="nav-link" href="<?php echo e(route('contact.index')); ?>#appointments">
                    <i class="fas fa-clock"></i>
                    <span><?php echo e(__('السبت - الأربعاء')); ?></span>
                    <small><?php echo e(__('الاقصر كل اسبوعين')); ?></small>
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="<?php echo e(route('contact.index')); ?>#locations">
                    <i class="fas fa-map-marker-alt"></i>
                    <?php $__currentLoopData = $locations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k=>$location): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <span>
                      <?php echo e($location->{'title_' . $sign}); ?>

                    </span>
                    <?php if(!$loop->last): ?>
                    <span>-</span>
                   <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                 
                   
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="tel:+2<?php echo e($randomPhone); ?>">
                    <i class="fas fa-phone"></i>
                    <span>+<?php echo e($randomPhone); ?></span>
                  </a>
                </li>
            <?php if(App\Models\Socialsetting::find(1)->f_status == 1): ?>   
                <li class="nav-item">
                  <a class="nav-link" href="<?php echo e(App\Models\Socialsetting::find(1)->facebook); ?>" target="_blank">
                    <i class="fab fa-facebook"></i>
                  </a>
                </li>
               <?php endif; ?>

               <?php if(App\Models\Socialsetting::find(1)->d_status == 1): ?>  
                <li class="nav-item">
                  <a class="nav-link" href="<?php echo e(App\Models\Socialsetting::find(1)->dribble); ?>" target="_blank">
                    <i class="fab fa-instagram"></i>
                  </a>
                </li>
                <?php endif; ?>
                <?php if(App\Models\Socialsetting::find(1)->ystatus == 1): ?> 
                <li class="nav-item">
                  <a class="nav-link" href="<?php echo e(App\Models\Socialsetting::find(1)->youtube); ?>" target="_blank">
                    <i class="fab fa-youtube"></i>
                  </a>
                </li>
                <?php endif; ?>
                <?php if(App\Models\Socialsetting::find(1)->t_status == 1): ?>   
                <li class="nav-item">
                  <a class="nav-link" href="<?php echo e(App\Models\Socialsetting::find(1)->twitter); ?>"
                    target="_blank">
                    <i class="fab fa-twitter"></i>
                  </a>
                </li>
                <?php endif; ?>
              </ul>
            </div>
          </div>
        </nav>
      </nav>
  
      <!-- Divider -->
      <hr class="divider">
  
      <!-- Second Header (Visible on Desktop/Tablet) -->
      <nav class="header-desktop nav-scroll d-none d-lg-block">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
          <div class="container">
            <a class="navbar-brand logo-scroll" href="<?php echo e(route('front.index', $sign)); ?>" style="display:none;">
              <img src="<?php echo e($gs->{'logo_' . $sign}); ?>" alt="Logo">
            </a>
  
            <!-- Navbar Content -->
            <div class="collapse navbar-collapse">
              <div class="d-flex justify-content-between w-100">
                <ul class="navbar-nav mb-2 mb-lg-0">
                  <li class="nav-item">
                    <a class="nav-link active" href="<?php echo e(route('front.index', $sign)); ?>">  <?php echo e(__('مركز علاج الحول والمياه البيضاء')); ?></a>
                  </li>
                  <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="<?php echo e(route('services.index')); ?>" role="" data-bs-toggle=""
                      aria-expanded="false">
                      <?php echo e(__('الخدمات')); ?>

                    </a>
                    <ul class="dropdown-menu text-end dropdown-home-items">


                        <?php $__currentLoopData = $services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li><a class="dropdown-item" href="<?php echo e(route('single-service.index',['slug' => $service->{'slug_' . $sign} ])); ?>"><?php echo e($service->{'title_' . $sign}); ?>  </a></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                     

                    </ul>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="<?php echo e(route('blogs.index')); ?>"><?php echo e(__('المقالات')); ?></a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="<?php echo e(route('about.index')); ?>"><?php echo e(__('عن الدكتورة')); ?> </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="<?php echo e(route('contact.index')); ?>"> <?php echo e(__('اتصل بنا')); ?>  </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="<?php echo e(route('contact.index')); ?>#contact-section"><?php echo e($randomPhone); ?></a>
                  </li>
                </ul>
                <!-- Search Container -->
                <div class="search-container">
                  <button id="searchButton" class="btn" type="button">
                    <i class="fas fa-search"></i>
                  </button>
                  <form>

                   <input id="searchInput" class="form-control search-input" type="text" placeholder="<?php echo e(__('ابحث')); ?>">

                  </form>
                </div>
              </div>
            </div>
          </div>
        </nav>
      </nav>
  
      <!-- Offcanvas for Mobile -->
      <nav class="navbar navbar-light bg-light fixed-top d-lg-none">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">
            <img src="<?php echo e($gs->{'logo_' . $sign}); ?>" alt="Logo">
          </a>
  
          <!-- Offcanvas Toggle Button -->
          <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar"
            aria-controls="offcanvasNavbar">
            <i class="fas fa-bars"></i>
          </button>
          <!-- Offcanvas Menu -->
          <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasNavbar"
            aria-labelledby="offcanvasNavbarLabel">
            <div class="offcanvas-header">
              <a class="navbar-brand" href="#">
                <img src="<?php echo e($gs->{'logo_' . $sign}); ?>" alt="Logo">
              </a>
  
              <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
              <!-- First Header Content -->
              <h5 class="offcanvas-title text-end" id="offcanvasNavbarLabel"><?php echo e(__('القائمة')); ?></h5>
  
              <div class="search-container border-bottom mb-3">
                <button id="searchButton" class="btn  p-0" type="button">
                  <i class="fas fa-search"></i>
                </button>

                <input id="" class="form-control border-0 shadow-none" type="text" placeholder="<?php echo e(__('ابحث')); ?>">
            
            </div>
  
              <ul class="navbar-nav">
                <li class="nav-item">
                  <a class="nav-link" href="<?php echo e(route('contact.index')); ?>#appointments">
                    <i class="fas fa-clock"></i>
                    <span> <?php echo e(__('السبت - الأربعاء')); ?></span>
                    <small><?php echo e(__('الاقصر كل اسبوعين')); ?></small>
                  </a>
                <li class="nav-item">
                  <a class="nav-link" href="<?php echo e(route('contact.index')); ?>#locations">
                    <i class="fas fa-map-marker-alt"></i>
                    <?php $__currentLoopData = $locations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k=>$location): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <span>
                      <?php echo e($location->{'title_' . $sign}); ?>

                    </span>
                    <?php if(!$loop->last): ?>
                    <span>-</span>
                   <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="tel:+2<?php echo e($randomPhone); ?>">
                    <i class="fas fa-phone"></i>
                    <span><?php echo e($randomPhone); ?></span>
                  </a>
                </li>
                <?php if(App\Models\Socialsetting::find(1)->f_status == 1): ?>   
                <li class="nav-item">
                  <a class="nav-link" href="<?php echo e(App\Models\Socialsetting::find(1)->facebook); ?>">
                    <i class="fab fa-facebook"></i>
                    <span><?php echo e(__('الفيسبوك')); ?></span>
                  </a>
                </li>
                <?php endif; ?>
                <?php if(App\Models\Socialsetting::find(1)->d_status == 1): ?>
                <li class="nav-item">
                  <a class="nav-link" href="<?php echo e(App\Models\Socialsetting::find(1)->dribble); ?>">
                    <i class="fab fa-instagram"></i>
                    <span><?php echo e(__('انستجرام')); ?></span>
                  </a>
                </li>
                <?php endif; ?>
                <?php if(App\Models\Socialsetting::find(1)->ystatus == 1): ?>
                <li class="nav-item">
                  <a class="nav-link" href="<?php echo e(App\Models\Socialsetting::find(1)->youtube); ?>">
                    <i class="fab fa-youtube"></i>
                    <span><?php echo e(__('يوتيوب')); ?></span>
                  </a>
                </li>
                <?php endif; ?>
                <?php if(App\Models\Socialsetting::find(1)->t_status == 1): ?> 
                <li class="nav-item">
                  <a class="nav-link" href="<?php echo e(App\Models\Socialsetting::find(1)->twitter); ?>">
                    <i class="fab fa-twitter"></i>
                    <span><?php echo e(__('تويتر')); ?></span>
                  </a>
                </li>
                <?php endif; ?>
              </ul>
              <!-- Divider -->
              <hr class="divider">
              <!-- Second Header Content -->
              <ul class="navbar-nav">
                <li class="nav-item">
                  <a class="nav-link active" href="<?php echo e(route('front.index', $sign)); ?>">   <?php echo e(__('مركز علاج الحول والمياه البيضاء')); ?>    </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link fw-bold" href="<?php echo e(route('services.index')); ?>">
                    <?php echo e(__('الخدمات')); ?>

                  </a>
                  <ul class=" border-bottom">
                    
                    <?php $__currentLoopData = $services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li class="list-unstyled"><a class="nav-link" href="<?php echo e(route('single-service.index',['slug' => $service->{'slug_' . $sign} ])); ?>"><?php echo e($service->{'title_' . $sign}); ?>  </a></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                 
                    
                  </ul>
                </li>
                <li class="nav-item">
                  <a class="nav-link fw-bold" href="<?php echo e(route('blogs.index')); ?>"><?php echo e(__('المقالات')); ?></a>
                </li>
                <li class="nav-item">
                  <a class="nav-link fw-bold" href="<?php echo e(route('about.index')); ?>"> <?php echo e(__('عن الدكتورة')); ?>  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link fw-bold" href="<?php echo e(route('contact.index')); ?>">   <?php echo e(__('اتصل بنا')); ?></a>
                </li>
                <li class="nav-item">
                  <a class="nav-link fw-bold" href="tel:+2<?php echo e($randomPhone); ?>"><?php echo e($randomPhone); ?></a>
                </li>
              </ul>
              <!-- Search Container -->
  
            </div>
          </div>
        </div>
      </nav>
    </header>



    <?php echo $__env->yieldContent('content'); ?>


 <!-- Footer Section -->
 <footer id="footer" class="footer-wrapper wrapper">
    <div class="container">
      <div class="row justify-content-between">
        <div class="col-md-4 col-sm-6 mb-4 box-invisible">
          <h5> <?php echo e(__('دكتورة هبه متولي')); ?>

          </h5>
          <p>
            <?php echo $gs->{'footer_' . $sign}; ?>

          </p>
          <div class="contact-info">
            <ul class="list-unstyled d-flex gap-3">
                <?php if(App\Models\Socialsetting::find(1)->f_status == 1): ?>   
              <li>
                <a href="<?php echo e(App\Models\Socialsetting::find(1)->facebook); ?>">
                  <i class="fab fa-brands fa-facebook"></i>
                </a>
              </li>
              <?php endif; ?>
              <?php if(App\Models\Socialsetting::find(1)->d_status == 1): ?>
              <li>
                <a href="<?php echo e(App\Models\Socialsetting::find(1)->dribble); ?>">
                  <i class="fab fa-brands fa-instagram"></i>
                </a>
              </li>
              <?php endif; ?>
              <?php if(App\Models\Socialsetting::find(1)->ystatus == 1): ?>
              <li>
                <a href="<?php echo e(App\Models\Socialsetting::find(1)->youtube); ?>">
                  <i class="fab fa-brands fa-youtube"></i>
                </a>
              </li>
              <?php endif; ?>
              <?php if(App\Models\Socialsetting::find(1)->t_status == 1): ?> 
              <li>
                <a href="<?php echo e(App\Models\Socialsetting::find(1)->twitter); ?>">
                  <i class="fab fa-brands fa-twitter"></i>
                </a>
              </li>
              <?php endif; ?>
            </ul>
          </div>
          <div class="contact-info ">
            <ul class="list-unstyled ">
              <?php $__currentLoopData = $locations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k=>$location): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <li>
                <a href="<?php echo e(route('contact.index')); ?>#locations" class="d-flex gap-1">
                  <i class="fa fa-home">
                  </i>  <?php echo e($location->{'address_' . $sign}); ?>

                </a>
              </li>

              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
             

              <li>
                <a href="<?php echo e(route('contact.index')); ?>#contact-section" class="d-flex gap-1">
                  <i class="fa fa-phone">
                  </i><?php echo e($randomPhone); ?></a>
              </li>
              <li>
                <a href="<?php echo e(route('contact.index')); ?>#appointments" class="d-flex gap-1">
                  <i class="fa fa-clock">
                  </i> <?php echo e(__('السبت - الأربعاء')); ?>

                </a>
              </li>
            </ul>
          </div>
        </div>
        <div class="col-md-4 col-sm-6 mb-4 box-invisible">
          <h5><?php echo e(__('الخدمات')); ?></h5>
          <ul class="link-widget p-0">
            <?php $__currentLoopData = $services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li ><a href="<?php echo e(route('single-service.index',['slug' => $service->{'slug_' . $sign} ])); ?>"><?php echo e($service->{'title_' . $sign}); ?>  </a></li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
         

          </ul>
        </div>
      </div>
      <div class="row justify-content-between">
        <div class="col-md-4 col-sm-6 mb-4 box-invisible">
          <p class="p-0">Copyright
            <a href="https://cangrowonline.com"
              target="_blank">@CanGrow
              .</a> All Rights Reserved
          </p>
        </div>
        <div class="col-md-4 col-sm-6 mb-4 box-invisible">
          <ul id="" class="d-flex flex-column about list-footer">
            <li class="list-unstyled">
              <a class=" p-0 m-0" href="<?php echo e(route('services.index')); ?>" target="_blank">
                <?php echo e(__('الخدمات')); ?>

              </a>
            </li>
            <li class="list-unstyled">
              <a class=" p-0 m-0" href="<?php echo e(route('about.index')); ?>" target="_blank"> <?php echo e(__('عنا')); ?>

              </a>
            </li>
            <li class="list-unstyled">
              <a class=" p-0 m-0" href="<?php echo e(route('contact.index')); ?>" target="_blank">
                <?php echo e(__('اتصل بنا')); ?>

              </a>
            </li>
            <li class="list-unstyled">
              <a class=" p-0 m-0" href="tel:+2<?php echo e($randomPhone); ?>"><?php echo e($randomPhone); ?></a>
            </li>
          </ul>
        </div>
      </div>
    </div>
    </div>
  </footer>
  <!-- Footer Section exit -->

    <script type="text/javascript">
        var logo_src = "<?php echo e($gs->{'logo_' . $sign}); ?>";
        
    </script>

  <!-- Bootstrap5 JS CDN Links -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
    crossorigin="anonymous"></script>

  <!-- custom js file -->
  <script src="<?php echo e(asset('front/dr-heba/')); ?>/js/main.js"></script>
  <script src="<?php echo e(asset('front/dr-heba/')); ?>/js/motion.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
  <script>
    var swiper = new Swiper(".mySwiper", {
      effect: "coverflow",
      grabCursor: true,
      centeredSlides: true,
      slidesPerView: "auto",
      coverflowEffect: {
        rotate: 50,
        stretch: 0,
        depth: 100,
        modifier: 1,
        slideShadows: true,
      },
      pagination: {
        el: ".swiper-pagination",
      },
      keyboard: {
        enabled: true, // Enable keyboard controls
        onlyInViewport: true, // Only work when Swiper is in the viewport
      },
      initialSlide: Math.floor(document.querySelectorAll('.swiper-slide').length / 2),

      // Set initial slide to the middle

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