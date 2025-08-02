@extends('layouts.front')

@section('title')
   
{{ __('عن الشركة') }}  -  {{ $gs->{'title_' . $sign} }}
     
@stop

@section('gsearch')
    <meta property="og:image" content=" {{ $gs->{'logo_' . $sign} }}" />
@stop


@section('content')

    <main>
        <section class="my-5">
            <div class="about">
                <div class="container">
                    <div class="row mb-4 box-invisible">
                        <div class="col-12 col-md-6">
                            <h2>  
                                {{ $ps->{'about_title_' . $sign}  ?? ''}}
                            </h2>
                            <p>
                                {{ $ps->{'about_details_' . $sign}  ?? ''}}
                            </p>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="gallery-wrapper">
                                <figure>
                                    <img class="w-100 h-100" src="{{ $ps->about_photo }}" alt="">
                                </figure>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-12 col-md-6">
                            <h4>
                                {{ $ps->{'portfolio_title_' . $sign}  ?? ''}}
                            </h4>
                            <p>
                                {!! $ps->{'portfolio_details_' . $sign}  ?? '' !!}
                            </p>
                             

                        </div>
                        <div class="col-12 col-md-6">
                            <div class="gallery-wrapper">
                                <img class="w-100 h-100" src="{{ $ps->portfolio_photo }}" alt="">
                            </div>
                        </div>
                    </div>
                    
                    <div class="row mb-4 box-invisible">
                        <h4>      

                            {{ __(key: 'ما هي تخصصات مركز دكتوره هبه متولي؟') }}	
                        </h4>
                    </div>
                    <div class="row mb-4 box-invisible">

                        @foreach ($models as $model)
                        <div class="col-12 col-md-6 mb-4">
                            <div class="card p-4">
                                <div class="icon-box feature">
                                    <i class="fa fa-solid fa-stethoscope"></i>
                                </div>
                                <h4>  {{ $model->{'title_' . $sign}  ?? ''}} 
                                </h4>
                                <ul>
                                    @foreach ($model->models as $mode)
                                    <li>   {{ $mode->{'title_' . $sign}  ?? ''}} 
                                    </li>
                                    @endforeach
                                   
                                </ul>
                            </div>
                        </div>
                        @endforeach
                       

                    </div>
                </div>
            </div>
        </section>
    </main>

   @stop