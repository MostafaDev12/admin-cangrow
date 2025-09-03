   @extends('layouts.front')

@section('title')
   
{{ __('عن الشركه') }} -  {{ $gs->{'title_' . $sign} }}
     
@stop

@section('gsearch')
    <meta property="og:image" content=" {{ $gs->{'logo_' . $sign} }}" />
@stop

@section('css')

 @stop
@section('content')

  <section class="header-title ">
    <div class="overlay d-flex justify-content-center align-items-center">
      <h1> {{ __('عن الشركه') }}</h1>
    </div>

  </section>
  <section id="about" class="about pt-5 pb-5">
    <div class="container">
      <div class="row">
        <div class="col-12 col-lg-6">
          <img src="{{ $ps->about_photo }}" alt="About Image">
        </div>
        <div class="col-12 col-lg-6">
          <div class="">
            <h2>  {{ $ps->{'about_title_' . $sign} ?? '' }}   </h2>
            <p>   {!! $ps->{'about_details_' . $sign} ?? '' !!} 
            </p>
           
          </div>
        </div>
      </div>
      <div class="row">
 @foreach ($processes as $k => $process)
                     @php
                         $icon = ['fas fa-bullseye', 'fas fa-rocket', 'fas fa-eye', 'fas fa-star'];
                     @endphp
                     <div class="col-12 col-lg-3 col-md-6">
                         <div class="about-box ">
                             <i class=" {{ $icon[$k] ?? 'fas fa-star' }} fa-2x  animated-icon"></i>

                             <!-- <img src="img/target.png" class="floating" alt="About Image"> -->
                             <h3>{{ $process->{'title_' . $sign} ?? '' }} </h3>
                             <p> {{ $process->{'details_' . $sign} ?? '' }}
                             </p>
                         </div>
                     </div>
                 @endforeach
        {{-- <div class="col-12 col-lg-3 col-md-6">
          <div class="about-box ">
            <i class="fas fa-bullseye fa-2x  animated-icon"></i>

            <!-- <img src="img/target.png" class="floating" alt="About Image"> -->
            <h3>أهدافنا </h3>
            <p>واحدة من قيمنا الأساسية هي الابتكار. نبقى على اطلاع دائم بأحدث اتجاهات الصناعة والتقدم التكنولوجي...
            </p>
          </div>
        </div> --}}
         
      </div>
    </div>
  </section>
    @include('includes.form')
   

 @stop
