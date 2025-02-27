@extends('layouts.front')

@section('title')
   
{{ __('مشاريعنا') }}  -  {{ $gs->{'title_' . $sign} }}
     
@stop

@section('gsearch')
    <meta property="og:image" content=" {{ $gs->{'logo_' . $sign} }}" />
@stop


@section('content')


    <div class="blogs mt-5 pt-5">
        <div class="container pt-5">
            <div class="title_lines">
                <h1>
                    {{ __('مشاريعنا') }}
                </h1>
            </div>
            <div class="row pt-5">

              @foreach ($projects as $project)
                <div class="col-12 col-lg-4 col-md-6 mb-3">
                    <div class="position-relative">
                        <div class="card">
                            <img class="card-img-top" src="{{ $project->photo_url }}" alt="Card image cap">
                            <div class="card-body">
                                <h5 class="card-title"> {{ $project->{'title_' . $sign} }}  </h5>
                                <p class="card-text">{{ $project->{'details_' . $sign} }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
 
                
            </div>
        </div>
    </div>
    @stop