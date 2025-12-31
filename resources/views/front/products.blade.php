 

    
   @extends('layouts.front')

@section('title')
   
{{ __('المنتاجات') }} -  {{ $gs->{'title_' . $sign} }}
     
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
                <h2 class="page-header__title">المنتاجات </h2>
              
            </div><!-- /.container -->
        </section><!-- /.page-header -->
       


        <!-- المنجات -->
        <!-- المنتجات -->
       @foreach ($categories as $category)
           
    <section class="gallery-page section-space"  id="{{ $category->title_en }}"  style="background-image: url(assets/images/shapes/product-bg-2-1.png);">
         <div class="sec-title sec-title--center">

                    <img src="{{ asset('front/mtc/') }}/assets/images/shapes/sec-title-s-1.png" alt="{{ $category->{'title_' . $sign} }}" class="sec-title__img">

                    <h6 class="sec-title__tagline">منتجات مميزة</h6><!-- /.sec-title__tagline -->

                    <h2 class="sec-title__title">{{ $category->{'title_' . $sign} }}</h2><!-- /.sec-title__title -->
                </div><!-- /.sec-title -->
            <div class="container">
                <div class="gallery-page__carousel boskery-owl__carousel boskery-owl__carousel--basic-nav owl-carousel owl-theme" data-owl-options='{
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
        
                @foreach ($category->services as $product)
                   <div class="item product__item wow fadeInUp" data-wow-duration='1500ms' data-wow-delay='500ms'>
                            <div class="product__item__image">
                                <img src="{{ $product->photo }}" alt="{{ $product->{'title_' . $sign} }}">
                          {{-- {{ asset('front/mtc/') }}/assets/images/products/product-1-4.png --}}
                            </div><!-- /.product-image -->
                            <div class="product__item__content">
                                <div class="boskery-ratings">
                                    <span class="icon-star"></span>
                                    <span class="icon-star"></span>
                                    <span class="icon-star"></span>
                                    <span class="icon-star"></span>
                                    <span class="icon-star"></span>
                                </div><!-- /.product-ratings -->
                                <h4 class="product__item__title"><a href="#">   {{ $product->{'title_' . $sign} }}</a></h4>
                                <!-- /.product-title -->
                                <a href="{{ route('contact.index',$sign) }}" class="boskery-btn product__item__link">
                                    <span class="boskery-btn__hover"></span>
                                    <span class="boskery-btn__hover"></span>
                                    <span class="boskery-btn__hover"></span>
                                    <span class="boskery-btn__hover"></span>
                                    <span class="boskery-btn__hover"></span>
                                    <span class="boskery-btn__hover"></span>
                                    <span class="boskery-btn__text">اتصل بنا</span>
                                    <i class="icon-meat-3"></i>
                                </a>
                            </div><!-- /.product-content -->
                        </div><!-- /.product-item -->
                  @endforeach
                </div><!-- /.gallery-page__carousel -->
            </div><!-- /.container-fluid -->
        </section><!-- /.gallery-page section-space -->
        
       @endforeach
     @stop