   
 
    
   @extends('layouts.front')

@section('title')
   
{{ __('تواصل معانا') }} -  {{ $gs->{'title_' . $sign} }}
     
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
                <h2 class="page-header__title"> تواصل معانا</h2>
               
            </div><!-- /.container -->
        </section><!-- /.page-header -->
       

    @include('includes.form')

        <section class="contact-info section-space-bottom">
            <div class="contact-info__bg boskery-jarallax" data-jarallax data-speed="0.3"
                style="background-image: url(assets/images/backgrounds/contact-bg.jpg);"></div>
            <!-- /.contact-info__bg -->
            <div class="container">
                <div class="row gutter-y-30">
                    <div class="col-lg-6 wow fadeInUp" data-wow-duration="1500ms" data-wow-delay="00ms">
                        <div class="contact-info__contact">
                            <div class="contact-info__contact__bg"
                                style="background-image: url(assets/images/shapes/contact-bg-1-1.png);"></div>
                            <!-- /.contact-info__contact__bg -->
                            <div class="contact-info__contact__content">
                                <div class="contact-info__top">
                                    <h4 class="contact-info__title">نرحب بكم دائماً للتواصل معنا</h4>
                                    <!-- /.contact-info__title -->
                                    <p class="contact-info__text">فريقنا الودود جاهز لمساعدتكم في أي استفسارات أو
                                        استشارات تحتاجونها.</p><!-- /.contact-info__text -->
                                </div><!-- /.contact-info__top -->
                                <div class="contact-info__contact-list">
                                    <div class="contact-info__contact-list__item">
                                        <span
                                            class="contact-info__contact-list__icon icon-phone-call"></span><!-- /.contact-info__contact-list__icon -->
                                        <div class="contact-info__contact-list__content">
                                            <span class="contact-info__contact-list__title">اتصل
                                                بنا</span><!-- /.contact-info__contact-list__title -->
                                            <a href="tel:+(+2) 01555554562"
                                                class="contact-info__contact-list__link">01555554562
                                                (+2)</a><!-- /.contact-info__contact-list__link -->
                                        </div><!-- /.contact-info__contact-list__content -->
                                    </div><!-- /.contact-info__contact-list__item -->
                                    <div class="contact-info__contact-list__item">
                                        <span
                                            class="contact-info__contact-list__icon icon-paper-plane"></span><!-- /.contact-info__contact-list__icon -->
                                        <div class="contact-info__contact-list__content">
                                            <span class="contact-info__contact-list__title">البريد
                                                الإلكتروني</span><!-- /.contact-info__contact-list__title -->
                                            <a href="mailto:sherif.zaki@shatat-group.com"
                                                class="contact-info__contact-list__link">sherif.zaki@shatat-group.com</a><!-- /.contact-info__contact-list__link -->
                                        </div><!-- /.contact-info__contact-list__content -->
                                    </div><!-- /.contact-info__contact-list__item -->
                                    <div class="contact-info__contact-list__item">
                                        <span
                                            class="contact-info__contact-list__icon icon-maps-and-flags"></span><!-- /.contact-info__contact-list__icon -->
                                        <div class="contact-info__contact-list__content">
                                            <span class="contact-info__contact-list__title">المقر
                                                الرئيسي</span><!-- /.contact-info__contact-list__title -->
                                            <a href="https://maps.app.goo.gl/BGEEPPnogKLavEVV8"
                                                class="contact-info__contact-list__link">13 شارع مصطفى رفعت، بلوك 1138،
                                                شيراتون هليوبوليس،
                                                القاهرة</a><!-- /.contact-info__contact-list__link -->
                                        </div><!-- /.contact-info__contact-list__content -->
                                    </div><!-- /.contact-info__contact-list__item -->
                                    <div class="contact-info__contact-list__item">
                                        <span
                                            class="contact-info__contact-list__icon icon-maps-and-flags"></span><!-- /.contact-info__contact-list__icon -->
                                        <div class="contact-info__contact-list__content">
                                            <span class="contact-info__contact-list__title">موقع
                                                المجمع</span><!-- /.contact-info__contact-list__title -->
                                            <a href="#" class="contact-info__contact-list__link">مدينة بني سويف - مجمع
                                                تكنولوجيا اللحوم (MTC)</a><!-- /.contact-info__contact-list__link -->
                                        </div><!-- /.contact-info__contact-list__content -->
                                    </div><!-- /.contact-info__contact-list__item -->
                                </div><!-- /.contact-info__contact-list -->
                            </div><!-- /.contact-info__contact__content -->
                        </div><!-- /.contact-info__contact -->
                    </div><!-- /.col-lg-6 -->
                    <div class="col-lg-6 wow fadeInUp" data-wow-duration="1500ms" data-wow-delay="200ms">
                        <div class="contact-info__business-hours">
                            <div class="contact-info__business-hours__bg"
                                style="background-image: url(assets/images/shapes/contact-bg-1-2.png);"></div>
                            <!-- /.contact-info__business-hours__bg -->
                            <div class="contact-info__business-hours__content">
                                <div class="contact-info__top contact-info__top--business-hours">
                                    <h4 class="contact-info__title contact-info__title--business-hours">ساعات العمل</h4>
                                    <!-- /.contact-info__title -->
                                    <p class="contact-info__text contact-info__text--business-hours">فريقنا جاهز لخدمتكم
                                        خلال ساعات العمل الرسمية</p>
                                    <!-- /.contact-info__text -->
                                </div><!-- /.contact-info__top -->
                                <div class="table-responsive">
                                    <table class="table contact-info__business-hours__table">
                                        <tbody>
                                            <tr>
                                                <td class="table__left-data"><i class="icon-check"></i>الإثنين</td>
                                                <td class="table__border">
                                                    <div class="table__border__line"></div><!-- /.table__border -->
                                                </td>
                                                <td class="table__right-data">10:00 ص - 07:00 م</td>
                                            </tr>
                                            <tr>
                                                <td class="table__left-data"><i class="icon-check"></i>الثلاثاء</td>
                                                <td class="table__border">
                                                    <div class="table__border__line"></div><!-- /.table__border -->
                                                </td>
                                                <td class="table__right-data">10:00 ص - 07:00 م</td>
                                            </tr>
                                            <tr>
                                                <td class="table__left-data"><i class="icon-check"></i>الأربعاء</td>
                                                <td class="table__border">
                                                    <div class="table__border__line"></div><!-- /.table__border -->
                                                </td>
                                                <td class="table__right-data">10:00 ص - 07:00 م</td>
                                            </tr>
                                            <tr>
                                                <td class="table__left-data"><i class="icon-check"></i>الخميس</td>
                                                <td class="table__border">
                                                    <div class="table__border__line"></div><!-- /.table__border -->
                                                </td>
                                                <td class="table__right-data">10:00 ص - 07:00 م</td>
                                            </tr>
                                            <tr>
                                                <td class="table__left-data"><i class="icon-check"></i>الجمعة</td>
                                                <td class="table__border">
                                                    <div class="table__border__line"></div><!-- /.table__border -->
                                                </td>
                                                <td class="table__right-data">10:00 ص - 07:00 م</td>
                                            </tr>
                                            <tr>
                                                <td class="table__left-data"><i class="icon-check"></i>السبت</td>
                                                <td class="table__border">
                                                    <div class="table__border__line"></div><!-- /.table__border -->
                                                </td>
                                                <td class="table__right-data">مغلق</td>
                                            </tr>
                                        </tbody>
                                    </table><!-- /.table -->
                                </div><!-- /.table-responsive -->
                            </div><!-- /.contact-info__business-hours__content -->
                        </div><!-- /.contact-info__business-hours -->
                    </div><!-- /.col-lg-6 -->
                </div><!-- /.row -->
                <div class="row gutter-y-30 mt-20">
                    <div class="col-lg-6 wow fadeInUp" data-wow-duration="1500ms" data-wow-delay="00ms">
                        <div class="contact-info__contact">
                            <div class="contact-info__contact__bg"
                                style="background-image: url(assets/images/shapes/contact-bg-1-1.png);"></div>
                            <!-- /.contact-info__contact__bg -->
                            <div class="contact-info__contact__content">
                                <div class="contact-info__top">
                                    <h4 class="contact-info__title">نرحب بكم دائماً للتواصل معنا</h4>
                                    <!-- /.contact-info__title -->
                                    <p class="contact-info__text">فريقنا الودود جاهز لمساعدتكم في أي استفسارات أو
                                        استشارات تحتاجونها.</p><!-- /.contact-info__text -->
                                </div><!-- /.contact-info__top -->
                                <div class="contact-info__contact-list">
                                    <div class="contact-info__contact-list__item">
                                        <span
                                            class="contact-info__contact-list__icon icon-phone-call"></span><!-- /.contact-info__contact-list__icon -->
                                        <div class="contact-info__contact-list__content">
                                            <span class="contact-info__contact-list__title">اتصل
                                                بنا</span><!-- /.contact-info__contact-list__title -->
                                            <a href="tel:+(+2) 01555554562"
                                                class="contact-info__contact-list__link">01555554562
                                                (+2)</a><!-- /.contact-info__contact-list__link -->
                                        </div><!-- /.contact-info__contact-list__content -->
                                    </div><!-- /.contact-info__contact-list__item -->
                                    <div class="contact-info__contact-list__item">
                                        <span
                                            class="contact-info__contact-list__icon icon-paper-plane"></span><!-- /.contact-info__contact-list__icon -->
                                        <div class="contact-info__contact-list__content">
                                            <span class="contact-info__contact-list__title">البريد
                                                الإلكتروني</span><!-- /.contact-info__contact-list__title -->
                                            <a href="mailto:sherif.zaki@shatat-group.com"
                                                class="contact-info__contact-list__link">sherif.zaki@shatat-group.com</a><!-- /.contact-info__contact-list__link -->
                                        </div><!-- /.contact-info__contact-list__content -->
                                    </div><!-- /.contact-info__contact-list__item -->
                                    <div class="contact-info__contact-list__item">
                                        <span
                                            class="contact-info__contact-list__icon icon-maps-and-flags"></span><!-- /.contact-info__contact-list__icon -->
                                        <div class="contact-info__contact-list__content">
                                            <span class="contact-info__contact-list__title">المقر
                                                الرئيسي</span><!-- /.contact-info__contact-list__title -->
                                            <a href="https://maps.app.goo.gl/BGEEPPnogKLavEVV8"
                                                class="contact-info__contact-list__link">13 شارع مصطفى رفعت، بلوك 1138،
                                                شيراتون هليوبوليس،
                                                القاهرة</a><!-- /.contact-info__contact-list__link -->
                                        </div><!-- /.contact-info__contact-list__content -->
                                    </div><!-- /.contact-info__contact-list__item -->
                                    <div class="contact-info__contact-list__item">
                                        <span
                                            class="contact-info__contact-list__icon icon-maps-and-flags"></span><!-- /.contact-info__contact-list__icon -->
                                        <div class="contact-info__contact-list__content">
                                            <span class="contact-info__contact-list__title">موقع
                                                المجمع</span><!-- /.contact-info__contact-list__title -->
                                            <a href="#" class="contact-info__contact-list__link">مدينة بني سويف - مجمع
                                                تكنولوجيا اللحوم (MTC)</a><!-- /.contact-info__contact-list__link -->
                                        </div><!-- /.contact-info__contact-list__content -->
                                    </div><!-- /.contact-info__contact-list__item -->
                                </div><!-- /.contact-info__contact-list -->
                            </div><!-- /.contact-info__contact__content -->
                        </div><!-- /.contact-info__contact -->
                    </div><!-- /.col-lg-6 -->
                    <div class="col-lg-6 wow fadeInUp" data-wow-duration="1500ms" data-wow-delay="200ms">
                        <div class="contact-info__business-hours">
                            <div class="contact-info__business-hours__bg"
                                style="background-image: url(assets/images/shapes/contact-bg-1-2.png);"></div>
                            <!-- /.contact-info__business-hours__bg -->
                            <div class="contact-info__business-hours__content">
                                <div class="contact-info__top contact-info__top--business-hours">
                                    <h4 class="contact-info__title contact-info__title--business-hours">ساعات العمل</h4>
                                    <!-- /.contact-info__title -->
                                    <p class="contact-info__text contact-info__text--business-hours">فريقنا جاهز لخدمتكم
                                        خلال ساعات العمل الرسمية</p>
                                    <!-- /.contact-info__text -->
                                </div><!-- /.contact-info__top -->
                                <div class="table-responsive">
                                    <table class="table contact-info__business-hours__table">
                                        <tbody>
                                            <tr>
                                                <td class="table__left-data"><i class="icon-check"></i>الإثنين</td>
                                                <td class="table__border">
                                                    <div class="table__border__line"></div><!-- /.table__border -->
                                                </td>
                                                <td class="table__right-data">10:00 ص - 07:00 م</td>
                                            </tr>
                                            <tr>
                                                <td class="table__left-data"><i class="icon-check"></i>الثلاثاء</td>
                                                <td class="table__border">
                                                    <div class="table__border__line"></div><!-- /.table__border -->
                                                </td>
                                                <td class="table__right-data">10:00 ص - 07:00 م</td>
                                            </tr>
                                            <tr>
                                                <td class="table__left-data"><i class="icon-check"></i>الأربعاء</td>
                                                <td class="table__border">
                                                    <div class="table__border__line"></div><!-- /.table__border -->
                                                </td>
                                                <td class="table__right-data">10:00 ص - 07:00 م</td>
                                            </tr>
                                            <tr>
                                                <td class="table__left-data"><i class="icon-check"></i>الخميس</td>
                                                <td class="table__border">
                                                    <div class="table__border__line"></div><!-- /.table__border -->
                                                </td>
                                                <td class="table__right-data">10:00 ص - 07:00 م</td>
                                            </tr>
                                            <tr>
                                                <td class="table__left-data"><i class="icon-check"></i>الجمعة</td>
                                                <td class="table__border">
                                                    <div class="table__border__line"></div><!-- /.table__border -->
                                                </td>
                                                <td class="table__right-data">10:00 ص - 07:00 م</td>
                                            </tr>
                                            <tr>
                                                <td class="table__left-data"><i class="icon-check"></i>السبت</td>
                                                <td class="table__border">
                                                    <div class="table__border__line"></div><!-- /.table__border -->
                                                </td>
                                                <td class="table__right-data">مغلق</td>
                                            </tr>
                                        </tbody>
                                    </table><!-- /.table -->
                                </div><!-- /.table-responsive -->
                            </div><!-- /.contact-info__business-hours__content -->
                        </div><!-- /.contact-info__business-hours -->
                    </div><!-- /.col-lg-6 -->
                </div><!-- /.row -->
            </div><!-- /.container -->
        </section><!-- /.contact-info section-space-bottom -->

        
        <section class="contact-map">
            <div class="container-fluid">
                    <div class="row align-items-center justify-content-between">
                        <div class="google-map google-map__contact col-md">
                            <iframe   me title="خريطة المقر الرئيسي"
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3452.396036912234!2d31.367215315117!3d30.101623581860!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x1458161c0e7b5d7f%3A0x5b5a5e5a5a5a5a5a!2s13%20Mostafa%20Refaat%20St%2C%20Sheraton%20Heliopolis%2C%20Cairo!5e0!3m2!1sen!2seg!4v1234567890123!5m2!1sen!2seg"
                                class="map__contact" allowfullscreen></iframe>
                        </div>
                        <div class="google-map google-map__contact col-md">
                            <iframe title="خريطة المقر الرئيسي"
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3452.396036912234!2d31.367215315117!3d30.101623581860!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x1458161c0e7b5d7f%3A0x5b5a5e5a5a5a5a5a!2s13%20Mostafa%20Refaat%20St%2C%20Sheraton%20Heliopolis%2C%20Cairo!5e0!3m2!1sen!2seg!4v1234567890123!5m2!1sen!2seg"
                                class="map__contact" allowfullscreen></iframe>
                        </div>
                        <div class="google-map google-map__contact col-md">
                            <iframe title="خريطة المقر الرئيسي"
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3452.396036912234!2d31.367215315117!3d30.101623581860!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x1458161c0e7b5d7f%3A0x5b5a5e5a5a5a5a5a!2s13%20Mostafa%20Refaat%20St%2C%20Sheraton%20Heliopolis%2C%20Cairo!5e0!3m2!1sen!2seg!4v1234567890123!5m2!1sen!2seg"
                                class="map__contact" allowfullscreen></iframe>
                        </div>
                    </div>
                <!-- /.google-map -->
            </div><!-- /.container-fluid -->
        </section><!-- /.contact-map -->
    @stop