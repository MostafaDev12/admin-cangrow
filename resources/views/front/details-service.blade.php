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
     <div class="content">
         <div class="container">
             <h1 class="text-center mb-2 fw-bold "> {{ $service->{'title_' . $sign} }} </h1>
             <div class="row">
                 <div class="col-12 col-lg-12 col-md-12">
                     <div class="fw-bold">
                         <div class="row">
                             @foreach ($service->galleries as $gallery)
                                 <div class="col-lg-4 col-6">
                                     <img class="mb-4" width="100%" height="350px" src="{{ $gallery->photo_url }}"
                                         alt="">
                                 </div>
                             @endforeach



                         </div>

                         <p>
                             {!! $service->{'details_' . $sign} !!}
                         </p>
                         <div class="social-connect mb-3">
                             <div class="container">
                                 <div class="row px-2">
                                     <div class="col-6 col-md-6 col-lg-4 mb-2 mb-lg-0">
                                         <a href="https://wa.me/+2{{ $randomPhone }}" target="_blank"
                                             class="btn-custom btn-responsive-action">
                                             <div class="icon-container d-flex pt-3">
                                                 <i class="fab fa-whatsapp"></i>
                                                 <p class="color-white-important"> {{ __('WhatsApp') }}</p>

                                             </div>
                                         </a>
                                     </div>

                                     <div class="col-6 col-md-6 col-lg-4 mb-2 mb-lg-0">
                                         <a href="tel:+2c" class="btn-custom btn-responsive-action bg-2">
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
     </div>
     <div class="service mt-5 pt-2">
         <div class="container">
             <div class="row">
                 <div class="col-12 text-center">
                     <h3> {{ __('خدمات اخرى') }}</h3>
                 </div>
             </div>
             <div class="row">


                 @foreach (App\Models\Service::where('id', '!=', $service->id)->limit(6)->get() as $k => $serv)
                     @php
                         $k++;
                     @endphp
                     <div class="col-12 col-lg-4 col-md-6">
                         <div class="service-box">
                             <img src="{{ $serv->photo }}" alt="Service Image">
                             <div class="service-box-content">
                                 <h3> {{ $serv->{'title_' . $sign} }}    </h3>
                                 <p>  {{ $serv->{'short_details_' . $sign} }}</p>
                                 <a href="{{ route('single-service.index',['slug' => $serv->{'slug_' . $sign} ]) }}">{{ __('المزيد') }}</a>
                             </div>
                         </div>
                     </div>
                 @endforeach



             </div>
         </div>
     </div>




     @include('includes.book')


 @stop
