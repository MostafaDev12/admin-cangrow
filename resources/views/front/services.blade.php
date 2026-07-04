@extends('layouts.front')

@section('title')
    {{ __('منتجاتنا') }} - {{ $gs->{'title_' . $sign} }}
@stop

@section('content')

<section class="pt-32 pb-20 bg-[#f4f8fb] min-h-screen">
    <div class="container mx-auto px-4">

        {{-- Page Header --}}
        <div class="text-center mb-12">

            <span class="inline-flex items-center justify-center rounded-full bg-[#e8f8ff] px-5 py-2 text-sm font-bold text-[#00a8e8]">
                {{ __('منتجاتنا') }}
            </span>

            <h1 class="mt-5 text-3xl md:text-5xl font-black text-[#111827] leading-tight">
                {{ __('أقسام منتجات النور تانك') }}
            </h1>

            <p class="mt-4 max-w-3xl mx-auto text-base md:text-lg text-gray-600 leading-8">
                {{ __('اكتشف مجموعة متنوعة من منتجات النور تانك المصممة لتلبية احتياجاتك بأعلى جودة.') }}
            </p>

        </div>

        {{-- Categories Grid --}}
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-6 gap-7 max-w-7xl mx-auto">

            @foreach($mainCategories as $category)

                <a href="{{ route('single-category-service.index', [
                        'lang' => $sign,
                        'slug' => $category->{'slug_' . $sign}
                    ]) }}"
                   class="group flex flex-col overflow-hidden rounded-[26px] bg-white border border-[#e5f3fa]
                          shadow-[0_14px_40px_rgba(0,168,232,0.10)]
                          transition duration-300 hover:-translate-y-1
                          hover:shadow-[0_22px_55px_rgba(0,168,232,0.18)]
                          sm:col-span-1 lg:col-span-2
                          {{ $loop->iteration === 4 ? 'lg:col-start-2' : '' }}">

                    {{-- Image --}}
                    <div class="relative h-[260px] bg-[#f8fbfd]">

                        <img src="{{ $category->photo }}"
                             alt="{{ $category->{'title_' . $sign} }}"
                             width="600"
                             height="420"
                             loading="lazy"
                             decoding="async"
                             class="w-full h-full object-cover transition duration-500 group-hover:scale-105">

                        {{-- Icon on image edge --}}
                        <div class="absolute -bottom-7 right-6 z-10 flex h-14 w-14 items-center justify-center
                                    rounded-2xl bg-[#00a8e8] text-white
                                    shadow-[0_10px_25px_rgba(0,168,232,0.35)]">
                            <i class="{{ $category->icon }} text-xl"></i>
                        </div>

                    </div>

                    {{-- Content --}}
                    <div class="flex flex-col flex-1 px-6 pb-6 pt-12 text-right">

                        <h2 class="text-xl md:text-2xl font-black text-[#111827] mb-3 transition group-hover:text-[#00a8e8]">
                            {{ $category->{'title_' . $sign} }}
                        </h2>

                        <p class="text-sm md:text-base text-gray-600 leading-8">
                            {{ $category->{'short_details_' . $sign} }}
                        </p>

                        <div class="mt-auto pt-6 inline-flex items-center gap-2 text-[#00a8e8] font-black">
                            {{ __('عرض المنتجات') }}

                            <i class="fa-solid fa-arrow-left text-sm transition duration-300 group-hover:-translate-x-1"></i>
                        </div>

                    </div>

                </a>

            @endforeach

        </div>

    </div>
</section>

@stop
