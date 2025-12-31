    
   @extends('layouts.front')

@section('title')
   
{{ __('من نحن') }} -  {{ $gs->{'title_' . $sign} }}
     
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
                <h2 class="page-header__title"> من المزرعه الى المائدة</h2>
              
            </div><!-- /.container -->
        </section><!-- /.page-header -->
       
         <section class="delivery-one section-space" id="fattening-farms">
            <div class="container">
                <div class="row gutter-y-60">
                    <div class="col-lg-6 wow fadeInLeft" data-wow-duration="1500ms">
                        <div class="delivery-one__content">
                            <div class="sec-title @@extraClassName">

                                <img src="{{ asset('front/mtc/') }}/assets/images/shapes/sec-title-s-1.png" alt="خدمة التوصيل"
                                    class="sec-title__img">

                                <!-- <h6 class="sec-title__tagline">خدمة التوصيل</h6> -->
                                <!-- /.sec-title__tagline -->

                                <h2 class="sec-title__title">    {!! $ps->{'our_team_title_' . $sign} ?? '' !!}       </h2>
                                <!-- /.sec-title__title -->
                            </div><!-- /.sec-title -->
                            <p class="delivery-one__text">  {!! $ps->{'our_team_details_' . $sign} ?? '' !!}     </p><!-- /.delivery-one__text -->
                            <div class="delivery-one__bottom">
                                <a href="{{ route('contact.index',$sign) }}" class="boskery-btn">
                                    <span class="boskery-btn__hover"></span>
                                    <span class="boskery-btn__hover"></span>
                                    <span class="boskery-btn__hover"></span>
                                    <span class="boskery-btn__hover"></span>
                                    <span class="boskery-btn__hover"></span>
                                    <span class="boskery-btn__hover"></span>
                                    <span class="boskery-btn__text">تواصل معنا</span>
                                    <i class="icon-meat-3"></i>
                                </a><!-- /.boskery-btn -->
                                <div class="contact__info">
                                    <div class="contact__info__inner">
                                        <div class="contact__info__icon">
                                            <span class="icon-telephone"></span>
                                        </div><!-- /.contact__info__icon -->
                                        <div class="contact__info__right">
                                            <h4 class="contact__info__title">اتصل للطلب والتوصيل</h4>
                                            <!-- /.contact__info__title -->
                                            <a href="tel:{{ $randomPhone}}" class="contact__info__number">{{ $randomPhone}}</a>
                                            <!-- /.contact__info__number -->
                                        </div><!-- /.contact__info__right -->
                                    </div><!-- /.contact__info__inner -->
                                </div><!-- /.contact__info -->
                            </div><!-- /.delivery-one__bottom -->
                        </div><!-- /.delivery-one__content -->
                    </div><!-- /.col-lg-6 -->
                    <div class="col-lg-6 wow fadeInRight" data-wow-duration="1500ms">
                        <div class="delivery-one__image">
                            <div class="delivery-one__image__inner-one">
                                <img src="{{ asset('front/mtc/') }}/assets/images/delivery/delivery-1-1.png" alt="خدمة التوصيل"
                                    class="delivery-one__image__one">
                                <div class="delivery-one__image__bg">
                                    <div class="delivery-one__image__bg__inner"
                                        style="background-image: url( {{ asset('front/mtc/') }}/assets/images/shapes/delivery-man-bg-1.png);">
                                    </div>
                                    <!-- /.delivery-one__image__bg__inner -->
                                </div><!-- /.delivery-one__image__bg -->
                                <div class="delivery-one__circle-text">
                                    <div class="delivery-one__circle-text__bg"></div>
                                    <div class="delivery-one__circle-text__plus"></div>
                                    <!-- /.delivery-one__circle-text__plus -->
                                    <div class="delivery-one__curved-circle curved-circle">
                                        <!-- curved-circle start-->
                                        <div class="delivery-one__curved-circle__item curved-circle__item"
                                            data-circle-text-options='{
                 "radius": 87,
                 "forceWidth": true,
                 "forceHeight": true}'>
                                            لحوم طازجة عالية الجودة لحوم طازجة
                                        </div>
                                    </div><!-- curved-circle end-->
                                </div><!-- /.delivery-one__circle-text -->
                            </div><!-- /.delivery-one__image__inner-one -->
                            <div class="delivery-one__image__inner-two">
                                <img src="{{ asset('front/mtc/') }}/assets/images/delivery/delivery-1-2.jpg" alt="خدمة التوصيل"
                                    class="delivery-one__image__two">
                                <div class="delivery-one__image__box"></div><!-- /.delivery-one__image__box -->
                            </div><!-- /.delivery-one__image__inner-two -->
                        </div><!-- /.delivery-one__image -->
                    </div><!-- /.col-lg-6 -->
                </div><!-- /.row -->
            </div><!-- /.container -->
            <div class="delivery-one__shape wow fadeInLeft" data-wow-duration="1500ms">
                <img src="{{ asset('front/mtc/') }}/assets/images/shapes/delivery-shape-1-1.png" alt="delivery-shape">
            </div><!-- /.elivery-one__shape -->
        </section><!-- /.delivery-one section-space -->
        <!--  وعملية التسمين -->
        <section class="about-one section-space-top" id="slaughterhouse">
            <div class="container">
                <div class="row gutter-y-60">
                    <div class="col-lg-6 wow fadeInLeft" data-wow-duration="1500ms">
                        <div class="about-one__image">
                            <div class="about-one__image__inner">
                                <h3 class="about-one__image__text">منذ 1974</h3><!-- /.about-one__image__text -->
                                <img src="{{ asset('front/mtc/') }}/assets/images/about/about-1-1.jpg" alt="مزارع التسمين">
                              
                                <div class="about-one__image__border"></div><!-- /.about-one__image__border -->
                            </div><!-- /.about-one__image__inner -->
                           
                        </div><!-- /.about-one__image -->
                    </div><!-- /.col-lg-6 -->
                    <div class="col-lg-6 wow fadeInRight" data-wow-duration="1500ms">
                        <div class="about-one__content">
                            <div class="sec-title @@extraClassName">

                                <img src="{{ asset('front/mtc/') }}/assets/images/shapes/sec-title-s-1.png" alt="مزارع التسمين"
                                    class="sec-title__img">

                                <!-- <h6 class="sec-title__tagline">مزارع التسمين</h6> -->
                                <!-- /.sec-title__tagline -->

                                <h2 class="sec-title__title">   {!! $ps->{'volunteering_title_' . $sign} ?? '' !!}
