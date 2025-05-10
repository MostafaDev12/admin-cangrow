 @extends('layouts.front')

@section('title')
   
{{ $service->{'title_' . $sign} }}   -  {{ $gs->{'title_' . $sign} }}
     
@stop

@section('gsearch')
    <meta property="og:image" content=" {{ $gs->{'logo_' . $sign} }}" />
@stop


@section('content')
    <div class="max-w-3xl mx-auto p-4">
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
            <div class="flex items-center justify-center relative">

                <img alt="sdf" data-nimg="fill" class="w-full h-full" sizes="100vw"
                    src="{{ $service->photo }}">
            </div>
        </div>
    </div>
    <!-- footer -->
    @stop