@extends('layouts.front')

@section('title')
   
{{ __('الصور') }}  -  {{ $gs->{'title_' . $sign} }}
     
@stop

@section('gsearch')
    <meta property="og:image" content=" {{ $gs->{'logo_' . $sign} }}" />
@stop


@section('content')


    <div class="photo-page mt-5 pt-5">
        <div class="container pt-5">
            <div class="title_lines">
                <h1>
                    {{ __('الصور') }}
                </h1>
            </div>
            <div class="row pt-5">
                @foreach ($projects as $project)
                <div class="col-12 col-lg-6 col-md-3 mb-3">
                    
                    <div class="position-relative photo">
                        <div class="overlay ">
                            <h1>   {{ $project->{'title_' . $sign} }}   </h1>    
                        </div>
                        <img src="{{ $project->photo_url }}" alt="">
                   </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
     @stop