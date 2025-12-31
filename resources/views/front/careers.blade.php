  
 
    
   @extends('layouts.front')

@section('title')
   
{{ __('الوظائف') }} -  {{ $gs->{'title_' . $sign} }}
     
@stop

@section('gsearch')
    <meta property="og:image" content=" {{ $gs->{'logo_' . $sign} }}" />
@stop

@section('css')

 @stop

@section('content')
     @php
         $phones = explode(',', $gs->phones);
         $emails = explode(',', $gs->emails);
         $addresses = json_decode($gs->{'addresses_' . $sign});

         $randomAddress = Arr::random($addresses);
         $randomPhone = Arr::random($phones);
         $randomEmail = Arr::random($emails);
     @endphp
     <section class="page-header">
            <div class="page-header__bg" style="background-image: linear-gradient(to right, #000000, #ffffff);"></div>
            <!-- /.page-header__bg -->
            <div class="container">
                <h2 class="page-header__title"> الوظائف</h2>
               
            </div><!-- /.container -->
        </section><!-- /.page-header -->
       
        <!-- ------------------------------- -->
        <!-- ثقافة العمل في MTC -->
          <section id="work-culture" class="technologies-one section-space boskery-jarallax" data-jarallax data-spedd="0.3"
            style="background-image: url({{ asset('front/mtc/') }}/assets/images/backgrounds/technologies-bg-1-1.jpg);">
            <div class="technologies-one__bg"
                style="background-image: url({{ asset('front/mtc/') }}/assets/images/shapes/technologies-shape-bg-1-1.png);">
            </div><!-- /.technologies-one__bg -->
            <div class="container">
                <div class="row gutter-y-60">
                    <div class="col-xl-5 col-lg-6">
                        <div class="technologies-one__image">
                            <div class="technologies-one__image__inner">
      @foreach ($services as $k=>$item)
                                    <img src="{{ $item->photo }}" alt="{!! $item->{'title_' . $sign} ?? '' !!}  " id="photo-{{  $item->id }}"
                                        class="technologies-one__image__one" style="{{ $k == 0 ? '' : 'display:none;' }}">
      @endforeach
                                <div class="technologies-one__image__border"></div>
                                <!-- /.technologies-one__image__border -->
                            </div><!-- /.technologies-one__image__inner -->
                            <img src="{{ asset('front/mtc/') }}/assets/images/resources/technologies-1-2.png" alt="تقنيات الذبح"
                                class="technologies-one__image__two">
                        </div><!-- /.technologies-one__image -->
                    </div><!-- /.col-xl-5 col-lg-6 -->
                    <div class="col-xl-7 col-lg-6">
                        <div class="technologies-one__content">
                            <div class="sec-title @@extraClassName">

                                <img src="{{ asset('front/mtc/') }}/assets/images/shapes/sec-title-s-1.png" alt="المجزر والذبح"
                                    class="sec-title__img">

                                <!-- <h6 class="sec-title__tagline">المجزر والذبح</h6> -->
                                <!-- /.sec-title__tagline -->

                                   <h6 class="sec-title__tagline">بيئة العمل</h6>
                                <h2 class="sec-title__title">ثقافة العمل في <br> مجمع تكنولوجيا اللحوم</h2>
                           
                                <!-- /.sec-title__title -->
                            </div><!-- /.sec-title -->
                            <div class="technologies-one__main-tab-box tabs-box wow fadeInUp"
                                data-wow-duration="1500ms">
                                <ul class="tab-buttons">
                                    @foreach ($services as $k=>$item)
                                        
                                    <li data-tab="#item-{{  $item->id }}" class="tab-btn {{ $k == 0 ? 'active-btn' : '' }}"> {!! $item->{'title_' . $sign} ?? '' !!}  
                                    
                                    </li>
                                    @endforeach
                                   
                                </ul><!-- /.tab-buttons -->
                                <div class="tabs-content">
                                       @foreach ($services as $k=>$item)
                                    <div class="tab {{ $k == 0 ? 'active-tab' : '' }} fadeInUp animated" data-wow-delay="200ms"
                                        id="item-{{  $item->id }}" style="{{ $k == 0 ? 'display: block;' : '' }}">
                                        <p > {!! $item->{'details_' . $sign} ?? '' !!} </p>
                                    </div><!-- /.slaughter-process-tab -->
                                    @endforeach
                                 
                                </div><!-- /.tab-content -->
                            </div><!-- /.technologies-one__main-tab-box -->
                            <a href="{{ route('contact.index',$sign) }}" class="boskery-btn">
                                <span class="boskery-btn__hover"></span>
                                <span class="boskery-btn__hover"></span>
                                <span class="boskery-btn__hover"></span>
                                <span class="boskery-btn__hover"></span>
                                <span class="boskery-btn__hover"></span>
                                <span class="boskery-btn__hover"></span>
                                  <span class="boskery-btn__text">انضم إلينا</span>
                                <i class="icon-meat-3"></i>
                            </a><!-- /.boskery-btn -->
                        </div><!-- /.technologies-one__content -->
                    </div><!-- /.col-xl-7 col-lg-6 -->
                </div><!-- /.row -->
            </div><!-- /.container -->
        </section><!-- /.technologies-one section-space -->
 
        <!-- الوظائف المتاحة -->
        <section class="product-page section-space" id="available-jobs">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="product-page__carousel boskery-owl__carousel boskery-owl__carousel--with-shadow boskery-owl__carousel--basic-nav owl-carousel owl-theme"
                            data-owl-options='{
                        "items": 1,
                        "margin": 0,
                        "loop": true,
                        "smartSpeed": 700,
                        "nav": false,
                        "dots": true,
                        "autoplay": true,
                        "responsive": {
                            "0": { "items": 1, "dots": false, "nav": true, "margin": 10 },
                            "576": { "items": 2, "margin": 30 },
                            "768": { "items": 2, "margin": 30 },
                            "992": { "items": 3, "margin": 30 },
                            "1200": { "items": 4, "margin": 30 }
                        }
                    }'>

                    @foreach ($jobs as $job)
                        
                            <!-- وظيفة 01 -->
                         <div class="item">
                                <div class="product__item wow fadeInUp" data-wow-duration='1500ms'
                                    data-wow-delay='200ms'>
                                    <div class="product__item__image">
                                        <img src="{{ asset('front/mtc/') }}/assets/images/products/product-1-3.png" alt="فني مختبر">
                                    </div>
                                    <div class="product__item__content">

                                      
                                        <h4 class="product__item__title">
                                            <a href="#apply-cv">  {!! $job->{'title_' . $sign} ?? '' !!}  </a>
                                        </h4>

                                        <p class="product__i">{!! $job->{'short_details_' . $sign} ?? '' !!}   </p>
                                        <p>
                                           {!! $job->{'meta_title_' . $sign} ?? '' !!} 
                                        </p>
                                        
                                        <a href="#apply-cv" class="boskery-btn product__item__link">
                                            <span class="boskery-btn__hover"></span>
                                            <span class="boskery-btn__hover"></span>
                                            <span class="boskery-btn__hover"></span>
                                            <span class="boskery-btn__hover"></span>
                                            <span class="boskery-btn__hover"></span>
                                            <span class="boskery-btn__hover"></span>
                                            <span class="boskery-btn__text">تقدم الآن</span>
                                            <i class="icon-meat-3"></i>
                                        </a>

                                    </div>
                                </div>
                            </div>
                          
                    @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- نموذج إرسال السيرة الذاتية -->
        <section class="checkout-page section-space" id="apply-cv">
            <div class="container">
                <div class="row gutter-y-30"> 
                 <form enctype="multipart/form-data" action="{{route('front.contact.submit')}}" 
                    name="appointment" id="email-form" method="POST" autocomplete="off" class="checkout-page__form row gutter-y-16">
                            {{csrf_field()}}
                            <div class="form-group w-100">
                              <div class="response w-100"></div>
                            </div>
                    <div class="col-xl-8 col-lg-7">

                        <div class="checkout-page__billing-address">
                            <h2 class="checkout-page__billing-address__title checkout-page__title">
                                نموذج التقدم للوظائف
                            </h2>

                           

                            <input type="hidden" name="type" value="job-application">
                            
                                <div class="col-xl-12">
                                    <div class="checkout-page__input-box">
                                        <label for="full-name">الاسم بالكامل *</label>
                                        <input type="text" name="name" id="full-name" required="">
                                    </div>
                                </div>

                                <div class="col-xl-12">
                                    <div class="checkout-page__input-box">
                                        <label for="email">البريد الإلكتروني *</label>
                                        <input type="email" name="email" id="email" required="">
                                    </div>
                                </div>

                                <div class="col-xl-12">
                                    <div class="checkout-page__input-box">
                                        <label for="phone">رقم الهاتف *</label>
                                        <input type="tel" name="phone" id="phone" required="">
                                    </div>
                                </div>

                                <div class="col-xl-12">
                                    <div class="checkout-page__input-box">
                                        <label for="job-title">الوظيفة المتقدم لها *</label>
                                        <input type="text" name="job-title" id="job-title" required="">
                                    </div>
                                </div>

                                <div class="col-xl-12">
                                    <div class="checkout-page__input-box">
                                        <label>البلد *</label>
                                        <select class="selectpicker" name="country" required>
                                            <option selected="">اختر بلدك</option>
                                            <option value="">مصر</option>
                                            <option value="">السعودية</option>
                                            <option value="">الإمارات</option>
                                            <option value="">قطر</option>
                                            <option value="">الكويت</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-xl-12">
                                    <div class="checkout-page__input-box checkout-page__input-box--address">
                                        <label for="address">العنوان الحالي *</label>
                                        <input type="text" name="address" id="address" placeholder="الشارع / المبنى" required="">
                                        {{-- <input type="text" placeholder="تفاصيل إضافية"> --}}
                                    </div>
                                </div>

                                <div class="col-xl-12">
                                    <div class="checkout-page__input-box ">
                                        <label for="city">المدينة *</label>
                                        <input type="text" name="city" id="city" required="">
                                    </div>
                                </div>

                                <div class="col-xl-12">
                                    <div class="checkout-page__input-box ">
                                        <label for="experience">سنوات الخبرة *</label>
                                        <input type="number" id="experience"  name="experience" min="0" required="">
                                    </div>
                                </div>

                                <!-- رفع السيرة الذاتية -->
                                <div class="col-xl-12">
                                    <div class="checkout-page__input-box">
                                        <label for="cv-file">رفع السيرة الذاتية (PDF / DOC) *</label>
                                        <input type="file" id="cv-file" name="cv-file" accept=".pdf,.doc,.docx" required="">
                                    </div>
                                </div>

                                <!-- خطاب التغطية -->
                                <div class="col-xl-12">
                                    <div class="checkout-page__input-box checkout-page__input-box--message">
                                        <label for="cover-letter">خطاب التغطية (اختياري)</label>
                                        <textarea id="cover-letter"  name="cover-letter" cols="30" rows="10"
                                            placeholder="اكتب نبذة مختصرة عن نفسك..."></textarea>
                                    </div>
                                </div>

                        </div>

                    </div>

                    <!-- الملخص الجانبي -->
                    <div class="col-xl-4 col-lg-5">
                        <div class="checkout-page__your-order">

                            <h2 class="checkout-page__your-order__title checkout-page__title">
                                ملخص الطلب
                            </h2>

                            <table class="checkout-page__order-table">
                                <thead>
                                    <tr>
                                        <th>الحقل</th>
                                        <th class="right">الحالة</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <tr>
                                        <td class="pro__title">الاسم</td>
                                        <td class="pro__price">مطلوب</td>
                                    </tr>
                                    <tr>
                                        <td class="pro__title">البريد الإلكتروني</td>
                                        <td class="pro__price">مطلوب</td>
                                    </tr>
                                    <tr>
                                        <td class="pro__title">الهاتف</td>
                                        <td class="pro__price">مطلوب</td>
                                    </tr>
                                    <tr>
                                        <td class="pro__title">السيرة الذاتية</td>
                                        <td class="pro__price">مطلوب</td>
                                    </tr>

                                    <tr>
                                        <td colspan="2">
                                            <div class="checkout-page__order-address-data">
                                                <h4 class="checkout-page__order-address">عنوانك</h4>
                                                <address class="checkout-page__order-address-text">
                                                    سيظهر هنا بعد الإرسال
                                                </address>
                                            </div>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td colspan="2">
                                            <p class="checkout-page__order-text">
                                                سيتم استخدام بياناتك لأغراض التقدم للوظائف فقط ومراجعتها من قبل قسم
                                                الموارد البشرية.
                                            </p>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td colspan="2">
                                            <button class="checkout-page__order-btn boskery-btn">
                                                <span class="boskery-btn__hover"></span>
                                                <span class="boskery-btn__hover"></span>
                                                <span class="boskery-btn__hover"></span>
                                                <span class="boskery-btn__hover"></span>
                                                <span class="boskery-btn__hover"></span>
                                                <span class="boskery-btn__hover"></span>
                                                <span class="boskery-btn__text">إرسال الطلب</span>
                                                <i class="icon-meat-3"></i>
                                            </button>
                                        </td>
                                    </tr>

                                </tbody>
                            </table>

                        </div>
                    </div>

                            </form>
                </div>
            </div>
        </section>

        <script>
            document.addEventListener('DOMContentLoaded', function () {
                const tabs = document.querySelectorAll('.tab-btn');
                const imgs = document.querySelectorAll('.technologies-one__image__one');

                tabs.forEach(tab => {
                    tab.addEventListener('click', function () {
                        // toggle active class on buttons
                        tabs.forEach(t => t.classList.remove('active-btn'));
                        this.classList.add('active-btn');

                        // show matching image by id (photo-<id>) and hide others
                        const target = this.getAttribute('data-tab'); // e.g. #item-3
                        if (!target) return;
                        const id = target.replace('#item-', '');
                        imgs.forEach(img => {
                            img.style.display = (img.id === 'photo-' + id) ? 'block' : 'none';
                        });

                        // also switch the tab content so existing tabs still work
                        const tabsContent = document.querySelectorAll('.tabs-content .tab');
                        tabsContent.forEach(c => { c.classList.remove('active-tab'); c.style.display = 'none'; });
                        const activeContent = document.querySelector(target);
                        if (activeContent) {
                            activeContent.classList.add('active-tab');
                            activeContent.style.display = 'block';
                        }
                    });
                });
            });
        </script>
     @stop