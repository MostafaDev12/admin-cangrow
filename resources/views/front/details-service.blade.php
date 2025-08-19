  @extends('layouts.front')

  @section('title')

      {{ $service->{'title_' . $sign} }} - {{ $gs->{'title_' . $sign} }}

  @stop

  @section('gsearch')
      <meta property="og:image" content=" {{ $gs->{'logo_' . $sign} }}" />
  @stop


  @section('content')
      @php
          $phones = explode(',', $gs->phones);
          $emails = explode(',', $gs->emails);

          $randomPhone = Arr::random($phones);
      @endphp
      <div class="bg-gradient-to-r from-blue-500 to-green-600 text-white py-16 px-4 md:px-16">
          <div class="text-center px-4">
              <h1 class="text-xl sm:text-4xl font-bold mb-4"> {{ $service->{'title_' . $sign} }} </h1>
              <p class="text-sm sm:text-lg max-w-2xl mx-auto">

              </p>
          </div>
      </div>


      <section class="container mx-auto px-4 py-8 lg:px-8 xl:max-w-7xl">
          <div class="grid grid-cols-1 lg:grid-cols-12 gap-8">
              <section class="lg:col-span-8">
                  <div class="prose prose-lg max-w-none text-gray-700">
                      {{-- <p class="text-base sm:text-lg leading-relaxed">
                        نسعى في مركز <strong>Tooth Guard</strong>، بقيادة <strong>الدكتور محمد حجاب</strong>، إلى تقديم
                        أفضل حلول العناية بالأسنان، مع التركيز على أحدث التقنيات وأعلى معايير الجودة لضمان رضاكم
                        وراحتكم. تتضمن خدماتنا مجموعة واسعة من العلاجات التي تغطي جميع احتياجات أسنانك.
                    </p> --}}
                      <img src="{{ $service->photo }}" alt="خدمات Tooth Guard للأسنان"
                          class="w-full max-w-[602px] h-auto rounded-lg shadow-md mx-auto my-6">

                      {{-- <h2 class="text-2xl sm:text-3xl font-bold text-blue-800 mt-8 mb-4">خدماتنا الرئيسية</h2> --}}
                      {{-- <p class="text-base sm:text-lg leading-relaxed">
                        نقدم في Tooth Guard حلولًا شاملة لمختلف مشاكل الأسنان، تشمل:
                    </p>
                    <ul class="space-y-4">
                        <li>
                            <h3 class="font-semibold text-xl text-blue-700">زراعة الأسنان</h3>
                            <ul class="pr-6 list-disc">
                                <li class="text-base sm:text-lg leading-relaxed">
                                    <strong>زراعة الأسنان التقليدية:</strong> حل دائم لاستعادة الأسنان المفقودة باستخدام
                                    غرسات معدنية تُزرع داخل عظم الفك، مناسبة لمن لديهم كمية كافية من العظم.
                                </li>
                                <li class="text-base sm:text-lg leading-relaxed">
                                    <strong>زراعة الأسنان الفورية:</strong> تتيح لك الحصول على أسنان جديدة في وقت قياسي
                                    بعد خلع السن مباشرة، مما يقلل فترة الشفاء ويعزز الثقة بالنفس.
                                </li>
                                <li class="text-base sm:text-lg leading-relaxed">
                                    <strong>زراعة الأسنان بالليزر:</strong> تقنية متقدمة تقلل الألم والنزيف، وتساعد في
                                    معالجة مشاكل اللثة ونقص عظم الفك، مما يضمن نتائج دقيقة وسريعة.
                                </li>
                                <li class="text-base sm:text-lg leading-relaxed">
                                    <strong>الزرع الزائد (Overdentures):</strong> بديلاً فعالاً لأطقم الأسنان التقليدية،
                                    حيث توضع الأطقم فوق الغرسات لتعزيز الاستقرار والثبات، وتحسين المضغ والتحدث.
                                </li>
                            </ul>
                        </li>
                        <li>
                            <h3 class="font-semibold text-xl text-blue-700">بدائل زراعة الأسنان</h3>
                            <ul class="pr-6 list-disc">
                                <li class="text-base sm:text-lg leading-relaxed">
                                    <strong>أطقم الأسنان:</strong> حلول مرنة لتعويض الأسنان المفقودة، متوفرة كأطقم جزئية
                                    أو كاملة، وتوفر راحة وفعالية دون الحاجة للجراحة.
                                </li>
                                <li class="text-base sm:text-lg leading-relaxed">
                                    <strong>جسور الأسنان:</strong> تركيبات صناعية ثابتة تعوض سنًا واحدًا أو أكثر، وتوفر
                                    مظهرًا طبيعيًا وتعد من الخيارات الاقتصادية الفعالة.
                                </li>
                                <li class="text-base sm:text-lg leading-relaxed">
                                    <strong>تيجان الأسنان:</strong> تُستخدم لتغطية وحماية الأسنان المتضررة من التسوس أو
                                    الكسر، وتعزز مظهرها وقوتها.
                                </li>
                            </ul>
                        </li>
                        <li>
                            <h3 class="font-semibold text-xl text-blue-700">خدمات تجميل الأسنان</h3>
                            <ul class="pr-6 list-disc">
                                <li class="text-base sm:text-lg leading-relaxed">
                                    <strong>هوليود سمايل:</strong> تصميم ابتسامة أحلامك من خلال مجموعة من الإجراءات
                                    التجميلية لتحقيق المظهر الجمالي المثالي لأسنانك.
                                </li>
                                <li class="text-base sm:text-lg leading-relaxed">
                                    <strong>تبييض الأسنان:</strong> إجراءات متقدمة لإزالة التصبغات وتفتيح لون الأسنان،
                                    لمنحك ابتسامة أكثر إشراقًا وجاذبية.
                                </li>
                                <li class="text-base sm:text-lg leading-relaxed">
                                    <strong>فينير الأسنان:</strong> قشور رقيقة تُصنع خصيصًا لتغطية السطح الخارجي
                                    للأسنان، لتحسين شكلها ولونها وحجمها.
                                </li>
                            </ul>
                        </li>
                        <li>
                            <h3 class="font-semibold text-xl text-blue-700">خدمات العناية بالأسنان العامة</h3>
                            <ul class="pr-6 list-disc">
                                <li class="text-base sm:text-lg leading-relaxed">
                                    <strong>تركيب تقويم الأسنان:</strong> حلول فعالة لتصحيح وضع الأسنان غير المنتظم
                                    ومشاكل الإطباق، لتحقيق تناسق وظيفي وجمالي.
                                </li>
                                <li class="text-base sm:text-lg leading-relaxed">
                                    <strong>تنظيف الأسنان من الجير:</strong> إزالة الترسبات الكلسية والبلاك لضمان صحة
                                    اللثة والوقاية من أمراض الفم.
                                </li>
                                <li class="text-base sm:text-lg leading-relaxed">
                                    <strong>حشو الأسنان الأمامية:</strong> استخدام مواد تجميلية مطابقة للون الأسنان
                                    لإصلاح التسوس أو التلف في الأسنان الأمامية بشكل غير ظاهر.
                                </li>
                            </ul>
                        </li>
                    </ul>

                    <p class="text-base sm:text-lg leading-relaxed mt-8">
                        لمعرفة المزيد عن أي من خدماتنا أو لحجز موعد مع <strong>الدكتور محمد حجاب</strong>، يرجى التواصل
                        معنا عبر الأرقام التالية: <strong><a href="tel:+201555004694"
                                class="text-blue-500 hover:underline">01555004694</a></strong> أو زيارة صفحة <strong><a
                                href="/contact-us" class="text-blue-500 hover:underline">اتصل بنا</a></strong> على
                        موقعنا الإلكتروني.
                    </p>
                    <img src="https://lh7-rt.googleusercontent.com/docsz/AD_4nXed0VMQVa78LPAOVobwdQKWKAqi5p3AqYKAJ4yvN4Y2ixOkrtayD80sNDjf-UK60JcoKj0ykfSaS_18wYR4LKfhFeMDC6sVWHqonqgp3phg8aIYCAwT0KwAdN7CfL-zuKHAD1DRuw?key=djlwP8pSwsamfzcrnW3LUqNO"
                        alt="مركز Tooth Guard لخدمات الأسنان"
                        class="w-full max-w-[602px] h-auto rounded-lg shadow-md mx-auto my-6"> --}}

                      <p>
                          {!! $service->{'details_' . $sign} !!}
                      </p>
                  </div>
              </section>

              <aside class="lg:col-span-4 mt-8 lg:mt-0">
                  <div class="bg-white shadow-xl rounded-xl p-6 md:p-8 border border-gray-100">
                      <div class="mb-10">
                          <h3 class="text-2xl font-extrabold text-blue-900 border-b-2 border-blue-300 pb-3 mb-5">
                              <i class="fas fa-tooth text-blue-600 ml-2"></i> {{ __('خدماتنا المميزة') }}
                          </h3>
                          <ul class="space-y-3">
                              @foreach ($services as $servic)
                                  <li>
                                      <a href="{{ route('single-service.index'.$lang, ['slug' => $servic->{'slug_' . $sign} ,'lang'=> $lang]) }}"
                                          class="flex items-center text-gray-700 hover:text-blue-700 transition-all duration-300 transform hover:translate-x-1">
                                          <i class="fas fa-angle-left text-blue-500 text-sm ml-2"></i>
                                          {{ $servic->{'title_' . $sign} }}
                                      </a>
                                  </li>
                              @endforeach

                          </ul>
                      </div>
                      @if (count($faqs) > 0)
                          <div class="mb-10">
                              <h3 class="text-2xl font-extrabold text-blue-900 border-b-2 border-blue-300 pb-3 mb-5">
                                  <i class="fas fa-question-circle text-blue-600 ml-2"></i>
                                  {{ __('الأسئلة الشائعة حول خدماتنا') }}
                              </h3>
                              @foreach ($faqs as $faq)
                                  <div class="faq-item">
                                      <div class="faq-question">
                                          <h4
                                              class="text-lg font-semibold text-blue-800 hover:text-blue-900 transition-colors duration-200">
                                              {{ $faq->{'title_' . $sign} }}
                                          </h4>
                                          <i class="fas fa-chevron-down text-blue-500"></i>
                                      </div>
                                      <div class="faq-answer">
                                          <p class="text-gray-600 pt-2 pb-3 text-base leading-relaxed">
                                              {{ $faq->{'details_' . $sign} }}
                                          </p>
                                      </div>
                                  </div>
                              @endforeach

                          </div>

                      @endif
                      <div>
                          <h3 class="text-2xl font-extrabold text-blue-900 border-b-2 border-blue-300 pb-3 mb-5">
                              <i class="fas fa-newspaper text-blue-600 ml-2"></i> {{ __('مقالات مفيدة') }}
                          </h3>
                          <ul class="space-y-5">

                              @foreach (App\Models\Blog::orderBy('blog_date', 'desc')->limit(3)->get() as $k => $blogg)
                                  @php
                                      $k++;
                                  @endphp
                                  <li class="flex items-start">
                                      <img src="{{ $blogg->photo }}" alt="صورة مقالة"
                                          class="w-24 h-24 object-cover rounded-lg shadow-sm ml-4 flex-shrink-0" />
                                      <div>
                                          <a href="{{ route('single-blog.index'.$lang, ['blog' =>$blogg->{'slug_' . $sign} ,'lang'=> $lang ]) }}"
                                              class="font-bold text-gray-800 hover:text-blue-700 text-lg leading-snug">
                                              {{ strip_tags($blogg->{'title_' . $sign} ) }}
                                          </a>
                                          <p class="text-sm text-gray-500 mt-1">
                                              {{ $blogg->blog_date }}
                                          </p>
                                      </div>
                                  </li>
                              @endforeach

                          </ul>
                      </div>
                  </div>
              </aside>
          </div>
      </section>
  @stop