</h2>
                                <!-- /.sec-title__title -->
                            </div><!-- /.sec-title -->
                            <p class="about-one__text"> {!! $ps->{'volunteering_details_' . $sign} ?? '' !!} </p>
                            <!-- /.about-one__text -->
                            <div class="about-one__inner">
                                <h5 class="about-one__info-title">إنتاج اللحوم من مزارع رائدة</h5>
                                <!-- /.about-one__info__title -->
                                <ul class="about-one__info">
                                    <li>
                                        <span class="icon-check-mark"></span>
                                        شهادة Global GAP العالمية
                                    </li>
                                    <li>
                                        <span class="icon-check-mark"></span>
                                        تسمين عجول عالي الجودة
                                    </li>
                                    <li>
                                        <span class="icon-check-mark"></span>
                                        إشراف بيطري متخصص
                                    </li>
                                    <li>
                                        <span class="icon-check-mark"></span>
                                        نظم إدارة متكاملة
                                    </li>
                                    <li>
                                        <span class="icon-check-mark"></span>
                                        تتبع دقيق للمنتج
                                    </li>
                                    <li>
                                        <span class="icon-check-mark"></span>
                                        معايير سلامة غذائية صارمة
                                    </li>
                                </ul><!-- /.about-one__info -->
                            </div><!-- /.about-one__inner -->
                            <div class="about-one__bottom">
                                <a href="{{ route('about.index',$sign) }}" class="boskery-btn">
                                    <span class="boskery-btn__hover"></span>
                                    <span class="boskery-btn__hover"></span>
                                    <span class="boskery-btn__hover"></span>
                                    <span class="boskery-btn__hover"></span>
                                    <span class="boskery-btn__hover"></span>
                                    <span class="boskery-btn__hover"></span>
                                    <span class="boskery-btn__text">تعرف علينا أكثر</span>
                                    <i class="icon-meat-3"></i>
                                </a><!-- /.boskery-btn -->
                            </div><!-- /.about-one__bottom -->
                        </div><!-- /.about-one__content -->
                    </div><!-- /.col-lg-6 -->
                </div><!-- /.row -->
            </div><!-- /.container -->
            <div class="about-one__shape">
                <img src="{{ asset('front/mtc/') }}/assets/images/shapes/about-shape-1-2.png" alt="about shape" class="about-one__shape__one">
                <img src="{{ asset('front/mtc/') }}/assets/images/shapes/about-shape-1-3.png" alt="about shape" class="about-one__shape__two">
            </div><!-- /.about-one__shape -->
        </section><!-- /.about-one section-space-top -->

        <!-- المجزر وعملية الذبح -->
        <section class="technologies-one section-space boskery-jarallax" data-jarallax data-spedd="0.3"
            style="background-image: url({{ asset('front/mtc/') }}/assets/images/backgrounds/technologies-bg-1-1.jpg);">
            <div class="technologies-one__bg"
                style="background-image: url({{ asset('front/mtc/') }}/assets/images/shapes/technologies-shape-bg-1-1.png);">
            </div><!-- /.technologies-one__bg -->
            <div class="container">
                <div class="row gutter-y-60">
                    <div class="col-xl-5 col-lg-6">
                        <div class="technologies-one__image">
                            <div class="technologies-one__image__inner">
      @foreach ($models as $k=>$item)
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

                                <h2 class="sec-title__title">       نظام متكامل للذبح
