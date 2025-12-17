 
@extends('layouts.front')

@section('title')
   
{{ __('فيديوهات') }}  -  {{ $gs->{'title_' . $sign} }}
     
@stop

@section('gsearch')
    <meta property="og:image" content=" {{ $gs->{'logo_' . $sign} }}" />
@stop


@section('content')
<style>
    .video-card {
        border: 2px solid #4ac8de;
        border-radius: 10px;
        overflow: hidden;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        transition:
            transform 0.3s,
            box-shadow 0.3s;
        height: 300px;
        width: 100%;
    }

</style>

    <div class="header-title ">
        <div class="overlay d-flex justify-content-center align-items-center">
            <h1>{{ __('فيديوهات') }}</h1>
        </div>

    </div>
    <div class="videos">
        <div class="container">
            <div class="row pt-5">

              @foreach($videos as $video)
                <div class="col-12 col-lg-4 col-md-4 mb-3">
                    <div class="video-card ">
                        <iframe width="100%" height="100%" 
                            src="{{$video->youtube_url}}"
                            title="YouTube video player" frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                            referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>

                    </div>
                </div>
                @endforeach
                
            </div>

            {{ $videos->links('includes.pagination.custom') }}
        </div>
    </div>
    
    @stop