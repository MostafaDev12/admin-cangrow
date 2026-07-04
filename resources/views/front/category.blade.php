@extends('layouts.front')

@section('title')
    {{ $category ? $category->{'title_' . $sign} : __('منتجاتنا') }} - {{ $gs->{'title_' . $sign} }}
@stop

@section('content')

<section class="pt-32 pb-20 bg-[#f4f8fb] min-h-screen">
    <div class="container mx-auto px-4">

        @if($category)

            <div class="text-center mb-12">
                <span class="inline-flex items-center justify-center rounded-full bg-[#e8f8ff] px-5 py-2 text-sm font-bold text-[#00a8e8]">
                    {{ __('منتجاتنا') }}
                </span>

                <h1 class="mt-5 text-3xl md:text-5xl font-black text-[#111827]">
                    {{ $category->{'title_' . $sign} }}
                </h1>

                <p class="mt-4 max-w-3xl mx-auto text-base md:text-lg text-gray-600 leading-8">
                    {!! $category->{'details_' . $sign} !!}
                </p>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-7 max-w-7xl mx-auto">

                @foreach($products as $item)

                    <a href="{{ route('single-service-service.index', [
                                'lang' => $sign,
                                'slug' => $item->{'slug_' . $sign}
                            ]) }}"
                       class="group flex flex-col overflow-hidden rounded-[26px] bg-white border border-[#e5f3fa]
                              shadow-[0_14px_40px_rgba(0,168,232,0.10)]
                              transition duration-300 hover:-translate-y-1
                              hover:shadow-[0_22px_55px_rgba(0,168,232,0.18)]">

                        <div class="relative">

                          <div class="h-[260px] bg-white overflow-hidden flex items-center justify-center">
    <img src="{{ $item->photo }}"
         alt="{{ $item->{'title_' . $sign} }}"
         class="max-w-[78%] max-h-[78%] object-contain transition duration-500 group-hover:scale-105">
</div>
                              <div class="absolute -bottom-7 right-6 z-10 flex h-14 w-14 items-center justify-center rounded-2xl bg-[#00a8e8] text-white shadow-lg">
                                <i class="fa-solid fa-box-open text-xl"></i>
                            </div>

                        </div>

                        <div class="flex flex-col flex-1 px-6 pb-6 pt-12 text-right">

                            <h2 class="text-xl md:text-2xl font-black text-[#111827] transition group-hover:text-[#00a8e8]">
                                {{ $item->{'title_' . $sign} }}
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