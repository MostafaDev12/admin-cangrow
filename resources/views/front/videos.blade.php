@extends('layouts.front')

@section('title')
   
{{ __('فيديوهاتنا') }}  -  {{ $gs->{'title_' . $sign} }}
     
@stop

@section('gsearch')
    <meta property="og:image" content=" {{ $gs->{'logo_' . $sign} }}" />
@stop


@section('content')

    <div class="videos mt-5 pt-5">
        <div class="container pt-5">
            <div class="title_lines">
                <h1>
 {{ __('فيديوهاتنا') }}
                </h1>
            </div>
            <div class="row pt-5">
                @foreach($videos as $video)
                <div class="col-12 col-lg-4 col-md-4 mb-3">
                    <div>
                        <iframe width="400px" height="250px" src="{{$video->youtube_url}}" frameborder="0" allowfullscreen></iframe>
                        <h2 class="desc-video">{{ $video->{'title_' . $sign} }} </h2>
                        {{-- <p>{!! $video->{'details_' . $sign} !!}</p> --}}
                   </div>
                </div>
                
                @endforeach
            </div>
        </div>
    </div>
   @stop