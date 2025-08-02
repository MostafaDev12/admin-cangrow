<!DOCTYPE html>
<html lang="<?php echo e($sign); ?>" dir="<?php echo e(Session::get('front_language_duraction')); ?>">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <?php

        $ps = App\Models\Pagesetting::find(1);

    ?>




    <meta property="og:title" content="<?php echo e($gs->{'title_' . $sign}); ?>">
   
    <meta property="og:image" content="<?php echo e($gs->{'logo_' . $sign}); ?>">
    <meta property="og:url" content="<?php echo e(url('/')); ?>">
    <meta property="og:type" content="website">


<meta name="google-site-verification" content="IdWOrbHM6JKC0_evYH8uNuHf2MuPTGcup45QC7eNyzU" />
    <?php if(isset($page->meta_tag) && isset($page->meta_description)): ?>
        <meta name="keywords" content="<?php echo e($page->meta_tag); ?>">
        <meta name="description" content="<?php echo e($page->meta_description); ?>">
        <title><?php echo $__env->yieldContent('title'); ?> -

            <?php echo e($gs->{'title_' . $sign}); ?>


        </title>
    <?php elseif(isset($blog->meta_tag) || isset($blog->{'meta_details_' . $sign} )): ?>
        <meta name="keywords" content="<?php echo e($blog->meta_tag); ?>">
        <meta name="description" content="<?php echo e($blog->{'meta_details_' . $sign}); ?>">
        <meta property="og:description" content="<?php echo e($blog->{'meta_details_' . $sign}); ?>">
    <?php else: ?>
        <meta name="+author" content=" <?php echo e($gs->{'title_' . $sign}); ?>">
 <meta property="og:description" content="<?php echo e($gs->{'title_' . $sign}); ?>">
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




    <link rel="stylesheet" href="<?php echo e(asset('build/css/toastr.css')); ?>">

       <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@400;500;700&display=swap" rel="stylesheet">
    <script src="https://unpkg.com/lucide@latest"></script>
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        body {
            font-family: 'Tajawal', sans-serif;
        }
    </style>

   <?php echo $__env->yieldContent('css'); ?>
</head>

<body class="min-h-screen bg-gray-50" dir="<?php echo e(Session::get('front_language_duraction')); ?>" lang="<?php echo e($sign); ?>">
  <?php
    $phones = explode(',', $gs->phones);
    $emails = explode(',', $gs->emails);
    $addresses = json_decode($gs->{'addresses_' . $sign});

    $randomPhone = Arr::random($phones);
