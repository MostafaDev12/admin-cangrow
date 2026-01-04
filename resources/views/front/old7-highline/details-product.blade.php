     @extends('layouts.front')

  @section('title')
      {{ $service->{'title_' . $sign} }} - {{ $gs->{'title_' . $sign} }}
  @stop

  @section('gsearch')
      <meta property="og:image" content="{{ $gs->{'logo_' . $sign} }}" />
  @stop
  @section('css')
<link rel="stylesheet" href="{{ asset('front/highline/') }}/css/articles.css">

  @stop



  @section('content')
      @php
          $phones = explode(',', $gs->phones);
          $randomPhone = Arr::random($phones);
      @endphp
  <section class="header-title ">
    <div class="overlay d-flex justify-content-center align-items-center">
      <h1>   {{ $service->{'title_' . $sign} }}  </h1>
    </div>
  </section>
    <!-- Blog Details Section -->
    <section class="blog-details py-5">
        <div class="container">
            <div class="row g-4">

                <!-- Main Blog Content -->
                <div class="col-lg-8">
                    <article class="blog-post shadow-sm p-4 rounded bg-white">
                        <div class="post-header text-center mb-4">
                            <img src="{{ $service->photo }}" alt="Blog Image" class="img-fluid rounded mb-3 w-100">
                            <h2 class="post-title"> {{ $service->{'title_' . $sign} }}      </h2>
                            <ul class="list-inline small text-muted">
                                
                            </ul>
                        </div>

                        <div class="post-content">
                            <p>
                              {!! $service->{'details_' . $sign} !!}
                            </p>
                        </div>


                        
                    </article>
                </div>

                <!-- Sidebar / Aside -->
                <div class="col-lg-4">
                    <aside class="sidebar">

                        
{{-- {{ __('أنواع') }} --}}
                        <!-- Dropdown Categories as Sidebar List -->
                        <div class="mb-4">
                            <h5 class="text-white px-3 py-2 rounded">  {{ optional($service->category)->{'title_' . $sign} }}</h5>
                            <ul class="list-unstyled ps-3">
                               
                               @foreach ($service->category->parentServices as $parentService)
                              <li class="mb-2">
                                    <a href="{{ route('single-service.index', ['lang' => $sign, 'slug' => $parentService->{'slug_' . $sign}]) }}"
                                        class="text-decoration-none text-dark d-block py-1"> {{ $parentService->{'title_' . $sign} }}</a>
                                </li>

                               @endforeach
                              
                                
                            </ul>
                        </div>

                    </aside>

                </div>
            </div>
        </div>
    </section>
  @stop