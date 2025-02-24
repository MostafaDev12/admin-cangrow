 
   @php
   $phones =  explode(',', $gs->phones);
   $emails =   explode(',', $gs->emails);
   $addresses =  json_decode($gs->{'addresses_' . $sign});
 
   $randomPhone = Arr::random($phones);
   @endphp


<div class="contact-info {{ $classes ?? ''}}">
    <div class="container pt-5">
        <div class="title_lines">
            <h1>
                   {{ __('للتواصل معنا') }} 
            </h1>
        </div>
        <div class="row">
            <div class="col-12 col-lg-12 col-md-6">
                <div class="address text-end">
                    <div class="container">
                        <div class="row">
                            
                            <div class="col-12 col-lg-6">
                                <div class="info-item d-flex  align-items-center">
                                    <img src="{{ $gs->{'logo_' . $sign} }}" class="mb-3" alt="">
                                   <div class="me-4">
                                    @foreach ($phones as $phone)
                                    <p>
                                        <a href="tel:+2{{ $phone }}"><i class="fas fa-phone"></i> {{ $phone }} </a>
                                    </p>
                                    
                                    @endforeach
                                    @foreach ($emails as $email)
 
                                    <p>
                                        <a href="mailto:{{ $email }}"> <i class="fas fa-envelope"></i>
                                            {{ $email }}</a>
                                    </p>
                                     
                                    @endforeach
                                    
                                   </div>
                                </div>
                            </div>
                            <div class="col-12 col-lg-6">
                                <div class="info-item">
                                    <h5 class="title">   {{ __('عناوين فروعنا') }} </h5>
                                    @foreach ($addresses as $address)
                                     <p>   <i class="fas fa-map-marker-alt"></i>  {{ $address }}   </p>
                                    <br>
                                    @endforeach
                                    
                                </div>
                            </div>
                        </div>
                        <!-- <div class="col-xl-6 col-md-6 col-12">
                    <div class="responsive-map">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d55209.93468114526!2d31.2979567!3d30.1336591!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x14586a62912082db%3A0x5ccf0d5b5c2a50!2z2KjYp9iz2YjYs9iMINin2YTZgtmG2KfYt9ixINin2YTYrtmK2LHZitip2Iwg2YXYrdin2YHYuNipINin2YTZgtmE2YrZiNio2YrYqQ!5e0!3m2!1sar!2seg!4v1734002666614!5m2!1sar!2seg" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>
                </div> -->
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-12 col-md-6">
                <div class="form-maintenance ">
                    <form action="{{route('front.contact.submit')}}" name="appointment" id="email-form" method="POST" autocomplete="off" class="cons-contact-form">
                        {{csrf_field()}}
                        <div class="form-group w-100">
                          <div class="response w-100"></div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="first"> {{ __('الاسم الاول') }}   </label>
                                    <input type="text" class="form-control fname" name="name"  placeholder="{{ __('الاسم الاول') }}" id="first" required>
                                </div>
                            </div>
                            <!--  col-md-6   -->

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="last">{{ __('الاسم الاخير') }} </label>
                                    <input type="text" class="form-control"  name="last_name" placeholder="{{ __('الاسم الاخير') }}" id="last" >
                                </div>
                            </div>
                            <!--  col-md-6   -->
                        </div>


                        <div class="row">
                            <div class="col-md-6">

                                <div class="form-group">
                                    <label for="email">   {{ __('البريد الالكتروني') }}</label>
                                    <input type="email" class="form-control" id="email" name="email" placeholder="{{ __('البريد الالكتروني') }}"  >
                                </div>
                            </div>
                            <!--  col-md-6   -->

                            <div class="col-md-6">

                                <div class="form-group">
                                    <label for="phone">   {{ __('رقم التليفون') }}</label>
                                    <input type="" class="form-control" id="phone"  name="phone" placeholder=" {{ __('رقم التليفون') }}  " required>
                                </div>
                            </div>
                            <!--  col-md-6   -->
                        </div>
                        <!--  row   -->

                        <div class="row">
                            <div class="col-md-6">

                                <div class="form-group">
                                    <label for="address">  {{ __('العنوان') }}</label>
                                    <input type="text" class="form-control" id="address"  name="address" placeholder=" {{ __('العنوان') }}" required>
                                </div>
                            </div>
                            <div class="col-md-6">

                                <div class="form-group">
                                    <label for="address">  {{ __('المنطقة') }}</label>
                                    <input type="text" class="form-control" id="area"  name="area" placeholder="{{ __('المنطقة') }}" required>
                                </div>
                            </div>
                            <div class="col-md-12 ">
                                <div class="form-group">
                                    <label for="email">   {{ __('الرساله') }}</label>
                                    <textarea placeholder=" {{ __('الرساله') }}" class="mt-2" name="text" id=""></textarea>
                                </div>

                            </div>


                        </div>
                        <button type="submit" class="btn btn-primary m-auto d-block mt-3">{{ __('إرسال') }}</button>
                    </form>
                </div>
            </div>
           
           
        </div>
    </div>
</div>