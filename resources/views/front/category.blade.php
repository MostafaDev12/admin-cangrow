@extends('layouts.front')

@php
    $categories = [

        'خزانات-المياه' => [
            'title' => __('خزانات المياه'),
            'description' => __('اكتشف أنواع خزانات المياه المتنوعة من النور تانك بمقاسات وخامات مختلفة.'),
            'items' => [
                [
                    'title' => __('خزانات مياه أفقية'),
                    'slug' => 'خزانات-مياه-أفقية',
                    'image' => asset('assets/images/categories/خزان افقي.png'),
                ],
                [
                    'title' => __('خزانات مياه رأسية'),
                    'slug' => 'خزانات-مياه-رأسية',
                    'image' => asset('assets/images/categories/راسي.png'),
                ],
                [
                    'title' => __('خزانات بولي إيثيلين'),
                    'slug' => 'خزانات-البولي-إيثيلين',
                    'image' => asset('assets/images/categories/polyethylene-tanks.png'),
                ],
                [
                    'title' => __('خزانات فيبر جلاس'),
                    'slug' => 'خزانات-الفيبر-جلاس',
                    'image' => asset('assets/images/categories/fiberglass-tanks.png'),
                ],
                [
                    'title' => __('خزانات استانلس ستيل'),
                    'slug' => 'خزانات-الاستانلس-ستيل',
                    'image' => asset('assets/images/categories/خزان ستيل.png'),
                ],
            ],
        ],

        'أكشاك-وحمامات-متنقلة' => [
            'title' => __('أكشاك وحمامات متنقلة'),
            'description' => __('حلول متنقلة عملية للمواقع والشركات والنوادي بمقاسات وتصميمات متعددة.'),
            'items' => [
                [
                    'title' => __('أكشاك حراسة'),
                    'slug' => 'أكشاك-حراسة',
                    'image' => asset('assets/images/categories/كشك حراسه.png'),
                ],
                [
                    'title' => __('حمامات متنقلة'),
                    'slug' => 'حمامات-متنقلة',
                    'image' => asset('assets/images/categories/حمامات.png'),
                ],
              
            ],
        ],

        'مستلزمات-المرور' => [
            'title' => __('مستلزمات المرور'),
            'description' => __('منتجات لتنظيم المرور وتعزيز السلامة في الطرق والمواقع المختلفة.'),
            'items' => [
                [
                    'title' => __('حواجز مرورية'),
                    'slug' => 'حواجز-مرورية',
                    'image' => asset('assets/images/categories/حواجز مرور.png'),
                ],
                [
                    'title' => __('أقماع مرور'),
                    'slug' => 'أقماع-مرور',
                    'image' => asset('assets/images/categories/قمع مرور.png'),
                ],
            ],
        ],

        'تجهيز-النوادي-والكيدز-اريا' => [
            'title' => __('تجهيز النوادي والكيدز اريا'),
            'description' => __('تجهيزات متنوعة للنوادي ومناطق الأطفال والمساحات الخارجية.'),
            'items' => [
                [
                    'title' => __('أحواض الزرع'),
                    'slug' => 'أحواض-الزرع',
                    'image' => asset('assets/images/categories/احواض زرع.png'),
                ],
                [
                    'title' => __('شازلونج'),
                    'slug' => 'شازلونج',
                    'image' => asset('assets/images/categories/شازلونج.png'),
                ],
                [
                    'title' => __('ممر عائم'),
                    'slug' => 'ممر-عائم',
                    'image' => asset('assets/images/categories/ممر عائم.png'),
                ],
                [
                    'title' => __('مقاعد بلاستيك'),
                    'slug' => 'مقاعد-بلاستيك',
                    'image' => asset('assets/images/categories/مقاعد بلاستيك.png'),
                ],
                [
                    'title' => __('كراسي هزاز أطفالي'),
                    'slug' => 'كراسي-هزاز-أطفالي',
                    'image' => asset('assets/images/categories/هزاز اطفالي.png'),
                ],
                [
                    'title' => __('ترابيزات قهوة وسفرة'),
                    'slug' => 'ترابيزات-قهوة-وسفرة',
                    'image' => asset('assets/images/categories/ترابيزات.png'),
                ],
                [
                    'title' => __(' كراسي و طقطوقة'),
                    'slug' => 'طقطوقة',
                    'image' => asset('assets/images/categories/كراسي.png'),
                ],
            ],
        ],

        'منتجات-بلاستيكية-متنوعة' => [
            'title' => __('منتجات بلاستيكية متنوعة'),
            'description' => __('منتجات بلاستيكية متعددة الاستخدامات للاستخدامات المنزلية والتجارية والصناعية.'),
            'items' => [
                [
                    'title' => __('بالتات'),
                    'slug' => 'بالتات',
                    'image' => asset('assets/images/categories/بالته.png'),
                ],
                [
                    'title' => __('آيس بوكس'),
                    'slug' => 'آيس-بوكس',
                    'image' => asset('assets/images/categories/ايس كريم.png'),
                ],
                [
                    'title' => __('حاويات وسلات قمامة'),
                    'slug' => 'حاويات-وسلات-قمامة',
                    'image' => asset('assets/images/categories/سلة قمامة.png'),
                ],
            ],
        ],
    ];

    $categoryData = $categories[$slug] ?? null;
