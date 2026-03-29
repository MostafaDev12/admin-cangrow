 
    
   @extends('layouts.front')

@section('title')
   
{{ __('عملاءنا') }} -  {{ $gs->{'title_' . $sign} }}
     
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
                <h2 class="page-header__title"> {{ __('عملاءنا') }} </h2>
               
            </div><!-- /.container -->
        </section><!-- /.page-header -->
       

        <!-- قطع خاصة للمطاعم -->
        <section class="gallery-page section-space" id="restaurant-cuts">
            <div class="container">
                <div class="sec-title sec-title--center">
                    <h6 class="sec-title__tagline">{{ __('خدمات B2B') }}</h6>
                    <h2 class="sec-title__title">{{ __('قطع خاصة للمطاعم والفنادق') }}</h2>
                </div>
                <div class="gallery-page__carousel boskery-owl__carousel boskery-owl__carousel--basic-nav owl-carousel owl-theme"
                    data-owl-options='{
			"items": 1,
			"margin": 30,
			"loop": true,
			"smartSpeed": 700,
			"nav": false,
			"navText": ["<span class=\"icon-arrow-left\"></span>","<span class=\"icon-arrow-right\"></span>"],
			"dots": true,
			"autoplay": true,
			"responsive": {
				"0": {
					"items": 1,
					"nav": true,
					"dots": false,
					"margin": 10
				},
				"768": {
					"items": 2,
					"margin": 30
				},
				"992": {
					"items": 3,
					"margin": 30
				}
			}
		}'>

 
                @foreach ($achievements as $image)
                     
                    <div class="item">
                        <div class="gallery-page__card">
                            <img src="{{ $image->photo }}" alt="شرائح اللحم حسب الطلب">
                            <div class="gallery-page__card__hover">
                                <a href="{{ $image->photo }}" class="img-popup">
                                    <span class="gallery-page__card__icon"></span>
                                </a>
                            </div><!-- /.gallery-page__card__hover -->
                        </div><!-- /.gallery-page__card -->
                    </div><!-- /.item -->
 
                @endforeach
                </div><!-- /.gallery-page__carousel -->
            </div><!-- /.container-fluid -->
        </section><!-- /.gallery-page section-space -->

        <!-- عبوات Bulk / Vacuum large packs -->
        <section class="services-page section-space" id="bulk-vacuum">
            <div class="container">
                <div class="sec-title sec-title--center">
                    <h6 class="sec-title__tagline">{{ __('خدمات الأعمال') }}</h6>
                    <h2 class="sec-title__title">{{ __('العبوات') }}  </h2>
                </div>
                <div class="services-page__carousel boskery-owl__carousel boskery-owl__carousel--basic-nav owl-carousel owl-theme"
                    data-owl-options='{
			"items": 1,
			"margin": 0,
			"loop": true,
			"smartSpeed": 700,
			"nav": false,
			"navText": ["<span class=\"icon-arrow-left\"></span>","<span class=\"icon-arrow-right\"></span>"],
			"dots": true,
			"autoplay": true,
			"responsive": {
				"0": {
					"items": 1,
					"nav": true,
					"dots": false,
					"margin": 10
				},
				"768": {
					"items": 2,
					"margin": 30
				},
				"992": {
					"items": 3,
					"margin": 30
				}
			}
		}'>

        @foreach ($teams as $model)
            
                    <div class="item wow fadeInUp" data-wow-duration="1500ms" data-wow-delay="00ms">
                        <div class="service-card">
                            <div class="service-card__content">
                                <div class="service-card__image">
                                    <img src="{{ $model->photo_url }}" alt="قطعيات خاصة للمطاعم">
                                    <div class="service-card__icon">
                                        <span class="icon-butchering"></span>
                                    </div><!-- /.service-card__icon -->
                                </div><!-- /.services-card__image -->
                                <h3 class="service-card__title"><a href="#">   
                                          {!! $model->{'title_' . $sign} ?? '' !!}</a></h3>
                                <!-- /.services-card__title -->
                                <p class="service-card__text">     {!! $model->{'details_' . $sign} ?? '' !!}   </p>
                                <!-- /.services-card__text -->
                            </div><!-- /.services-card__content -->
                            {{-- <a href="service-d-custom-cutting.html" class="service-card__btn">تفاصيل الخدمة <span
                                    class="icon-right"></span></a><!-- /.services-card__btn --> --}}
                        </div><!-- /.service-card -->
                    </div><!-- /.item -->
                
        @endforeach

                </div><!-- /.services-page__carousel -->
            </div><!-- /.container -->
        </section><!-- /.services-page section-space -->

        <section class="slide-text" id="private-label">
            <div class="slide-text__bg" style="background-image: url({{ site_image('slide_text_bg') }});">
            </div><!-- /.slide-text__bg -->
            <div class="container-fluid">
                <div class="slide-text__row">
                    @foreach ($categories as $cat)
                    <h2 class="slide-text__{{ $loop->odd ? 'one' : 'two' }}">{{ $cat->{'title_' . $sign} }}</h2>
                    <span class="slide-text__icon icon-meat-3"></span>
                    @endforeach
                    {{-- Repeat for seamless scroll --}}
                    @foreach ($categories as $cat)
                    <h2 class="slide-text__{{ $loop->odd ? 'one' : 'two' }}">{{ $cat->{'title_' . $sign} }}</h2>
                    <span class="slide-text__icon icon-meat-3"></span>
                    @endforeach
                </div><!-- /.slide-text__row -->
            </div><!-- /.container-fluid -->
        </section><!-- /.slide-text -->

       <section class="contact-page section-space-top" id="rfq-form">
            <div class="container">
                <div class="contact-page__wrapper">
                    <div class="contact-page__content">
                        <div class="contact-page__sec-title">
                            <h2 class="contact-page__title">{{ __('نموذج طلب عرض') }}  </h2><!-- /.contact-page__title -->
                            {{-- <p class="contact-page__text">consectetur adipiscing elit. Phasellus et metus augue. Mauris ut libero eget erat scelerisque vehicula. Phasellus nec blandit metus.</p><!-- /.contact-page__text --> --}}
                        </div><!-- /.contact-page__sec-title -->
                           
               <form enctype="multipart/form-data" action="{{route('front.contact.submit')}}" 
                    name="appointment" id="email-form" method="POST" autocomplete="off" class="contact-page__form contact-form-validated form-one">
                            {{csrf_field()}}
                            <div class="form-group w-100">
                              <div class="response w-100"></div>
                            </div>

                            <input type="hidden" name="type" value="b2b-services">
                            
                            <div class="form-one__group">
                                <div class="form-one__control wow fadeInUp" data-wow-duration="1500ms" data-wow-delay="00ms">
                                    <input type="text" name="name" placeholder="{{ __('الاسم الكامل') }}">
                                </div><!-- /.form-one__control -->
                                <div class="form-one__control wow fadeInUp" data-wow-duration="1500ms" data-wow-delay="50ms">
                                    <input type="email" name="email" placeholder="{{ __('Your Email') }}">
                                </div><!-- /.form-one__control -->
                                 <div class="form-one__control wow fadeInUp" data-wow-duration="1500ms" data-wow-delay="00ms">
                                    <input type="text" name="name" placeholder="{{ __('رقم الهاتف') }}">
                                </div><!-- /.form-one__control -->
                               <div class="form-one__control wow fadeInUp" data-wow-duration="1500ms" data-wow-delay="00ms">
                                     
                                    <select name="service" class="">

                                        <option value="">{{ __('اختر الخدمة المطلوبة') }}</option>
                                        <option value="قطع خاصة للمطاعم">{{ __('قطع خاصة للمطاعم') }}</option>
                                        <option value="عبوات Bulk / Vacuum large packs">{{ __('عبوات Bulk / Vacuum large packs') }}</option>
                                        <option value="Private Label">{{ __('Private Label') }}</option>
                                    </select>
                                        </div><!-- /.form-one__control -->
                                <div class="form-one__control form-one__control--full wow fadeInUp" data-wow-duration="1500ms" data-wow-delay="150ms">
                                    <button type="submit" class="boskery-btn">
                                        <span class="boskery-btn__hover"></span>
                                        <span class="boskery-btn__hover"></span>
                                        <span class="boskery-btn__hover"></span>
                                        <span class="boskery-btn__hover"></span>
                                        <span class="boskery-btn__hover"></span>
                                        <span class="boskery-btn__hover"></span>
                                        <span class="boskery-btn__text">{{ __('send message') }}</span>
                                        <i class="icon-meat-3"></i>
                                    </button>
                                </div><!-- /.form-one__control -->
                            </div><!-- /.form-one__group -->
                        </form><!-- /.contact-page__form -->
                        <div class="result"></div><!-- /.result -->
                    </div><!-- /.contact-page__content -->
                    <div class="contact-page__image wow fadeInRight" data-wow-duration="1500ms">
                        <img src="{{ site_image('contact_form_image') }}" alt="contact">
                    </div><!-- /.contact-page__image -->
                </div><!-- /.contact-page__wrapper -->
            </div><!-- /.container -->
        </section><!-- /.contact-page section-space-top -->

@stop