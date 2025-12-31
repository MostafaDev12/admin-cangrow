 
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
        @foreach ($achievements as $achievement)
            
        <section class="flex justify-center items-center min-h-screen">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <img src="{{ $achievement->photo }}" alt="">
            </div>
        </section>

        @endforeach

       
         @include('includes.share')

    </main>
@stop