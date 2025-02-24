  
@extends('layouts.front')

@section('title')
   
{{ $category->{'title_' . $sign} }}   -  {{ $gs->{'title_' . $sign} }}
     
@stop

@section('gsearch')
    <meta property="og:image" content=" {{ $gs->{'logo_' . $sign} }}" />
@stop


@section('content')
@php
$phones =  explode(',', $gs->phones);
 
$randomPhone = Arr::random($phones);
@endphp

    <div class="title-category">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="d-flex justify-content-around align-items-center">
                        <h1>{{ __('المقالات') }}</h1>
                        <div>
                            <p> {{ __('Category') }}:  {{ $category->{'title_' . $sign} }}  </p>
                            <a href="{{ route('blogs.index') }}">{{ __('المقالات') }}</a><span>
                                << </span><a href="{{ route('front.index') }}">{{ __('الرئيسيه') }}</a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    @php
        
        $blogs = $category->blogs()->paginate(9);
    @endphp
    <div class="blogs">
        <div class="container">
            <div class="row pt-5">
              @foreach($blogs as $blog)
              <div class="col-12 col-lg-4 col-md-4 mb-3">
                  <div class="box blogs-div ">
                      <div>
                          <a href="{{ route('single-blog.index',$blog->{'slug_' . $sign}) }}"><img src="{{ $blog->photo }}" alt=""></a>
                      </div>
                      <div class="p-4">
                          <h2 class="fw-bold"> <a href="{{ route('single-blog.index',$blog->{'slug_' . $sign}) }}"> {{ $blog->{'title_' . $sign} }} </a></h2>
                          <p class="fw-bold"> {{ $blog->{'short_details_' . $sign} }} </p>
                          <a href="{{ route('single-blog.index',$blog->{'slug_' . $sign}) }}"><span class="mt-3 d-block"> {{ __('المزيد') }}<i
                                      class="fa-solid fa-angles-left"></i></span></a>
                          <hr>
                          <p class="date-blogs"> {{ $blog->blog_date }} </p>
                      </div>
                  </div>
              </div>
              @endforeach
            </div>
            {{ $blogs->links('includes.pagination.custom') }}

        </div>
    </div>
   @stop