<!DOCTYPE html>
<html lang="en" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    @php

        $ps = App\Models\Pagesetting::find(1);

    @endphp




<meta property="og:title" content="{{ $gs->{'title_' . $sign} }}">
<meta property="og:description" content="{{ $gs->{'title_' . $sign} }}">
<meta property="og:image" content="{{ $gs->{'logo_' . $sign} }}">
<meta property="og:url" content="{{ url('/') }}">
<meta property="og:type" content="website">



  @if (isset($page->meta_tag) && isset($page->meta_description))
        <meta name="keywords" content="{{ $page->meta_tag }}">
        <meta name="description" content="{{ $page->meta_description }}">
        <title>@yield('title') -

            {{ $gs->{'title_' . $sign} }}

        </title>
    @elseif(isset($blog->meta_tag) && isset($blog->meta_description))
        <meta name="keywords" content="{{ $blog->meta_tag }}">
        <meta name="description" content="{{ $blog->meta_description }}">
        <meta property="og:description" content="{{ $blog->meta_description }}">
    @else
        <meta name="+author" content=" {{ $gs->{'title_' . $sign} }}">
        
        <title>
            @yield('title')
        </title>
    @endif



    <script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "Organization",
      "url": "{{url('/')}}",
      "logo": "{{ $gs->{'logo_' . $sign} }}"
    }
    </script>
    <script type="application/ld+json">
  {
    "@context": "https://schema.org",
    "@type": "Organization",
    "name": "{{ $gs->{'title_' . $sign} }}",
    "url": "{{url('/')}}",
    "description": "",
    "image": "{{ $gs->{'logo_' . $sign} }}",
      "logo": "{{ $gs->{'logo_' . $sign} }}",
      "sameAs": ["{{ App\Models\Socialsetting::find(1)->facebook }}", "{{ App\Models\Socialsetting::find(1)->twitter }}", "{{ App\Models\Socialsetting::find(1)->instagram }}"],
    "telephone": "",
    "address": {
      "@type": "PostalAddress",
      "streetAddress": "",
      "addressLocality": "",
      "addressRegion": "Cairo",
      "postalCode": "11341",
      "addressCountry": "Egypt"
    }
  }
</script>

 
    @yield('gsearch')
    <!-- Google Font -->

    <!-- favicon -->
    <link rel="icon" type="image/x-icon" href="{{ $gs->favicon }}" />
    <!-- bootstrap -->

  

  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200..1000&display=swap" rel="stylesheet">
  <script src="https://unpkg.com/lucide@latest"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"
      integrity="sha512-..." crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
  <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

    <link rel="stylesheet" href="{{ asset('build/css/toastr.css') }}">

    @yield('css')


