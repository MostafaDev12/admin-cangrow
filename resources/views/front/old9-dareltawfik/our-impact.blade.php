 
  
   @extends('layouts.front')

@section('title')
   
{{ __('انتشارنا') }} -  {{ $gs->{'title_' . $sign} }}
     
@stop

@section('gsearch')
    <meta property="og:image" content=" {{ $gs->{'logo_' . $sign} }}" />
@stop

@section('css')

 @stop

@section('content')
 

    <main>

        <section class="py-16 md:py-24">
            <div class="container mx-auto px-4">




                <div class="text-center mb-12 max-w-3xl mx-auto">
                    <div class="relative mb-10">
                        <h1 class="text-sm font-extrabold text-custom-orange  mb-4">
                               {{ __('اماكن تواجد مؤسسة دار التوفيق') }}
                        </h1>

                    </div>
                    <p class="text-lg text-gray-600 leading-relaxed">
                     {{ __('نعمل في مختلف مجالات التنمية وننفذ مشروعاتنا في كافه محافظات مصر عن طريق مكاتبنا أو من خلال الجمعيات المتعاونة لدينا 11 مكتباً و22 جمعية توزيعهم الجغرافي.') }}
                    </p>
                </div>


            </div>
            @foreach ($locations as $location)
               
            <div class="rounded-lg overflow-hidden shadow-xl border border-gray-200">
                <iframe
                    src="{{ $location->map }}"
                    width="100%" height="600" style="border:0;" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade">
                </iframe>
            </div>
 
            @endforeach
            </div>
        </section>

        @include('includes.share')

    </main>

 @stop