 <!-- #endregion -->
 @extends('layouts.front')

 @section('title')
    
 {{ __('عن الشركة') }}  -  {{ $gs->{'title_' . $sign} }}
      
 @stop
 
 @section('gsearch')
     <meta property="og:image" content=" {{ $gs->{'logo_' . $sign} }}" />
 @stop
 
 
 @section('content')
 
    <div class="about-us mt-5 pt-5">
        <div class="container pt-5">
            <div class="title_lines">
                <h1>
                  {{ __('عن الشركة') }}  
                </h1>
            </div>
            <div class="row">
                <div class="">
                    <div class="text-center animate__animated animate__fadeInRight" data-wow-delay="1s" data-wow-duration="1s">
                        <img width="100%" height="400px" class="m-auto" src="{{ $ps->about_photo }}" alt="">
                    </div>
                </div>
                <div class="">
                    <div class="pt-5 animate__animated animate__fadeInLeft " data-wow-delay="0.5s" data-wow-duration="1s">
                        <h2> {{ __('Cairo solar') }} </h2>
                        <p >    {!! $ps->about_details_ar !!}  </p>
                    </div>
                </div>

            </div>
        </div>
    </div>

    
    <div class="mission text-center mt-5 p-5">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 col-lg-6 col-md-6">
                    <div class="border p-4 mb-3">
                        <img src="img/business-target.png" width="120px" height="120px" alt="">
                        <h1>Our Mission</h1>
                        
                        <p> للمصانع والفنادق والمزارع والمستودعات والمدارس ومباني الإدارات ومضخات آبار المياه والمنازل.
                            
                            بدأ كل شيء في عام 2014 عندما أصبحت شركة كايرو سولار أول شركة مصرية توفر المال لعملائها عن طريق تحويل الطاقة الشمسية إلى كهرباء.
                            
                            ومنذ ذلك الحين، قامت شركة القاهرة للطاقة الشمسية. نجحت في تصميم وشراء وتركيب 75 مشروعًا بإجمالي حوالي 16 ميجاوات من محطات الطاقة الشمسية. قام شريك المقاولات من الباطن لشركة كايرو سولار بتركيب إجمالي 200 ميجاوات في مصر.
                            </p>
                    </div>
                </div>
                <div class="col-12 col-lg-6 col-md-6">
                    <div class="border p-4">
                        <img src="img/planning.png" width="120px" height="120px" alt="">
                        <h1>Our strategy</h1>
                        <p> للمصانع والفنادق والمزارع والمستودعات والمدارس ومباني الإدارات ومضخات آبار المياه والمنازل.
                            
                            بدأ كل شيء في عام 2014 عندما أصبحت شركة كايرو سولار أول شركة مصرية توفر المال لعملائها عن طريق تحويل الطاقة الشمسية إلى كهرباء.
                            
                            ومنذ ذلك الحين، قامت شركة القاهرة للطاقة الشمسية. نجحت في تصميم وشراء وتركيب 75 مشروعًا بإجمالي حوالي 16 ميجاوات من محطات الطاقة الشمسية. قام شريك المقاولات من الباطن لشركة كايرو سولار بتركيب إجمالي 200 ميجاوات في مصر.
                            </p>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="team p-2">
      <div class="container">
        <div class="title_lines">
          <h1>
             فريقنا
          </h1>
      </div>
        <div class="row">
          <div class="col-12 col-lg-4 col-md-6">
            <div class="div-team">
              <img src="img/membar1.webp" alt="">
              <h1>Hisham Tawfik هشام توفيق</h1>
              <span>Board Member عضو مجلس ادارة</span>
              <p>كان هشام وزيراً لقطاع الأعمال بين عامي 2018-2022. يتمتع بخبرة تزيد عن 30 عامًا في مجال الخدمات المصرفية الاستثمارية. شغل منصب عضو مجلس إدارة بورصة القاهرة لمدة 7 سنوات، ويشغل حاليًا منصب رئيس مجلس إدارة شركة عربية أون لاين للوساطة في الأوراق المالية والتي تحتل المرتبة الثالثة في البورصة المصرية EGX. حصل هشام على شهادة الأنظمة الكهروضوئية (PV) من كندا.              </p>
            </div>
          </div>
          <div class="col-12 col-lg-4 col-md-6">
            <div class="div-team">
              <img src="img/membar2.png" alt="">
              <h1>Samer Saad سامر سعد</h1>
              <span>Chairman رئيس مجلس ادارة</span>
              <p>يشغل سامر حاليًا منصب رئيس مجلس إدارة شركة كايرو سولار. بالإضافة إلى المدير العام لشركة Trade Net، وهي شركة تكنولوجيا معلومات مملوكة للقطاع الخاص تأسست عام 1997. تقدم Trade Net حلول تكنولوجيا المعلومات والخدمات الاستشارية للشركات الصغيرة والمتوسطة.              </p>
            </div>
          </div>
          <div class="col-12 col-lg-4 col-md-6">
            <div class="div-team">
              <img src="img/maher-2.webp" alt="">
              <h1>Maher Hanna ماهر حنا</h1>
              <span>Board memeber عضو مجلس ادارة</span>
              <p>يشغل ماهر حاليًا منصب رئيس مجلس الإدارة والرئيس التنفيذي لشركة الأنظمة المكتبية المتكاملة (IOS)، وهي شركة رائدة في أنظمة التشغيل الآلي للمكاتب ووكيل لشركة OCE/Canon وRicoh. يتمتع ماهر بخبرة واسعة في العمليات التجارية ودعم ما بعد البيع، حيث تعامل مع مئات العملاء من المؤسسات والمنظمات متعددة الجنسيات.</p>
            </div>
          </div>
          <div class="col-12 col-lg-4 col-md-6">
            <div class="div-team">
              <img src="img/membar3.webp" alt="">
              <h1>Hatem Tawfik حاتم توفيق</h1>
              <span>Managing Director عضو منتدب</span>
              <p>حصل حاتم على درجة البكالوريوس مع مرتبة الشرف في الاقتصاد وماجستير في إدارة الأعمال من جامعة ماكماستر في كندا. يشغ حاليا منصب سكرتير عام شعبة الطاقة المستدامة بالغرفة التجارية بالقاهرة. عمل حاتم سابقًا كمحلل أول للشركات في البنك التجاري الدولي بمصر في قطاعي البتروكيماويات والتشييد ومواد البناء.              </p>
            </div>
          </div>
          <div class="col-12 col-lg-4 col-md-6">
            <div class="div-team">
              <img src="img/membar4.webp" alt="">
              <h1>Tamer Hanna تامر حنا</h1>
              <span>Board Member عضو مجلس ادارة</span>
              <p>تامر هو مالك وعضو مجلس إدارة شركة كايرو سولار. حصل تامر على درجة البكالوريوس في الهندسة الكهربائية من الجامعة الألمانية بالقاهرة ودرجة الماجستير المزدوجة في الطاقة الشمسية من جامعة كاسل بألمانيا وجامعة القاهرة بمصر. عمله في مجال البحث والتطوير مع معهد فراونهوفر، وهو أكبر معهد للبحث والتطوير في ألمانيا، وعمله مع برنامج الطاقة المتجددة GIZ في مصر، منحه أساسًا قويًا في تطبيقات الطاقة الشمسية. يعمل تامر حاليًا لدى مستشار الطاقة المتجددة (EBRD-GEFF) في Stantec.</p>
            </div>
          </div>
        </div>
      </div>
    </div>

     @stop