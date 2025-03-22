  <!-- #endregion -->
  @extends('layouts.front')

  @section('title')

      {{ __('الشهادات') }} - {{ $gs->{'title_' . $sign} }}

  @stop

  @section('gsearch')
      <meta property="og:image" content=" {{ $gs->{'logo_' . $sign} }}" />
  @stop


  @section('content')

    <div class="certificate mt-5 pt-5">
        <div class="container pt-5">
            <div class="title_lines">
                <h1>
                    {{ __('الشهادات') }} 
                </h1>
            </div>
            <div class="row pt-5">



                <div class="col-12 col-lg-3 col-md-3 mb-3">
                    
                    <div class="position-relative">
                        <div class="overlay">
                            
                        </div>
                        <img src="img/certificate.jpeg" alt="">
                   </div>
                </div>


                

            </div>
        </div>
    </div>
    @stop