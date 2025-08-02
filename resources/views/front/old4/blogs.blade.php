  
@extends('layouts.front')

@section('title')
   
{{ __('المقالات') }}  -  {{ $gs->{'title_' . $sign} }}
     
@stop

@section('gsearch')
    <meta property="og:image" content=" {{ $gs->{'logo_' . $sign} }}" />
@stop


@section('content')

  <div class="blog ">
    <div class="container p-lg-5">
        <div class="title">
            <h1 class="text-center">{{ __('المقالات') }}</h1>
            <p class="text-center">  {{ __('نقدم لك مقالات متنوعة حول المصاعد، صيانتها، وتركيبها. تابعنا لمزيد من المعلومات.') }}</p>
        </div>
        <div class="row">
           @foreach($blogs as $blog)
            <div class="col-12 col-lg-4 col-md-6 mb-3">
                <div class="blog-card">
                    <img src="{{ $blog->photo }}" alt="">
                    <h2> {{ $blog->{'title_' . $sign} }}   </h2>
                    <p>  {{ $blog->{'short_details_' . $sign} }}  </p>
                    <a href="{{ route('single-blog.index',$blog->{'slug_' . $sign}) }}" class="btn-blog"> {{ __('اقرأ المزيد') }}</a>
                </div>

            </div> 
            @endforeach
        </div>
         {{ $blogs->links('includes.pagination.custom') }}
    </div>
  </div>
 @stop