@extends('layouts.front')

@section('title')
   
{{ $service->{'title_' . $sign} }}   -  {{ $gs->{'title_' . $sign} }}
     
@stop

@section('gsearch')
    <meta property="og:image" content="{{ $service->photo_url }}" />
@stop


@section('content')

    <div class="details mt-5 pt-5">
        <div class="container pt-5">
            <div class="title_lines">
                <h1>
                    {{ $service->{'title_' . $sign} }}
                </h1>
            </div>
            <div class="row">
                <div class="col-12 col-lg-6 col-md-6 mb-5">
                    <div class="pt-5 wow animate__animated animate__fadeInRight" data-wow-delay="1s" data-wow-duration="1s">
                        {{-- <h2>RGS Company</h2> --}}
                        <p>  {!! $service->{'details_' . $sign} !!}</p>
                    </div>
                </div>
                <div class="col-12 col-lg-6 col-md-6 mb-5">
                    <div class="text-center wow animate__animated animate__fadeInLeft" data-wow-delay="1s" data-wow-duration="1s">
                        <img width="400px" height="400px" class="m-auto" src="{{ $service->photo_url }}" alt="">
                    </div>
                </div>

                 
            </div>
        </div>
    </div>


    <div class="service text-center p-5">
        <div class="container-fluid">
          <div class="title_lines">
            <h1>
              {{ __('خدمات ذات صله') }}
            </h1>
        </div>
            <div class="swiper mySwiper">
                <div class="swiper-wrapper">

                    @foreach ($services->where('id','!=',$service->id) as $servic)
                  <div class="swiper-slide">
                    <div class="card" style="width: 18rem;">
                        <img class="card-img-top" src="{{ $servic->photo_url }}" alt="Card image cap">
                        <div class="card-body">
                          <h5 class="card-title">{{ $servic->{'title_' . $sign} }}</h5>
                    
                          <a href="{{ route('single-service.index', ['slug' => $servic->{'slug_' . $sign}]) }}"
                            class="btn"> {{ __('المزيد') }} </a>
                        </div>
                      </div>
                  </div>
                  @endforeach

                </div>
                <div class="swiper-pagination"></div>
              </div>

        </div>
    </div>
    


    @include('includes.contact-form',['classes' => 'p-5'])
 
    @stop