</head>

  @php
  $phones =  explode(',', $gs->phones);
  $emails =   explode(',', $gs->emails);
  $addresses =  json_decode($gs->{'addresses_' . $sign});

  $randomPhone = Arr::random($phones);
  @endphp
 
 <body class="min-h-screen bg-white w-full">
  <!-- <Header/> -->
  <header class="sticky top-0 z-50 bg-white shadow-md">
      <div class="container px-4 mx-auto">
          <div class="flex items-center justify-between">
              <!-- Logo -->
              <div class="flex items-center">
                  <img src="{{ $gs->{'logo_' . $sign} }}" alt="logo" class="w-20 h-20">
              </div>

              <!-- Mobile menu button (hidden on desktop) -->
              <button class="md:hidden focus:outline-none" id="mobile-menu-button">
                  <i class="fa-solid fa-bars scale-150 text-gray-900"></i>
              </button>

              <!-- Desktop Navigation (hidden on mobile) -->
              <nav class="hidden md:flex items-center gap-6">
                  <a href="{{ route('front.index', $sign) }}" class="text-gray-900 hover:text-blue-600 transition duration-200">{{ __('الرئيسية') }}</a>
                  <a href="{{ route('about.index') }}" class="text-gray-900 hover:text-blue-600 transition duration-200"> {{ __('عن أوبر') }}</a>
                  <a href="{{ route('blogs.index') }}" class="text-gray-900 hover:text-blue-600 transition duration-200">{{ __('المقالات') }}</a>
                  <a href="{{ route('contact.index') }}" class="text-gray-900 hover:text-blue-600 transition duration-200"> {{ __(key: 'تواصل معنا') }}</a>
              </nav>
          </div>

          <!-- Mobile Menu (hidden by default) -->
          <div class="md:hidden hidden pb-4" id="mobile-menu">
              <div class="flex flex-col space-y-3">
                  <a href="{{ route('front.index', $sign) }}"
                      class="block text-gray-900 hover:text-blue-600 transition duration-200 py-2">{{ __('الرئيسية') }}</a>
                  <a href="{{ route('about.index') }}" class="block text-gray-900 hover:text-blue-600 transition duration-200 py-2">   {{ __('عن أوبر') }}</a>
                  <a href="{{ route('blogs.index') }}"
                      class="block text-gray-900 hover:text-blue-600 transition duration-200 py-2">{{ __('المقالات') }}</a>
                  <a href="{{ route('contact.index') }}" class="block text-gray-900 hover:text-blue-600 transition duration-200 py-2"> 
                    {{ __(key: 'تواصل معنا') }}</a>
              </div>
          </div>
      </div>
  </header>

  <!-- <Header/> exit -->

    @yield('content')


    <footer class="py-24 mt-10 px-6 md:px-12 bg-black text-white">
      <div class="container mx-auto text-center">
          <h2 class="text-3xl md:text-5xl font-bold mb-8">
            {{ __('جاهز لكسب المال بالقيادة؟') }}    
          </h2>
          <p class="text-xl text-gray-300 mb-12 max-w-2xl mx-auto">
            {{ __('سجّل للقيادة مع أوبر وابدأ في كسب المال. كن مديرًا لنفسك، وحدد جدولك الخاص، واستخدم سيارتك الخاصة.') }}
          </p>
          <button class="bg-white text-black px-6 py-3 rounded-lg text-lg font-semibold" onclick="window.location.href='{{ route('contact.index') }}'">
            {{ __('سجل للقيادة') }}    
          </button>

          <div class="flex flex-col md:flex-row gap-4 md:gap-0 mt-16 justify-center items-center space-y-6 md:space-y-0
        md:space-x-12">
              <div class="flex items-center gap-2">
                  <div class="bg-gray-800 p-3 rounded-full">
                      <i class="fas fa-home text-white"></i>
                  </div>
                  <span class="text-gray-300"><a href="{{ route('front.index', $sign) }}" >{{ __('الرئيسية') }}</a></span>
              </div>

              <div class="flex items-center gap-2">
                  <div class="bg-gray-800 p-3 rounded-full">
                      <i class="fa-solid fa-users text-white"></i>
                  </div>
                  <span class="text-gray-300"><a href="{{ route('about.index') }}" >{{ __('عنا') }}</a></span>
              </div>

              <div class="flex items-center gap-2">
                  <div class="bg-gray-800 p-3 rounded-full">
                      <i class="fa-solid fa-comments text-white"></i>
                  </div>
                  <span class="text-gray-300"> <a href="{{ route('contact.index') }}" > {{ __(key: 'تواصل معنا') }}  </a>  </span>
              </div>
              <div class="flex items-center gap-2">
                  <div class="bg-gray-800 p-3 rounded-full">
                      <i class="fa-solid fa-blog text-white"></i>
                  </div>
                   <span class="text-gray-300" ><a href="{{ route('blogs.index') }}" >{{ __('المقالات') }}</a></span>
             
              </div>
          </div>
      </div>
  </footer>

  <script>
      // Initialize any scripts here
      document.addEventListener('DOMContentLoaded', function () {
          // Initialize Lucide icons
          if (window.lucide) {
              lucide.createIcons();
          }
      });
  </script>

  <script src="{{ asset('front/Uber/') }}/src/scripts.js"></script>

 
    <script type="text/javascript">
        var logo_src = "{{ $gs->{'logo_' . $sign} }}";
        
    </script>

 

    <script src="{{ asset('build/js/toastr.js') }}"></script>

    <script type="text/javascript">
        var mainurl = "{{ url('/' . $sign) }}";
        var mainurl2 = "{{ url('/') }}";
        var gs = {!! json_encode($gs) !!};
        var langg = {!! json_encode($sign) !!};
        var mainurl2 = "{{ url('/') }}";

        $(".selectors").on('change', function() {
            var url = $(this).val();
            window.location = url;
        });
    </script>
    <Script>
        $(document).on('submit', '#subscribeform', function(e) {
            e.preventDefault();
            console.log(12);
            $('#sub-btn').prop('disabled', true);
            console.log(13);
            $.ajax({
                method: "POST",
                url: $(this).prop('action'),
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                success: function(data) {
                    console.log(14);
                    if ((data.errors)) {
                        console.log(15);
                        $('.alert-danger').show();
                        $('.alert-danger ul').html('');
                        for (var error in data.errors) {
                            $('.alert-danger ul').append('<li>' + data.errors[error] + '</li>');
                        }

                    } else {
                        console.log(16);
                        toastr.success(langg.subscribe_success);
                        $('.alert-danger').hide();
                        $('.alert-success').show();
                        $('.alert-success p').html(langg.subscribe_success);

                    }

                    $('#sub-btn').prop('disabled', false);


                }

            });

        });
    </script>


    <script>
        $(document).on('submit', '#email-form', function(e) {
            e.preventDefault();
            $('.gocover').show();
            $('.submit-btn').prop('disabled', true);
            var name = $('.fname').val();



            if (name == '') {
                $('#email-form .response').html(
                    '<div class="failed alert alert-warning">Please fill the required fields.</div>');
                $('button.submit-btn').prop('disabled', false);
                return false;
            }

            $.ajax({
                method: "POST",
                url: $(this).prop('action'),
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                beforeSend: function() {
                    $('#email-form .response').html(
                        '<div class="text-info">Loading...</div>'
                    );
                    console.log(1);
                },
                success: function(data) {
                    console.log(2);
                    if ((data.errors)) {
                        console.log(3);
                        $('.alert-success').hide();
                        $('.alert-danger').show();
                        $('#email-form .response').html('');
                        for (var error in data.errors) {
                            console.log(4);
                            $('#email-form .response').append('<li>' + data.errors[error] + '</li>')
                        }
                        $('#email-form input[type=text], #email-form input[type=email], #email-form textarea')
                            .eq(0).focus();
                        $('#email-form .refresh_code').trigger('click');

                    } else {
                        console.log(5);
                        $('.alert-danger').hide();
                        $('.alert-success').show();
                        $('#email-form .response').html(data);
                        $('#email-form input[type=text], #email-form input[type=email], #email-form textarea')
                            .eq(0).focus();
                        $('#email-form input[type=text], #email-form input[type=email], #email-form textarea')
                            .val('');
                        $('#email-form .refresh_code').trigger('click');

                    }
                    console.log(6);
                    $('.gocover').hide();
                    $('button.submit-btn').prop('disabled', false);
                }

            });

        });


        $(document).on('submit', '#appointment-form', function(e) {
            e.preventDefault();
            $('.gocover').show();
            $('.submit-btn').prop('disabled', true);
            var name = $('.fname').val();



            if (name == '') {
                $('#appointment-form .response').html(
                    '<div class="failed alert alert-warning">Please fill the required fields.</div>');
                $('button.submit-btn').prop('disabled', false);
                return false;
            }

            $.ajax({
                method: "POST",
                url: $(this).prop('action'),
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                beforeSend: function() {
                    $('#appointment-form .response').html(
                        '<div class="text-info"><img src="{{ asset('assets/images/preloader.gif') }}"> Loading...</div>'
                    );
                    console.log(1);
                },
                success: function(data) {
                    console.log(2);
                    if ((data.errors)) {
                        console.log(3);
                        $('.alert-success').hide();
                        $('.alert-danger').show();
                        $('#appointment-form .response').html('');
                        for (var error in data.errors) {
                            console.log(4);
                            $('#appointment-form .response').append('<li>' + data.errors[error] +
                                '</li>')
                        }
                        $('#appointment-form input[type=text], #appointment-form input[type=email], #appointment-form textarea')
                            .eq(0).focus();
                        $('#appointment-form .refresh_code').trigger('click');

                    } else {
                        console.log(5);
                        $('.alert-danger').hide();
                        $('.alert-success').show();
                        $('#appointment-form .response').html(data);
                        $('#appointment-form input[type=text], #appointment-form input[type=email], #appointment-form textarea')
                            .eq(0).focus();
                        $('#appointment-form input[type=text], #appointment-form input[type=email], #appointment-form textarea')
                            .val('');
                        $('#appointment-form .refresh_code').trigger('click');

                    }
                    console.log(6);
                    $('.gocover').hide();
                    $('button.submit-btn').prop('disabled', false);
                }

            });

        });

        $('.refresh_code').on("click", function() {
            $.get(mainurl2 + '/contact/refresh_code', function(data, status) {
                $('.codeimg1').attr("src", mainurl2 + "/assets/images/capcha_code.png?time=" + Math
                    .random());
            });
        })
    </script>


    @yield('js')
</body>

</html>
