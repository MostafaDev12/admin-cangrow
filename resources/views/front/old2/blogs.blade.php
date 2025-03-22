   
@extends('layouts.front')

@section('title')
   
{{ __('مقالات') }}  -  {{ $gs->{'title_' . $sign} }}
     
@stop

@section('gsearch')
    <meta property="og:image" content=" {{ $gs->{'logo_' . $sign} }}" />
@stop


@section('content')

    <div class="blog p-5 mt-5">
        <div class="container-fluid">
            <div class="title_lines">
                <h1>
                    {{ __('مقالات') }}
                </h1>
            </div>
            <div class="row">

                @foreach($blogs as $blog)
                <div class="col-12 col-lg-4 col-md-4">
                    <div class="box blogs-div ">
                        <div>
                            <a href="{{ route('single-blog.index',$blog->{'slug_' . $sign}) }}" target=""><img src="{{ $blog->photo_url }}" alt=""></a>
                        </div>
                        <div class="p-2">
                            <h2 class="fw-bold"> {{ $blog->{'title_' . $sign} }}  </h2>
                            <p class="fw-bold">  {{ $blog->{'short_details_' . $sign} }}      </p>
                            <a href="{{ route('single-blog.index',$blog->{'slug_' . $sign}) }}"><span class="mt-3 d-block">{{ __('المزيد') }} <i class="fa-solid fa-angles-left"></i></span></a>
                            <hr>
                            <p class="date-blogs">  {{ $blog->blog_date }}</p>
                        </div>
                   </div>
                </div>
                @endforeach
                 
                

            </div>
            {{ $blogs->links('includes.pagination.custom') }}
        </div>
    </div>

    
@include('includes.contact-form',['classes' => 'p-5'])
 

@stop
    