?>

    <!-- Header -->
    <header class="bg-gradient-to-r from-blue-500 to-green-600 text-white w-full z-50 py-4 sticky top-0">
        <div class="container mx-auto  flex items-center justify-between">
            <!-- Logo -->
            <div>
                <a href="<?php echo e(route('front.index')); ?>">
                    <img alt="Tooth Guard Logo" class="w-40  h-30" src="<?php echo e($gs->{'logo_' . $sign}); ?>">
                </a>
            </div>

            <!-- Desktop Navigation -->
            <nav class="hidden lg:flex items-center gap-6">
                <a href="<?php echo e(route('front.index')); ?>"
                    class="text-white text-lg hover:font-semibold transition duration-300"><?php echo e(__('الرئيسية')); ?></a>
                <a href="<?php echo e(route('about.index')); ?>" class="text-white text-lg hover:font-semibold transition duration-300"> 
                     <?php echo e(__('معلومات عنا')); ?></a>
                <a href="<?php echo e(route('services.index')); ?>"
                    class="text-white text-lg hover:font-semibold transition duration-300"><?php echo e(__('الخدمات')); ?></a>
                <a href="<?php echo e(route('blogs.index')); ?>"
                    class="text-white text-lg hover:font-semibold transition duration-300"><?php echo e(__('المقالات')); ?></a>
                <a href="<?php echo e(route('videos.index')); ?>"
                    class="text-white text-lg hover:font-semibold transition duration-300"><?php echo e(__('فيديوهات')); ?></a>
                <a href="<?php echo e(route('contact.index')); ?>" class="text-white text-lg hover:font-semibold transition duration-300"> <?php echo e(__('تواصل معنا')); ?>

                     </a>
            </nav>

            <!-- Social Icons and Language Selector (Desktop) -->
            <div class="hidden lg:flex items-center gap-4">
 <?php if(App\Models\Socialsetting::find(1)->f_status == 1): ?>
                <a target="_blank" href="<?php echo e(App\Models\Socialsetting::find(1)->facebook); ?>">
                    <i
                        class="fa-brands fa-facebook w-6 h-6 text-white hover:text-green-300 transition-colors cursor-pointer"></i>
                </a>
     <?php endif; ?>
       <?php if(App\Models\Socialsetting::find(1)->t_status == 1): ?>
                <a target="_blank" href="<?php echo e(App\Models\Socialsetting::find(1)->twitter); ?>">
                    <i
                        class="fa-brands fa-instagram w-6 h-6 text-white hover:text-green-300 transition-colors cursor-pointer"></i>
                </a>

                   <?php endif; ?>


                <a target="_blank" href="tel:<?php echo e($randomPhone); ?>">
                    <i
                        class="fa-solid fa-phone w-6 h-6 text-white hover:text-green-300 transition-colors cursor-pointer"></i>
                </a>
                <a target="_blank" href="https://wa.me/<?php echo e($randomPhone); ?>">
                    <i
                        class="fa-brands fa-whatsapp w-6 h-6 text-white hover:text-green-300 transition-colors cursor-pointer"></i>
                </a>
 <?php if(App\Models\Socialsetting::find(1)->ystatus == 1): ?>
                <a target="_blank" href="<?php echo e(App\Models\Socialsetting::find(1)->youtube); ?>">
                    <i
                        class="fa-brands fa-youtube w-6 h-6 text-white hover:text-green-300 transition-colors cursor-pointer"></i>
                </a>
  <?php endif; ?>
                <select
                   id="language-select2"
                    class="outline-none px-3 py-2 bg-transparent text-white border border-white rounded-md hover:bg-blue-700 cursor-pointer transition duration-300">
                   <?php $__currentLoopData = $languages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $language): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                      <option class="bg-gray-600" value="<?php echo e($language->sign); ?>" data-href="<?php echo e(route('front.lang-change',$language->id)); ?>" <?php echo e($language->sign == $sign ? 'selected' : ''); ?>> <?php echo e($language->language); ?></option>
                 
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    
                </select>
            </div>

            <!-- Mobile Hamburger Menu -->
            <div class="lg:hidden">
                <button id="menu-toggle" class="text-white focus:outline-none">
                    <i class="fa-solid fa-bars w-8 h-8"></i>
                </button>
            </div>
        </div>

        <!-- Mobile Navigation Drawer -->
        <div id="mobile-menu"
            class="lg:hidden bg-gradient-to-r from-blue-500 to-green-600 text-white fixed inset-0 z-50 flex flex-col items-center justify-center">
            <button id="close-menu" class="absolute top-4 right-4 text-white focus:outline-none">
                <i class="fa-solid fa-times w-8 h-8"></i>
            </button>
            <nav class="flex flex-col items-center gap-6 text-lg">
                <a href="<?php echo e(route('front.index')); ?>" class="hover:font-semibold transition duration-300"><?php echo e(__('الرئيسية')); ?></a>
                <a href="<?php echo e(route('about.index')); ?>" class="hover:font-semibold transition duration-300">   <?php echo e(__('معلومات عنا')); ?></a>
                <a href="<?php echo e(route('services.index')); ?>" class="hover:font-semibold transition duration-300"><?php echo e(__('الخدمات')); ?></a>
                <a href="<?php echo e(route('blogs.index')); ?>" class="hover:font-semibold transition duration-300"><?php echo e(__('المقالات')); ?></a>
                <a href="<?php echo e(route('videos.index')); ?>" class="hover:font-semibold transition duration-300"><?php echo e(__('فيديوهات')); ?></a>
                <a href="<?php echo e(route('contact.index')); ?>" class="hover:font-semibold transition duration-300">   <?php echo e(__('تواصل معنا')); ?></a>
                <div class="flex items-center gap-4 mt-6">
