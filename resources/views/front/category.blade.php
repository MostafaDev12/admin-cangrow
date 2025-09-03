      @extends('layouts.front')

  @section('title')

{{ $category->{'title_' . $sign}  }} - {{ $gs->{'title_' . $sign} }}

  @stop

  @section('gsearch')
      <meta property="og:image" content=" {{ $gs->{'logo_' . $sign} }}" />
  @stop

  @section('css')
     <link rel="stylesheet" href="{{ asset('front/highline/') }}/css/articles.css">
  @stop
  @section('content')


  <section class="header-title ">
    <div class="overlay d-flex justify-content-center align-items-center">
      <h1> {{ $category->{'title_' . $sign}  }}</h1>
    </div>

  </section>

  <div class="articles" id="articles">
        <h2 class="main-title">{{ $category->{'title_' . $sign}  }}</h2>
        <div class="container">
           @foreach($servicess as $service) 
            <div class="box">
                <img src="{{ $service->photo }}" alt="">
                <div class="content">
                    <h3> {{ $service->{'title_' . $sign} }} </h3>
                    <p>{{ $service->{'short_details_' . $sign} }}</p>
                </div>
                <div class="info">
                    <a href="{{ route('single-service.index', ['lang' => $sign, 'slug' => $service->{'slug_' . $sign}]) }}"> {{ __('عرض المزيد') }}</a>
                    <i class="fas fa-long-arrow-alt-right"></i>
                </div>
            </div>
             @endforeach
        </div>
        
      <div id="pagination" class="flex my-10 justify-center space-x-2">
             {{ $servicess->links('includes.pagination.custom') }}
        </div>
    </div>
  
@stop