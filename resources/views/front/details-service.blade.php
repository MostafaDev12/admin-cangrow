@extends('layouts.front')

@section('title')
   
{{ $service->{'title_' . $sign} }}   -  {{ $gs->{'title_' . $sign} }}
     
@stop

@section('gsearch')
    <meta property="og:image" content=" {{ $gs->{'logo_' . $sign} }}" />
@stop


@section('content')

    <div class="details mt-5 pt-5">
        <div class="container pt-5">
            <div class="title_lines ">
                <h1>
                  {{ $service->{'title_' . $sign} }}
                </h1>
            </div>
            <div class="row">
                <div class="col-12 col-lg-12 col-md-6 mb-5">
                    <div class="carousel">

                      @foreach ($service->galleries as $gallery)
                           <img
                          class="item"
                          src="{{ $gallery->photo_url }}"
                          alt=""
                        />
                        
                        
                      @endforeach
                     
                      </div>
                </div>
                <div class="col-12 col-lg-12 col-md-6 mb-5">
                    <div class="pt-5 wow animate__animated animate__fadeInRight" data-wow-delay="1s" data-wow-duration="1s">
                      {!! $service->{'details_' . $sign} !!}
                         
                    </div>
                </div>
            </div>
        </div>
    </div>
  
@include('includes.contact-form',['classes' => 'p-5'])
 

@stop