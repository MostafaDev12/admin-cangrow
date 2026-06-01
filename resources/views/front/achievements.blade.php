 
 @extends('layouts.front')

 @section('title')

    {{ __('الإنجازات') }} - {{ $gs->{'title_' . $sign} }}

 @stop

 @section('gsearch')
     <meta property="og:image" content=" {{ $gs->{'logo_' . $sign} }}" />
 @stop

 @section('css')

 @stop

 @section('content')


    <main>
        <!--@foreach ($achievements as $achievement)-->
            
        <!--<section class="flex justify-center items-center min-h-screen">-->
        <!--    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">-->
        <!--        <img src="{{ $achievement->photo }}" alt="">-->
        <!--    </div>-->
        <!--</section>-->

        <!--@endforeach-->

       <div class="max-w-3xl mx-auto my-10 bg-white rounded-2xl shadow-xl overflow-hidden">
    
    <!-- Header -->
   
    <!-- Iframe Container -->
        <div class="p-6">
            <div class="relative w-full overflow-hidden rounded-xl">
                <iframe 
                    src="https://drive.google.com/file/d/1DkugNuMhmv4xbzwP6H4p64dXLGWvzVG9/preview"
                    class="w-full h-[500px] rounded-lg"
                    allow="autoplay">
                </iframe>
            </div>
        </div>

    </div>
         @include('includes.share')

    </main>
@stop