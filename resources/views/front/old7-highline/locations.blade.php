 
    @extends('layouts.front')

  @section('title')

      {{ __('معارضنا') }} - {{ $gs->{'title_' . $sign} }}

  @stop

  @section('gsearch')
      <meta property="og:image" content=" {{ $gs->{'logo_' . $sign} }}" />
  @stop


  @section('content')
    <section class="header-title ">
    <div class="overlay d-flex justify-content-center align-items-center">
      <h1>  {{ __('معارضنا') }} </h1>
    </div>

  </section>
  <!-- Contact Section -->
  <section class="contact-section py-5">

   @foreach ($locations as $k=>$location)
   @if ($k % 2)
     
    <div class="container">
      <!-- Section Title with Animation -->
      <h2 class=" main-title text-center mb-5 animate__animated animate__fadeInDown"> {{ $location->{'title_' . $sign} }}
      </h2>

      <!-- Grid Layout (Row with Two Columns) -->
      <div class="row g-4 align-items-center">

        <!-- Left Column: Contact Info -->
        <div class="col-md-6 animate__animated animate__fadeInLeft">
          <div class="contact-info p-4 bg-light text-dark rounded shadow-sm h-100">
            <h4> {{ __('عنوان المعرض') }}</h4>
            <p><i class="fas fa-map-marker-alt me-2"></i>
               {{ $location->{'address_' . $sign} }}</p>

            <h4 class="mt-4"> {{ __('رقم الهاتف') }}</h4>
            <p><i class="fas fa-phone me-2"></i> {{ $location->book_link }}</p>

            
          </div>
        </div>

        <!-- Right Column: Map -->
        <div class="col-md-6 animate__animated animate__fadeInRight">
          <div class="map-container rounded shadow-sm overflow-hidden h-100">
            <!-- Replace with your actual Google Map Embed URL -->
            <iframe
              src="{{ $location->map }}"
              width="100%" height="350" style="border:0;" allowfullscreen="" loading="lazy"
              referrerpolicy="no-referrer-when-downgrade" class="rounded"></iframe>
          </div>
        </div>
      </div>
    </div>

   @else
     
    <div class="container">
      <!-- Section Title with Animation -->
      <h2 class="main-title text-center my-5 animate__animated animate__fadeInDown"> {{ $location->{'title_' . $sign} }}</h2>

      <!-- Grid Layout (Row with Two Columns) -->
      <div class="row g-4 align-items-center flex-row-reverse">

        <!-- Left Column: Contact Info -->
        <div class="col-md-6 animate__animated animate__fadeInRight">
          <div class="contact-info p-4 bg-light text-dark rounded shadow-sm h-100">
            <h4>   {{ __('عنوان المعرض') }}</h4>
            <p><i class="fas fa-map-marker-alt me-2"></i>
               {{ $location->{'address_' . $sign} }}</p>

            <h4 class="mt-4">   {{ __('رقم الهاتف') }}</h4>
            <p><i class="fas fa-phone me-2"></i>  {{ $location->book_link }}</p>

             
          </div>
        </div>

        <!-- Right Column: Map -->
        <div class="col-md-6 animate__animated animate__fadeInLeft">
          <div class="map-container rounded shadow-sm overflow-hidden h-100">
            <!-- Replace with your actual Google Map Embed URL -->
            <iframe
              src="{{ $location->map }}"
              width="100%" height="350" style="border:0;" allowfullscreen="" loading="lazy"
              referrerpolicy="no-referrer-when-downgrade" class="rounded"></iframe>
          </div>
        </div>
      </div>
    </div>

   @endif

     @endforeach 
  </section>
@stop