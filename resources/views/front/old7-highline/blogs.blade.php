      @extends('layouts.front')

  @section('title')

      {{ __('مقالات') }} - {{ $gs->{'title_' . $sign} }}

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
      <h1> {{ __('مقالات') }}</h1>
    </div>

  </section>

  <div class="articles" id="articles">
        <h2 class="main-title">{{ __('مقالات') }}</h2>
        <div class="container">
           @foreach($blogs as $blog) 
            <div class="box">
                <img src="{{ $blog->photo }}" alt="">
                <div class="content">
                    <h3> {{ $blog->{'title_' . $sign} }} </h3>
                    <p>{{ $blog->{'short_details_' . $sign} }}</p>
                </div>
                <div class="info">
                    <a href="{{ route('single-blog.index',['lang'=> $sign , 'blog' =>$blog->{'slug_' . $sign} ]) }}"> {{ __('عرض المزيد') }}</a>
                    <i class="fas fa-long-arrow-alt-right"></i>
                </div>
            </div>
             @endforeach
        </div>
        
      <div id="pagination" class="flex my-10 justify-center space-x-2">
             {{ $blogs->links('includes.pagination.custom') }}
        </div>
    </div>
  
@stop