<?php if(App\Models\Socialsetting::find(1)->f_status == 1): ?>
                <a target="_blank" href="<?php echo e(App\Models\Socialsetting::find(1)->facebook); ?>">
                    <i
                        class="fa-brands fa-facebook w-6 h-6 text-white hover:text-green-300 transition-colors cursor-pointer"></i>
                </a>
     <?php endif; ?>
       <?php if(App\Models\Socialsetting::find(1)->t_status == 1): ?>
                <a target="_blank" href="<?php echo e(App\Models\Socialsetting::find(1)->twitter); ?>">
                    <i
                        class="fa-brands fa-instagram w-6 h-6 text-white hover:text-green-300 transition-colors cursor-pointer"></i>
                </a>

                   <?php endif; ?>


                <a target="_blank" href="tel:<?php echo e($randomPhone); ?>">
                    <i
                        class="fa-solid fa-phone w-6 h-6 text-white hover:text-green-300 transition-colors cursor-pointer"></i>
                </a>
                <a target="_blank" href="https://wa.me/<?php echo e($randomPhone); ?>">
                    <i
                        class="fa-brands fa-whatsapp w-6 h-6 text-white hover:text-green-300 transition-colors cursor-pointer"></i>
                </a>
 <?php if(App\Models\Socialsetting::find(1)->ystatus == 1): ?>
                <a target="_blank" href="<?php echo e(App\Models\Socialsetting::find(1)->youtube); ?>">
                    <i
                        class="fa-brands fa-youtube w-6 h-6 text-white hover:text-green-300 transition-colors cursor-pointer"></i>
                </a>
  <?php endif; ?>
                    
                </div>
                <select
                   id="language-select"
                    class="outline-none px-3 py-2 bg-transparent text-white border border-white rounded-md hover:bg-blue-700 cursor-pointer transition duration-300 mt-6">
                     <?php $__currentLoopData = $languages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $language): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                      <option class="bg-gray-600" value="<?php echo e($language->sign); ?>" data-href="<?php echo e(route('front.lang-change',$language->id)); ?>" <?php echo e($language->sign == $sign ? 'selected' : ''); ?>> <?php echo e($language->language); ?></option>
                 
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    
             
                </select>
            </nav>
        </div>
    </header>


 
    <?php echo $__env->yieldContent('content'); ?>



    <!-- Footer -->
    <!-- <footer class="bg-gradient-to-r from-blue-900 via-blue-800 to-green-800 text-white py-16">
        <div class="container mx-auto px-4">
            <div class="grid md:grid-cols-4 gap-8">
                <div>
                    <h3 class="text-2xl font-bold mb-6 text-green-300">معلومات الاتصال</h3>
                    <div class="space-y-4">
                        <p class="flex items-center gap-3 text-blue-100 hover:text-green-300 transition-colors">
                            <i data-lucide="phone" class="w-5 h-5 text-green-400"></i>
                            +966 XX XXX XXXX
                        </p>
                        <p class="flex items-center gap-3 text-blue-100 hover:text-green-300 transition-colors">
                            <i data-lucide="message-circle" class="w-5 h-5 text-green-400"></i>
                            واتساب
                        </p>
                    </div>
                </div>
                <div>
                    <h3 class="text-2xl font-bold mb-6 text-green-300">خدماتنا</h3>
                    <ul class="space-y-3">
                        <li>
                            <a href="#" class="text-blue-100 hover:text-green-300 transition-colors text-lg">
                                زراعة الأسنان
                            </a>
                        </li>
                        <li>
                            <a href="#" class="text-blue-100 hover:text-green-300 transition-colors text-lg">
                                تقويم الأسنان
                            </a>
                        </li>
                        <li>
                            <a href="#" class="text-blue-100 hover:text-green-300 transition-colors text-lg">
                                تجميل الأسنان
                            </a>
                        </li>
                        <li>
                            <a href="#" class="text-blue-100 hover:text-green-300 transition-colors text-lg">
                                علاج الجذور
                            </a>
                        </li>
                    </ul>
                </div>
                <div>
                    <h3 class="text-2xl font-bold mb-6 text-green-300">روابط مفيدة</h3>
                    <ul class="space-y-3">
                        <li>
                            <a href="#" class="text-blue-100 hover:text-green-300 transition-colors text-lg">
                                عن العيادة
                            </a>
                        </li>
                        <li>
                            <a href="#" class="text-blue-100 hover:text-green-300 transition-colors text-lg">
                                الأطباء
                            </a>
                        </li>
                        <li>
                            <a href="#" class="text-blue-100 hover:text-green-300 transition-colors text-lg">
                                المواعيد
                            </a>
                        </li>
                        <li>
                            <a href="#" class="text-blue-100 hover:text-green-300 transition-colors text-lg">
                                اتصل بنا
                            </a>
                        </li>
                    </ul>
                </div>
                <div>
                    <h3 class="text-2xl font-bold mb-6 text-green-300">تابعنا</h3>
                    <div class="flex gap-4">
                        <div
                            class="w-12 h-12 bg-gradient-to-r from-blue-600 to-blue-700 rounded-full flex items-center justify-center hover:from-green-500 hover:to-green-600 transition-all duration-300 cursor-pointer">
                            <i data-lucide="facebook" class="w-6 h-6"></i>
                        </div>
                        <div
                            class="w-12 h-12 bg-gradient-to-r from-blue-600 to-blue-700 rounded-full flex items-center justify-center hover:from-green-500 hover:to-green-600 transition-all duration-300 cursor-pointer">
                            <i data-lucide="instagram" class="w-6 h-6"></i>
                        </div>
                        <div
                            class="w-12 h-12 bg-gradient-to-r from-blue-600 to-blue-700 rounded-full flex items-center justify-center hover:from-green-500 hover:to-green-600 transition-all duration-300 cursor-pointer">
                            <i data-lucide="youtube" class="w-6 h-6"></i>
                        </div>
                        <div
                            class="w-12 h-12 bg-gradient-to-r from-blue-600 to-blue-700 rounded-full flex items-center justify-center hover:from-green-500 hover:to-green-600 transition-all duration-300 cursor-pointer">
                            <i data-lucide="message-circle" class="w-6 h-6"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="border-t border-blue-600 mt-12 pt-8 text-center">
                <p class="text-blue-200 text-lg">&copy; 2024 عيادة الأسنان. جميع الحقوق محفوظة.</p>
            </div>
        </div>
    </footer> -->
    <footer
        class="bg-gradient-to-r from-blue-900 via-blue-800 to-green-800 text-white py-16 w-full  px-5 lg:px-10 lg:py-12">
        <div class="max-w-7xl mx-auto">
            <!-- Footer Content -->
            <div class="grid grid-cols-1 lg:grid-cols-4 gap-8 text-center lg:text-right">
                <!-- Contact Us -->
                <div class="lg:col-span-1">
                    <h3 class="text-color_2 text-xl font-semibold uppercase mb-5">تواصل معنا</h3>
                    <div class="space-y-4">
                        <?php $__currentLoopData = $emails; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $email): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <a href="mailto:<?php echo e($email); ?>" target="_blank"
                            class="text-color_1 font-semibold text-sm hover:text-blue-500 transition duration-300 block">
                              <?php echo e($email); ?>

                        </a>
                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                           <?php $__currentLoopData = $phones; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $phone): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <a href="tel:+2<?php echo e($phone); ?>" target="_blank"
                            class="text-color_1 font-semibold text-sm hover:text-blue-500 transition duration-300 block">
                            <?php echo e($phone); ?>

                        </a>
                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php $__currentLoopData = $addresses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $address): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <p class="text-color_1 font-semibold text-sm">
                              <?php echo e($address); ?>

                        </p>
                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
                <!-- Links -->
                <div class="lg:col-span-1">
                    <h3 class="text-color_2 text-xl font-semibold uppercase mb-5">الروابط</h3>
                    <div class="space-y-4">
                        <a href="<?php echo e(route('front.index')); ?>"
                            class="text-color_1 font-semibold text-sm hover:text-blue-500 transition duration-300 block"><?php echo e(__('الرئيسية')); ?></a>
                        <a href="<?php echo e(route('about.index')); ?>"
                            class="text-color_1 font-semibold text-sm hover:text-blue-500 transition duration-300 block"> 
                             <?php echo e(__('معلومات عنا')); ?></a>
                        <a href="<?php echo e(route('services.index')); ?>"
                            class="text-color_1 font-semibold text-sm hover:text-blue-500 transition duration-300 block"><?php echo e(__('الخدمات')); ?><</a>
                        <a href="<?php echo e(route('blogs.index')); ?>"
                            class="text-color_1 font-semibold text-sm hover:text-blue-500 transition duration-300 block"><?php echo e(__('المقالات')); ?></a>
                        <a href="<?php echo e(route('videos.index')); ?>"
                            class="text-color_1 font-semibold text-sm hover:text-blue-500 transition duration-300 block"><?php echo e(__('فيديوهات')); ?></a>
                        <a href="<?php echo e(route('contact.index')); ?>"
                            class="text-color_1 font-semibold text-sm hover:text-blue-500 transition duration-300 block"> 
                            <?php echo e(__('تواصل معنا')); ?></a>
                    </div>
                </div>
                <!-- Social Media -->
                <div class="lg:col-span-1">
                    <h3 class="text-color_2 text-xl font-semibold uppercase mb-5">وسائل التواصل</h3>
                    <div class="flex justify-center lg:justify-end items-center gap-4">
                      <?php if(App\Models\Socialsetting::find(1)->f_status == 1): ?>
                        <a href="<?php echo e(App\Models\Socialsetting::find(1)->facebook); ?>" target="_blank"
                            class="bg-color_4 p-3 rounded-full hover:bg-blue-100 transition duration-300">
                            <i class="fab fa-facebook-f text-color_1 text-lg hover:text-primary_Color_Light"></i>
                        </a>
                         <?php endif; ?>
 <?php if(App\Models\Socialsetting::find(1)->t_status == 1): ?>
                        <a href="<?php echo e(App\Models\Socialsetting::find(1)->twitter); ?>" target="_blank"
                            class="bg-color_4 p-3 rounded-full hover:bg-blue-100 transition duration-300">
                            <i class="fab fa-instagram text-color_1 text-lg hover:text-primary_Color_Light"></i>
                        </a>
                         <?php endif; ?>
                        <a href="tel:<?php echo e($randomPhone); ?>" target="_blank"
                            class="bg-color_4 p-3 rounded-full hover:bg-blue-100 transition duration-300">
                            <i class="fas fa-phone text-color_1 text-lg hover:text-primary_Color_Light"></i>
                        </a>
                        <a href="https://wa.me/<?php echo e($randomPhone); ?>" target="_blank"
                            class="bg-color_4 p-3 rounded-full hover:bg-blue-100 transition duration-300">
                            <i class="fab fa-whatsapp text-color_1 text-lg hover:text-primary_Color_Light"></i>
                        </a>
                           <?php if(App\Models\Socialsetting::find(1)->ystatus == 1): ?>
                        <a href="<?php echo e(App\Models\Socialsetting::find(1)->youtube); ?>" target="_blank"
                            class="bg-color_4 p-3 rounded-full hover:bg-blue-100 transition duration-300">
                            <i class="fab fa-youtube text-color_1 text-lg hover:text-primary_Color_Light"></i>
                        </a>
                         <?php endif; ?>
                    </div>
                </div>
                <!-- Logo -->
                <div class="lg:col-span-1">
                    <img alt="Tooth Guard Logo" class="w-48 lg:w-52 mx-auto lg:mx-0" src="<?php echo e($gs->{'logo_' . $sign}); ?>">
                </div>
            </div>
            <!-- Footer Bottom -->
            <div class="mt-10">
                <div class="border-t border-color_1 opacity-40 w-full"></div>
                <a href="https://cangrowonline.com/en" target="_blank"
                    class="flex justify-center items-center mt-5 text-color_1 text-[9px] lg:text-sm">
                    © <?php echo e(date('Y')); ?> <?php echo e(__('All Rights Reserved | Tooth Guard Clinics Made by')); ?> ❤️ <?php echo e(__('CanGrow Digital Marketing Agency')); ?>

                </a>
            </div>
        </div>
    </footer>
    <script src="<?php echo e(asset('front/tooth-guard/')); ?>/js/script.js"></script>
    <script src="<?php echo e(asset('front/tooth-guard/')); ?>/js/swiper.js"></script>
    <script>
        const menuToggle = document.getElementById('menu-toggle');
        const closeMenu = document.getElementById('close-menu');
        const mobileMenu = document.getElementById('mobile-menu');

        menuToggle.addEventListener('click', () => {
            mobileMenu.classList.toggle('hidden');
        });

        closeMenu.addEventListener('click', () => {
            mobileMenu.classList.add('hidden');
        });
    </script>

 
 


    <script src="<?php echo e(asset('build/js/toastr.js')); ?>"></script>


    <script type="text/javascript">
        var logo_src = "<?php echo e($gs->{'logo_' . $sign}); ?>";
    </script>



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


<script>
    document.getElementById('language-select').addEventListener('change', function() {
        var selectedOption = this.options[this.selectedIndex];
        var url = selectedOption.getAttribute('data-href');
        if (url) {
            window.location.href = url;
        }
    });
    document.getElementById('language-select2').addEventListener('change', function() {
        var selectedOption = this.options[this.selectedIndex];
        var url = selectedOption.getAttribute('data-href');
        if (url) {
            window.location.href = url;
        }
    });
</script>
    <?php echo $__env->yieldContent('js'); ?>
</body>

</html>
<?php /**PATH C:\laragon\www\admin-cangrows\resources\views/layouts/front.blade.php ENDPATH**/ ?>