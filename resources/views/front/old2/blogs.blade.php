  
@extends('layouts.front')

@section('title')
   
{{ __('مقالات') }}  -  {{ $gs->{'title_' . $sign} }}
     
@stop

@section('gsearch')
    <meta property="og:image" content=" {{ $gs->{'logo_' . $sign} }}" />
@stop


@section('content')

    <main>
        <section id="wrapper" class="gallery-wrapper articles">
            <div class="wrapper pb-0">
                <div class="container">
                    <div class="row">
                        @foreach($blogs as $blog)
                        <div class="col-md-4 col-sm-6 mb-4 box-invisible">
                            <a class="card p-0" href="{{ route('single-blog.index',$blog->{'slug_' . $sign}) }}">
                                <figure class="w-100 h-100 p-0 m-0">
             <img class="w-100 h-100 rounded"  src="{{ $blog->photo }}" alt=""> 
                                   
                                </figure>
                                <h4 class="p-4 fs-6"> {{ $blog->{'title_' . $sign} }}   </h4>
                            </a>
                        </div>
                        @endforeach
                    </div>
                    {{ $blogs->links('includes.pagination.custom') }}
                </div>
            </div>
        </section>
    </main>

 @stop