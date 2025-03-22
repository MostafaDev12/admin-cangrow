 <!-- #endregion -->
 @extends('layouts.front')

 @section('title')
    
 {{ __('عن الشركة') }}  -  {{ $gs->{'title_' . $sign} }}
      
 @stop
 
 @section('gsearch')
     <meta property="og:image" content=" {{ $gs->{'logo_' . $sign} }}" />
 @stop
 
 
 @section('content')
 
    <div class="about-us mt-5 pt-5">
        <div class="container pt-5">
            <div class="title_lines">
                <h1>
                  {{ __('عن الشركة') }}  
                </h1>
            </div>
            <div class="row">
                <div class="">
                    <div class="text-center animate__animated animate__fadeInRight" data-wow-delay="1s" data-wow-duration="1s">
                        <img width="100%" height="400px" class="m-auto" src="{{ $ps->about_photo }}" alt="">
                    </div>
                </div>
                <div class="">
                    <div class="pt-5 animate__animated animate__fadeInLeft " data-wow-delay="0.5s" data-wow-duration="1s">
                        <h2> {{ __('Cairo solar') }} </h2>
                        <p >    {!! $ps->{'about_details_' . $sign} !!}  </p>
                    </div>
                </div>

            </div>
        </div>
    </div>

    
    <div class="mission text-center mt-5 p-5">
        <div class="container-fluid">
            <div class="row">

              @foreach ($models as $model)
                <div class="col-12 col-lg-6 col-md-6">
                    <div class="border p-4 mb-3">
                        <img src="{{ $model->photo_url }}" width="120px" height="120px" alt="">
                        <h1>{{ $model->{'title_' . $sign}  ?? ''}}</h1>
                        
                        <p>  {{ $model->{'details_' . $sign}  ?? ''}}  
                            </p>
                    </div>
                </div>
                @endforeach


            </div>
        </div>
    </div>


    <div class="team p-2">
      <div class="container">
        <div class="title_lines">
          <h1>
              {{ __('فريقنا') }}  
          </h1>
      </div>
        <div class="row">

          @foreach ($teams as $team)
          <div class="col-12 col-lg-4 col-md-6">
            <div class="div-team">
              <img src="{{ $team->photo_url }}" alt="">
              <h1>{{ $team->{'title_' . $sign}  ?? ''}}</h1>
             
              <p>    {!! $team->{'details_' . $sign}  ?? ''!!}  </p>
            </div>
          </div>
          @endforeach
 

        </div>
      </div>
    </div>

     @stop