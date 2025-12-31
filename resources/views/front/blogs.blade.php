   
 
    
   @extends('layouts.front')

@section('title')
   
{{ __('صحتك امانة') }} -  {{ $gs->{'title_' . $sign} }}
     
@stop

@section('gsearch')
    <meta property="og:image" content=" {{ $gs->{'logo_' . $sign} }}" />
@stop

@section('css')

 @stop

@section('content')
     @php
         $phones = explode(',', $gs->phones);
         $emails = explode(',', $gs->emails);
         $addresses = json_decode($gs->{'addresses_' . $sign});

         $randomAddress = Arr::random($addresses);
         $randomPhone = Arr::random($phones);
         $randomEmail = Arr::random($emails);
     @endphp
     <section class="page-header">
            <div class="page-header__bg" style="background-image: linear-gradient(to right, #000000, #ffffff);"></div>
            <!-- /.page-header__bg -->
            <div class="container">
                <h2 class="page-header__title">صحتك امانة </h2>
               
            </div><!-- /.container -->
        </section><!-- /.page-header -->
       
        <!-- ------------------------------- -->
        <!-- المقالات القصيرة -->
        <section class="blog-one section-space">
            <div class="container">
                <div class="blog-one__carousel boskery-owl__carousel boskery-owl__carousel--basic-nav owl-carousel owl-theme"
                    data-owl-options='{
			"items": 1,
			"margin": 30,
			"loop": true,
			"smartSpeed": 700,
			"nav": false,
			"navText": ["<span class=\"icon-arrow-left\"></span>","<span class=\"icon-arrow-right\"></span>"],
			"dots": true,
			"autoplay": true,
			"responsive": {
				"0": {
					"items": 1,
					"nav": true,
					"dots": false,
					"margin": 10
				},
				"768": {
					"items": 2,
					"margin": 30
				},
				"992": {
					"items": 3,
					"margin": 30
				}
			}
		}'>
                @foreach ($blogs as $blog)
                    
                    <div class="item">
                        <div class="blog-card wow fadeInUp" data-wow-duration='1500ms' data-wow-delay='000ms'>
                            <div class="blog-card__content">
                                <div class="blog-card__top">
                                    <div class="blog-card__date"><span>{{ \Carbon\Carbon::parse($blog->blog_date)->format('d') }}</span> <span>{{ \Carbon\Carbon::parse($blog->blog_date)->format('M') }}</span></div>
                                    <!-- /.blog-card__date -->
                                    <ul class="list-unstyled blog-card__meta">
                                        <li><a href="#">
                                                <span class="icon-user"></span>
                                                بواسطة الإدارة</a></li>
                                        {{-- <li><a href="#">
                                                <span class="icon-chat"></span>
                                                2 تعليق</a></li> --}}
                                    </ul><!-- /.list-unstyled blog-card__meta -->
                                </div><!-- /.blog-card__top -->
                                <div class="blog-card__image">
                                    <img src="{{ $blog->photo }}"
                                        alt="{{ optional($blog)->{'title_' . $sign} }}">
                                    <a href="{{ route('single-blog.index',['lang'=> $sign , 'blog' =>$blog->{'slug_' . $sign} ]) }}" class="blog-card__hover">
                                        <span class="sr-only">   
                                            {{ optional($blog)->{'title_' . $sign} }}
                                             </span>
                                        <div class="blog-card__hover__box blog-card__hover__box--1"></div>
                                        <div class="blog-card__hover__box blog-card__hover__box--2"></div>
                                        <div class="blog-card__hover__box blog-card__hover__box--3"></div>
                                        <div class="blog-card__hover__box blog-card__hover__box--4"></div>
                                    </a>
                                </div><!-- /.blog-card__image -->
                                <h3 class="blog-card__title"><a href="{{ route('single-blog.index',['lang'=> $sign , 'blog' =>$blog->{'slug_' . $sign} ]) }}">  
                                           {{ optional($blog)->{'short_details_' . $sign} }}   </a></h3><!-- /.blog-card__title -->
                            </div><!-- /.blog-card__content -->
                            <a href="{{ route('single-blog.index',['lang'=> $sign , 'blog' =>$blog->{'slug_' . $sign} ]) }}" class="blog-card__link">
                                اقرأ المزيد
                                <span class="icon-right"></span>
                            </a><!-- /.blog-card__link -->
                        </div><!-- /.blog-card -->
                    </div><!-- /.item -->
                   
                @endforeach
                </div><!-- /.blog-one__carousel -->
            </div><!-- /.container -->
        </section><!-- /.blog-one section-space -->
        <!-- الفيديوهات -->
        <section class="blog-one section-space">
            <div class="container">
                <div class="blog-one__carousel boskery-owl__carousel boskery-owl__carousel--basic-nav owl-carousel owl-theme"
                    data-owl-options='{
			"items": 1,
			"margin": 30,
			"loop": true,
			"smartSpeed": 700,
			"nav": false,
			"navText": ["<span class=\"icon-arrow-left\"></span>","<span class=\"icon-arrow-right\"></span>"],
			"dots": true,
			"autoplay": true,
			"responsive": {
				"0": {
					"items": 1,
					"nav": true,
					"dots": false,
					"margin": 10
				},
				"768": {
					"items": 2,
					"margin": 30
				},
				"992": {
					"items": 3,
					"margin": 30
				}
			}
		}'>
        @foreach ($videos as $video)
            
                    <div class="item">
                        <div class="blog-card-three wow fadeInUp" data-wow-duration="1500ms" data-wow-delay="00ms">

                            <!-- iframe instead of background image -->
                            <div class="blog-card-three__bg" style="padding:0; height:auto;">
                                <iframe src="{{ $video->youtube_url }}"
                                    style="width:100%; height:250px; border:0;" allowfullscreen loading="lazy">
                                </iframe>
                            </div>
                            <!-- /.blog-card-three__bg -->

                            <div class="blog-card-three__content">

                                <div class="blog-card-three__date">
                                    <span>فيديو</span>
                                    {{-- <span>جديد</span> --}}
                                </div>
                                <!-- /.blog-card-three__date -->

                                <div class="blog-card-three__content__inner">

                                    <ul class="list-unstyled blog-card-three__meta">
                                        <li>
                                            <a href="#"><span class="icon-user"></span> قناة الشركة</a>
                                        </li>
                                        <li>
                                            <a  href="{{ $video->link }}" target="_blank"><span class="icon-play"></span> شاهد الآن</a>
                                        </li>
                                    </ul>
                                    <!-- /.blog-card-three__meta -->

                                    <h3 class="blog-card-three__title">
                                        <a href="{{ $video->link }}" target="_blank">
                                            {{ optional($video)->{'title_' . $sign} }}
                                        </a>
                                    </h3>
                                    <!-- /.blog-card-three__title -->

                                </div>
                                <!-- /.blog-card-three__content__inner -->

                            </div>
                            <!-- /.blog-card-three__content -->

                        </div>
                        <!-- /.blog-card-three -->
                    </div>
                    <!-- /.item -->
 
        @endforeach
                </div><!-- /.blog-one__carousel -->
            </div><!-- /.container -->
        </section><!-- /.blog-one section-space -->
        <!-- ------------------------------- -->
        <!-- ------------------------------- -->

@stop