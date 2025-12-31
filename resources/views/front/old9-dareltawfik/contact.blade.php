   @extends('layouts.front')

  @section('title')

      {{ __('الإتصـــال بنـــا') }} - {{ $gs->{'title_' . $sign} }}

  @stop

  @section('gsearch')
      <meta property="og:image" content=" {{ $gs->{'logo_' . $sign} }}" />
  @stop


  @section('content')
      @php
          $phones = explode(',', $gs->phones);
          $emails = explode(',', $gs->emails);
          $addresses = json_decode($gs->{'addresses_' . $sign});
          $randomPhone = Arr::random($phones);
      @endphp


    <main>

        <section class="py-16 md:py-24">
            <div class="container mx-auto px-4">

                <div class="flex justify-center items-center gap-5 mb-10">

                    @if(App\Models\Socialsetting::find(1)->t_status == 1) 
                        <a href="{{ App\Models\Socialsetting::find(1)->twitter }}" target="_blank" aria-label="Twitter" class="w-10 h-10 flex items-center justify-center bg-gray-100 rounded-full text-gray-500 hover:bg-primary hover:text-white transition-all"><i
                                class="fa-brands fa-twitter"></i></a>
                        @endif
                        @if(App\Models\Socialsetting::find(1)->f_status == 1)
                                                <a href="{{ App\Models\Socialsetting::find(1)->facebook }}" target="_blank"  aria-label="Facebook"
                                                    class="w-10 h-10 flex items-center justify-center bg-gray-100 rounded-full text-gray-500 hover:bg-primary hover:text-white transition-all"><i class="fa-brands fa-facebook-f"></i></a>
                        @endif
                        @if(App\Models\Socialsetting::find(1)->ystatus == 1)
                                                <a href="{{ App\Models\Socialsetting::find(1)->youtube }}" target="_blank"  aria-label="YouTube" class="w-10 h-10 flex items-center justify-center bg-gray-100 rounded-full text-gray-500 hover:bg-primary hover:text-white transition-all"><i
                                                        class="fa-brands fa-youtube"></i></a>
                        @endif
                        @if(App\Models\Socialsetting::find(1)->i_status == 1)
                                                <a href="{{ App\Models\Socialsetting::find(1)->instagram }}" target="_blank"  aria-label="Instagram" class="w-10 h-10 flex items-center justify-center bg-gray-100 rounded-full text-gray-500 hover:bg-primary hover:text-white transition-all"><i
                                                        class="fa-brands fa-instagram"></i></a>
                        @endif
                    {{-- <a href="#"
                        class="w-10 h-10 flex items-center justify-center bg-gray-100 rounded-full text-gray-500 hover:bg-primary hover:text-white transition-all">
                        <i class="fa-brands fa-twitter"></i>
                    </a>
                    <a href="#"
                        class="w-10 h-10 flex items-center justify-center bg-gray-100 rounded-full text-gray-500 hover:bg-primary hover:text-white transition-all">
                        <i class="fa-brands fa-pinterest-p"></i>
                    </a>
                    <a href="#"
                        class="w-10 h-10 flex items-center justify-center bg-gray-100 rounded-full text-gray-500 hover:bg-primary hover:text-white transition-all">
                        <i class="fa-brands fa-linkedin-in"></i>
                    </a>
                    <a href="#"
                        class="w-10 h-10 flex items-center justify-center bg-gray-100 rounded-full text-gray-500 hover:bg-primary hover:text-white transition-all">
                        <i class="fa-brands fa-youtube"></i>
                    </a> --}}
                </div>

                <div class="bg-slate-50 shadow-xl rounded-lg overflow-hidden max-w-6xl mx-auto">
                    <div class="grid grid-cols-1 lg:grid-cols-2">

                        <div class="p-8 md:p-12">
                            <h2 class="text-3xl font-extrabold text-slate-800 mb-8">  {{ __('أرسل لنا رسالة') }}</h2>

                          
                  <form action="{{ route('front.contact.submit') }}" name="appointment" id="email-form" method="POST"
                      autocomplete="off" class="bg-white p-8 md:p-12 rounded-lg shadow-xl border border-gray-100">
                      {{ csrf_field() }}
                      <div class="form-group w-100">
                          <div class="response w-100"></div>
                      </div>
                      <input type="hidden" name="form_type" value="contact_us">

                                <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                                    <div>
                                        <label for="first-name"
                                            class="block text-sm font-semibold text-gray-700 mb-2">{{ __('الاسم') }}</label>
                                        <input type="text" name="name" id="first-name" placeholder="{{ __('الاسم') }}"
                                            class="w-full px-4 py-3 fname bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent">
                                    </div>
                                    <div>
                                        <label for="last-name"
                                            class="block text-sm font-semibold text-gray-700 mb-2"> 
                                             {{ __('رقم الهاتف') }}</label>
                                        <input type="number" name="phone" id="last-name" placeholder=" {{ __('رقم الهاتف') }} "
                                            class="w-full px-4 py-3 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent">
                                    </div>
                                    <div>
                                        <label for="email" class="block text-sm font-semibold text-gray-700 mb-2"> 
                                             {{ __('البريد الالكتروني') }}</label>
                                        <input type="email" name="email" id="email" placeholder="   {{ __('البريد الالكتروني') }}"
                                            class="w-full px-4 py-3 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent">
                                    </div>
                                    <div>
                                        <label for="subject"
                                            class="block text-sm font-semibold text-gray-700 mb-2"> 
                                             {{ __('موضوع الرسالة') }}</label>
                                        <input type="text" name="subject" id="subject" placeholder="    {{ __('موضوع الرسالة') }}"
                                            class="w-full px-4 py-3 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent">
                                    </div>
                                    <div class="md:col-span-2">
                                        <label for="message"
                                            class="block text-sm font-semibold text-gray-700 mb-2"> 
                                            {{ __('محتوى الرسالة') }} </label>
                                        <textarea name="message" id="message" rows="5" placeholder="{{ __('ما الذي تفكر فيه') }}"
                                            class="w-full px-4 py-3 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent"></textarea>
                                    </div>
                                    <div class="md:col-span-2">
                                        <button type="submit"
                                            class="bg-primary text-white font-bold py-3 px-10 rounded-full transition-all duration-300 hover:bg-accent hover:shadow-lg focus:outline-none focus:ring-2 focus:ring-primary focus:ring-offset-2">
                                             {{ __('إرسال الرسالة') }}
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>

                        <div class="w-full h-full min-h-[400px] lg:min-h-0">
                            <iframe
                                src=" {!! $gs->map !!}"
                                width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"
                                referrerpolicy="no-referrer-when-downgrade">
                            </iframe>
                        </div>

                    </div>
                </div>

            </div>
        </section>

      
         @include('includes.share')

    </main>
 @stop