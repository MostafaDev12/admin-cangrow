      


<?php $__env->startSection('title'); ?>
   
        <?php echo e($gs->{'title_' . $sign}); ?>

     
<?php $__env->stopSection(); ?>

<?php $__env->startSection('gsearch'); ?>
    <meta property="og:image" content=" <?php echo e($gs->{'logo_' . $sign}); ?>" />
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>

<?php
$phones =  explode(',', $gs->phones);
$emails =   explode(',', $gs->emails);
 
$randomPhone = Arr::random($phones);
?>

    <section class="bg-gradient-to-r from-blue-500 to-green-600 text-white py-16 px-4 md:px-16">
        <div class="container mx-auto flex flex-col md:flex-row items-center justify-between gap-8">
            <div class="md:w-1/2 text-center md:text-right">
                <img src="<?php echo e($gs->{'logo_' . $sign}); ?>" alt="Tooth Guard Clinic" class="w-64 sm:w-80 mx-auto md:mx-0 mb-8">
                <h1 class="text-3xl sm:text-4xl md:text-5xl font-bold mb-6"> <?php echo e($slider->{'title_' . $sign}  ?? ''); ?>    </h1>
                <p class="text-base sm:text-lg md:text-xl mb-8 leading-relaxed">
                    <?php echo $slider->{'details_' . $sign}  ?? ''; ?>

                </p>
                <div class="flex justify-center md:justify-start space-x-4 space-x-reverse">
                    <a href="<?php echo e(route('about.index')); ?>"
                        class="bg-blue-600 hover:bg-blue-700 text-white font-semibold text-sm sm:text-lg py-2 px-4 sm:px-8 rounded-full transition duration-300">
                       <?php echo e(__('معلومات عنا')); ?>    
                    </a>
                    <a href="<?php echo e(route('contact.index')); ?>"
                        class="bg-transparent border-2 border-white hover:bg-white hover:text-blue-500 text-white font-semibold text-sm sm:text-lg py-2 px-4 sm:px-8 rounded-full transition duration-300">
                           <?php echo e(__('احجز موعدك')); ?>

                    </a>
                </div>
            </div>
            <div class="md:w-1/2 mt-8 md:mt-0 flex justify-center">
                <img src="<?php echo e($slider->{'photo'}  ?? ''); ?>" alt="Tooth Guard Clinic"
                    class="rounded-lg shadow-lg w-full max-w-md h-auto object-cover">
            </div>
        </div>
    </section>
    <!-- Services Section -->
    <section class="py-20 bg-gradient-to-b from-white to-blue-50">
        <div class="container mx-auto px-4">
            <div class="grid md:grid-cols-3 gap-8">
                <!-- Service 1 -->
                <div
                    class="text-center p-8 hover:shadow-2xl transition-all duration-300 border-2 border-blue-100 hover:border-blue-300 bg-gradient-to-br from-blue-50 to-white rounded-lg">
                    <div class="space-y-6">
                        <div
                            class="w-20 h-20 bg-gradient-to-br from-blue-500 to-blue-600 rounded-full flex items-center justify-center mx-auto shadow-lg">
                            <i data-lucide="shield" class="w-10 h-10 text-white"></i>
                        </div>
                        <h3 class="text-2xl font-bold text-blue-800">خبراء بإمكانك الوثوق بهم</h3>
                        <p class="text-gray-700 leading-relaxed text-lg">
                            جميع أطبائنا لديهم خبرة تزيد عن 20 عام ويحملون شهادات معتمدة
                        </p>
                    </div>
                </div>

                <!-- Service 2 -->
                <div
                    class="text-center p-8 hover:shadow-2xl transition-all duration-300 border-2 border-green-100 hover:border-green-300 bg-gradient-to-br from-green-50 to-white rounded-lg">
                    <div class="space-y-6">
                        <div
                            class="w-20 h-20 bg-gradient-to-br from-green-500 to-green-600 rounded-full flex items-center justify-center mx-auto shadow-lg">
                            <i data-lucide="stethoscope" class="w-10 h-10 text-white"></i>
                        </div>
                        <h3 class="text-2xl font-bold text-green-800">خدمات شاملة</h3>
                        <p class="text-gray-700 leading-relaxed text-lg">
                            من الرعاية الوقائية إلى زراعة الأسنان، نحن نقدم خدمات شاملة لصحة أسنانك
                        </p>
                    </div>
                </div>

                <!-- Service 3 -->
                <div
                    class="text-center p-8 hover:shadow-2xl transition-all duration-300 border-2 border-blue-100 hover:border-blue-300 bg-gradient-to-br from-blue-50 to-white rounded-lg">
                    <div class="space-y-6">
                        <div
                            class="w-20 h-20 bg-gradient-to-br from-blue-500 to-green-500 rounded-full flex items-center justify-center mx-auto shadow-lg">
                            <i data-lucide="users" class="w-10 h-10 text-white"></i>
                        </div>
                        <h3 class="text-2xl font-bold text-blue-800">تجربة تتمحور حول المريض</h3>
                        <p class="text-gray-700 leading-relaxed text-lg">نحن نركز على راحتك وتقديم تجربة علاجية مميزة
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="sm:py-16 py-10">
        <div class="sm:px-32 px-10 mx-auto text-center">
            <h2 class="sm:text-4xl text-lg font-bold text-blue-800 mb-12">
                طب الأسنان الشامل <br> لكل حاجة
            </h2>
            <div class="swiper mySwiper overflow-hidden">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <div
                            class="h-80 w-full bg-gradient-to-b from-blue-700 to-green-500 text-white p-6 sm:p-10 rounded-lg shadow-lg">
                            <img src="<?php echo e($gs->{'logo_' . $sign}); ?>" alt="Cosmetic Fillings" class="mx-auto w-20  mb-4">
                            <h3 class="text-xl sm:text-2xl font-bold mb-2">زراعة الأسنان</h3>
                            <p class="text-sm">زراعة الأسنان اليوم من الإجراءات الشائعة التي يلجأ إليها الكثير من
                                الأشخاص لحل مشكلات تتعلق بالحشو</p>
                            <div class="my-10">
                                <a href="/services/زراعة-الأسنان"
                                    class="text-sm sm:text-md border border-gray-200 border-opacity-30 p-2 rounded-sm shadow-lg transform transition duration-500 ease-in-out hover:scale-125">
                                    أقرأ المزيد
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div
                            class="h-80 w-full bg-gradient-to-b from-blue-700 to-green-500 text-white p-6 sm:p-10 rounded-lg shadow-lg">
                            <img src="<?php echo e($gs->{'logo_' . $sign}); ?>" alt="Cosmetic Fillings" class="mx-auto w-20  mb-4">
                            <h3 class="text-xl sm:text-2xl font-bold mb-2">علاج اللثه</h3>
                            <p class="text-sm">أصبح علاج اللثه وتفتيح لونها باستخدام الليزر الخيار الأفضل للطبيب
                                والمريض، مما يغني عن الجراحات التقليدية</p>
                            <div class="my-10">
                                <a href="/services/علاج-اللثه"
                                    class="text-sm sm:text-md border border-gray-200 border-opacity-30 p-2 rounded-sm shadow-lg transform transition duration-500 ease-in-out hover:scale-125">
                                    أقرأ المزيد
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div
                            class="h-80 w-full bg-gradient-to-b from-blue-700 to-green-500 text-white p-6 sm:p-10 rounded-lg shadow-lg">
                            <img src="<?php echo e($gs->{'logo_' . $sign}); ?>" alt="Cosmetic Fillings" class="mx-auto w-20  mb-4">
                            <h3 class="text-xl sm:text-2xl font-bold mb-2">تقويم الأسنان</h3>
                            <p class="text-sm">تقويم الأسنان إجراء تجميلي وعلاجي في الوقت ذاته؛ إذ يساهم في تصحيح مشاكل
                                عدم انتظام الأسنان</p>
                            <div class="my-10">
                                <a href="/services/تقويم-الأسنان"
                                    class="text-sm sm:text-md border border-gray-200 border-opacity-30 p-2 rounded-sm shadow-lg transform transition duration-500 ease-in-out hover:scale-125">
                                    أقرأ المزيد
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div
                            class="h-80 w-full bg-gradient-to-b from-blue-700 to-green-500 text-white p-6 sm:p-10 rounded-lg shadow-lg">
                            <img src="<?php echo e($gs->{'logo_' . $sign}); ?>" alt="Cosmetic Fillings" class="mx-auto w-20  mb-4">
                            <h3 class="text-xl sm:text-2xl font-bold mb-2">طب أسنان الأطفال</h3>
                            <p class="text-sm">نحن نهتم بابتسامة طفلك مثلما تهتم بها نقدم خدمات متكاملة لصحة أسنان
                                الأطفال</p>
                            <div class="my-10">
                                <a href="/services/طب-أسنان-الأطفال"
                                    class="text-sm sm:text-md border border-gray-200 border-opacity-30 p-2 rounded-sm shadow-lg transform transition duration-500 ease-in-out hover:scale-125">
                                    أقرأ المزيد
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div
                            class="h-80 w-full bg-gradient-to-b from-blue-700 to-green-500 text-white p-6 sm:p-10 rounded-lg shadow-lg">
                            <img src="<?php echo e($gs->{'logo_' . $sign}); ?>" alt="Cosmetic Fillings" class="mx-auto w-20  mb-4">
                            <h3 class="text-xl sm:text-2xl font-bold mb-2">تبيض الاسنان</h3>
                            <p class="text-sm">تبيض الاسنان للحصول على ابتسامة مشرقة تجعل يومك أفضل</p>
                            <div class="my-10">
                                <a href="/services/تبيض-الاسنان"
                                    class="text-sm sm:text-md border border-gray-200 border-opacity-30 p-2 rounded-sm shadow-lg transform transition duration-500 ease-in-out hover:scale-125">
                                    أقرأ المزيد
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div
                            class="h-80 w-full bg-gradient-to-b from-blue-700 to-green-500 text-white p-6 sm:p-10 rounded-lg shadow-lg">
                            <img src="<?php echo e($gs->{'logo_' . $sign}); ?>" alt="Cosmetic Fillings" class="mx-auto w-20  mb-4">
                            <h3 class="text-xl sm:text-2xl font-bold mb-2">هوليود سمايل</h3>
                            <p class="text-sm">مع ابتسامة هوليود التي يقدمها دكتور محمد حجاب، تحصل على تحول شامل
                                لابتسامتك</p>
                            <div class="my-10">
                                <a href="/services/هوليود-سمايل"
                                    class="text-sm sm:text-md border border-gray-200 border-opacity-30 p-2 rounded-sm shadow-lg transform transition duration-500 ease-in-out hover:scale-125">
                                    أقرأ المزيد
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div
                            class="h-80 w-full bg-gradient-to-b from-blue-700 to-green-500 text-white p-6 sm:p-10 rounded-lg shadow-lg">
                            <img src="<?php echo e($gs->{'logo_' . $sign}); ?>" alt="Cosmetic Fillings" class="mx-auto w-20  mb-4">
                            <h3 class="text-xl sm:text-2xl font-bold mb-2">حشو الاسنان</h3>
                            <p class="text-sm">حشو الاسنان التجميلية التي تعيد للأسنان وظيفتها الطبيعية مع الحفاظ على
                                مظهرها الجمالي</p>
                            <div class="my-10">
                                <a href="/services/حشو-الاسنان"
                                    class="text-sm sm:text-md border border-gray-200 border-opacity-30 p-2 rounded-sm shadow-lg transform transition duration-500 ease-in-out hover:scale-125">
                                    أقرأ المزيد
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div
                            class="h-80 w-full bg-gradient-to-b from-blue-700 to-green-500 text-white p-6 sm:p-10 rounded-lg shadow-lg">
                            <img src="<?php echo e($gs->{'logo_' . $sign}); ?>" alt="Cosmetic Fillings" class="mx-auto w-20  mb-4">
                            <h3 class="text-xl sm:text-2xl font-bold mb-2">علاج الجذور</h3>
                            <p class="text-sm">علاج جذور الأسنان هو الحل المثالي لك، يعتبر علاج الجذور إجراء فعال يهدف
                                إلى إنقاذ الأسنان المتضررة من التسوس أو العدوى في عيادتنا</p>
                            <div class="my-10">
                                <a href="/services/علاج-الجذور"
                                    class="text-sm sm:text-md border border-gray-200 border-opacity-30 p-2 rounded-sm shadow-lg transform transition duration-500 ease-in-out hover:scale-125">
                                    أقرأ المزيد
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div
                            class="h-80 w-full bg-gradient-to-b from-blue-700 to-green-500 text-white p-6 sm:p-10 rounded-lg shadow-lg">
                            <img src="<?php echo e($gs->{'logo_' . $sign}); ?>" alt="Cosmetic Fillings" class="mx-auto w-20  mb-4">
                            <h3 class="text-xl sm:text-2xl font-bold mb-2">الحشوات التجميلية</h3>
                            <p class="text-sm">الحشوات التجميلية هي الحل الأمثل لك، تعتبر هذه الحشوات من أحدث تقنيات
                                علاج الأسنان، حيث تمنحك مظهر طبيعي وجذاب، دون التأثير على جمال ابتسامتك</p>
                            <div class="my-10">
                                <a href="/services/الحشوات-التجميلية"
                                    class="text-sm sm:text-md border border-gray-200 border-opacity-30 p-2 rounded-sm shadow-lg transform transition duration-500 ease-in-out hover:scale-125">
                                    أقرأ المزيد
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mt-8">
                <a href="/services"
                    class="bg-green-500 hover:bg-green-600 text-white font-bold py-4 px-6 rounded-full shadow-md transition duration-300">
                    اكتشف المزيد من خدماتنا
                </a>
            </div>
        </div>
    </section>
    <section class="sm:px-16 px-4 py-10 sm:py-16 bg-gray-100">
        <div class="sm:px-16 px-10 mx-auto text-center">
            <h2 class="sm:text-4xl text-lg font-bold text-blue-800 mb-6">
                ابق على اطلاع بأفكارنا<br>المتعلقة بطب الأسنان
            </h2>
            <p class="text-gray-500 text-base sm:text-lg mb-8">
                تفضل بزيارة مدونة Tooth Guard Clinics للحصول على أحدث النصائح والاتجاهات والرؤى المتعلقة بصحة الأسنان.
                تغطي مقالاتنا كل ما تحتاج إلى معرفته للحفاظ على ابتسامة مشرقة وصحية
            </p>
            <div class="swiper mySwiper overflow-hidden">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <div
                            class="bg-white shadow-md rounded-lg overflow-hidden mt-4 mb-4 transform transition duration-300 hover:scale-105">
                            <img src="https://api.tooth-guard.com/assets/images/blogs/173321928965662b9e53.jpg"
                                alt="سعر تقويم الاسنان في مصر 2025" class="w-full h-60 object-cover">
                            <div class="p-4">
                                <h3 class="text-lg font-bold text-blue-800 mb-2">سعر تقويم الاسنان في مصر 2025</h3>
                                <div class="text-gray-600 text-sm"></div>
                                <div class="group mt-7 mb-4">
                                    <a href="/blogs/سعر-تقويم-الاسنان-في-مصر"
                                        class="text-sm sm:text-md border border-blue-800 text-blue-800 p-2 rounded-sm shadow-md hover:bg-blue-800 hover:text-white transition duration-300">
                                        أقرأ المزيد
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div
                            class="bg-white shadow-md rounded-lg overflow-hidden mt-4 mb-4 transform transition duration-300 hover:scale-105">
                            <img src="https://api.tooth-guard.com/assets/images/blogs/1733396057سعر زراعة الاسنان في مصر.jpg"
                                alt="سعر زراعة الاسنان فى مصر 2025" class="w-full h-60 object-cover">
                            <div class="p-4">
                                <h3 class="text-lg font-bold text-blue-800 mb-2">سعر زراعة الاسنان فى مصر 2025</h3>
                                <div class="text-gray-600 text-sm"></div>
                                <div class="group mt-7 mb-4">
                                    <a href="/blogs/سعر-زراعة-الاسنان-فى-مصر"
                                        class="text-sm sm:text-md border border-blue-800 text-blue-800 p-2 rounded-sm shadow-md hover:bg-blue-800 hover:text-white transition duration-300">
                                        أقرأ المزيد
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div
                            class="bg-white shadow-md rounded-lg overflow-hidden mt-4 mb-4 transform transition duration-300 hover:scale-105">
                            <img src="https://api.tooth-guard.com/assets/images/blogs/1734521303سعر تقويم الاسنان الشفاف الثابت.jpg"
                                alt="سعر تقويم الاسنان الشفاف فى مصر" class="w-full h-60 object-cover">
                            <div class="p-4">
                                <h3 class="text-lg font-bold text-blue-800 mb-2">سعر تقويم الاسنان الشفاف فى مصر</h3>
                                <div class="text-gray-600 text-sm"></div>
                                <div class="group mt-7 mb-4">
                                    <a href="/blogs/سعر-تقويم-الاسنان-الشفاف-فى-مصر"
                                        class="text-sm sm:text-md border border-blue-800 text-blue-800 p-2 rounded-sm shadow-md hover:bg-blue-800 hover:text-white transition duration-300">
                                        أقرأ المزيد
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div
                            class="bg-white shadow-md rounded-lg overflow-hidden mt-4 mb-4 transform transition duration-300 hover:scale-105">
                            <img src="https://api.tooth-guard.com/assets/images/blogs/1734525484هوليود سمايل ..jpg"
                                alt="سعر هوليود سمايل 2025" class="w-full h-60 object-cover">
                            <div class="p-4">
                                <h3 class="text-lg font-bold text-blue-800 mb-2">سعر هوليود سمايل 2025</h3>
                                <div class="text-gray-600 text-sm"></div>
                                <div class="group mt-7 mb-4">
                                    <a href="/blogs/سعر-هوليود-سمايل"
                                        class="text-sm sm:text-md border border-blue-800 text-blue-800 p-2 rounded-sm shadow-md hover:bg-blue-800 hover:text-white transition duration-300">
                                        أقرأ المزيد
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div
                            class="bg-white shadow-md rounded-lg overflow-hidden mt-4 mb-4 transform transition duration-300 hover:scale--105">
                            <img src="https://api.tooth-guard.com/assets/images/blogs/1735562457تركيب الزيركون للاسنان.jpg"
                                alt="اسعار تركيب الاسنان الزيركون في مصر" class="w-full h-60 object-cover">
                            <div class="p-4">
                                <h3 class="text-lg font-bold text-blue-800 mb-2">اسعار تركيب الاسنان الزيركون في مصر
                                </h3>
                                <div class="text-gray-600 text-sm"></div>
                                <div class="group mt-7 mb-4">
                                    <a href="/blogs/تركيب-الزيركون-للاسنان"
                                        class="text-sm sm:text-md border border-blue-800 text-blue-800 p-2 rounded-sm shadow-md hover:bg-blue-800 hover:text-white transition duration-300">
                                        أقرأ المزيد
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div
                            class="bg-white shadow-md rounded-lg overflow-hidden mt-4 mb-4 transform transition duration-300 hover:scale-105">
                            <img src="https://api.tooth-guard.com/assets/images/blogs/1734600922زراعة عظم الفك.jpg"
                                alt="تكلفة عملية زراعة عظم الفك في مصر" class="w-full h-60 object-cover">
                            <div class="p-4">
                                <h3 class="text-lg font-bold text-blue-800 mb-2">تكلفة عملية زراعة عظم الفك في مصر</h3>
                                <div class="text-gray-600 text-sm"></div>
                                <div class="group mt-7 mb-4">
                                    <a href="/blogs/عملية-زراعة-عظم-الفك"
                                        class="text-sm sm:text-md border border-blue-800 text-blue-800 p-2 rounded-sm shadow-md hover:bg-blue-800 hover:text-white transition duration-300">
                                        أقرأ المزيد
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Additional slides can be added here following the same structure -->
                </div>
            </div>
            <div class="mt-8">
                <a href="/blogs"
                    class="bg-blue-800 hover:bg-blue-900 text-white font-bold py-3 px-6 rounded-full shadow-md transition duration-300">
                    اكتشف المزيد من المقالات
                </a>
            </div>
        </div>
    </section>
    <section
        class="bg-gradient-to-r from-blue-500 to-green-400 text-white h-[350px] flex flex-col items-center justify-center sm:mt-0 mt-10">
        <div class="text-center px-4">
            <h1 class="sm:text-4xl text-xl font-bold mb-4">
                تواصل معنا اليوم لبدء رحلتك إلى ابتسامة أكثر صحة
            </h1>
            <p class="text-sm lg:text-lg mb-8 max-w-2xl mx-auto">
                فريقنا جاهز للمساعدة في المواعيد والإجابة على أسئلتك وإرشادك نحو تحقيق ابتسامتك المثالية
            </p>
            <div class="flex space-x-4 space-x-reverse justify-center items-center">
                <a href="/contact-us"
                    class="bg-green-500 hover:bg-green-600 text-white font-semibold lg:font-bold text-sm lg:text-lg py-2 px-4 sm:px-6 rounded-full transition duration-300">
                    تواصل معنا
                </a>
                <span class="text-white text-xl lg:mt-2 pr-3">أو</span>
                <a href="https://wa.me/+201555004694" target="_blank"
                    class="text-white font-semibold text-sm lg:text-lg py-2 px-4 sm:px-6 rounded-full border-2 border-white hover:bg-white hover:text-blue-500 transition duration-300">
                    احجز موعدك
                </a>
            </div>
        </div>
    </section>


    <!-- Video Testimonials Section -->
    <section class="py-20 bg-gradient-to-b from-blue-50 to-white">
        <div class="container mx-auto px-4">
            <h2
                class="text-4xl md:text-5xl font-bold bg-gradient-to-r from-blue-800 to-green-600 bg-clip-text text-transparent text-center mb-16">
                فيديوهات عن الدكتور
            </h2>
            <div class="max-w-5xl mx-auto">
                <div
                    class="bg-gradient-to-br from-blue-900 to-green-900 rounded-2xl overflow-hidden aspect-video relative shadow-2xl border-4 border-blue-200">
                    <img src="https://via.placeholder.com/800x400" alt="Video testimonial"
                        class="object-cover w-full h-full">
                    <div
                        class="absolute inset-0 bg-gradient-to-br from-blue-900/60 to-green-900/60 flex items-center justify-center">
                        <button
                            class="bg-gradient-to-r from-green-500 to-blue-500 hover:from-green-600 hover:to-blue-600 text-white border-2 border-white rounded-full p-6 shadow-2xl hover:shadow-green-500/25 transition-all duration-300 transform hover:scale-110">
                            <svg class="w-12 h-12" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M8 5v14l11-7z" />
                            </svg>
                        </button>
                    </div>
                    <div class="absolute bottom-6 left-6 text-white">
                        <div class="flex items-center gap-3 bg-blue-600/80 backdrop-blur-sm rounded-full px-4 py-2">
                            <div
                                class="w-10 h-10 bg-gradient-to-r from-green-400 to-blue-400 rounded-full flex items-center justify-center">
                                <i data-lucide="users" class="w-5 h-5 text-white"></i>
                            </div>
                            <span class="font-semibold">reviews</span>
                        </div>
                    </div>
                    <div class="absolute bottom-6 right-6 text-white">
                        <div class="bg-green-600/80 backdrop-blur-sm rounded-full px-4 py-2 font-semibold">Share</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

 <?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.front', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\admin-cangrows\resources\views/front/index.blade.php ENDPATH**/ ?>