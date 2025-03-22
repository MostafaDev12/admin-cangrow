@extends('layouts.front')

@section('title')
   
{{ __('الخدمات') }}  -  {{ $gs->{'title_' . $sign} }}
     
@stop

@section('gsearch')
    <meta property="og:image" content=" {{ $gs->{'logo_' . $sign} }}" />
@stop


@section('content')


    <div class="service mt-5 pt-5">
        <div class="container pt-5">
            <div class="title_lines">
                <h1>
                {{ __('خدمتنا') }}
                </h1>
            </div>
            <div class="row pt-5 text-center">

              @foreach ($services as $service)
                <div class="col-12 col-lg-3 col-md-3 mb-3">
                    
                    <div class="position-relative">
                         <div class="card">
                        <img class="card-img-top" src="{{ $service->photo_url }}" alt="Card image cap">
                        <div class="card-body">
                          <h5 class="card-title">   {{ $service->{'title_' . $sign} }}</h5>
                    
                          <a href="{{ route('single-service.index',['slug' => $service->{'slug_' . $sign} ]) }}" class="btn">{{ __('المزيد') }}</a>
                        </div>
                      </div>
                   </div>
                </div>
                @endforeach
  
                 
            </div>
        </div>
    </div>

    @stop