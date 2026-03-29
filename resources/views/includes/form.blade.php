 @php
$phones =  explode(',', $gs->phones);
$emails =   explode(',', $gs->emails);
$addresses =  json_decode($gs->{'addresses_' . $sign});
$randomPhone = Arr::random($phones);
$email = Arr::random($emails);
@endphp
 
      
        <section class="contact-page section-space-top">
            <div class="container">
                <div class="contact-page__wrapper">
                    <div class="contact-page__content">
                        <div class="contact-page__sec-title">
                            <h2 class="contact-page__title">  {{ __('تواصل معنا') }}</h2><!-- /.contact-page__title -->
                            <p class="contact-page__text"> {{ __('يسعدنا تواصلكم معنا للاستفسار عن منتجاتنا وخدماتنا. فريقنا المتخصص جاهز للإجابة على جميع استفساراتكم.') }}</p>
                            <!-- /.contact-page__text -->
                        </div><!-- /.contact-page__sec-title -->
                     
               <form enctype="multipart/form-data" action="{{route('front.contact.submit')}}" 
                    name="appointment" id="email-form" method="POST" autocomplete="off" class="contact-page__form contact-form-validated form-one">
                            {{csrf_field()}}
                            <div class="form-group w-100">
                              <div class="response w-100"></div>
                            </div>

                            <input type="hidden" name="type" value="contact-us">
                            
                            <div class="form-one__group">
                                <div class="form-one__control wow fadeInUp" data-wow-duration="1500ms"
                                    data-wow-delay="00ms">
                                    <input type="text" name="name" required placeholder=" {{ __('الاسم بالكامل') }}">
                                </div><!-- /.form-one__control -->
                                <div class="form-one__control wow fadeInUp" data-wow-duration="1500ms"
                                    data-wow-delay="50ms">
                                    <input type="email" name="email" placeholder="{{ __('البريد الإلكتروني') }}">
                                </div><!-- /.form-one__control -->
                                <div class="form-one__control form-one__control--full wow fadeInUp"
                                    data-wow-duration="1500ms" data-wow-delay="100ms">
                                    <textarea name="message" required placeholder="{{ __('اكتب رسالتك هنا') }}"></textarea>
                                </div><!-- /.form-one__control -->
                                <div class="form-one__control form-one__control--full wow fadeInUp"
                                    data-wow-duration="1500ms" data-wow-delay="150ms">
                                    <button type="submit" class="boskery-btn">
                                        <span class="boskery-btn__hover"></span>
                                        <span class="boskery-btn__hover"></span>
                                        <span class="boskery-btn__hover"></span>
                                        <span class="boskery-btn__hover"></span>
                                        <span class="boskery-btn__hover"></span>
                                        <span class="boskery-btn__hover"></span>
                                        <span class="boskery-btn__text">{{ __('إرسال الرسالة') }}</span>
                                        <i class="icon-meat-3"></i>
                                    </button>
                                </div><!-- /.form-one__control -->
                            </div><!-- /.form-one__group -->
                        </form><!-- /.contact-page__form -->
                        <div class="result"></div><!-- /.result -->
                    </div><!-- /.contact-page__content -->
                    <div class="contact-page__image wow fadeInRight" data-wow-duration="1500ms">
                        <img src="{{ site_image('contact_form_image') }}" alt="تواصل معنا">
                    </div><!-- /.contact-page__image -->
                </div><!-- /.contact-page__wrapper -->
            </div><!-- /.container -->
        </section><!-- /.contact-page section-space-top -->
