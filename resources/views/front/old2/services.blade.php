@extends('layouts.front')

@section('title')
   
{{ __('الخدمات') }}  -  {{ $gs->{'title_' . $sign} }}
     
@stop

@section('gsearch')
    <meta property="og:image" content=" {{ $gs->{'logo_' . $sign} }}" />
@stop


@section('content')


    <main>
        <section class="my-5">
            <div class="about">
                <div class="container">
                    <div class="row">
                        @foreach ($services as $service)
                        <div class="col-12 col-md-4">
                            <div class="gallery-wrapper">
                                <div class="card p-0 m-0">
                                    <figure style="height: 400px;">
                                        <img class="w-100 h-100"
                                            src="{{ $service->photo }}"
                                            alt="">
                                    </figure>
                                    <h4 class="py-3">
                                        <a href="{{ route('single-service.index',['slug' => $service->{'slug_' . $sign} ]) }}">
                                        {{ $service->{'title_' . $sign} }}    
                                    </a>
                                    </h4>
                                </div>

                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>
    </main>

 @stop