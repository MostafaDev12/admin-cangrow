   @extends('layouts.front')

  @section('title')
      {{ $blog->{'title_' . $sign} }} - {{ $gs->{'title_' . $sign} }}
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
      <h1> {{ $blog->{'title_' . $sign} }}</h1>
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
                            <img src="{{ $blog->photo }}" alt="{{ $blog->{'title_' . $sign} }}" class="img-fluid rounded mb-3 w-100">
                            <h2 class="post-title">  {{ $blog->{'title_' . $sign} }}   </h2>
                            <ul class="list-inline small text-muted">
                                 
                                <li class="list-inline-item"><i class="fas fa-calendar me-1"></i> {{ \Carbon\Carbon::parse($blog->blog_date)->format('d M, Y') }}</li>
                            </ul>
                        </div>

                        <div class="post-content">
                            <p>
                                {!! $blog->{'details_' . $sign} !!}
                            </p>
                        </div>


                        <!-- Share Buttons -->
                        <div class="post-share mt-4 pt-4 border-top d-flex justify-content-between align-items-center">
                            <span class="fw-bold">{{ __('شارك') }}:</span>
                            <div>
                                <a href="#" class="text-decoration-none text-dark me-2"><i
                                        class="fab fa-facebook-f"></i></a>
                                <a href="#" class="text-decoration-none text-dark me-2"><i
                                        class="fab fa-twitter"></i></a>
                                <a href="#" class="text-decoration-none text-dark me-2"><i
                                        class="fab fa-linkedin-in"></i></a>
                                <a href="#" class="text-decoration-none text-dark"><i class="fab fa-whatsapp"></i></a>
                            </div>
                        </div>
                    </article>
                </div>

                <!-- Sidebar / Aside -->
                <div class="col-lg-4">
                    <aside class="sidebar">

                        <!-- Search Bar -->
                        <div class="mb-4">
                            <form class="input-group">
                                <input type="text" class="form-control" placeholder="ابحث هنا...">
                                <button class="search-button" type="submit"><i class="fas fa-search"></i></button>
                            </form>
                        </div>

                        <!-- Recent Blogs -->
                        <div class="mb-4">
                            <h5 class=" text-white px-3 py-2 rounded"> {{ __('مقالات حديثة') }}</h5>
                            <ul class="list-unstyled">
                                @foreach (App\Models\Blog::orderBy('blog_date', 'desc')->where('id', '!=', $blog->id)->limit(4)->get() as $k => $blogg)
                      @php
                          $k++;
                      @endphp
                                <li class="d-flex align-items-start mb-3">
                                    <img src="{{ $blogg->photo }}" alt="Post" class="rounded me-3"
                                        style="width: 70px; height: 70px;">
                                    <div class="mx-2">
                                        <a href="{{ route('single-blog.index',['lang'=> $sign , 'blog' =>$blogg->{'slug_' . $sign} ]) }}" class="text-decoration-none text-dark fw-bold">{{ $blogg->{'title_' . $sign} }}    </a>
                                        <small class="d-block text-muted">{{ \Carbon\Carbon::parse($blogg->blog_date)->format('d M, Y') }}</small>
                                    </div>
                                </li>
                                @endforeach

                                
                            </ul>
                        </div>

                        {{-- <!-- Categories -->
                        <div class="mb-4">
                            <h5 class=" text-white px-3 py-2 rounded">التصنيفات</h5>
                            <ul class="list-unstyled">
                                <li><a href="#" class="text-decoration-none text-dark d-block py-1">تصميم داخلي</a></li>
                                <li><a href="#" class="text-decoration-none text-dark d-block py-1">أفكار مطابخ</a></li>
                                <li><a href="#" class="text-decoration-none text-dark d-block py-1">ديكورات</a></li>
                            </ul>
                        </div>

                        <!-- Tags -->
                        <div class="mb-4">
                            <h5 class=" text-white px-3 py-2 rounded">الكلمات المفتاحية</h5>
                            <div class="d-flex flex-wrap gap-2">
                                <span class="badge bg-light text-dark">#تصميم</span>
                                <span class="badge bg-light text-dark">#ديكور</span>
                                <span class="badge bg-light text-dark">#مطبخ</span>
                                <span class="badge bg-light text-dark">#غرف نوم</span>
                            </div>
                        </div> --}}

                    </aside>
                </div>
            </div>
        </div>
    </section>
   @stop