 
   @extends('layouts.front')

  @section('title')
      {{ $service->{'title_' . $sign} }} - {{ $gs->{'title_' . $sign} }}
  @stop

  @section('gsearch')
      <meta property="og:image" content="{{ $gs->{'logo_' . $sign} }}" />
  @stop
  @section('css')


  @stop



  @section('content')
      @php
          $phones = explode(',', $gs->phones);
          $randomPhone = Arr::random($phones);
      @endphp
    <main>
        <!-- Banner Section -->
        <div class="gradient-bg text-white py-16 px-4 relative overflow-hidden">
            <!-- Background Pattern -->
            <div class="absolute inset-0 opacity-10">
                <div class="absolute top-0 left-0 w-64 h-64 bg-white rounded-full -translate-x-1/2 -translate-y-1/2">
                </div>
                <div class="absolute bottom-0 right-0 w-96 h-96 bg-white rounded-full translate-x-1/2 translate-y-1/2">
                </div>
            </div>

            <!-- Animated Elements -->
            <div
                class="absolute top-10 left-10 w-20 h-20 border-4 border-white border-opacity-30 rounded-full animate-ping">
            </div>
            <div
                class="absolute bottom-10 right-10 w-16 h-16 border-4 border-white border-opacity-30 rounded-full animate-pulse">
            </div>

            <div class="max-w-6xl mx-auto relative z-4">
                <!-- Main Content -->
                <div class="flex flex-col md:flex-row items-center justify-between">
                    <!-- Text Content -->
                    <div class="md:w-1/2 mb-10 md:mb-0 text-center md:text-right">
                        <h1 class="text-4xl md:text-5xl font-bold mb-4 animate-fadeInUp">دار التوفيق</h1>
                        <p class="text-xl md:text-2xl mb-6 opacity-90 animate-fadeInUp" style="animation-delay: 0.2s;">
                            مؤسسة أهلية وطنية غير حكومية وغير هادفة للربح
                        </p>
                        <p class="text-lg mb-8 max-w-lg mx-auto md:mr-0 opacity-80 animate-fadeInUp"
                            style="animation-delay: 0.4s;">
                            أسست عام 2011 ومسجلة مركزياً برقم قيد 839 لسنة 2018 وتعمل طبقاً لقانون الجمعيات والمؤسسات
                            الأهلية المصري.
                        </p>
                        <div class="flex flex-col sm:flex-row gap-4 justify-center md:justify-start animate-fadeInUp"
                            style="animation-delay: 0.6s;">
                            <button
                                class="bg-white text-custom-blue font-semibold py-3 px-6 rounded-lg shadow-lg hover:bg-gray-100 transition duration-300 transform hover:-translate-y-1 animate-pulse-slow">
                                <i class="fas fa-info-circle ml-2"></i>
                                تعرف علينا أكثر
                            </button>
                            <button
                                class="bg-transparent border-2 border-white font-semibold py-3 px-6 rounded-lg hover:bg-white hover:text-custom-blue transition duration-300 transform hover:-translate-y-1">
                                <i class="fas fa-phone ml-2"></i>
                                اتصل بنا
                            </button>
                        </div>
                    </div>

                    <!-- Visual Element -->
                    <div class="md:w-2/5 flex justify-center">
                        <div class="relative">
                            <div
                                class="w-64 h-64 bg-white bg-opacity-20 rounded-full flex items-center justify-center shadow-2xl transform rotate-6 transition duration-1000 hover:rotate-0">
                                <div
                                    class="w-56 h-56 bg-white bg-opacity-30 rounded-full flex items-center justify-center">
                                    <div
                                        class="w-48 h-48 bg-white rounded-full flex items-center justify-center shadow-inner">
                                        <i class="fas fa-home text-custom-blue text-6xl"></i>
                                    </div>
                                </div>
                            </div>

                            <!-- Floating Icons -->
                            <div
                                class="absolute -top-4 -right-4 w-16 h-16 bg-yellow-400 rounded-full flex items-center justify-center shadow-lg animate-bounce">
                                <i class="fas fa-star text-white text-xl"></i>
                            </div>
                            <div class="absolute -bottom-4 -left-4 w-14 h-14 bg-green-500 rounded-full flex items-center justify-center shadow-lg animate-bounce"
                                style="animation-delay: 0.5s;">
                                <i class="fas fa-check text-white text-lg"></i>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Features Section -->
                <div class="mt-16 grid grid-cols-1 md:grid-cols-3 gap-6">
                    <div
                        class="bg-white bg-opacity-20 backdrop-blur-sm rounded-xl p-6 text-center transform transition duration-500 hover:scale-105">
                        <div class="w-16 h-16 bg-white rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-handshake text-custom-blue text-2xl"></i>
                        </div>
                        <h3 class="text-xl font-bold mb-2">دعم اجتماعي</h3>
                        <p class="opacity-90">برامج الدعم الإنساني والاجتماعي للفئات الأكثر احتياجًا</p>
                    </div>

                    <div
                        class="bg-white bg-opacity-20 backdrop-blur-sm rounded-xl p-6 text-center transform transition duration-500 hover:scale-105">
                        <div class="w-16 h-16 bg-white rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-award text-custom-blue text-2xl"></i>
                        </div>
                        <h3 class="text-xl font-bold mb-2">تمكين المرأة</h3>
                        <p class="opacity-90">مشروعات تمكين المرأة وتنمية المهارات للارتقاء بدورها المجتمعي</p>
                    </div>

                    <div
                        class="bg-white bg-opacity-20 backdrop-blur-sm rounded-xl p-6 text-center transform transition duration-500 hover:scale-105">
                        <div class="w-16 h-16 bg-white rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-headset text-custom-blue text-2xl"></i>
                        </div>
                        <h3 class="text-xl font-bold mb-2">تعليم وتدريب</h3>
                        <p class="opacity-90">مبادرات تعليمية وتدريبية لبناء قدرات الأفراد وتمكينهم</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Additional Info Section -->
        <div class="max-w-6xl mx-auto py-12 px-4">
            <h2 class="text-3xl font-bold text-center text-gray-800 mb-8">لماذا تختار دار التوفيق؟</h2>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <div
                    class="bg-white p-6 rounded-xl shadow-md border-l-4 border-blue-500 transform transition duration-300 hover:-translate-y-2">
                    <div class="flex items-start">
                        <div class="bg-blue-100 p-3 rounded-lg mr-4">
                            <i class="fas fa-rocket text-blue-600 text-xl"></i>
                        </div>
                        <div>
                            <h3 class="text-xl font-bold text-gray-800 mb-2">أثر مستدام</h3>
                            <p class="text-gray-600">نسعى لصناعة تغيير حقيقي ومستدام في حياة المستفيدين</p>
                        </div>
                    </div>
                </div>

                <div
                    class="bg-white p-6 rounded-xl shadow-md border-l-4 border-green-500 transform transition duration-300 hover:-translate-y-2">
                    <div class="flex items-start">
                        <div class="bg-green-100 p-3 rounded-lg mr-4">
                            <i class="fas fa-users text-green-600 text-xl"></i>
                        </div>
                        <div>
                            <h3 class="text-xl font-bold text-gray-800 mb-2">فريق ملتزم</h3>
                            <p class="text-gray-600">يعمل فريقنا ومتطوعونا بإخلاص واحترافية لخدمة المجتمع</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script>
            // Add some interactive animations
            document.addEventListener('DOMContentLoaded', function () {
                const buttons = document.querySelectorAll('button');

                buttons.forEach(button => {
                    button.addEventListener('mouseenter', function () {
                        this.style.transform = 'translateY(-5px)';
                    });

                    button.addEventListener('mouseleave', function () {
                        this.style.transform = 'translateY(0)';
                    });
                });

                // Animate elements on scroll
                const observerOptions = {
                    threshold: 0.1,
                    rootMargin: '0px 0px -50px 0px'
                };

                const observer = new IntersectionObserver(function (entries) {
                    entries.forEach(entry => {
                        if (entry.isIntersecting) {
                            entry.target.style.opacity = 1;
                            entry.target.style.transform = 'translateY(0)';
                        }
                    });
                }, observerOptions);

                const animatedElements = document.querySelectorAll('.bg-white');
                animatedElements.forEach(el => {
                    el.style.opacity = 0;
                    el.style.transform = 'translateY(20px)';
                    el.style.transition = 'opacity 0.5s ease, transform 0.5s ease';
                    observer.observe(el);
                });
            });
        </script>
        <!-- Service Details Section -->
        <div class="max-w-6xl mx-auto py-12 px-4">
            <div class="flex flex-col lg:flex-row items-center gap-10">
                <!-- Image -->
                <div class="lg:w-1/2 flex justify-center">
                    <div
                        class="rounded-2xl overflow-hidden shadow-xl border border-gray-200 transform transition duration-500 hover:scale-105">
                        <img src="./assets/imgs/home/ser-1 (1).jpg" alt="تمكين المرأة وتنمية المهارات"
                            class="w-full h-auto object-cover" />
                    </div>
                </div>

                <!-- Content -->
                <div class="lg:w-1/2 text-right lg:text-right">
                    <h2 class="text-3xl md:text-4xl font-bold text-gray-800 mb-4">
                        تمكين المرأة وتنمية المهارات
                    </h2>
                    <p class="text-gray-600 text-lg leading-relaxed mb-6">
                        برنامج متكامل يهدف إلى دعم المرأة اقتصاديًا واجتماعيًا من خلال التدريب المهني، الدعم النفسي،
                        وتمكينها لتصبح عنصرًا فاعلًا في مجتمعها.
                        يشمل البرنامج ورش عمل، جلسات توجيه، وتمويل بذري للمشاريع الناشئة.
                    </p>
                    <p class="text-gray-600 text-lg leading-relaxed">
                        منذ انطلاقه، ساعد البرنامج أكثر من 5,000 امرأة في 12 محافظة مصرية على بناء حياة كريمة ومستقلة.
                    </p>
                </div>
            </div>
        </div>
        <section class="container mx-auto px-4 py-16">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 md:gap-8">

                <!-- كارت 1 -->
                <article
                    class="group bg-white rounded-lg shadow-lg overflow-hidden flex flex-col transition-all duration-300 hover:shadow-xl hover:-translate-y-1">
                    <div class="relative overflow-hidden">
                        <img src="./assets/imgs/home/ser-1 (1).jpg" alt="كارت الود موصول"
                            class="w-full h-64 object- transition-transform duration-500 ease-out group-hover:scale-110" />

                        <!-- الخط الصاعد -->
                        <span
                            class="absolute bottom-0 right-0 w-[2px] h-0 bg-custom-orange transition-all duration-500 ease-out group-hover:h-full group-hover:bottom-auto group-hover:top-0"></span>
                    </div>

                    <div class="p-6 flex-grow flex flex-col">
                        <h3 class="text-xl font-bold text-gray-900 mb-2">كارت الود موصول</h3>
                        <p class="text-gray-600 text-sm mb-4 flex-grow">
                            اوصل حبل الود بكل حبايبك و اصحابك بصدقة جارية تخلد اساميهم في السعادة وتدعمك بيهم طول العمر.
                        </p>
                        <div class="flex gap-2">
                            <!-- Outline Button -->
                            <a href="#"
                                class="flex-1 text-custom-orange bg-white border-2 border-custom-orange font-semibold px-4 py-2 rounded-md text-center transition-all duration-300 ease-out hover:bg-custom-orange hover:text-white">
                                عرض المزيد
                            </a>

                        </div>
                    </div>
                </article>

                <!-- كارت 2 -->
                <article
                    class="group bg-white rounded-lg shadow-lg overflow-hidden flex flex-col transition-all duration-300 hover:shadow-xl hover:-translate-y-1">
                    <div class="relative overflow-hidden">
                        <img src="./assets/imgs/home/ser-1 (2).jpg"
                            class="w-full h-64 object- transition-transform duration-500 ease-out group-hover:scale-110" />
                        <span
                            class="absolute bottom-0 right-0 w-[2px] h-0 bg-custom-orange transition-all duration-500 ease-out group-hover:h-full group-hover:bottom-auto group-hover:top-0"></span>
                    </div>

                    <div class="p-6 flex-grow flex flex-col">
                        <h3 class="text-xl font-bold text-gray-900 mb-2">سقف خشبي</h3>
                        <p class="text-gray-600 text-sm mb-4 flex-grow">
                            بتبرعك، سقفك خشبي هتحمي أسرة فقيرة من البرد و المطر، وتوفرلهم الستر والدفء والأمان.
                        </p>
                        <div class="flex gap-2">
                            <!-- Outline Button -->
                            <a href="#"
                                class="flex-1 text-custom-orange bg-white border-2 border-custom-orange font-semibold px-4 py-2 rounded-md text-center transition-all duration-300 ease-out hover:bg-custom-orange hover:text-white">
                                عرض المزيد
                            </a>

                        </div>
                    </div>
                </article>

                <!-- كارت 3 -->
                <article
                    class="group bg-white rounded-lg shadow-lg overflow-hidden flex flex-col transition-all duration-300 hover:shadow-xl hover:-translate-y-1">
                    <div class="relative overflow-hidden">
                        <img src="./assets/imgs/home/ser-1 (3).jpg"
                            class="w-full h-64 object- transition-transform duration-500 ease-out group-hover:scale-110" />
                        <span
                            class="absolute bottom-0 right-0 w-[2px] h-0 bg-custom-orange transition-all duration-500 ease-out group-hover:h-full group-hover:bottom-auto group-hover:top-0"></span>
                    </div>

                    <div class="p-6 flex-grow flex flex-col">
                        <h3 class="text-xl font-bold text-gray-900 mb-2">قافلة إغاثة فلسطين</h3>
                        <p class="text-gray-600 text-sm mb-4 flex-grow">
                            كن عوناً لأهل غزة بالدواء و الغذاء في ظل الحصار الكامل وساهم في انقاذ آلاف المصابين.
                        </p>
                        <div class="flex gap-2">
                            <!-- Outline Button -->
                            <a href="#"
                                class="flex-1 text-custom-orange bg-white border-2 border-custom-orange font-semibold px-4 py-2 rounded-md text-center transition-all duration-300 ease-out hover:bg-custom-orange hover:text-white">
                                عرض المزيد
                            </a>

                        </div>
                    </div>
                </article>

                <!-- كارت 4 -->
                <article
                    class="group bg-white rounded-lg shadow-lg overflow-hidden flex flex-col transition-all duration-300 hover:shadow-xl hover:-translate-y-1">
                    <div class="relative overflow-hidden">
                        <img src="./assets/imgs/home/ser-1 (6).jpg"
                            class="w-full h-64 object- transition-transform duration-500 ease-out group-hover:scale-110" />
                        <span
                            class="absolute bottom-0 right-0 w-[2px] h-0 bg-custom-orange transition-all duration-500 ease-out group-hover:h-full group-hover:bottom-auto group-hover:top-0"></span>
                    </div>

                    <div class="p-6 flex-grow flex flex-col">
                        <h3 class="text-xl font-bold text-gray-900 mb-2">مشروعات صغيرة</h3>
                        <p class="text-gray-600 text-sm mb-4 flex-grow">
                            ساعدهم مرة وأسعدهم طول العمر، تبرعك بمشروع صغير هتقدر تحول حياة أسرة فقيرة.
                        </p>
                        <div class="flex gap-2">
                            <!-- Outline Button -->
                            <a href="#"
                                class="flex-1 text-custom-orange bg-white border-2 border-custom-orange font-semibold px-4 py-2 rounded-md text-center transition-all duration-300 ease-out hover:bg-custom-orange hover:text-white">
                                عرض المزيد
                            </a>

                        </div>
                    </div>
                </article>

                <!-- كارت 5 -->
                <article
                    class="group bg-white rounded-lg shadow-lg overflow-hidden flex flex-col transition-all duration-300 hover:shadow-xl hover:-translate-y-1">
                    <div class="relative overflow-hidden">
                        <img src="./assets/imgs/home/ser-1 (4).jpg" alt="كرتونة فرحة العيد"
                            class="w-full h-64 object- transition-transform duration-500 ease-out group-hover:scale-110" />
                        <span
                            class="absolute bottom-0 right-0 w-[2px] h-0 bg-custom-orange transition-all duration-500 ease-out group-hover:h-full group-hover:bottom-auto group-hover:top-0"></span>
                    </div>

                    <div class="p-6 flex-grow flex flex-col">
                        <h3 class="text-xl font-bold text-gray-900 mb-2">كرتونة فرحة العيد</h3>
                        <p class="text-gray-600 text-sm mb-4 flex-grow">
                            ساهم بكرتونة فرحة العيد وفرح آلاف المستحقين في عيد الأضحى المبارك.
                        </p>
                        <div class="flex gap-2">
                            <!-- Outline Button -->
                            <a href="#"
                                class="flex-1 text-custom-orange bg-white border-2 border-custom-orange font-semibold px-4 py-2 rounded-md text-center transition-all duration-300 ease-out hover:bg-custom-orange hover:text-white">
                                عرض المزيد
                            </a>

                        </div>
                    </div>
                </article>

                <!-- كارت 6 -->
                <article
                    class="group bg-white rounded-lg shadow-lg overflow-hidden flex flex-col transition-all duration-300 hover:shadow-xl hover:-translate-y-1">
                    <div class="relative overflow-hidden">
                        <img src="./assets/imgs/home/ser-1 (5).jpg"
                            class="w-full h-64 object-cover transition-transform duration-500 ease-out group-hover:scale-110" />
                        <span
                            class="absolute bottom-0 right-0 w-[2px] h-0 bg-custom-orange transition-all duration-500 ease-out group-hover:h-full group-hover:bottom-auto group-hover:top-0"></span>
                    </div>

                    <div class="p-6 flex-grow flex flex-col">
                        <h3 class="text-xl font-bold text-gray-900 mb-2">وجبات إطعام</h3>
                        <p class="text-gray-600 text-sm mb-4 flex-grow">
                            تبرع بزكاتك وصدقاتك لإطعام أكثر من 100 ألف مستفيد في شتاء هو الأصعب على آلاف الأسر المستحقة.
                        </p>
                        <div class="flex gap-2">
                            <!-- Outline Button -->
                            <a href="#"
                                class="flex-1 text-custom-orange bg-white border-2 border-custom-orange font-semibold px-4 py-2 rounded-md text-center transition-all duration-300 ease-out hover:bg-custom-orange hover:text-white">
                                عرض المزيد
                            </a>

                        </div>
                    </div>
                </article>

            </div>


        </section>


    </main>

@stop