والفحص البيطري
 </h2>
                                <!-- /.sec-title__title -->
                            </div><!-- /.sec-title -->
                            <div class="technologies-one__main-tab-box tabs-box wow fadeInUp"
                                data-wow-duration="1500ms">
                                <ul class="tab-buttons">
                                    @foreach ($models as $k=>$item)
                                        
                                    <li data-tab="#item-{{  $item->id }}" class="tab-btn {{ $k == 0 ? 'active-btn' : '' }}"> {!! $item->{'title_' . $sign} ?? '' !!}  
                                    
                                    </li>
                                    @endforeach
                                   
                                </ul><!-- /.tab-buttons -->
                                <div class="tabs-content">
                                       @foreach ($models as $k=>$item)
                                    <div class="tab {{ $k == 0 ? 'active-tab' : '' }} fadeInUp animated" data-wow-delay="200ms"
                                        id="item-{{  $item->id }}" style="{{ $k == 0 ? 'display: block;' : '' }}">
                                        <p > {!! $item->{'short_details_' . $sign} ?? '' !!} </p>
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
                                <span class="boskery-btn__text">تواصل معنا</span>
                                <i class="icon-meat-3"></i>
                            </a><!-- /.boskery-btn -->
                        </div><!-- /.technologies-one__content -->
                    </div><!-- /.col-xl-7 col-lg-6 -->
                </div><!-- /.row -->
            </div><!-- /.container -->
        </section><!-- /.technologies-one section-space -->

        <!-- التصنيع والتعبئة والتغليف -->
        <section class="about-three section-space" id="processing-packaging">
            <div class="container">
                <div class="row gutter-y-60">
                    <div class="col-lg-6 wow fadeInLeft" data-wow-duration="1500ms">
                        <div class="about-three__image">
                            <img src="{{ $ps->packing_photo1 }}" alt="التصنيع والتغليف"
                                class="about-three__image__one">
                            <div class="about-three__image__inner">
                                <img src="{{ $ps->packing_photo2 }}" alt="منتجات اللحوم"
                                    class="about-three__image__two">
                            </div><!-- /.about-three__image__inner -->
                            <div class="about-three__experience">
                                <div class="about-three__experience__bg"
                                    style="background-image: url({{ asset('front/mtc/') }}/assets/images/shapes/about-shape-3-1.png);"></div>
                                <!-- /.about-three__experience__bg -->
                                <div class="about-three__experience__content">
                                    <div class="about-three__experience__text">
                                        <h4 class="about-three__experience__title">تكنولوجيا <br>
                                            متطورة</h4><!-- /.about-three__experience__title -->
                                    </div><!-- /.about-three__experience__text -->
                                    <h4 class="about-three__experience__year">أوروبية</h4>
                                    <!-- /.about-three__experience__year -->
                                </div><!-- /.about-three__experience__content -->
                            </div><!-- /.about-three__experience -->
                        </div><!-- /.about-three__image -->
                    </div><!-- /.col-lg-6 -->
                    <div class="col-lg-6 wow fadeInRight" data-wow-duration="1500ms">
                        <div class="about-three__content">
                            <div class="sec-title @@extraClassName">

                                <img src="{{ asset('front/mtc/') }}/assets/images/shapes/sec-title-s-1.png" alt="التصنيع والتغليف"
                                    class="sec-title__img">

                                <!-- <h6 class="sec-title__tagline">التصنيع والتعبئة والتغليف</h6> -->
                                <!-- /.sec-title__tagline -->

                                <h2 class="sec-title__title">   {!! $ps->{'packing_title_' . $sign} ?? '' !!}    </h2>
                                <!-- /.sec-title__title -->
                            </div><!-- /.sec-title -->
                            <p class="about-three__text" > {!! $ps->{'packing_details_' . $sign} ?? '' !!} </p><!-- /.about-three__text -->
                            <div class="about-three__info">
                                <div class="about-three__info__inner">
                                    <div class="about-three__info__icon">
                                        <span class="icon-packaging"></span>
                                    </div><!-- /.about-three__info__icon -->
                                    <div class="about-three__info__content">
                                        <h4 class="about-three__info__title">تغليف مفرغ من الهواء</h4>
                                        <!-- /.about-three__info__title -->
                                    </div><!-- /.about-three__info__content -->
                                </div><!-- /.about-three__info__inner -->
                                <div class="about-three__info__inner">
                                    <div class="about-three__info__icon">
                                        <span class="icon-cutting"></span>
                                    </div><!-- /.about-three__info__icon -->
                                    <div class="about-three__info__content">
                                        <h4 class="about-three__info__title">تقطيع حسب الطلب</h4>
                                        <!-- /.about-three__info__title -->
                                    </div><!-- /.about-three__info__content -->
                                </div><!-- /.about-three__info__inner -->
                            </div><!-- /.about-three__info -->
                            {{-- <div class="progress-box">
                                <h4 class="progress-box__title">جودة التغليف</h4>
                                <div class="progress-box__bar">
                                    <div class="progress-box__bar__inner count-bar" data-percent="98%">
                                        <div class="progress-box__number count-text">98%</div>
                                    </div>
                                </div><!-- /.progress-box__inner -->
                            </div><!-- /.progress-box --> --}}
                            <div class="about-three__bottom">
                                <a href="{{ route('products.index',$sign) }}" class="boskery-btn">
                                    <span class="boskery-btn__hover"></span>
                                    <span class="boskery-btn__hover"></span>
                                    <span class="boskery-btn__hover"></span>
                                    <span class="boskery-btn__hover"></span>
                                    <span class="boskery-btn__hover"></span>
                                    <span class="boskery-btn__hover"></span>
                                    <span class="boskery-btn__text">تعرف على خدماتنا</span>
                                    <i class="icon-meat-3"></i>
                                </a><!-- /.boskery-btn -->
                            </div><!-- /.about-three__bottom -->
                        </div><!-- /.about-three__content -->
                    </div><!-- /.col-lg-6 -->
                </div><!-- /.row -->
            </div><!-- /.container -->
            <div class="about-three__shape">
                <img src="{{ asset('front/mtc/') }}/assets/images/shapes/about-shape-2-2.png" alt="about shape" class="about-three__shape-one">
                <div class="about-three__shape__image wow fadeInLeft" data-wow-duration="1500ms">
                    <img src="{{ asset('front/mtc/') }}/assets/images/shapes/about-shape-2-1.png" alt="about shape">
                </div><!-- /.about-three__shape__image -->
            </div><!-- /.about-three__shape -->
        </section><!-- /.about-three section-space -->

        <!-- سلسلة التبريد والنقل -->
        <section class="why-choose-two" id="cold-chain">
            <div class="container-fluid">
                <div class="row">
                    @foreach ($colings as $k=>$coling)
                    <div class="col-xl-6">
                        <div class="why-choose-card why-choose-card--{{ ($k % 4) + 1 }}">
                            @if (($k % 4) < 2)
                                <!-- Image first (card-1, card-3 pattern) -->
                                <div class="why-choose-card__image">
                                    <img src="{{ $coling->photo }}" alt="{{ $coling->{'title_' . $sign} }}">
                                    <div class="why-choose-card__image__content  ">
                                        <div class="why-choose-card__image__title">
                                            <img src="{{ asset('front/mtc/') }}/assets/images/shapes/sec-title-s-1.png" alt="{{ $coling->{'title_' . $sign} }}"
                                                class="why-choose-card__image__icon">
                                            <h6 class="why-choose-card__image__title__tagline">{{ $coling->{'title_' . $sign} }}</h6>
                                            {{-- <h2 class="why-choose-card__image__title__title">{{ $coling->{'subtitle_' . $sign} ?? '' }}</h2> --}}
                                        </div><!-- /.why-choose-card__image__title -->
                                        <a href="{{ route('contact.index',$sign) }}" class="boskery-btn">
                                            <span class="boskery-btn__hover"></span>
                                            <span class="boskery-btn__hover"></span>
                                            <span class="boskery-btn__hover"></span>
                                            <span class="boskery-btn__hover"></span>
                                            <span class="boskery-btn__hover"></span>
                                            <span class="boskery-btn__hover"></span>
                                            <span class="boskery-btn__text">المزيد</span>
                                            <i class="icon-meat-3"></i>
                                        </a><!-- /.boskery-btn -->
                                    </div><!-- /.why-choose-card__image__content -->
                                </div><!-- /.why-choose-card__image -->
                                <div class="why-choose-card__content">
                                    <div class="why-choose-card__content__bg"
                                        style="background-image: url({{ asset('front/mtc/') }}/assets/images/shapes/why-choose-card-bg-2-1.png);">
                                    </div><!-- /.why-choose-card__content__bg -->
                                    <div class="why-choose-card__content__inner">
                                        <span class="why-choose-card__content__icon {{ $coling->icon ?? '' }}"></span>
                                        <h4 class="why-choose-card__content__title">{{ $coling->{'title_' . $sign} ?? $coling->title }}</h4>
                                        <!-- /.why-choose-card__content__title -->
                                        <p class="why-choose-card__content__text">{!! $coling->{'details_' . $sign} ?? $coling->details !!}</p>
                                        <!-- /.why-choose-card__content__text -->
                                    </div><!-- /.why-choose-card__content__inner -->
                                </div><!-- /.why-choose-card__content -->
                            @else
                                <!-- Content first (card-2, card-4 pattern) -->
                                <div class="why-choose-card__content">
                                    <div class="why-choose-card__content__bg"
                                        style="background-image: url({{ asset('front/mtc/') }}/assets/images/shapes/why-choose-card-bg-2-1.png);">
                                    </div><!-- /.why-choose-card__content__bg -->
                                    <div class="why-choose-card__content__inner">
                                        <span class="why-choose-card__content__icon {{ $coling->icon ?? '' }}"></span>
                                        <h4 class="why-choose-card__content__title">{{ $coling->{'title_' . $sign} ?? $coling->title }}</h4>
                                        <!-- /.why-choose-card__content__title -->
                                        <p class="why-choose-card__content__text">{!! $coling->{'details_' . $sign} ?? $coling->details !!}</p>
                                        <!-- /.why-choose-card__content__text -->
                                    </div><!-- /.why-choose-card__content__inner -->
                                </div><!-- /.why-choose-card__content -->
                                <div class="why-choose-card__image">
                                    <img src="{{ $coling->photo }}" alt="{{ $coling->{'title_' . $sign} ?? $coling->title }}">
                                    <div class="why-choose-card__image__content  ">
                                        <div class="why-choose-card__image__title">
                                            <img src="{{ asset('front/mtc/') }}/assets/images/shapes/sec-title-s-1.png" alt="{{ $coling->{'title_' . $sign} ?? $coling->title }}"
                                                class="why-choose-card__image__icon">
                                            <h6 class="why-choose-card__image__title__tagline">{{ $coling->{'title_' . $sign} ?? $coling->title }}</h6>
                                            <h2 class="why-choose-card__image__title__title">{{ $coling->{'subtitle_' . $sign} ?? '' }}</h2>
                                        </div><!-- /.why-choose-card__image__title -->
                                        <a href="{{ route('contact.index',$sign) }}" class="boskery-btn">
                                            <span class="boskery-btn__hover"></span>
                                            <span class="boskery-btn__hover"></span>
                                            <span class="boskery-btn__hover"></span>
                                            <span class="boskery-btn__hover"></span>
                                            <span class="boskery-btn__hover"></span>
                                            <span class="boskery-btn__hover"></span>
                                            <span class="boskery-btn__text">المزيد</span>
                                            <i class="icon-meat-3"></i>
                                        </a><!-- /.boskery-btn -->
                                    </div><!-- /.why-choose-card__image__content -->
                                </div><!-- /.why-choose-card__image -->
                            @endif
                        </div><!-- /.why-choose-card -->
                    </div><!-- /.col-xl-6 -->
                    @endforeach
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </section><!-- /.why-choose-two -->

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