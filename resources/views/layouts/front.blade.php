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


    <meta name="google-site-verification" content="IdWOrbHM6JKC0_evYH8uNuHf2MuPTGcup45QC7eNyzU" />
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




    <link rel="stylesheet" href="{{ asset('build/css/toastr.css') }}">




    @include('includes.style')



    @yield('css')


</head>

@php
    $phones = explode(',', $gs->phones);
    $emails = explode(',', $gs->emails);
    $addresses = json_decode($gs->{'addresses_' . $sign});

    $randomPhone = Arr::random($phones);
@endphp


<body
    class="home page-template page-template-tpl-default-elementor page-template-tpl-default-elementor-php page page-id-19 wp-custom-logo wp-embed-responsive tribe-no-js menu-layer elementor-default elementor-kit-7 elementor-page elementor-page-19">



    <div class="boxed_wrapper ltr">




        <!-- main header -->
        <header class="main-header">
            <!-- header-lower -->
            <div class="header-lower">
                <div class="auto-container">
                    <div class="outer-box">
                        <div class="logo-box">
                            <figure class="logo"><a href="https://azure-sardine-328383.hostingersite.com/"
                                    title="azure-sardine-328383.hostingersite.com"><img
                                        src="https://azure-sardine-328383.hostingersite.com/wp-content/uploads/2025/04/WhatsApp-Image-2025-03-26-at-8.25.46-PM-1-1.png"
                                        alt="logo" style="" /></a></figure>
                        </div>
                        <div class="menu-area">
                            <!--Mobile Navigation Toggler-->
                            <div class="mobile-nav-toggler">
                                <i class="icon-bar"></i>
                                <i class="icon-bar"></i>
                                <i class="icon-bar"></i>
                            </div>
                            <nav class="main-menu navbar-expand-md navbar-light clearfix">
                                <div class="collapse navbar-collapse show clearfix" id="navbarSupportedContent">
                                    <ul class="navigation clearfix">
                                        <li id="menu-item-2502"
                                            class="menu-item menu-item-type-post_type menu-item-object-page menu-item-home current-menu-item page_item page-item-19 current_page_item menu-item-2502 current">
                                            <a title="Home" href="https://azure-sardine-328383.hostingersite.com/"
                                                class="hvr-underline-from-left1" data-scroll
                                                data-options="easing: easeOutQuart">Home</a></li>
                                        <li id="menu-item-2504"
                                            class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2504">
                                            <a title="About Us"
                                                href="https://azure-sardine-328383.hostingersite.com/about-us/"
                                                class="hvr-underline-from-left1" data-scroll
                                                data-options="easing: easeOutQuart">About Us</a></li>
                                        <li id="menu-item-2505"
                                            class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-2505 dropdown">
                                            <a title="Our Department" href="#" data-toggle="dropdown1"
                                                class="hvr-underline-from-left1" aria-expanded="false" data-scroll
                                                data-options="easing: easeOutQuart">Our Department</a>
                                            <ul role="menu" class="submenu">
                                                <li id="menu-item-2506"
                                                    class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2506">
                                                    <a title="Emergency"
                                                        href="https://azure-sardine-328383.hostingersite.com/emergency/">Emergency</a>
                                                </li>
                                                <li id="menu-item-2507"
                                                    class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-2507 dropdown">
                                                    <a title="Outpatient Clinics" href="#">Outpatient Clinics</a>
                                                    <ul role="menu" class="submenu">
                                                        <li id="menu-item-2508"
                                                            class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2508">
                                                            <a title="Internal Clinic"
                                                                href="https://azure-sardine-328383.hostingersite.com/internal-clinic/">Internal
                                                                Clinic</a></li>
                                                        <li id="menu-item-2510"
                                                            class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2510">
                                                            <a title="General Surgery"
                                                                href="https://azure-sardine-328383.hostingersite.com/general-surgery/">General
                                                                Surgery</a></li>
                                                        <li id="menu-item-2511"
                                                            class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2511">
                                                            <a title="Obstetrics and gynecology"
                                                                href="https://azure-sardine-328383.hostingersite.com/obstetrics-and-gynecology/">Obstetrics
                                                                and gynecology</a></li>
                                                        <li id="menu-item-2512"
                                                            class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2512">
                                                            <a title="The children"
                                                                href="https://azure-sardine-328383.hostingersite.com/the-children/">The
                                                                children</a></li>
                                                        <li id="menu-item-2513"
                                                            class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2513">
                                                            <a title="Cosmetology"
                                                                href="https://azure-sardine-328383.hostingersite.com/cosmetology/">Cosmetology</a>
                                                        </li>
                                                        <li id="menu-item-2612"
                                                            class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2612">
                                                            <a title="Orthopedics and spine surgery"
                                                                href="https://azure-sardine-328383.hostingersite.com/orthopedics-and-spine-surgery/">Orthopedics
                                                                and spine surgery</a></li>
                                                        <li id="menu-item-2610"
                                                            class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2610">
                                                            <a title="Urologist"
                                                                href="https://azure-sardine-328383.hostingersite.com/urologist/">Urologist</a>
                                                        </li>
                                                        <li id="menu-item-2611"
                                                            class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2611">
                                                            <a title="Dermatology"
                                                                href="https://azure-sardine-328383.hostingersite.com/dermatology/">Dermatology</a>
                                                        </li>
                                                    </ul>
                                                </li>
                                                <li id="menu-item-2515"
                                                    class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2515">
                                                    <a title="Dental"
                                                        href="https://azure-sardine-328383.hostingersite.com/dental/">Dental</a>
                                                </li>
                                                <li id="menu-item-2517"
                                                    class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2517">
                                                    <a title="Physiotherapy"
                                                        href="https://azure-sardine-328383.hostingersite.com/physiotherapy/">Physiotherapy</a>
                                                </li>
                                                <li id="menu-item-2518"
                                                    class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2518">
                                                    <a title="The Laboratory"
                                                        href="https://azure-sardine-328383.hostingersite.com/the-laboratory/">The
                                                        Laboratory</a></li>
                                                <li id="menu-item-2519"
                                                    class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2519">
                                                    <a title="The Radiology"
                                                        href="https://azure-sardine-328383.hostingersite.com/the-radiology/">The
                                                        Radiology</a></li>
                                                <li id="menu-item-2520"
                                                    class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2520">
                                                    <a title="Cardiology and Catheterization"
                                                        href="https://azure-sardine-328383.hostingersite.com/cardiology-and-catheterization/">Cardiology
                                                        and Catheterization</a></li>
                                                <li id="menu-item-2521"
                                                    class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2521">
                                                    <a title="Intensive care"
                                                        href="https://azure-sardine-328383.hostingersite.com/intensive-care/">Intensive
                                                        care</a></li>
                                                <li id="menu-item-2522"
                                                    class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2522">
                                                    <a title="Surgery"
                                                        href="https://azure-sardine-328383.hostingersite.com/surgery/">Surgery</a>
                                                </li>
                                                <li id="menu-item-2523"
                                                    class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2523">
                                                    <a title="Internal patient accommodation"
                                                        href="https://azure-sardine-328383.hostingersite.com/internal-patient-accommodation/">Internal
                                                        patient accommodation</a></li>
                                            </ul>
                                        </li>
                                        <li id="menu-item-2533"
                                            class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2533">
                                            <a title="Sinaiclinic Nabq"
                                                href="https://azure-sardine-328383.hostingersite.com/sinaiclinic-nabq/"
                                                class="hvr-underline-from-left1" data-scroll
                                                data-options="easing: easeOutQuart">Sinaiclinic Nabq</a></li>
                                        <li id="menu-item-2534"
                                            class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2534">
                                            <a title="Doctors"
                                                href="https://azure-sardine-328383.hostingersite.com/doctors/"
                                                class="hvr-underline-from-left1" data-scroll
                                                data-options="easing: easeOutQuart">Doctors</a></li>
                                        <li id="menu-item-2535"
                                            class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2535">
                                            <a title="Blogs"
                                                href="https://azure-sardine-328383.hostingersite.com/blogs/"
                                                class="hvr-underline-from-left1" data-scroll
                                                data-options="easing: easeOutQuart">Blogs</a></li>
                                        <li id="menu-item-2536"
                                            class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2536">
                                            <a title="Appointments"
                                                href="https://azure-sardine-328383.hostingersite.com/appointments/"
                                                class="hvr-underline-from-left1" data-scroll
                                                data-options="easing: easeOutQuart">Appointments</a></li>
                                        <li id="menu-item-2537"
                                            class="menu-item menu-item-type-post_type menu-item-object-page menu-item-2537">
                                            <a title="Contact Us"
                                                href="https://azure-sardine-328383.hostingersite.com/contact/"
                                                class="hvr-underline-from-left1" data-scroll
                                                data-options="easing: easeOutQuart">Contact Us</a></li>
                                    </ul>
                                </div>
                            </nav>
                        </div>
                        <div class="menu-right-content">
                        </div>
                    </div>
                </div>
            </div>

            <!--sticky Header-->
            <div class="sticky-header">
                <div class="auto-container">
                    <div class="outer-box">
                        <div class="logo-box">
                            <figure class="logo"><a href="https://azure-sardine-328383.hostingersite.com/"
                                    title="azure-sardine-328383.hostingersite.com"><img
                                        src="https://azure-sardine-328383.hostingersite.com/wp-content/uploads/2025/04/WhatsApp-Image-2025-03-26-at-8.25.46-PM-1-1.png"
                                        alt="logo" style="" /></a></figure>
                        </div>
                        <div class="menu-area">
                            <nav class="main-menu clearfix">
                                <!--Keep This Empty / Menu will come through Javascript-->
                            </nav>
                        </div>
                        <div class="menu-right-content">
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- main-header end -->


        <!-- Mobile Menu  -->
        <div class="mobile-menu">
            <div class="menu-backdrop"></div>
            <div class="close-btn"><i class="fas fa-times"></i></div>

            <nav class="menu-box">
                <div class="nav-logo">
                    <a href="https://azure-sardine-328383.hostingersite.com/"
                        title="azure-sardine-328383.hostingersite.com"><img
                            src="https://azure-sardine-328383.hostingersite.com/wp-content/uploads/2025/04/WhatsApp-Image-2025-03-26-at-8.25.46-PM-1-1.png"
                            alt="logo" style="" /></a>
                </div>
                <div class="menu-outer">
                    <!--Here Menu Will Come Automatically Via Javascript / Same Menu as in Header--></div>



            </nav>
        </div>
        <!-- End Mobile Menu -->




        @yield('content')



        <footer class="main-footer">
            <div class="bg-layer"></div>
            <div class="auto-container">
                <div class="widget-section">
                    <div class="row clearfix">
                        <div class="col-lg-3 col-md-6 col-sm-12 footer-column">
                            <div id="labout_about_company-1" class="footer-widget widget_labout_about_company">
                                <div class="about-widget">
                                    <div class="widget-title">
                                        <h3>About</h3>
                                    </div>
                                    <div class="widget-content">
                                        <p>The Department of Chemical Research Support is a central research resource
                                            facility of the Institute of Science.</p>
                                        <ul class="info clearfix">
                                            <li><a href="mailto:info@example.com">info@example.com</a></li>
                                            <li><a href="tel:(+91)-120-229-0305">(+91)-120-229-0305</a></li>
                                        </ul>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-12 footer-column">
                            <div id="nav_menu-4" class="footer-widget widget_nav_menu">
                                <div class="widget-title">
                                    <h3>Quick Link</h3>
                                </div>
                                <div class="menu-quick-link-container">
                                    <ul id="menu-quick-link" class="menu">
                                        <li id="menu-item-1165"
                                            class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1165">
                                            <a href="https://azure-sardine-328383.hostingersite.com/about-us/">About
                                                Us</a></li>
                                        <li id="menu-item-1167"
                                            class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1167">
                                            <a href="https://azure-sardine-328383.hostingersite.com/our-events/">Our
                                                Events</a></li>
                                        <li id="menu-item-1168"
                                            class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1168">
                                            <a
                                                href="https://azure-sardine-328383.hostingersite.com/research/">Research</a>
                                        </li>
                                        <li id="menu-item-1169"
                                            class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1169">
                                            <a href="https://azure-sardine-328383.hostingersite.com/team-one/">Team
                                                One</a></li>
                                        <li id="menu-item-1166"
                                            class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1166">
                                            <a
                                                href="https://azure-sardine-328383.hostingersite.com/contact/">Contact</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-12 footer-column">
                            <div id="nav_menu-5" class="footer-widget widget_nav_menu">
                                <div class="widget-title">
                                    <h3>Resources</h3>
                                </div>
                                <div class="menu-useful-links-container">
                                    <ul id="menu-useful-links" class="menu">
                                        <li id="menu-item-1173"
                                            class="menu-item menu-item-type-post_type menu-item-object-research menu-item-1173">
                                            <a
                                                href="https://azure-sardine-328383.hostingersite.com/research/bio-sciences/">Bio
                                                Sciences</a></li>
                                        <li id="menu-item-1172"
                                            class="menu-item menu-item-type-post_type menu-item-object-research menu-item-1172">
                                            <a
                                                href="https://azure-sardine-328383.hostingersite.com/research/chemical-research/">Chemical
                                                Research</a></li>
                                        <li id="menu-item-1174"
                                            class="menu-item menu-item-type-post_type menu-item-object-research menu-item-1174">
                                            <a
                                                href="https://azure-sardine-328383.hostingersite.com/research/cooling-treatment/">Cooling
                                                Treatment</a></li>
                                        <li id="menu-item-1171"
                                            class="menu-item menu-item-type-post_type menu-item-object-research menu-item-1171">
                                            <a
                                                href="https://azure-sardine-328383.hostingersite.com/research/micro-organs/">Micro
                                                Organs</a></li>
                                        <li id="menu-item-1170"
                                            class="menu-item menu-item-type-post_type menu-item-object-research menu-item-1170">
                                            <a
                                                href="https://azure-sardine-328383.hostingersite.com/research/medical-research/">Medical
                                                Research</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-12 footer-column">
                            <div id="labout_subscribe_us-1" class="footer-widget widget_labout_subscribe_us">
                                <div class="newsletter-widget">
                                    <div class="widget-title">
                                        <h3>Subscribe Newsletter</h3>
                                    </div>
                                    <div class="widget-content">
                                        <p>To add complexity, this back drop of significant challenges</p>
                                        <div class="newsletter-form">
                                            <script>
                                                (function() {
                                                    window.mc4wp = window.mc4wp || {
                                                        listeners: [],
                                                        forms: {
                                                            on: function(evt, cb) {
                                                                window.mc4wp.listeners.push({
                                                                    event: evt,
                                                                    callback: cb
                                                                });
                                                            }
                                                        }
                                                    }
                                                })();
                                            </script>
                                            <!-- Mailchimp for WordPress v4.10.2 - https://wordpress.org/plugins/mailchimp-for-wp/ -->
                                            <form id="mc4wp-form-1" class="mc4wp-form mc4wp-form-18" method="post"
                                                data-id="18" data-name="">
                                                <div class="mc4wp-form-fields">
                                                    <div class="form-group">
                                                        <div class="icon"><i class="icon-66"></i></div>
                                                        <input type="email" name="EMAIL"
                                                            placeholder="Email Address*" required />
                                                    </div>
                                                    <div class="form-group message-btn">
                                                        <button type="submit" class="theme-btn btn-one">Subscribe
                                                            Now<span></span><span></span><span></span><span></span></button>
                                                    </div>
                                                </div><label style="display: none !important;">Leave this field empty
                                                    if you're human: <input type="text" name="_mc4wp_honeypot"
                                                        value="" tabindex="-1"
                                                        autocomplete="off" /></label><input type="hidden"
                                                    name="_mc4wp_timestamp" value="1746703316" /><input
                                                    type="hidden" name="_mc4wp_form_id" value="18" /><input
                                                    type="hidden" name="_mc4wp_form_element_id"
                                                    value="mc4wp-form-1" />
                                                <div class="mc4wp-response"></div>
                                            </form><!-- / Mailchimp for WordPress Plugin -->
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- main-footer end -->


        <!--Scroll to top-->
        <div class="scroll-to-top">
            <svg class="scroll-top-inner" viewBox="-1 -1 102 102">
                <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" />
            </svg>
        </div>


    </div>
    <!--End Page Wrapper-->

    @include('includes.script')

    <script src="{{ asset('build/js/toastr.js') }}"></script>


    <script type="text/javascript">
        var logo_src = "{{ $gs->{'logo_' . $sign} }}";
    </script>



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
