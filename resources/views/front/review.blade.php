  
       @extends('layouts.front')

      @section('title')

          {{ __('اراء') }} - {{ $gs->{'title_' . $sign} }}

      @stop

      @section('gsearch')
          <meta property="og:image" content=" {{ $gs->{'logo_' . $sign} }}" />
      @stop

      @section('css')

    <style>
        * {
            margin: 0px;
            padding: 0px;
            box-sizing: border-box;
        }

        a {
            text-decoration: none;
        }

        #testimonials {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            width: 100%;
        }

        .testimonial-heading {
            letter-spacing: 1px;
            margin: 30px 0px;
            padding: 10px 20px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        .testimonial-heading span {
            font-size: 1.3rem;
            color: #252525;
            margin-bottom: 10px;
            letter-spacing: 2px;
            text-transform: uppercase;
        }

        .testimonial-box-container {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-wrap: wrap;
            width: 100%;
        }

        .testimonial-box {
            width: 500px;
            box-shadow: 2px 2px 30px rgba(0, 0, 0, 0.1);
            background-color: #ffffff;
            padding: 20px;
            margin: 15px;
            cursor: pointer;
        }

        .profile-img {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            overflow: hidden;
            margin-right: 10px;
        }

        .profile-img img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            object-position: center;
        }

        .profile {
            display: flex;
            align-items: center;
        }

        .name-user {
            display: flex;
            flex-direction: column;
        }

        .name-user strong {
            color: #3d3d3d;
            font-size: 1.1rem;
            letter-spacing: 0.5px;
        }

        .name-user span {
            color: #979797;
            font-size: 0.8rem;
        }

        .reviews {
            color: #f9d71c;
        }

        .box-top {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .client-comment p {
            font-size: 0.9rem;
            color: #4b4b4b;
        }

        .testimonial-box:hover {
            transform: translateY(-10px);
            transition: all ease 0.3s;
        }

        @media(max-width:1060px) {
            .testimonial-box {
                width: 45%;
                padding: 10px;
            }
        }

        @media(max-width:790px) {
            .testimonial-box {
                width: 100%;
            }

            .testimonial-heading h1 {
                font-size: 1.4rem;
            }
        }

        @media(max-width:340px) {
            .box-top {
                flex-wrap: wrap;
                margin-bottom: 10px;
            }

            .reviews {
                margin-top: 10px;
            }
        }

        ::selection {
            color: #ffffff;
            background-color: #252525;
        }
    </style>
 

      @stop
      @section('content')

    <main>

        <section id="testimonials">
            <!-- العنوان -->
            <div class="testimonial-heading">
                <span>آراء وتعليقات</span>
                <h4>ماذا يقول عملاؤنا</h4>
            </div>
            <!-- حاويّة آراء العملاء -->
            <div class="testimonial-box-container">
                @foreach($testimonials as $testimonial)
                <!-- البطاقة 1 -->
                <div class="testimonial-box">
                    <!-- الجزء العلوي -->
                    <div class="box-top">
                        <!-- الملف الشخصي -->
                        <div class="profile">
                            <!-- الصورة -->
                            <div class="profile-img">
                                <img src="{{ $testimonial->photo }}" />
                            </div>
                            <!-- الاسم واسم المستخدم -->
                            <div class="name-user">
                                <strong>  {{ optional($testimonial)->{'name_' . $sign} }}  </strong>
                            <!--    <span>@ahmed_cairo</span>-->
                            </div>
                        </div>
                        <!-- التقييم -->
                        <div class="reviews">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i> <!-- نجمة فارغة -->
                        </div>
                    </div>
                    <!-- التعليق -->
                    <div class="client-comment">
                        <p>  {{ optional($testimonial)->{'details_' . $sign} }} </p>
                    </div>
                </div>
                 @endforeach
               
            </div>
        </section>
    </main>

 
 @stop