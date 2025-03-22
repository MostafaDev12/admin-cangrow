    @extends('layouts.front')

    @section('title')

        {{ $gs->{'title_' . $sign} }}

    @stop

    @section('gsearch')
        <meta property="og:image" content=" {{ $gs->{'logo_' . $sign} }}" />
    @stop


    @section('content')


        <div class="slider">
            <div class="swiper mySwiper">
                <div class="swiper-wrapper">

                    @foreach ($sliders as $slider)
                        <div class="swiper-slide">
                            <div class="overlay">

                            </div>
                            <div class="title">
                                <h1 class="wow animate__animated animate__zoomIn" data-wow-delay="1s" data-wow-duration="1s">
                                    {{ $slider->{'title_' . $sign} ?? '' }}</h1>
                            </div>
                            <img src="{{ $slider->{'photo_url'} ?? '' }}" loading="lazy" alt="">
                        </div>
                    @endforeach


                </div>
            </div>
        </div>


        <div class="about-us">
            <div class="container pt-5">
                <div class="title_lines">
                    <h1>
                        {{ __('عن الشركه') }}
                    </h1>
                </div>
                <div class="row">
                    <div class="col-12 col-lg-6 col-md-6">
                        <div class="pt-5 wow animate__animated animate__fadeInRight" data-wow-delay="1s"
                            data-wow-duration="1s">
                            <h2>{{ $ps->{'portfolio_title_' . $sign} ?? '' }}</h2>
                            <p> {!! $ps->{'portfolio_details_' . $sign} ?? '' !!} </p>
                        </div>
                    </div>
                    <div class="col-12 col-lg-6 col-md-6">
                        <div class="text-center wow animate__animated animate__fadeInLeft" data-wow-delay="1s"
                            data-wow-duration="1s">
                            <img width="400px" height="400px" class="m-auto" src="{{ $ps->portfolio_photo }}"
                                alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="service text-center p-5">
            <div class="container-fluid">
                <div class="title_lines">

                    <h1>
                        {{ __('خدمتنا') }}
                    </h1>

                </div>
                <div class="swiper mySwiper">
                    <div class="swiper-wrapper">

                        @foreach ($services as $service)
                            <div class="swiper-slide">
                                <div class="card wow animate__animated animate__zoomIn" style="width: 18rem;">
                                    <img class="card-img-top" src="{{ $service->photo_url }}" alt="Card image cap">
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $service->{'title_' . $sign} }}</h5>

                                        <a href="{{ route('single-service.index', ['slug' => $service->{'slug_' . $sign}]) }}"
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


        <div class="blog p-5">
            <div class="container-fluid">
                <div class="title_lines">
                    <h1>
                        {{ __('مقالات') }}
                    </h1>
                </div>
                <div class="swiper mySwiper">
                    <div class="swiper-wrapper">

                        @foreach ($blogs->take(6) as $blog)
                            <div class="swiper-slide">
                                <div class="card" style="width: 18rem;">
                                    @if (optional($blog->category)->{'title_' . $sign})
                                        <span> {{ optional($blog->category)->{'title_' . $sign} }} </span>
                                    @endif
                                    <img class="card-img-top" src="{{ $blog->photo_url }}" alt="Card image cap">
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $blog->{'title_' . $sign} }}</h5>
                                        <p class="card-text"> {{ $blog->{'short_details_' . $sign} }} </p>

                                        <a href="{{ route('single-blog.index', $blog->{'slug_' . $sign}) }}"
                                            class="btn">{{ __('المزيد') }}</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach


                    </div>
                    <div class="swiper-pagination"></div>
                </div>

            </div>
        </div>


        <div class="partner text-center p-5">
            <div class="container-fluid">
                <div class="title_lines">
                    <h1> {{ __('شركاؤنا') }}

                    </h1>
                </div>
                <div class="swiper mySwiper">
                    <div class="swiper-wrapper">

                        @foreach ($reviews as $review)
                            <div class="swiper-slide">
                                <img src="{{ $review->photo_url }}" alt="">
                            </div>
                        @endforeach
                    </div>
                    <div class="swiper-pagination"></div>
                </div>

            </div>
        </div>



        @include('includes.contact-form',['classes' => 'p-5'])
 
    @stop
