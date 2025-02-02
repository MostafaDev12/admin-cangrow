  
@extends('layouts.front')

@section('title')
   
{{ __('مقالات') }}  -  {{ $gs->{'title_' . $sign} }}
     
@stop

@section('gsearch')
    <meta property="og:image" content=" {{ $gs->{'logo_' . $sign} }}" />
@stop


@section('content')

 <div class="header-title ">
     <div class="overlay d-flex justify-content-center align-items-center">
         <h1>{{ __('مقالات') }}</h1>
     </div>

 </div>
 <div class="blogs">
     <div class="container">
         <div class="row pt-5">

          @foreach($blogs as $blog)
             <div class="col-12 col-lg-4 col-md-4 mb-3">
                 <div class="box blogs-div ">
                     <div>
                         <img src="{{ $blog->photo }}" alt="">
                     </div>
                     <div class="p-4">
                         <h2 class="fw-bold">  {{ $blog->{'title_' . $sign} }} </h2>
                         <p class="fw-bold"> {{ $blog->{'short_details_' . $sign} }} </p>
                         <a href="{{ route('single-blog.index',$blog->{'slug_' . $sign}) }}"><span class="mt-3 d-block"> {{ __('المزيد') }}<i
                                     class="fa-solid fa-angles-left"></i></span></a>
                         <hr>
                         <p class="date-blogs"> {{ $blog->blog_date }} </p>
                     </div>
                 </div>
             </div>
             @endforeach
             
         </div>
     </div>
 </div> 
@stop
