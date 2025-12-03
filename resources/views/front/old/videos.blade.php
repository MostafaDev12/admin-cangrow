 
@extends('layouts.front')

@section('title')
   
{{ __('فيديوهات') }}  -  {{ $gs->{'title_' . $sign} }}
     
@stop

@section('gsearch')
    <meta property="og:image" content=" {{ $gs->{'logo_' . $sign} }}" />
@stop


@section('content')


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
                    <div>
                        <iframe width="400" height="315"
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