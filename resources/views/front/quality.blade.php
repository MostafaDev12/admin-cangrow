 
 
    
   @extends('layouts.front')

@section('title')
   
{{ __('الجوده') }} -  {{ $gs->{'title_' . $sign} }}
     
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
     <section class="page-header" >
            <div class="page-header__bg" style="background-image: linear-gradient(to right, #000000, #ffffff);"></div>
            <!-- /.page-header__bg -->
            <div class="container">
                <h2 class="page-header__title">{{ __('الجودة') }} </h2>
               
            </div><!-- /.container -->
        </section><!-- /.page-header -->
       

        <section class="gallery-page section-space" id="certifications">
            <div class="container">
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
                @foreach ($models as $model)
                    
                    <div class="item">
                        <a class="gallery-page__card" href="{{ route('quality_list.index',['lang' => $sign , 'id' => $model->id]) }}">
                            <img src="{{ $model->photo }}" alt="{{ $model->{'title_' . $sign} }}">
                            <div class="gallery-page__card__hover">

                            </div><!-- /.gallery-page__card__hover -->
                        </a><!-- /.gallery-page__card -->
                    </div><!-- /.item -->
                @endforeach
                   
                </div><!-- /.gallery-page__carousel -->
            </div><!-- /.container-fluid -->
        </section><!-- /.gallery-page section-space -->
        <!-- ------------------------------- -->
        <!-- ------------------------------- -->
        <section class="services-page section-space" id="halal-standards">
            <div class="container">
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
              @foreach ($certificates as $certificate) <div class="item wow fadeInUp" data-wow-duration="1500ms"
  data-wow-delay="00ms">
  <div class="service-card">
    <div class="service-card__content">
      <div class="service-card__image"> <img src="{{ $certificate->photo }}"
          alt="{{ $certificate->{'title_' . $sign} }}">
        <div class="service-card__icon"> <span class="icon-butchering"></span> </div><!-- /.service-card__icon -->
      </div><!-- /.services-card__image -->
      <h3 class="service-card__title"><a href="#"> {{ $certificate->{'title_' . $sign} }}</a></h3>
      <!-- /.services-card__title -->
      <p class="service-card__text"> {{ $certificate->{'short_details_' . $sign} }} </p> <!-- /.services-card__text -->
    </div><!-- /.services-card__content --> 
    <button id="openModalBtn" class="service-card__btn">{{ __('service details') }} <span
        class="icon-left"></span></button><!-- /.services-card__btn -->
  </div><!-- /.service-card -->
</div><!-- /.item --> @endforeach
                </div><!-- /.services-page__carousel -->
            </div><!-- /.container -->
        </section><!-- /.services-page section-space -->
 

<script>
            const openBtn = document.getElementById('openModalBtn');
           openBtn.addEventListener('click', () => {
               console.log("sfgdfgdfg")
        });

