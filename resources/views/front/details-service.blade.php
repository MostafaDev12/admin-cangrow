@extends('layouts.front')

@php
    $pageItem = $category ?? $service ?? null;
    $pageTitle = $pageItem ? $pageItem->{'title_' . $sign} : __('منتجاتنا');
@endphp

@section('title')
    {{ $pageTitle }} - {{ $gs->{'title_' . $sign} }}
@stop

@section('gsearch')
    <meta property="og:image"
          content="{{ $pageItem && !empty($pageItem->photo) ? $pageItem->photo : $gs->{'logo_' . $sign} }}" />
@stop

@section('content')

    {{-- صفحة قسم يحتوي على منتجات --}}
    @if(isset($category) && isset($servicess))

        <section class="pt-32 pb-20 bg-[#f4f8fb] min-h-screen">
            <div class="container mx-auto px-4">

                <div class="text-center mb-12">
                    <span class="inline-flex items-center justify-center rounded-full bg-[#e8f8ff] px-5 py-2 text-sm font-bold text-[#00a8e8]">
                        {{ __('منتجاتنا') }}
                    </span>

                    <h1 class="mt-5 text-3xl md:text-5xl font-black text-[#111827] leading-tight">
                        {{ $category->{'title_' . $sign} }}
                    </h1>

                    @if(!empty($category->{'short_details_' . $sign}))
                        <div class="mt-4 max-w-3xl mx-auto text-base md:text-lg text-gray-600 leading-8">
                            {!! $category->{'short_details_' . $sign} !!}
                        </div>
                    @else
                        <p class="mt-4 max-w-3xl mx-auto text-base md:text-lg text-gray-600 leading-8">
                            {{ __('اكتشف مجموعة منتجاتنا المتنوعة المصممة لتلبية احتياجاتك بأعلى جودة.') }}
                        </p>
                    @endif
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-7 max-w-7xl mx-auto">

                    @forelse($servicess as $product)

                        <a href="{{ route('single-service.index', [
                                    'lang' => $sign,
                                    'slug' => $product->{'slug_' . $sign}
                                ]) }}"
                           class="group flex flex-col overflow-hidden rounded-[26px] bg-white border border-[#e5f3fa]
                                  shadow-[0_14px_40px_rgba(0,168,232,0.10)]
                                  transition duration-300 hover:-translate-y-1
                                  hover:shadow-[0_22px_55px_rgba(0,168,232,0.18)]">

                            <div class="relative">
                                <div class="h-[260px] bg-[#f8fbfd] overflow-hidden">
                                    <img src="{{ $product->photo }}"
                                         alt="{{ $product->{'title_' . $sign} }}"
                                         width="600"
                                         height="420"
                                         loading="lazy"
                                         decoding="async"
                                         class="w-full h-full object-cover transition duration-500 group-hover:scale-105">
                                </div>

                                <div class="absolute -bottom-7 right-6 z-10 flex h-14 w-14 items-center justify-center rounded-2xl bg-[#00a8e8] text-white shadow-[0_10px_25px_rgba(0,168,232,0.35)]">
                                    <i class="fa-solid fa-box-open text-xl"></i>
                                </div>
                            </div>

                            <div class="flex flex-col flex-1 px-6 pb-6 pt-12 text-right">
                                <h2 class="text-xl md:text-2xl font-black text-[#111827] mb-3 transition group-hover:text-[#00a8e8]">
                                    {{ $product->{'title_' . $sign} }}
                                </h2>

                                @if(!empty($product->{'short_details_' . $sign}))
                                    <div class="text-sm md:text-base text-gray-600 leading-8 line-clamp-3">
                                        {!! $product->{'short_details_' . $sign} !!}
                                    </div>
                                @endif

                                <div class="mt-auto pt-6 inline-flex items-center gap-2 text-[#00a8e8] font-black">
                                    {{ __('عرض التفاصيل') }}
                                    <i class="fa-solid fa-arrow-left text-sm transition duration-300 group-hover:-translate-x-1"></i>
                                </div>
                            </div>

                        </a>

                    @empty

                        <div class="col-span-full rounded-[24px] bg-white border border-[#e5f3fa] p-10 text-center">
                            <p class="text-lg font-bold text-gray-600">
                                {{ __('لا توجد منتجات متاحة في هذا القسم حاليًا') }}
                            </p>
                        </div>

                    @endforelse

                </div>

                @if($servicess instanceof \Illuminate\Pagination\AbstractPaginator)
                    <div class="mt-12">
                        {{ $servicess->links() }}
                    </div>
                @endif

            </div>
        </section>

    {{-- صفحة المنتج النهائي --}}
    @elseif(isset($service))

        <section class="pt-32 pb-20 bg-[#f4f8fb] min-h-screen">
            <div class="container mx-auto px-4">

                <div class="max-w-6xl mx-auto">

                    <div class="mb-6">
                        <a href="{{ url()->previous() }}"
                           class="inline-flex items-center gap-2 text-[#00a8e8] font-black transition hover:-translate-x-1">
                            <i class="fa-solid fa-arrow-right text-sm"></i>
                            {{ __('العودة إلى المنتجات') }}
                        </a>
                    </div>

                    {{-- Main Product Card --}}
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-10 items-start rounded-[28px] bg-white p-6 md:p-10
                                border border-[#e5f3fa] shadow-[0_18px_50px_rgba(0,168,232,0.10)]">

                        <div class="overflow-hidden rounded-[24px] bg-[#f8fbfd]">
                            <img src="{{ $service->photo }}"
                                 alt="{{ $service->{'title_' . $sign} }}"
                                 loading="lazy"
                                 decoding="async"
                                 class="w-full h-auto min-h-[320px] md:min-h-[440px] object-contain">
                        </div>

                        <div class="text-right">
                            <span class="inline-flex items-center justify-center rounded-full bg-[#e8f8ff] px-5 py-2 text-sm font-bold text-[#00a8e8]">
                                {{ __('منتجاتنا') }}
                            </span>

                            <h1 class="mt-5 text-3xl md:text-5xl font-black text-[#111827] leading-tight">
                                {{ $service->{'title_' . $sign} }}
                            </h1>

                            @if(!empty($service->{'short_details_' . $sign}))
                                <div class="mt-5 text-base md:text-lg text-gray-600 leading-8">
                                    {!! $service->{'short_details_' . $sign} !!}
                                </div>
                            @endif

                            @if(!empty($service->{'details_' . $sign}))
                                <article class="article-content mt-8 text-gray-700 leading-8">
                                    {!! $service->{'details_' . $sign} !!}
                                </article>
                            @endif
                        </div>

                    </div>

                    {{-- Product Sections --}}
                    @if(isset($service->sections) && $service->sections->count())

                        <div class="mt-14 space-y-10">

                            @foreach($service->sections as $section)

                                <div class="rounded-[28px] bg-white p-6 md:p-10 border border-[#e5f3fa]
                                            shadow-[0_14px_40px_rgba(0,168,232,0.08)]">

                                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-10 items-center
                                                {{ $loop->even ? 'lg:[&>*:first-child]:order-2' : '' }}">

                                        {{-- Section Image --}}
                                        <div class="overflow-hidden rounded-[24px] bg-[#f8fbfd]">
                                            <img src="{{ $section->image }}"
                                                 alt="{{ $section->{'title_' . $sign} }}"
                                                 width="700"
                                                 height="500"
                                                 loading="lazy"
                                                 decoding="async"
                                                 class="w-full h-auto object-contain">
                                        </div>

                                        {{-- Section Content --}}
                                        <div class="text-right">
                                            <span class="inline-flex items-center justify-center rounded-full bg-[#e8f8ff] px-4 py-2 text-xs font-bold text-[#00a8e8]">
                                                {{ __('تفاصيل المنتج') }}
                                            </span>

                                            <h2 class="mt-4 text-2xl md:text-4xl font-black text-[#111827] leading-tight">
                                                {{ $section->{'title_' . $sign} }}
                                            </h2>

                                            @if(!empty($section->{'details_' . $sign}))
                                                <div class="article-content mt-5 text-gray-700 leading-8">
                                                    {!! $section->{'details_' . $sign} !!}
                                                </div>
                                            @endif
                                        </div>

                                    </div>

                                </div>

                            @endforeach

                        </div>

                    @endif

                </div>

            </div>
        </section>

    @else

        <section class="pt-32 pb-20 bg-[#f4f8fb] min-h-screen">
            <div class="container mx-auto px-4 text-center">
                <p class="text-lg font-bold text-gray-600">
                    {{ __('لا توجد بيانات لعرضها') }}
                </p>
            </div>
        </section>

    @endif

@stop