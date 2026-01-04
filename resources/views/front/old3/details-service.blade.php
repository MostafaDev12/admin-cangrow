 @extends('layouts.front')

@section('title')
   
{{ $service->{'title_' . $sign} }}   -  {{ $gs->{'title_' . $sign} }}
     
@stop

@section('gsearch')
    <meta property="og:image" content=" {{ $gs->{'logo_' . $sign} }}" />
@stop


@section('content')
<section class="flex items-center justify-center flex-col min-h-screen">
      <div class="container mx-auto px-4">

        <h1 class="text-3xl font-bold mb-4">  {{ $service->{'title_' . $sign} }}   </h1>
        {{-- <div class="flex items-center mb-2"><span
                class="bg-gray-200 text-gray-700 px-3 py-1 rounded-full text-sm mr-2">عاملات نظافة</span><span
                class="text-gray-500 text-sm">10 أكتوبر 2023</span></div> --}}
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
            <div>
               <p>
                                {!! $service->{'details_' . $sign} !!}
                            </p>
            </div>
           <div class="relative w-full max-h-96 min-h-56 sm:min-h-96 sm:max-h-96 rounded-xl overflow-hidden shadow-md bg-white flex items-center justify-center">
  <img 
    src="{{ $service->photo }}" 
    alt="Service Image" 
    class="max-w-full max-h-full object-contain p-4"
  />
              <!-- Optional overlay or label -->
          <div class="absolute bottom-0 left-0 right-0 bg-black bg-opacity-40 text-white p-4 text-sm">
            <p>{{ $service->{'title_' . $sign} }} </p>
          </div>
        </div>

        </div>
                </div>

    </section>
    <!-- footer -->
    @stop