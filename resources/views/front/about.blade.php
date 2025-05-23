 @extends('layouts.front')

@section('title')
   
{{ __('عن الشركة') }}  -  {{ $gs->{'title_' . $sign} }}
     
@stop

@section('gsearch')
    <meta property="og:image" content=" {{ $gs->{'logo_' . $sign} }}" />
@stop


@section('content')

  <div id="about" class="about pt-2 pb-5">
    <div class="container p-lg-5">
      <div class="row">
        
        <div class="col-12 mt-4 ">
          <img src="{{ $ps->about_photo }}" alt="About Image">
        </div>
        <div class="col-12 ">
            <div class="">
              <h2> {{ $ps->{'about_title_' . $sign}  ?? ''}}    </h2>
            {!! $ps->{'about_details_' . $sign}  ?? ''!!}
            </div>
          </div>
      </div>
      <div class="row ">

@foreach ($models as $model)
        
        <div class="col-12 col-lg-3 col-md-6">
          <div class="about-box">
            <img src="{{ $model->photo }}" alt="About Image">
            <h3> {{ $model->{'title_' . $sign} }}  </h3>
            <p>  {{ $model->{'details_' . $sign}  ?? ''}}</p>
          </div>
        </div>

        @endforeach
      </div>
    </div>
  </div>
  
   @include('includes.book')


@stop



 