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
  <section class="header-title ">
    <div class="overlay d-flex justify-content-center align-items-center">
      <h1>   {{ $service->{'title_' . $sign} }}  </h1>
    </div>
  </section>
  <section class="content">
    <div class="container">
      <div class="row">
        <div class="col-12 col-lg-12 col-md-12">
          <div class="fw-bold">
            <div class="row">
              <div class="col-lg-12 col-12">
                <img class="mb-4" width="100%" height="350px" src="{{ $service->photo }}" alt="">
              </div>
              
            </div>
            <h2>  {{ $service->{'title_' . $sign} }}     </h2>
            <p> {!! $service->{'details_' . $sign} !!}</p>

            

            <div class="social-connect">
              <div class="container">
                <div class="row px-2">
                  <div class="col-6 col-md-6 col-lg-4 mb-2 mb-lg-0">
                    <a href="https://wa.me/2{{ $randomPhone }}" target="_blank" class="btn-custom btn-responsive-action">
                      <div class="icon-container d-flex pt-3">
                        <i class="fab fa-whatsapp"></i>
                        <p class="color-white-important"> {{ __('WhatsApp') }}</p>

                      </div>
                    </a>
                  </div>

                  <div class="col-6 col-md-6 col-lg-4 mb-2 mb-lg-0">
                    <a href="tel:+2{{ $randomPhone }}" class="btn-custom btn-responsive-action bg-2">
                      <div class="icon-container  d-flex pt-3">
                        <i class="fas fa-phone-alt"></i>
                        <p class="color-white-important"> {{ __('Call Us') }}</p>

                      </div>
                    </a>
                  </div>
                </div>
              </div>


            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  
@stop