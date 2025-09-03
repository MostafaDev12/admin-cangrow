   @extends('layouts.front')

  @section('title')

      {{ __('اتصل بنـــا') }} - {{ $gs->{'title_' . $sign} }}

  @stop

  @section('gsearch')
      <meta property="og:image" content=" {{ $gs->{'logo_' . $sign} }}" />
  @stop


  @section('content')
      @php
          $phones = explode(',', $gs->phones);
          $emails = explode(',', $gs->emails);
          $addresses = json_decode($gs->{'addresses_' . $sign});
          $randomPhone = Arr::random($phones);
      @endphp
  <section class="header-title ">
    <div class="overlay d-flex justify-content-center align-items-center">
      <h1>  {{ __('اتصل بنـــا') }} </h1>
    </div>

  </section>
  <section class="contact-form">
    <div class="container">
      <div class="row">
        <div class="col-12 col-lg-6 col-md-6">
          <div>
            {{-- <iframe
              src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3453.1318316120887!2d31.335668224937944!3d30.061755417751158!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x14583e684ed3305d%3A0xcd985afc51324715!2z2KfZhNio2LfYsdin2YjZitiMINin2YTZhdmG2LfZgtipINin2YTYo9mI2YTZidiMINmF2K_ZitmG2Kkg2YbYtdix2Iwg2YXYrdin2YHYuNipINin2YTZgtin2YfYsdip4oCs!5e0!3m2!1sar!2seg!4v1742731586978!5m2!1sar!2seg"
              width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"
              referrerpolicy="no-referrer-when-downgrade"></iframe> --}}
                {!! $gs->map !!}
          </div>
          <div class="row">
            <div class="col-12 col-lg-6 col-md-6">
              <div class="contact-box d-flex align-items-center justify-content-around">
                <i class="fa-solid fa-envelope"></i>
                <div>
                  <h3> {{ __('البريد الإلكتروني') }}</h3>
                    @foreach ($emails as $email)
                                                          <a href="mailto:{{ $email }}">{{ $email }}</a>
                                                          <br />
                                                      @endforeach
                
                </div>
              </div>
            </div>
            <div class="col-12 col-lg-6 col-md-6">
              <div class="contact-box d-flex align-items-center justify-content-around">
                <i class="fa-solid fa-phone"></i>
                <div>
                  <h3> {{ __('رقم التليفون') }}</h3>
                  @foreach ($phones as $phone)
                                                          <a href="tel:+2{{ $phone }}">{{ $phone }}</a>
                                                          <br />
                                                      @endforeach
                </div>
              </div>
            </div>
            <div class="col-12 col-lg-6 col-md-6">
              <div class="contact-box d-flex align-items-center justify-content-around">
                <i class="fa-solid fa-location-dot"></i>
                <div>
                  <h3> {{ __('العنوان') }}</h3>
                  @foreach ($addresses as $address)
                                                      <p> {{ $address }} </p><br>
                                                  @endforeach
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-12 col-lg-6 col-md-6">
          <div class="p-4 contact-form-box">
             <form action="{{ route('front.contact.submit') }}" name="appointment"
                                                  id="email-form" aria-label="Contact form" data-status="init"
                                                  method="POST" autocomplete="off">
                                                  {{ csrf_field() }}
                                                  <div class="form-group w-100">
                                                      <div class="response w-100"></div>
                                                  </div>

              <h3 class="fw-bold fs-5 mb-4"> {{ __('للشكاوي والمقترحات') }}</h3>
              <div class="row mb-3">
                <div class="col-md-12">
                  <label for="name" class="form-label"> {{ __('الاسم') }}</label>
                  <input type="text" id="name" name="name" class="form-control fname" placeholder="ادخل اسمك">
                </div>
              </div>
              <div class="row mb-3">
                <div class="col-md-6">
                  <label for="mobile" class="form-label"> {{ __('الموبايل') }}</label>
                  <input type="tel" id="mobile" name="phone" class="form-control text-end" placeholder="ادخل رقم الموبايل">
                </div>
                <div class="col-md-6">
                  <label for="email" class="form-label"> {{ __('البريد الالكتروني') }}</label>
                  <input type="email" id="email" name="email" class="form-control" placeholder="إن وجد">
                </div>
              </div>

              <div class="mb-3">
                <label for="details" class="form-label"> {{ __('تفاصيل الشكوي') }}</label>
                <textarea id="details" class="form-control" rows="4" placeholder=" {{ __('تفاصيل') }}"></textarea>
              </div>
              <div class="text-center">
                <button type="submit" class="btn btn-submit w-100 mt-3 px-5">  {{ __('إرسال') }}<i class="fa-solid fa-envelope"></i>
                </button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
 @stop