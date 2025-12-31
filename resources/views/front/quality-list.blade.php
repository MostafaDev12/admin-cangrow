  
 
    
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
     <section class="page-header">
            <div class="page-header__bg" style="background-image: linear-gradient(to right, #000000, #ffffff);"></div>
            <!-- /.page-header__bg -->
            <div class="container">
                <h2 class="page-header__title">الجوده </h2>
                
            </div><!-- /.container -->
        </section><!-- /.page-header -->
       
     @foreach ($model->models as $k=>$item)
        <section class="about-one section-space-top" id="about">
            <div class="container">
                <div class="row gutter-y-60">
                    @if($k % 2 == 0)
                        <div class="col-lg-6 wow fadeInLeft" data-wow-duration="1500ms">
                            <div class="about-one__image">
                                <div class="about-one__image__inner">
                                    <h3 class="about-one__image__text">since 1996</h3>
                                    <img src="{{ $item->photo }}" alt="about image">
                                    <div class="about-one__image__border"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 wow fadeInRight" data-wow-duration="1500ms">
                            <div class="about-one__content">
                                <div class="sec-title @@extraClassName">
                                    <img src="{{ asset('front/mtc/') }}/assets/images/shapes/sec-title-s-1.png" alt="{{ $item->{'title_' . $sign} }}" class="sec-title__img">
                                    <h6 class="sec-title__tagline">about MTC</h6>
                                    <h2 class="sec-title__title">{{ $item->{'title_' . $sign} }}</h2>
                                </div>
                                <p class="about-one__text">{{ $item->{'details_' . $sign} }}</p>
                            </div>
                        </div>
                    @else
                        <div class="col-lg-6 wow fadeInRight" data-wow-duration="1500ms">
                            <div class="about-one__content">
                                <div class="sec-title @@extraClassName">
                                    <img src="{{ asset('front/mtc/') }}/assets/images/shapes/sec-title-s-1.png" alt="{{ $item->{'title_' . $sign} }}" class="sec-title__img">
                                    <h6 class="sec-title__tagline">about MTC</h6>
                                    <h2 class="sec-title__title">{{ $item->{'title_' . $sign} }}</h2>
                                </div>
                                <p class="about-one__text">{{ $item->{'details_' . $sign} }}</p>
                            </div>
                        </div>
                        <div class="col-lg-6 wow fadeInLeft" data-wow-duration="1500ms">
                            <div class="about-one__image">
                                <div class="about-one__image__inner">
                                    <h3 class="about-one__image__text">since 1996</h3>
                                    <img src="{{ $item->photo }}" alt="about image">
                                    <div class="left about-one__image__border"></div>
                                </div>
                            </div>
                        </div>
                    @endif
                </div><!-- /.row -->
            </div><!-- /.container -->
            <div class="about-one__shape">
                <img src="{{ asset('front/mtc/') }}/assets/images/shapes/about-shape-1-2.png" alt="about shape" class="about-one__shape__one">
                <img src="{{ asset('front/mtc/') }}/assets/images/shapes/about-shape-1-3.png" alt="about shape" class="about-one__shape__two">
            </div><!-- /.about-one__shape -->
        </section><!-- /.about-one section-space-top -->

     @endforeach

     @stop