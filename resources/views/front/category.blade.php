 
 

 @extends('layouts.front')

@section('title')
   
{{ __('services') }}  -  {{ $gs->{'title_' . $sign} }}
     
@stop

@section('gsearch')
    <meta property="og:image" content=" {{ $gs->{'logo_' . $sign} }}" />
@stop


@section('content')
    <section class="relative h-screen w-full">


        <div class="relative h-screen w-full  bg-[url('{{ asset('front/gulddal/') }}/images/bannerContacts.jpg')] md:bg-cover bg-center">
            <div class="flex flex-column items-center w-full h-full justify-center" data-carousel-item>


                <div class="text-center text-white bg-black/50 w-full py-10  mb-16">
                    <h2 class="text-4xl font-bold mb-4">
                             {!! $category->{'title_' . $sign} ?? '' !!}</h2>
                    <p class="text-lg max-w-2xl mx-auto">   {!! $category->{'details_' . $sign} ?? '' !!}     </p>

                </div>
            </div>
    </section>


    <!-- <section class="py-12 md:py-16 text-center">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <h1 class="text-4xl md:text-5xl font-bold text-yellow-500 mb-4">منتجات SBP SYSTEMS</h1>
            <p class="text-primary text-lg max-w-2xl mx-auto">اكتشف مجموعتنا المتخصصة من دهانات علامات الطرق عالية
                الأداء، المصممة لتلبية أعلى معايير الجودة والاستدامة.</p>
        </div>
    </section>
 -->
    <section class="pb-12 md:pb-16 -mt-40">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6 md:gap-8">

                 @foreach ($category->services as $parentServices)
                <div
                    class="bg-gray-800 rounded-xl shadow-lg overflow-hidden flex flex-col hover:shadow-xl transition-shadow duration-300">
                    <div class="relative h-48 w-full overflow-hidden">
                        <img src="{!! $parentServices->photo !!} "
                            alt="{!! $parentServices->{'title_' . $sign} ?? '' !!} "
                            class="w-full h-full object-cover transition-transform hover:scale-105 duration-500">
                    </div>
                    <div class="p-6 flex-grow flex flex-col justify-between text-right">
                        <div>
                            <h3 class="text-2xl font-bold text-yellow-500 mb-2">   {!! $parentServices->{'title_' . $sign} ?? '' !!} </h3>
                            <p class="text-primary text-sm mb-4 line-clamp-3">
                              {!! $parentServices->{'short_details_' . $sign} ?? '' !!} 
                            </p>
                        </div>
                        <a href="{{ route('single-service.index', ['lang' => $sign, 'slug' => $parentServices->{'slug_' . $sign}]) }}"
                            class="inline-flex items-center text-accent-blue font-medium hover:text-accent-green transition-colors duration-200 mt-4 flex-row-reverse">
                            {{ __('المزيد') }}
                            <i class="fa-solid fa-arrow-left h-4 w-4 mr-1"></i>
                        </a>
                    </div>
                </div>
                @endforeach
                

            </div>
        </div>
    </section>
   @stop