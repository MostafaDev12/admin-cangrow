 
  
   @extends('layouts.front')

@section('title')
   
{{ __('من نحن') }} -  {{ $gs->{'title_' . $sign} }}
     
@stop

@section('gsearch')
    <meta property="og:image" content=" {{ $gs->{'logo_' . $sign} }}" />
@stop

@section('css')

 @stop

@section('content')
 
  


    <main>
        <section class="py-16 md:py-24 overflow-hidden min-h-screen flex items-center justify-center">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative">

                <div class="hidden lg:block absolute top-1/2 -translate-y-1/2 start-1/2 translate-x-3/4 w-48 h-80 z-[-1]"
                    style="background-image: radial-gradient(circle at center, #d1d5db 1px, transparent 1.5px); background-size: 1.25rem 1.25rem;">
                </div>

                <div class="grid grid-cols-1 lg:grid-cols-5 gap-16 lg:gap-24 items-center">

                    <div class="lg:col-span-2 relative mt-20 lg:mt-0">
                        <img src="{{ $team->photo_url }}" alt="أطفال مبتسمون"
                            class="w-full h-auto rounded-lg shadow-xl object-cover">

                        
                    </div>

                  <div class="lg:col-span-3">
    <div class="mb-8">

        <div class="mb-12 max-w-3xl mx-auto">
            <div class="relative mb-10">
                <h1 class="text-sm font-extrabold text-custom-orange mb-4">
                    من هي
                </h1>
            </div>

            <p class="text-lg text-gray-600 leading-relaxed">
               {!! $team->{'name_' . $sign} ?? '' !!}
            </p>
            <div class="w-20 h-1.5 bg-custom-orange rounded-full"></div>
        </div>

    </div>

    <p class="text-lg text-gray-700 leading-relaxed mb-8">
       {!! $team->{'details_' . $sign} ?? '' !!}
    </p>

    
</div>


                </div>
            </div>
        </section>
     
    </main>

  @stop