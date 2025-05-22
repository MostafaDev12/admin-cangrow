     
@extends('layouts.front')

@section('title')
   
        {{ $gs->{'title_' . $sign} }}
     
@stop

@section('gsearch')
    <meta property="og:image" content=" {{ $gs->{'logo_' . $sign} }}" />
@stop


@section('content')

@php
$phones =  explode(',', $gs->phones);
$emails =   explode(',', $gs->emails);
 
$randomPhone = Arr::random($phones);
@endphp
  <div class="slider">
    <div class="swiper mySwiper">
      <div class="swiper-wrapper">
        @foreach ($sliders as $slider)
        <!-- Slide 1 -->
        <div class="swiper-slide">
          <div class="slide-inner">
            <img src="{{ $slider->{'photo'}  ?? ''}}" loading="lazy" alt="Slide Image">
            <div class="overlay"></div>
            <div class="slide-content">
              <h2>   {{ $slider->{'title_' . $sign}  ?? ''}}</h2>
              <p> {!! $slider->{'details_' . $sign}  ?? '' !!}</p>
              <a href="#about">اعرف المزيد</a>
            </div>
          </div>
        </div>
  
        @endforeach
        
      
  
      </div>
  
      <!-- Pagination -->
      <div class="swiper-pagination"></div>
    </div>
  </div>
  
  <div id="about" class="about pt-2 pb-5">
    <div class="container p-lg-5">
      <div class="row">
        <div class="col-12 col-lg-6">
          <div class="">
            <h2>نبذة عن شركتنا</h2>
            <p> بفضل خبرتنا التي تزيد عن 10 سنوات في مجال المصاعد، نتعاون مع أصحاب المشاريع والمحترفين في التصميم لإنشاء مشاريع عالية الجودة. بفضل خبرتنا التي تزيد عن 10 سنوات في مجال المصاعد، نتعاون مع أصحاب المشاريع والمحترفين في التصميم لإنشاء مشاريع عالية الجودة. بفضل خبرتنا التي تزيد عن 10 سنوات في مجال المصاعد، نتعاون مع أصحاب المشاريع والمحترفين في التصميم لإنشاء مشاريع عالية الجودة.</p>
            <a class="btn-about" href="about.html">اقرأ المزيد</a>
          </div>
        </div>
        <div class="col-12 col-lg-6">
          <img src="img/slider.jpg" alt="About Image">
        </div>
      </div>
      <div class="row ">
        <div class="col-12 col-lg-3 col-md-6">
          <div class="about-box">
            <img src="img/goals.svg" alt="About Image">
            <h3>أهدافنا </h3>
            <p>واحدة من قيمنا الأساسية هي الابتكار. نبقى على اطلاع دائم بأحدث اتجاهات الصناعة والتقدم التكنولوجي...</p>
          </div>
        </div>
        <div class="col-12 col-lg-3 col-md-6">
          <div class="about-box">
            <img src="img/target.svg" alt="About Image">
            <h3>مهمتنا</h3>
            <p>يلتزم فريقنا من المصممين والمهندسين ذوي الخبرة العالية بتقديم التميز والرقي في كل مشروع . نح...</p>
          </div>
        </div>
        <div class="col-12 col-lg-3 col-md-6">
          <div class="about-box">
            <img src="img/eye.svg" alt="About Image">
            <h3>رؤيتنا</h3>
            <p>نحن نعلم أن المطبخ ليس مكاناً لإعداد الطعام فحسب , وإنما هو قلب المنزل , ومساحة للتجمع والتسلية و...</p>
          </div>
        </div>
        <div class="col-12 col-lg-3 col-md-6">
          <div class="about-box">
            <img src="img/specialist.svg" alt="About Image">
            <h3>مميزاتنا </h3>
            <p>نحن نعلم أن المطبخ ليس مكاناً لإعداد الطعام فحسب , وإنما هو قلب المنزل , ومساحة للتجمع والتسلية و...</p>
          </div>
        </div>
      </div>
    </div>
  </div>

  
  <div class="service">
    <div class="container p-lg-5">
      <div class="row">
        <div class="col-12 col-lg-6">
          <h2>خدماتنا</h2>
          <p>نقدم مجموعة متنوعة من الخدمات التي تلبي احتياجات عملائنا في مجال المصاعد. تشمل خدماتنا تصميم وتركيب وصيانة الأنظمة المختلفة.</p>
          <a class="btn-service" href="service.html">اقرأ المزيد</a>
        </div>
        <div class="col-12 col-lg-6">
          <img src="img/3961.jpg" alt="Service Image">
        </div>
      </div>
      <div class="row">
        <div class="col-12 col-lg-4 col-md-6">
          <div class="service-box">
            <img src="img/صيانة-مصاعد-1.webp" alt="Service Image">
            <div class="service-box-content">
              <h3>تصميم وتركيب المصاعد</h3>
              <p>نقدم خدمات تصميم وتركيب المصاعد بأعلى معايير الجودة.</p>
              <a href="">المزيد</a>
            </div>
          </div>
        </div>
        <div class="col-12 col-lg-4 col-md-6">
          <div class="service-box">
            <img src="img/صيانة-مصاعد-1.webp" alt="Service Image">
            <div class="service-box-content">
              <h3>تصميم وتركيب المصاعد</h3>
              <p>نقدم خدمات تصميم وتركيب المصاعد بأعلى معايير الجودة.</p>
              <a href="">المزيد</a>
            </div>
          </div>

        </div>
        <div class="col-12 col-lg-4 col-md-6">
          <div class="service-box">
            <img src="img/صيانة-مصاعد-1.webp" alt="Service Image">
            <div class="service-box-content">
              <h3>تصميم وتركيب المصاعد</h3>
              <p>نقدم خدمات تصميم وتركيب المصاعد بأعلى معايير الجودة.</p>
              <a href="">المزيد</a>
            </div>
          </div>

        </div>
        <div class="col-12 col-lg-4 col-md-6">
          <div class="service-box">
            <img src="img/صيانة-مصاعد-1.webp" alt="Service Image">
            <div class="service-box-content">
              <h3>تصميم وتركيب المصاعد</h3>
              <p>نقدم خدمات تصميم وتركيب المصاعد بأعلى معايير الجودة.</p>
              <a href="">المزيد</a>
            </div>
          </div>

        </div>
        <div class="col-12 col-lg-4 col-md-6">
          <div class="service-box">
            <img src="img/صيانة-مصاعد-1.webp" alt="Service Image">
            <div class="service-box-content">
              <h3>تصميم وتركيب المصاعد</h3>
              <p>نقدم خدمات تصميم وتركيب المصاعد بأعلى معايير الجودة.</p>
              <a href="">المزيد</a>
            </div>
          </div>

        </div>
        <div class="col-12 col-lg-4 col-md-6">
          <div class="service-box">
            <img src="img/صيانة-مصاعد-1.webp" alt="Service Image">
            <div class="service-box-content">
              <h3>تصميم وتركيب المصاعد</h3>
              <p>نقدم خدمات تصميم وتركيب المصاعد بأعلى معايير الجودة.</p>
              <a href="">المزيد</a>
            </div>
          </div>

        </div>
      </div>
    </div>
  </div>
  <div class="details-features">
    <div class="container p-lg-5">
      <div class="text-xl-center mb-4">
        <h2>عن شتيجن</h2>
        <P>عندما تم التفكير في شتيجن للمرة الأولى، سعينا إلى بناء نموذج عمل يركز على الجودة والانتباه للتفاصيل. نهج مستوحى لتنفيذ مشاريع سكنية وتجارية عالية الجودة</P>
      </div>
      <div class="row">
        <div class="col-12 col-lg-4 col-md-6">
          <div class="box-features">
            <div class="d-flex">
              <div>
                <i class="fa-solid fa-lightbulb"></i>
              </div>
              <div>
                <h2> جودة وأمان المصاعد</h2>
                <p>نحن ملتزمون بتقديم مصاعد عالية الجودة ومصممة بأحدث التقنيات لضمان الأمان والأداء الموثوق.</p>
              </div>
            </div>
          </div>
        </div>
        <div class="col-12 col-lg-4 col-md-6">
           <div class="box-features">
            <div class="d-flex  ">
              <div>
                <i class="fa-solid fa-user"></i>
              </div>
              <div>
                <h2> خدمة العملاء الممتازة</h2>
                <p>يعتبر تلبية احتياجات عملائنا وتقديم خدمة عملاء لدعم عملائنا في كل مرحلة من مراحل توريد وصيانة المصاعد.</p>
              </div>
            </div>
          </div>
        </div>
        <div class="col-12 col-lg-4 col-md-6">
          <div class="box-features">
            <div class="d-flex  ">
              <div>
                <i class="fa-solid fa-bucket"></i>
              </div>
              <div>
                <h2>حلول مخصصة</h2>
                <p> نقدم حلاً فريدًا لاحتياجات كل عميل، حيث نهتم بتوفير مصاعد تتناسب مع متطلبات المكان والاستخدام الخاصة بهم.</p>
              </div>
            </div>
          </div>
        </div>
        <div class="col-12 col-lg-4 col-md-6">
           <div class="box-features">
            <div class="d-flex  ">
              <div>
                <i class="fa-solid fa-circle-check"></i>
              </div>
              <div>
                <h2>نلتزم بعرض السعر المفصل</h2>
                <p>العمل مع تقارير مفصلة</p>
              </div>
            </div>
          </div>
        </div>
        <div class="col-12 col-lg-4 col-md-6">
           <div class="box-features">
            <div class="d-flex  ">
              <div>
                <i class="fa-solid fa-circle-check"></i>
              </div>
              <div>
                <h2>  24/7 خدمة علي مدار اليوم</h2>
                <p>اتصل بنا في كل الايام في اي وقت</p>
              </div>
            </div>
          </div>
        </div>
        <div class="col-12 col-lg-4 col-md-6">
           <div class="box-features">
            <div class="d-flex  ">
              <div>
                <i class="fa-solid fa-circle-check"></i>
              </div>
              <div>
                <h2>١٢ عاما من الخبرة</h2>
                <p>ISO 9001 Certification </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <section class="stats-section">
    <div class="container">
      <div class="stats-grid">
        
        <div class="stat-box">
          <div class="icon"><i class="fa-solid fa-building-shield"></i></div>
          <h3 class="counter" data-target="1430">0</h3>
          <p>مشاريع مكتملة</p>
        </div>
  
        <div class="stat-box">
          <div class="icon"><i class="fa-solid fa-helmet-safety"></i></div>
          <h3 class="counter" data-target="43">0</h3>
          <p>مهندسين محترفين</p>
        </div>
  
        <div class="stat-box">
          <div class="icon"><i class="fa-solid fa-ruler"></i></div>
          <h3 class="counter" data-target="747">0</h3>
          <p>+عقود صيانة</p>
        </div>
  
        <div class="stat-box">
          <div class="icon"><i class="fa-solid fa-building-circle-check"></i></div>
          <h3 class="counter" data-target="4">0</h3>
          <p>+فروع في المملكة</p>
        </div>
  
      </div>
    </div>
  </section>
  
  <div class="pannar">
    <div class="container">
      <div class="row">
        <div class="col-6">
          <p>  هل تريد حجز موعد وسنتواصل معك     </p>
        </div>
        <div class="col-6">
          <a href=""> احجز الان  </a>
        </div>
      </div>
    </div>
  </div>




 @stop