</script>
        <section class="slide-text">
            <div class="slide-text__bg" style="background-image: url({{ site_image('slide_text_bg') }});">
            </div><!-- /.slide-text__bg -->
            <div class="container-fluid">
                <div class="slide-text__row">
                    <h2 class="slide-text__one">{{ __('الجودة') }}</h2><!-- /.slide-text__one -->
                    <span class="slide-text__icon icon-meat-3"></span><!-- /.slide-text__icon -->
                    <h2 class="slide-text__two">{{ __('السلامة') }}</h2><!-- /.slide-text__two -->
                    <span class="slide-text__icon icon-meat-3"></span><!-- /.slide-text__icon -->
                    <h2 class="slide-text__one">{{ __('النظافة') }}</h2><!-- /.slide-text__one -->
                    <span class="slide-text__icon icon-meat-3"></span><!-- /.slide-text__icon -->
                    <h2 class="slide-text__two">{{ __('التتبع') }}</h2><!-- /.slide-text__two -->
                    <span class="slide-text__icon icon-meat-3"></span><!-- /.slide-text__icon -->
                    <h2 class="slide-text__one">{{ __('الشهادات') }}</h2><!-- /.slide-text__one -->
                    <span class="slide-text__icon icon-meat-3"></span><!-- /.slide-text__icon -->
                    <h2 class="slide-text__two">{{ __('الرقابة') }}</h2><!-- /.slide-text__two -->
                    <span class="slide-text__icon icon-meat-3"></span><!-- /.slide-text__icon -->
                    <h2 class="slide-text__one">{{ __('الجودة') }}</h2><!-- /.slide-text__one -->
                    <span class="slide-text__icon icon-meat-3"></span><!-- /.slide-text__icon -->
                    <h2 class="slide-text__two">{{ __('السلامة') }}</h2><!-- /.slide-text__two -->
                    <span class="slide-text__icon icon-meat-3"></span><!-- /.slide-text__icon -->
                    <h2 class="slide-text__two">{{ __('النظافة') }}</h2><!-- /.slide-text__two -->
                </div><!-- /.slide-text__row -->
            </div><!-- /.container-fluid -->
        </section><!-- /.slide-text -->

        <section class="team-two section-space-two" id="traceability">
            <div class="container">
                <div class="sec-title sec-title--center">
                    <img src="{{ site_image('section_title_shape') }}" alt="معايير الجودة" class="sec-title__img">
                    <h6 class="sec-title__tagline">التزامنا</h6><!-- /.sec-title__tagline -->
                    <h2 class="sec-title__title">معايير الذبح والرقابة الصحية</h2><!-- /.sec-title__title -->
                </div><!-- /.sec-title -->

                <div class="team-two__item-wrapper">
                    @foreach ($points as $point)
                        
                    <div class="team-two__item wow fadeInUp" data-wow-duration="1500ms" data-wow-delay="00ms">
                        <div class="team-two__item__bg"></div>
                        <div class="row gutter-y-20 align-items-center">
                            <div class="col-xl-5 col-lg-6">
                                <h3 class="team-two__name"><a href="#">   {{ $point->{'title_' . $sign} }}  </a></h3>
                            </div>
                            <div class="col-xl-3 col-lg-3">
                                <span class="team-two__designation">   {{ $point->{'short_details_' . $sign} }}  </span>
                            </div>
                            <div class="col-xl-4 col-lg-3">
                                <div class="team-two__image">
                                    <img src="{{ $point->photo }}" alt=" {{ $point->{'title_' . $sign} }}    ">
                                </div>
                            </div>
                        </div>
                    </div>

                    @endforeach
                   
                </div><!-- /.team-two__item-wrapper -->
            </div><!-- /.container -->
            <div class="team-two__shape">
                <img src="{{ site_image('about_shape_2_1') }}" alt="team-shape" class="team-two__shape__image">
            </div><!-- /.team-two__shape -->
        </section>

        <section class="faq-two section-space-two" id="faqs"
            style="background-image: url({{ site_image('quality_faq_bg') }});">
            <div class="container">
                <div class="row gutter-y-50">
                    <div class="col-lg-6 wow fadeInLeft" data-wow-duration="1500ms">
                        <div class="faq-two__content">
                            <div class="sec-title @@extraClassName">

                                <img src="{{ site_image('section_title_shape') }}" alt="أسئلة العملاء"
                                    class="sec-title__img">


                                <h6 class="sec-title__tagline">أسئلة العملاء</h6><!-- /.sec-title__tagline -->

                                <h2 class="sec-title__title">الأسئلة الشائعة <br> حول الجودة</h2>
                                <!-- /.sec-title__title -->
                            </div><!-- /.sec-title -->
                            <div class="faq-two__info">
                                <div class="faq-two__info__inner">
                                    <div class="faq-two__info__icon">
                                        <span class="icon-check"></span>
                                    </div><!-- /.faq-two__info__icon -->
                                    <div class="faq-two__info__content">
                                        <h4 class="faq-two__info__title">{{ __('موثوق وجدير بالثقة') }}</h4>
                                        <!-- /.faq-two__info__title -->
                                        <p class="faq-two__info__text">{{ __('نلتزم بأعلى معايير الجودة والسلامة الغذائية في جميع عملياتنا من الإنتاج حتى التسليم') }}</p>
                                        <!-- /.faq-two__info__text -->
                                    </div><!-- /.faq-two__info__content -->
                                </div><!-- /.faq-two__info__inner -->
                                <div class="faq-two__info__inner">
                                    <div class="faq-two__info__icon">
                                        <span class="icon-check"></span>
                                    </div><!-- /.faq-two__info__icon -->
                                    <div class="faq-two__info__content">
                                        <h4 class="faq-two__info__title">{{ __('مراقبة الجودة 100%') }}</h4>
                                        <!-- /.faq-two__info__title -->
                                        <p class="faq-two__info__text">{{ __('جميع منتجاتنا تخضع لمراقبة جودة صارمة في كل مرحلة من مراحل الإنتاج والمعالجة') }}</p>
                                        <!-- /.faq-two__info__text -->
                                    </div><!-- /.faq-two__info__content -->
                                </div><!-- /.faq-two__info__inner -->
                            </div><!-- /.faq-two__info -->
                            <a href="{{ route('contact.index',$sign) }}" class="boskery-btn">
                                <span class="boskery-btn__hover"></span>
                                <span class="boskery-btn__hover"></span>
                                <span class="boskery-btn__hover"></span>
                                <span class="boskery-btn__hover"></span>
                                <span class="boskery-btn__hover"></span>
                                <span class="boskery-btn__hover"></span>
                                <span class="boskery-btn__text">{{ __('اتصل بنا') }}</span>
                                <i class="icon-meat-3"></i>
                            </a><!-- /.boskery-btn -->
                        </div><!-- /.faq-two__content -->
                    </div><!-- /.col-lg-6 -->
                    <div class="col-lg-6">
                        <div class="faq-two__accordion">
                            <div class="faq-accordion boskery-accordion" data-grp-name="boskery-accordion">
                                @foreach ($faqs as $k=>$faq)
                                    
                                <div class="accordion {{$k == 0 ? 'active' : ''  }}  wow fadeInUp" data-wow-duration="1500ms" data-wow-delay="00ms">
                                    <div class="accordion-title">
                                        <h4>
                                           {{ $faq->{'title_' . $sign} }}
                                            <span class="accordion-title__icon"></span><!-- /.accordion-title__icon -->
                                        </h4>
                                    </div><!-- /.accordion-title -->
                                    <div class="accordion-content">
                                        <div class="inner">
                                            
                                            <p> {{ $faq->{'details_' . $sign} }}   </p>
                                        </div><!-- /.accordion-content -->
                                    </div>
                                </div><!-- /.accordion-item -->
                              
                                @endforeach
                            </div><!-- /.faq-accordion -->
                        </div><!-- /.faq-two__accordion -->
                    </div><!-- /.col-lg-6 -->
                </div><!-- /.row -->
            </div><!-- /.container -->
        </section><!-- /.faq-two section-space-two -->
        @stop