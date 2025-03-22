  <!-- #endregion -->
  @extends('layouts.front')

  @section('title')

      {{ __('عن الشركة') }} - {{ $gs->{'title_' . $sign} }}

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
                  <div class="col-12 col-lg-6 col-md-6">
                      <div class="pt-5 animate__animated animate__fadeInLeft " data-wow-delay="0.5s" data-wow-duration="1s">
                          <h2> {!! $ps->{'about_title_' . $sign} !!}</h2>
                          <p> {!! $ps->{'about_details_' . $sign} !!} </p>
                      </div>
                  </div>
                  <div class="col-12 col-lg-6 col-md-6">
                      <div class="text-center animate__animated animate__fadeInRight" data-wow-delay="1s"
                          data-wow-duration="1s">
                          <img width="400px" height="400px" class="m-auto" src="{{ $ps->about_photo }}" alt="">
                      </div>
                  </div>
              </div>
          </div>
      </div>


      @foreach ($models as $k => $model)
          @if ($k %= 2)
              <div class="about-us">
                  <div class="container pt-5">
                      <div class="title_lines">
                          <h1>
                              {{ $model->{'title_' . $sign} ?? '' }}
                          </h1>
                      </div>
                      <div class="row">
                          <div class="col-12 col-lg-6 col-md-6">
                              <div class="text-center wow animate__animated animate__fadeInLeft" data-wow-delay="0.5s"
                                  data-wow-duration="1s">
                                  <img width="400px" height="400px" class="m-auto" src="{{ $model->photo_url }}"
                                      alt="">
                              </div>
                          </div>
                          <div class="col-12 col-lg-6 col-md-6">
                              <div class="pt-5 wow animate__animated animate__fadeInRight" data-wow-delay="0.5s"
                                  data-wow-duration="1s">
                                  {{-- <h2>RGS Company</h2> --}}
                                  <p> {{ $model->{'details_' . $sign} ?? '' }} </p>
                              </div>
                          </div>

                      </div>
                  </div>
              </div>
          @else
              <div class="about-us">
                  <div class="container pt-5">
                      <div class="title_lines">
                          <h1>
                              {{ $model->{'title_' . $sign} ?? '' }}
                          </h1>
                      </div>
                      <div class="row">
                          <div class="col-12 col-lg-6 col-md-6">
                              <div class="pt-5 wow animate__animated animate__fadeInLeft" data-wow-delay="0.5s"
                                  data-wow-duration="1s">
                                  {{-- <h2>RGS Company</h2> --}}
                                  <p> {{ $model->{'details_' . $sign} ?? '' }} </p>
                              </div>
                          </div>
                          <div class="col-12 col-lg-6 col-md-6">
                              <div class="text-center wow animate__animated animate__fadeInRight">
                                  <img width="400px" height="400px" class="m-auto" src="{{ $model->photo_url }}" alt="">
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          @endif
      @endforeach



      @include('includes.contact-form', ['classes' => 'p-5'])

  @stop
