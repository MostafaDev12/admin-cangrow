
@extends('layouts.front')

@section('title')
   
{{ __('فيديوهات') }}  -  {{ $gs->{'title_' . $sign} }}
     
@stop

@section('gsearch')
    <meta property="og:image" content=" {{ $gs->{'logo_' . $sign} }}" />
@stop


@section('content')


    <div class="videos mt-5 pt-5">
        <div class="container pt-5">
            <div class="title_lines">
                <h1>
                  {{ __('فيديوهات') }}
                </h1>
                
            </div>
            <p >  {{ __('شاهد هذا الفيديو لفهم أنواع المحطات الشمسية المختلفة') }}             </p>
            <div class="row pt-5">
              @foreach($videos as $video)
                <div class="col-12 col-lg-6 col-md-4 mb-3">
                    <div>
                         <iframe width="100%" height="300px" src="{{$video->youtube_url}}"
              title="YouTube video player" frameborder="0"
              allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
              referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                       <h2 class="desc-video">Station Type A: Companies, Factories, Schools, Farms and Hotels</h2>
                       <p>المحطة نوع أ: الشركات والمصانع والمدارس والمزارع والفنادق</p>
                   </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    @stop