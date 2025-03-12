@extends('layouts.front')

@section('title')
   
{{ __('الخدمات') }}  -  {{ $gs->{'title_' . $sign} }}
     
@stop

@section('gsearch')
    <meta property="og:image" content=" {{ $gs->{'logo_' . $sign} }}" />
@stop


@section('content')


    <div class="header-title ">
        <div class="overlay d-flex justify-content-center align-items-center">
            <h1>{{ __('الخدمات') }} </h1>
        </div>

    </div>
    <div class="service">
        <div class="container">
            <div class="row pt-5">

              @foreach ($categories as $service)
                <div class="col-12 col-lg-4 col-md-4 mb-3">
                    <div class="text-center box service-div ">
                        <div>
                            <img src="{{ $service->photo }}" alt="">
                        </div>
                        <div class=" p-5">
                            <h2 class="fw-bold"> {{ $service->{'title_' . $sign} }}   </h2>
                            <a href="{{ route('single-category-service.index',['slug' => $service->{'slug_' . $sign} ]) }}/"><span class="mt-3 d-block"> {{ __('المزيد') }}<i
                                        class="fa-solid fa-angles-left"></i></span></a>
                        </div>
                    </div>
                </div> 
                @endforeach


            </div>
        </div>
    </div>  

@stop