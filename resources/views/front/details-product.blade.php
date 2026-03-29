@extends('layouts.front')

@section('title')
    {{ $service->{'title_' . $sign} }} - {{ $gs->{'title_' . $sign} }}
@stop

@section('gsearch')
    <meta property="og:image" content="{{ $service->photo }}" />
    <meta property="og:title" content="{{ $service->{'meta_title_' . $sign} ?? $service->{'title_' . $sign} }}" />
    <meta property="og:description" content="{{ $service->{'meta_details_' . $sign} ?? $service->{'short_details_' . $sign} }}" />
@stop

@section('css')
    <style>
        .product-details__gallery-top__image {
            background: #f8f8f8;
            border-radius: 10px;
            overflow: hidden;
            text-align: center;
        }

        .product-details__gallery-top__image img {
            max-width: 100%;
            height: auto;
            object-fit: contain;
        }

        .product-details__gallery-thumb-slide {
            cursor: pointer;
            border: 2px solid transparent;
            border-radius: 8px;
            overflow: hidden;
            transition: border-color 0.3s;
        }

        .product-details__gallery-thumb-slide.swiper-slide-thumb-active {
            border-color: var(--boskery-base, #c2a74e);
        }

        .product-details__gallery-thumb-slide img {
            width: 100%;
            height: auto;
            object-fit: cover;
        }

        .product-details__content__title {
            font-size: 16px;
            font-weight: 700;
            margin-bottom: 10px;
        }

        .product-details__excerpt__text {
            color: #666;
            line-height: 1.8;
        }

        .product-details__tags a {
            display: inline-block;
            padding: 5px 15px;
            border: 1px solid #ddd;
            border-radius: 5px;
            margin: 3px;
            font-size: 14px;
            color: #666;
            transition: all 0.3s;
        }

        .product-details__tags a:hover {
            background: var(--boskery-base, #c2a74e);
            color: #fff;
            border-color: var(--boskery-base, #c2a74e);
        }

        .product-details__description {
            margin-top: 50px;
        }

        .product-details__description__nav .nav-link {
            font-weight: 700;
            color: #333;
            border: none;
            border-bottom: 2px solid transparent;
            padding: 10px 20px;
        }

        .product-details__description__nav .nav-link.active {
            color: var(--boskery-base, #c2a74e);
            border-bottom-color: var(--boskery-base, #c2a74e);
        }

        .product-details__description__content {
            padding: 30px 0;
            line-height: 1.8;
            color: #666;
        }

        .related-products .product__item {
            margin-bottom: 30px;
        }

        .product__item__image img {
            width: 100%;
            height: auto;
            border-radius: 10px;
        }
    </style>
@stop

@section('content')
    @php
        $phones = explode(',', $gs->phones);
        $randomPhone = Arr::random($phones);
    @endphp

    {{-- Page Header --}}
    <section class="page-header">
        <div class="page-header__bg"
            style="background-image: url({{ site_image('product_page_header_bg') }});">
        </div>
        <div class="container">
            <h2 class="page-header__title">{{ $service->{'title_' . $sign} }}</h2>
            <ul class="boskery-breadcrumb list-unstyled">
                <li><a href="{{ route('front.index', $sign) }}">{{ __('الرئيسية') }}</a></li>
                <li><a href="{{ route('products.index', $sign) }}">{{ __('المنتاجات') }}</a></li>
                <li><span>{{ $service->{'title_' . $sign} }}</span></li>
            </ul>
        </div>
    </section>

    {{-- Product Details Section --}}
    <section class="product-details section-space">
        <div class="container">
            <div class="row gutter-y-50">
                {{-- Product Gallery --}}
                <div class="col-lg-6 col-xl-6 wow fadeInLeft" data-wow-delay="200ms">
                    <div class="product-details__img">
                        {{-- Main Gallery Swiper --}}
                        <div class="swiper product-details__gallery-top">
                            <div class="swiper-wrapper">
                                {{-- Main product photo --}}
                                <div class="swiper-slide">
                                    <div class="product-details__gallery-top__inner">
                                        <div class="product-details__gallery-top__image">
                                            <img src="{{ $service->photo }}"
                                                alt="{{ $service->{'title_' . $sign} }}">
                                        </div>
                                    </div>
                                </div>
                                {{-- Gallery photos --}}
                                @foreach ($service->galleries as $gallery)
                                    <div class="swiper-slide">
                                        <div class="product-details__gallery-top__inner">
                                            <div class="product-details__gallery-top__image">
                                                <img src="{{ url('/') }}/assets/images/galleries/{{ $gallery->photo }}"
                                                    alt="{{ $service->{'title_' . $sign} }}"
                                                    onerror="this.style.display='none'">
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        {{-- Thumbnail Swiper --}}
                        @if ($service->galleries->count() > 0)
                            <div class="swiper product-details__gallery-thumb mt-3">
                                <div class="swiper-wrapper">
                                    <div class="product-details__gallery-thumb-slide swiper-slide">
                                        <img src="{{ $service->photo }}"
                                            alt="{{ $service->{'title_' . $sign} }}">
                                    </div>
                                    @foreach ($service->galleries as $gallery)
                                        <div class="product-details__gallery-thumb-slide swiper-slide">
                                            <img src="{{ url('/') }}/assets/images/galleries/{{ $gallery->photo }}"
                                                alt="{{ $service->{'title_' . $sign} }}">
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endif
                    </div>
                </div>

                {{-- Product Info --}}
                <div class="col-lg-6 col-xl-6 wow fadeInRight" data-wow-delay="300ms">
                    <div class="product-details__content">
                        <div class="product-details__top">
                            <div class="product-details__top__left">
                                <h3 class="product-details__name">{{ $service->{'title_' . $sign} }}</h3>
                                @if ($service->category)
                                    <span
                                        class="badge bg-secondary">{{ $service->category->{'title_' . $sign} }}</span>
                                @endif
                            </div>
                        </div>

                        {{-- Short Description --}}
                        @if ($service->{'short_details_' . $sign})
                            <div class="product-details__excerpt mt-4">
                                <p class="product-details__excerpt__text">
                                    {{ $service->{'short_details_' . $sign} }}
                                </p>
                            </div>
                        @endif

                        {{-- Tags --}}
                        @if ($service->tags)
                            <div class="product-details__tags mt-4">
                                <h3 class="product-details__content__title">{{ __('الكلمات المفتاحية') }}</h3>
                                @foreach (explode(',', $service->tags) as $tag)
                                    <a href="#">{{ trim($tag) }}</a>
                                @endforeach
                            </div>
                        @endif

                        {{-- Contact / Order Button --}}
                        <div class="mt-4">
                            <a href="{{ route('contact.index', $sign) }}" class="boskery-btn">
                                <span class="boskery-btn__hover"></span>
                                <span class="boskery-btn__hover"></span>
                                <span class="boskery-btn__hover"></span>
                                <span class="boskery-btn__hover"></span>
                                <span class="boskery-btn__hover"></span>
                                <span class="boskery-btn__hover"></span>
                                <span class="boskery-btn__text">{{ __('اتصل بنا') }}</span>
                                <i class="icon-meat-3"></i>
                            </a>
                        </div>

                        {{-- Share --}}
                        <div class="product-details__socials mt-4">
                            <h3 class="product-details__socials__title">{{ __('شارك') }}:</h3>
                            <div class="boskery-social">
                                <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(request()->url()) }}"
                                    target="_blank">
                                    <i class="fab fa-facebook-f" aria-hidden="true"></i>
                                </a>
                                <a href="https://twitter.com/intent/tweet?url={{ urlencode(request()->url()) }}&text={{ urlencode($service->{'title_' . $sign}) }}"
                                    target="_blank">
                                    <i class="fab fa-twitter" aria-hidden="true"></i>
                                </a>
                                <a href="https://www.linkedin.com/shareArticle?mini=true&url={{ urlencode(request()->url()) }}"
                                    target="_blank">
                                    <i class="fab fa-linkedin-in" aria-hidden="true"></i>
                                </a>
                                <a href="https://wa.me/?text={{ urlencode($service->{'title_' . $sign} . ' ' . request()->url()) }}"
                                    target="_blank">
                                    <i class="fab fa-whatsapp" aria-hidden="true"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Full Description Tabs --}}
            @if ($service->{'details_' . $sign})
                <div class="product-details__description mt-5">
                    <ul class="nav product-details__description__nav" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-bs-toggle="tab"
                                href="#description">{{ __('الوصف') }}</a>
                        </li>
                        @if ($service->childs->count() > 0)
                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="tab"
                                    href="#sub-products">{{ __('المنتجات الفرعية') }}</a>
                            </li>
                        @endif
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="description">
                            <div class="product-details__description__content">
                                {!! $service->{'details_' . $sign} !!}
                            </div>
                        </div>
                        @if ($service->childs->count() > 0)
                            <div class="tab-pane fade" id="sub-products">
                                <div class="product-details__description__content">
                                    <div class="row gutter-y-30">
                                        @foreach ($service->childs as $child)
                                            <div class="col-md-6 col-lg-3">
                                                <div class="product__item">
                                                    <div class="product__item__image">
                                                        <img src="{{ $child->photo }}"
                                                            alt="{{ $child->{'title_' . $sign} }}">
                                                    </div>
                                                    <div class="product__item__content text-center mt-3">
                                                        <h4 class="product__item__title">
                                                            <a
                                                                href="{{ route('single-service.index', [$sign, $child->{'slug_' . $sign}]) }}">
                                                                {{ $child->{'title_' . $sign} }}
                                                            </a>
                                                        </h4>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            @endif
        </div>
    </section>

    {{-- Related Products --}}
    @if ($relatedProducts->count() > 0)
        <section class="product section-space related-products"
            style="background-image: url({{ site_image('product_share_bg') }});">
            <div class="container">
                <div class="sec-title sec-title--center">
                    <img src="{{ site_image('section_title_shape') }}" alt=""
                        class="sec-title__img">
                    <h6 class="sec-title__tagline">{{ __('منتجات مميزة') }}</h6>
                    <h2 class="sec-title__title">{{ __('منتجات ذات صلة') }}</h2>
                </div>
                <div class="row gutter-y-30">
                    @foreach ($relatedProducts as $related)
                        <div class="col-md-6 col-lg-3 wow fadeInUp" data-wow-duration="1500ms"
                            data-wow-delay="{{ $loop->index * 100 }}ms">
                            <div class="product__item">
                                <div class="product__item__image">
                                    <img src="{{ $related->photo }}"
                                        alt="{{ $related->{'title_' . $sign} }}">
                                </div>
                                <div class="product__item__content">
                                    <div class="boskery-ratings">
                                        <span class="icon-star"></span>
                                        <span class="icon-star"></span>
                                        <span class="icon-star"></span>
                                        <span class="icon-star"></span>
                                        <span class="icon-star"></span>
                                    </div>
                                    <h4 class="product__item__title">
                                        <a
                                            href="{{ route('single-service.index', [$sign, $related->{'slug_' . $sign}]) }}">
                                            {{ $related->{'title_' . $sign} }}
                                        </a>
                                    </h4>
                                    <a href="{{ route('single-service.index', [$sign, $related->{'slug_' . $sign}]) }}"
                                        class="boskery-btn product__item__link">
                                        <span class="boskery-btn__hover"></span>
                                        <span class="boskery-btn__hover"></span>
                                        <span class="boskery-btn__hover"></span>
                                        <span class="boskery-btn__hover"></span>
                                        <span class="boskery-btn__hover"></span>
                                        <span class="boskery-btn__hover"></span>
                                        <span class="boskery-btn__text">{{ __('عرض المنتج') }}</span>
                                        <i class="icon-meat-3"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    {{-- CTA / Contact Section --}}
    <section class="slide-text" style="background-image: url({{ site_image('slide_text_bg') }});">
        <div class="container">
            <div class="slide-text__wrap">
                <ul class="list-unstyled slide-text__inner" id="slide_text_two">
                    <li>
                        <h2 class="slide-text__title">{{ $gs->{'title_' . $sign} }}</h2>
                    </li>
                    <li>
                        <div class="slide-text__icon">
                            <i class="icon-meat"></i>
                        </div>
                    </li>
                    <li>
                        <h2 class="slide-text__title">{{ __('اتصل بنا') }}: {{ $randomPhone }}</h2>
                    </li>
                    <li>
                        <div class="slide-text__icon">
                            <i class="icon-meat"></i>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </section>
@stop

@section('js')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Initialize gallery thumb swiper
            var galleryThumb = new Swiper('.product-details__gallery-thumb', {
                spaceBetween: 10,
                slidesPerView: 4,
                watchSlidesProgress: true,
            });

            // Initialize gallery top swiper
            var galleryTop = new Swiper('.product-details__gallery-top', {
                spaceBetween: 10,
                thumbs: {
                    swiper: galleryThumb,
                },
            });
        });
    </script>
@stop
