@extends('layouts.front')

@section('title')
   
{{ $blog->{'title_' . $sign} }}   -  {{ $gs->{'title_' . $sign} }}
     
@stop

@section('gsearch')
    <meta property="og:image" content=" {{ $gs->{'logo_' . $sign} }}" />
@stop


@section('content')
@php
$phones =  explode(',', $gs->phones);
 
$randomPhone = Arr::random($phones);
@endphp
    <main>
        <section class="my-5">
            <div class="about">
                <div class="container">
                    <div class="row mb-4  ">
                        <div class="col-12 col-md-6">
                            <h2>
                                {{ $blog->{'title_' . $sign} }} 
                            </h2>
                            <p>
                                {!! $blog->{'details_' . $sign} !!}  
                            </p>
                            
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="gallery-wrapper">
                                <figure>
                                    <img class="w-100 h-100"
                                        src="{{ $blog->photo }}"
                                        alt="">
                                </figure>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
        </section>
    </main>

   @stop