 
     
@extends('layouts.front')

@section('title')
   
        {{ $gs->{'title_' . $sign} }}
     
@stop

@section('gsearch')
    <meta property="og:image" content=" {{ $gs->{'logo_' . $sign} }}" />
@stop


@section('content')
  <main>
    <!-- Banner Section -->
    <section id="home" class="home">
      <div class="banner-wrapper wrapper home-page-background">
        <!-- <div class="container">
          <div class="row align-items-center">
            <div class="col-md-6 order-md-1 text-end">
              <h1>رؤية أفضل</h1>
              <p>
                مركز علاج الحول و عيون الاطفال و المياةالبيضاء لدينا احدث الاجهزه و التقنيات لاجراء جميع
                جراحات العيون و
                تصحيح الابصار
              </p>
            </div>
            <div class="col-md-6 order-md-2 order-1 mb-md-0 mb-5">
              <div class="top-right-sec">
                <img src="images/drhebametwally/heba-slider-new-removebg-preview.png" class="img-fluid aimg1">
              </div>
            </div>
          </div>
        </div> -->
      </div>
    </section>

    <!-- Banner section exit -->

    <section id="">
      <div class="wrapper home-card">
        <div class="container">
          <div class="row">
            <div class="col-md-4 col-sm-6 mb-4">
              <div class="card box-invisible">
                <div class="icon-box feature">
                  <i class="fa fa-eye"></i>
                </div>
                <h4>رؤيتك تهمنا </h4>
                <p>
                  لدينا مجموعة من افضل الاطباء المتخصصين في مجال العيون وعلاج الحول والمياة البيضاء
                </p>
                <a href="#" class="main-btn">أعرف أكثر</a>
              </div>
            </div>
            <div class="col-md-4 col-sm-6 mb-4">
              <div class="card box-invisible">
                <div class="icon-box feature">
                  <i class="fa fa-stethoscope"></i>

                </div>
                <h4>
                  اختبار النظر
                </h4>
                <p>
                  فحص العين لأكتشاف مشكلات العين في مرحلة مبكرة وذلك يساعد في العلاج بشكل افضل مع د/ هبة متولي
                </p>
                <a href="#" class="main-btn">أعرف أكثر</a>
              </div>
            </div>
            <div class="col-md-4 col-sm-6 mb-4">
              <div class="card box-invisible">
                <div class="icon-box feature">
                  <i class="fa fa-glasses"></i>
                </div>
                <h4>
                  علاج الحول لدي الاطفال
                </h4>
                <p>
                  نتمكن من تشخيص الحول في سن مبكر وعلاجة بعدة طرق حسب حالة كل مريض
                </p>
                <a href="#" class="main-btn">
                  أعرف أكثر
                </a>
              </div>
            </div>
            <div class="col-md-4 col-sm-6 mb-4">
              <div class="card box-invisible">
                <div class="icon-box feature">
                  <i class="fa fa-microscope"></i>
                </div>
                <h4> علاج ازدواجية الرؤية
                </h4>
                <p>
                  الرؤية المزدوجة هي مشاهدة صورتين متطابقتين لنفس الشيء في نفس الوقت
                </p>
                <a href="#" class="main-btn">أعرف أكثر</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>


    <section id="" class="opertions">
      <div class="wrapper pb-0">
        <div class="container">
          <div class="row">
            <div class="col-sm-12 text-center mb-5">
              <div class="title-body">
                <h3>
                  العمليات </h3>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-4 col-sm-6 mb-4 box-invisible">
              <div class="card-animate">
                <div class="imgbox">
                  <img src="./images//drhebametwally/home3.png" alt="" />
                </div>
                <p> كسل العين الوظيفي
                </p>
                <p>
                  عمليه
                </p>
                <h6> كسل العين الوظيفي
                </h6>
              </div>
            </div>
            <div class="col-md-4 col-sm-6 mb-4 box-invisible">
              <div class="card-animate">
                <div class="imgbox">
                  <img src="./images//drhebametwally/home1.webp" alt="" />
                </div>
                <p>
                  تصحيح الإبصار
                </p>
                <p>
                  عمليه
                </p>
                <h6> تصحيح الإبصار
                </h6>
              </div>
            </div>
            <div class="col-md-4 col-sm-6 mb-4 box-invisible">
              <div class="card-animate">
                <div class="imgbox">
                  <img src="./images//drhebametwally/home2.png" alt="" />
                </div>
                <p>
                  المياة البيضاء للكبار والاطفال
                </p>
                <p>
                  عمليه
                </p>
                <h6> المياة البيضاء للكبار والاطفال
                </h6>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Gallery Section -->
    <section id="gallery" class="gallery-wrapper wrapper">
      <div class="container">
        <div class="row">
          <div class="col-sm-12 text-center mb-5">
            <div class="title-body">
              <h3>
                الأستوديو
              </h3>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-4 col-sm-6 mb-4 box-invisible">
            <figure>
              <img src="images/drhebametwally/st1.jpg" class="w-100 h-100" alt="st1">
            </figure>
          </div>
          <div class="col-md-4 col-sm-6 mb-4 box-invisible">
            <figure>
              <img src="images/drhebametwally/st2.jpg" class="w-100 h-100" alt="st1">
            </figure>
          </div>
          <div class="col-md-4 col-sm-6 mb-4 box-invisible">
            <figure>
              <img src="images/drhebametwally/st3.jpg" class="w-100 h-100" alt="st1">
            </figure>
          </div>
        </div>
      </div>
    </section>
    <!-- Gallery Section exit -->


    <!-- inforamtion -->
    <section id="inforamtion wrapper">
      <div class="wrapper pb-0">
        <div class="container">
          <div class="row">
            <div class="col-md-4 col-sm-6 mb-4 box-invisible">
              <div class="card text-center">
                <div class="icon-box feature">
                  <i class="fas fa-phone"></i>
                </div>
                <div>
                  <h4>01155611453</h4>
                  <p>
                    official@drhebametwally.com </p>
                </div>
              </div>
            </div>
            <div class="col-md-4 col-sm-6 mb-4 box-invisible">
              <div class="card text-center">
                <div class="icon-box feature">
                  <i class="fas fa-map-marker-alt"></i>
                </div>
                <div>
                  <h4>المهندسين, القاهرة, مصر</h4>
                  <p>
                    116 ش محيي الدين ابو العز الدور الاول متفرع من جامعة الدول </p>
                </div>
              </div>
            </div>
            <div class="col-md-4 col-sm-6 mb-4 box-invisible">
              <div class="card text-center">
                <div class="icon-box feature">
                  <i class="fas fa-clock"></i>
                </div>
                <div>
                  <h4>السبت - الاربعاء</h4>
                  <p>
                    الاقصر زياره كل اسبوعين </p>
                </div>
              </div>
            </div>

          </div>
        </div>
      </div>
    </section>
    <!-- About section -->
    <section id="about" class="about-wrapper wrapper">
      <div class="container">
        <div class="row">
          <div class="col-md-6 ">
            <h2>ساعات العمل </h2>
            <p>
              المهندسين – من السبت إلى الأربعاء
              زايد – الأحد والأربعاء
              الأقصر – زياره كل أسبوعين
            <div class="about-clinic">
              <div class="card box-invisible">
                <h4>الأحد</h4>
                <p>8:00 AM 2:30 – PM
                </p>
              </div>
              <div class="card box-invisible">
                <h4>الإثنين</h4>
                <p>8:00 AM 7:00 – PM
                </p>
              </div>
              <div class="card box-invisible">
                <h4>الثلاثاء</h4>
                <p>8:00 AM 7:00 – PM
                </p>
              </div>
              <div class="card box-invisible">
                <h4>الأربعاء</h4>
                <p>8:00 AM 7:00 – PM
                </p>
              </div>
              <div class="card box-invisible">
                <h4>الخميس</h4>
                <p>مغلق
                </p>
              </div>
              <div class="card box-invisible">
                <h4>الجمعة</h4>
                <p>مغلق
                </p>
              </div>
              <div class="card box-invisible">
                <h4>السبت</h4>
                <p>8:00 AM 7:00 – PM

                </p>
              </div>
            </div>
          </div>
          <div class="col-md-6 mb-md-0 mb-5">
            <div class="about-box-image">
              <img src="images/drhebametwally/Png-doctor.png" alt="" class="about-animate">
            </div>
          </div>

        </div>
      </div>
    </section>
    <!-- About section exit -->

    <!-- before & after -->
    <section id="before-after" class="gallery-wrapper wrapper">
      <div class="container">
        <div class="row">
          <div class="col-sm-12 text-center mb-5">
            <div class="title-body">
              <h3>
                قبل وبعد
              </h3>
            </div>
          </div>
        </div>
        <div class="swiper mySwiper box-invisible">
          <div class="swiper-wrapper">
            <div class="swiper-slide">
              <figure>
                <img src="./images/drhebametwally/before1.jpg" class="d-block w-100" alt="loading">
              </figure>
            </div>
            <div class="swiper-slide">
              <figure>
                <img src="./images/drhebametwally/before2.jpg" class="d-block w-100" alt="loading">
              </figure>
            </div>
            <div class="swiper-slide">
              <figure>
                <img src="./images/drhebametwally/before3.jpg" class="d-block w-100" alt="loading">
              </figure>
            </div>
            <div class="swiper-slide">
              <figure>
                <img src="./images/drhebametwally/before1.jpg" class="d-block w-100" alt="loading">
              </figure>
            </div>
            <div class="swiper-slide">
              <figure>
                <img src="./images/drhebametwally/before1.jpg" class="d-block w-100" alt=".loading">
              </figure>
            </div>
            <div class="swiper-slide">
              <figure>
                <img src="./images/drhebametwally/before1.jpg" class="d-block w-100" alt="loading">
              </figure>
            </div>
            <div class="swiper-slide">
              <figure>
                <img src="./images/drhebametwally/before1.jpg" class="d-block w-100"
                  alt="./images/drhebametwally/before1.jpg">
              </figure>
            </div>
            <div class="swiper-slide">
              <figure>
                <img src="./images/drhebametwally/before2.jpg" class="d-block w-100"
                  alt="./images/drhebametwally/before1.jpg">
              </figure>
            </div>
            <div class="swiper-slide">
              <figure>
                <img src="./images/drhebametwally/before3.jpg" class="d-block w-100"
                  alt="./images/drhebametwally/before1.jpg">
              </figure>
            </div>
            <div class="swiper-slide">
              <figure>
                <img src="./images/drhebametwally/before1.jpg" class="d-block w-100"
                  alt="./images/drhebametwally/before1.jpg">
              </figure>
            </div>
            <div class="swiper-slide">
              <figure>
                <img src="./images/drhebametwally/before1.jpg" class="d-block w-100"
                  alt="./images/drhebametwally/before1.jpg">
              </figure>
            </div>
            <div class="swiper-slide">
              <figure>
                <img src="./images/drhebametwally/before1.jpg" class="d-block w-100"
                  alt="./images/drhebametwally/before1.jpg">
              </figure>
            </div>
          </div>
          <div class="swiper-pagination"></div>

        </div>

      </div>
    </section>
    <!-- videos -->
    <!-- <section id="videos">
    <div class="container title-body">
      <h3>
        الفيديوهات
      </h3>
    </div>
    <div class="wrapper pb-0 video-youtype">
      <div class="container">
        <div class="row">
          <div class="col-md-4 col-sm-6 mb-4">
            <div class="video-youtype-box">
              <iframe src="https://www.youtube.com/embed/59VfsvT3sc8?si=5zpe3Nqse5oDHYdp" title="YouTube video player"
                frameborder="0"
                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
            </div>
          </div>
          <div class="col-md-4 col-sm-6 mb-4">
            <div class="video-youtype-box">
              <iframe src="https://www.youtube.com/embed/59VfsvT3sc8?si=5zpe3Nqse5oDHYdp" title="YouTube video player"
                frameborder="0"
                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
            </div>
          </div>
          <div class="col-md-4 col-sm-6 mb-4">
            <div class="video-youtype-box">
              <iframe src="https://www.youtube.com/embed/59VfsvT3sc8?si=5zpe3Nqse5oDHYdp" title="YouTube video player"
                frameborder="0"
                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
            </div>
          </div>
          <div class="col-md-4 col-sm-6 mb-4">
            <div class="video-youtype-box">
              <iframe src="https://www.youtube.com/embed/59VfsvT3sc8?si=5zpe3Nqse5oDHYdp" title="YouTube video player"
                frameborder="0"
                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
            </div>
          </div>
          <div class="col-md-4 col-sm-6 mb-4">
            <div class="video-youtype-box">
              <iframe src="https://www.youtube.com/embed/59VfsvT3sc8?si=5zpe3Nqse5oDHYdp" title="YouTube video player"
                frameborder="0"
                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
            </div>
          </div>
          <div class="col-md-4 col-sm-6 mb-4">
            <div class="video-youtype-box">
              <iframe src="https://www.youtube.com/embed/59VfsvT3sc8?si=5zpe3Nqse5oDHYdp" title="YouTube video player"
                frameborder="0"
                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
            </div>
          </div>
          <div class="col-md-4 col-sm-6 mb-4">
            <div class="video-youtype-box">
              <iframe src="https://www.youtube.com/embed/59VfsvT3sc8?si=5zpe3Nqse5oDHYdp" title="YouTube video player"
                frameborder="0"
                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
            </div>
          </div>
          <div class="col-md-4 col-sm-6 mb-4">
            <div class="video-youtype-box">
              <iframe src="https://www.youtube.com/embed/59VfsvT3sc8?si=5zpe3Nqse5oDHYdp" title="YouTube video player"
                frameborder="0"
                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
            </div>
          </div>

        </div>
      </div>
    </div>
  </section> -->
    <!-- Certificates -->
    <section id="certificates" class="gallery-wrapper wrapper">
      <div class="container">
        <div class="row">
          <div class="col-sm-12 text-center mb-5">
            <div class="title-body">
              <h3>
                الشهادات
              </h3>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-4 col-sm-6 mb-4 box-invisible">
            <figure>
              <img src="images/drhebametwally/cer-1.webp" class="w-100 h-100" alt="">
            </figure>
          </div>
          <div class="col-md-4 col-sm-6 mb-4 box-invisible">
            <figure>
              <img src="images/drhebametwally/cer-2.png" class="w-100 h-100" alt="">
            </figure>
          </div>
          <div class="col-md-4 col-sm-6 mb-4 box-invisible">
            <figure>
              <img src="images/drhebametwally/cer-3.webp" class="w-100 h-100" alt="">
            </figure>
          </div>
          <div class="col-md-4 col-sm-6 mb-4 box-invisible">
            <figure>
              <img src="images/drhebametwally/cer-4.png" class="w-100 h-100" alt="">
            </figure>
          </div>
        </div>
      </div>
    </section>
    <!-- last news -->
    <section id="last-news" class="team-wrapper wrapper last-news">
      <div class="title-body">
        <h3>
          أحدث الأخبار
        </h3>

      </div>
      <div class="container">
        <div class="row">
          <div class="col-md-4 col-sm-6 mb-4 box-invisible">
            <div class="team-img">
              <img src="images/drhebametwally/new1.webp" class="img-fluid" alt="">
            </div>
            <div class="card rounded-3 py-4">
              <div class="">
                <p>
                  <span>أكتوبر 26, 2024
                  </span>
                  <i class="fa fa-light fa-clock"></i>

                </p>
                <h5>افضل دكتور عيون لحول الاطفال في مصر
                </h5>
              </div>
            </div>
          </div>
          <div class="col-md-4 col-sm-6 mb-4 box-invisible">
            <div class="team-img">
              <img src="images/drhebametwally/new2.webp" class="img-fluid" alt="">
            </div>
            <div class="card rounded-3 py-4">
              <p>
                <span>أكتوبر 26, 2024
                </span>
                <i class="fa fa-light fa-clock"></i>

              </p>
              <h5>افضل دكتور عيون لحول الاطفال في مصر
              </h5>
            </div>
          </div>
          <div class="col-md-4 col-sm-6 mb-4 box-invisible">
            <div class="team-img">
              <img src="images/drhebametwally/new3.webp" class="img-fluid" alt="">
            </div>
            <div class="card rounded-3 py-4">
              <p>
                <span>أكتوبر 26, 2024
                </span>
                <i class="fa fa-light fa-clock"></i>

              </p>
              <h5>افضل دكتور عيون لحول الاطفال في مصر
              </h5>
            </div>
          </div>
          <div class="col-md-4 col-sm-6 mb-4 box-invisible">
            <div class="team-img">
              <img src="images/drhebametwally/new1.webp" class="img-fluid" alt="">
            </div>
            <div class="card rounded-3 py-4">
              <p>
                <span>أكتوبر 26, 2024
                </span>
                <i class="fa fa-light fa-clock"></i>

              </p>
              <h5>افضل دكتور عيون لحول الاطفال في مصر
              </h5>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- locations -->
    <section id="locations" class="team-wrapper wrapper locations">
      <div class="title-body">
        <h3>
          موقعنا </h3>

      </div>
      <div class="container">
        <div class="row">
          <div class="col-md-4 col-sm-6 mb-4 box box-invisible">
            <div class="p-0 card rounded-3">
              <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3453.635530049941!2d31.1991875!3d30.047312499999997!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x145841ffa854bc69%3A0xea78e8f314183cbf!2z2K_Zg9iq2YjYsSDYudmK2YjZhiDYoti32YHYp9mEINiv2YPYqtmI2LHYqSDZh9io2Kkg2YXYqtmI2YTZiSDYudmE2KfYrCDYrdmI2YQg2LnZitmI2YYg2KfZhNij2LfZgdin2YQg2Ygg2KfZhNmD2KjYp9ixINmIINi52YTYp9isINin2YTZhdmK2KfZhyDYp9mE2KjZiti22KfYoSDZiCDYrNix2KfYrdin2Kog2LnZitmI2YYg2KfZhNij2LfZgdin2YTigI7igI4!5e0!3m2!1sen!2seg!4v1675092379871!5m2!1sen!2seg"
                width="100%" height="100%" style="border: 0px; width: 100%;" allowfullscreen="" loading="lazy"
                referrerpolicy="no-referrer-when-downgrade" data-gtm-yt-inspected-14="true"></iframe>
            </div>
          </div>
          <div class="col-md-4 col-sm-6 mb-4 box box-invisible">
            <div class="p-0 card rounded-3">
              <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3595.4428749485355!2d32.6408376!3d25.689756799999998!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x144915cd6209615d%3A0x5ab7388fdc3658e9!2z2K8vINmH2KjZhyDZhdiq2YjZhNmKINi52YTYp9isINin2YTYrdmI2YQg2Ygg2LnZitmI2YYg2KfZhNij2LfZgdin2YQg2Ygg2KfZhNmF2YrYp9mHINin2YTYqNmK2LbYp9ihINio2KfZhNij2YLYtdix!5e0!3m2!1sen!2seg!4v1675092457321!5m2!1sen!2seg"
                width="100%" height="100%" style="border: 0px; width: 100%;" allowfullscreen="" loading="lazy"
                referrerpolicy="no-referrer-when-downgrade" data-gtm-yt-inspected-14="true"></iframe>
            </div>
          </div>
          <div class="col-md-4 col-sm-6 mb-4 box box-invisible">
            <div class="p-0 card rounded-3">
              <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3454.2392149539214!2d31.0011485!3d30.0299943!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x145841f3b5d79b39%3A0x56e93cc98c1bbcfe!2z2K8vINmH2KjYqSDZhdiq2YjZhNmJINi52YTYp9isINit2YjZhCDYudmK2YjZhiDYp9mE2KPYt9mB2KfZhCDZiCDYp9mE2YPYqNin2LEg2Ygg2LnZhNin2Kwg2KfZhNmF2YrYp9mHINin2YTYqNmK2LbYp9ihINmIINis2LHYp9it2KfYqiDYudmK2YjZhiDYp9mE2KPYt9mB2KfZhOKAjg!5e0!3m2!1sen!2seg!4v1675092412295!5m2!1sen!2seg"
                width="100%" height="100%" style="border: 0px; width: 100%;" allowfullscreen="" loading="lazy"
                referrerpolicy="no-referrer-when-downgrade" data-gtm-yt-inspected-14="true"></iframe>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- Blog section exit -->
  </main>

  @stop