@endphp

@section('title')
    {{ $categoryData['title'] ?? __('منتجاتنا') }} - {{ $gs->{'title_' . $sign} }}
@stop

@section('content')

<section class="pt-32 pb-20 bg-[#f4f8fb] min-h-screen">
    <div class="container mx-auto px-4">

        @if($categoryData)

            <div class="text-center mb-12">
                <span class="inline-flex items-center justify-center rounded-full bg-[#e8f8ff] px-5 py-2 text-sm font-bold text-[#00a8e8]">
                    {{ __('منتجاتنا') }}
                </span>

                <h1 class="mt-5 text-3xl md:text-5xl font-black text-[#111827]">
                    {{ $categoryData['title'] }}
                </h1>

                <p class="mt-4 max-w-3xl mx-auto text-base md:text-lg text-gray-600 leading-8">
                    {{ $categoryData['description'] }}
                </p>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-7 max-w-7xl mx-auto">

                @foreach($categoryData['items'] as $item)

                    <a href="{{ route('single-service-service.index', [
                                'lang' => $sign,
                                'slug' => $item['slug']
                            ]) }}"
                       class="group flex flex-col overflow-hidden rounded-[26px] bg-white border border-[#e5f3fa]
                              shadow-[0_14px_40px_rgba(0,168,232,0.10)]
                              transition duration-300 hover:-translate-y-1
                              hover:shadow-[0_22px_55px_rgba(0,168,232,0.18)]">

                        <div class="relative">

                          <div class="h-[260px] bg-white overflow-hidden flex items-center justify-center">
    <img src="{{ $item['image'] }}"
         alt="{{ $item['title'] }}"
         class="max-w-[78%] max-h-[78%] object-contain transition duration-500 group-hover:scale-105">
</div>
                              <div class="absolute -bottom-7 right-6 z-10 flex h-14 w-14 items-center justify-center rounded-2xl bg-[#00a8e8] text-white shadow-lg">
                                <i class="fa-solid fa-box-open text-xl"></i>
                            </div>

                        </div>

                        <div class="flex flex-col flex-1 px-6 pb-6 pt-12 text-right">

                            <h2 class="text-xl md:text-2xl font-black text-[#111827] transition group-hover:text-[#00a8e8]">
                                {{ $item['title'] }}
                            </h2>

                            <div class="mt-auto pt-6 inline-flex items-center gap-2 text-[#00a8e8] font-black">
                                {{ __('عرض التفاصيل') }}
                                <i class="fa-solid fa-arrow-left text-sm"></i>
                            </div>

                        </div>

                    </a>

                @endforeach

            </div>

        @else

            <div class="text-center">
                <p class="text-lg font-bold text-gray-600">
                    {{ __('لا توجد بيانات لعرضها') }}
                </p>
            </div>

        @endif

    </div>
</section>

@stop