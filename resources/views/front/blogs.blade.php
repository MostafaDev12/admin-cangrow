    
@extends('layouts.front')

@section('title')
   
{{ __('مقالات') }}  -  {{ $gs->{'title_' . $sign} }}
     
@stop

@section('gsearch')
    <meta property="og:image" content=" {{ $gs->{'logo_' . $sign} }}" />
@stop


@section('content')

    <div class="blogs text-center mt-5 pt-5">
        <div class="container pt-5">
            <div class="title_lines">
                <h1>
                    {{ __('مقالات') }} 
                </h1>
            </div>
            <div class="row pt-5">

                @foreach($blogs as $blog)
                <div class="col-12 col-lg-3 col-md-3 mb-3">
                    
                    <div class="position-relative">
                         <div class="card" style="width: 18rem;">
                            <span>  {{ optional($blog->category)->{'title_' . $sign}  }} </span>
                        <img class="card-img-top" src="{{ $blog->photo_url }}" alt="Card image cap">
                        <div class="card-body">
                          <h5 class="card-title">{{ $blog->{'title_' . $sign} }}</h5>
                         <p class="card-text">{{ $blog->{'short_details_' . $sign} }}   </p>

                          <a href="{{ route('single-blog.index',['year'=> $date->year,'month'=> $date->month,'day'=> $date->day,'blog' => $blog->{'slug_' . $sign}]) }}" class="btn">{{ __('المزيد') }}</a>
                        </div>
                      </div>
                   </div>
                </div>

                @endforeach
                
               
                
            </div>
            {{ $blogs->links('includes.pagination.custom') }}
        </div>
    </div>
     @stop