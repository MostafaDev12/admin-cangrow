 @extends('layouts.front')

@section('title')
   
{{ __('الخدمات') }}  -  {{ $gs->{'title_' . $sign} }}
     
@stop

@section('gsearch')
    <meta property="og:image" content=" {{ $gs->{'logo_' . $sign} }}" />
@stop


@section('content')

  <div class="service mt-5 pt-2">
    <div class="container p-lg-5">
      <div class="row">
        <div class="col-12 text-center">
          <h1>خدماتنا</h1>
          <p>نقدم مجموعة متنوعة من الخدمات التي تلبي احتياجات عملائنا في مجال المصاعد. تشمل خدماتنا تصميم وتركيب وصيانة الأنظمة المختلفة.</p>
        </div>
      </div>
      <div class="row">

     @foreach ($services as $service)
        <div class="col-12 col-lg-4 col-md-6">
          <div class="service-box">
            <img src="{{ $service->photo }}" alt="Service Image">
            <div class="service-box-content">
              <h3>   {{ $service->{'title_' . $sign} }}       </h3>
              <p>   {{ $service->{'short_details_' . $sign} }}</p>
              <a href="{{ route('single-service.index',['slug' => $service->{'slug_' . $sign} ]) }}">المزيد</a>
            </div>
          </div>
        </div>  
        @endforeach
 
         
      </div>


    </div>
  </div>

 

@stop