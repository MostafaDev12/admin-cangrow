       @extends('layouts.front')

      @section('title')

          {{ __('التوظيــف') }} - {{ $gs->{'title_' . $sign} }}

      @stop

      @section('gsearch')
          <meta property="og:image" content=" {{ $gs->{'logo_' . $sign} }}" />
      @stop

      @section('css')

      @stop
      @section('content')

    <section class="relative h-screen w-full">


        <div class="relative h-screen w-full  bg-[url('{{ asset('front/gulddal/') }}/images/careers.jpg')] md:bg-cover bg-center">
            <div class="flex flex-column items-center w-full h-full justify-center" data-carousel-item>
                <div class="text-center text-white bg-black/50 w-full py-10  mb-16">
                    <h1 class="text-4xl md:text-5xl font-bold mb-4">{{ __('التوظيــف') }}</h1>
                    <p class=" text-lg max-w-2xl mx-auto">
                        
                        {{ __('إذا كنت تعتقد أن لديك ما يلزم للانضمام إلى فريق MWM Gulddal Systems الديناميكي والإبداعي ، فاملأ النموذج أدناه وأخبرنا!') }}
                    </p>

                </div>
            </div>
    </section>
    <section class="bg-black text-yellow-400 p-8">

        <form class="container mx-auto px-4 sm:px-6 lg:px-8 max-w-md" 
        action="{{route('front.contact.submit')}}" name="appointment" id="appointment-form" method="POST" autocomplete="off" enctype="multipart/form-data">
  {{csrf_field()}}
                            <div class="form-group w-100">
                              <div class="response w-100"></div>
                            </div>
            <div class="mb-4">
                <label for="name" class="block text-lg font-medium mb-2">{{ __('الاسم') }}:</label>
                <input type="text" id="name" name="name"
                    class="w-full p-3 rounded bg-gray-800 text-yellow-400 border border-gray-700 focus:outline-none focus:border-yellow-500">
            </div>

            <div class="mb-6">
                <label for="email" class="block text-lg font-medium mb-2">  {{ __('البريد الإلكتروني') }}:   </label>
                <input type="type" id="email" name="email"
                    class="w-full p-3 rounded bg-gray-800 text-yellow-400 border border-gray-700 focus:outline-none focus:border-yellow-500">
            </div>

            <div class="mb-6">
                <label for="message" class="block text-lg font-medium mb-2">   {{ __('رسالتك') }} ({{ __('اختياري') }}):</label>
                <textarea id="message" name="message" rows="5"
                    class="w-full p-3 rounded bg-gray-800 text-yellow-400 border border-gray-700 focus:outline-none focus:border-yellow-500"></textarea>
            </div>

            <div class="mb-8">
                <label for="resume" class="block text-xl font-bold mb-2"> {{ __('رفــع ملف السيــرة الذاتيــة') }}<span
                        class="text-base font-normal"> {{ __('فقط ملـف PDF') }}</span></label>
                <input type="file" id="resume" name="resume" accept=".pdf" class="w-full text-yellow-400
                                                file:mr-4 file:py-2 file:px-4
                                                file:rounded-full file:border-0
                                                file:text-sm file:font-semibold
                                                file:bg-yellow-50 file:text-yellow-700
                                                hover:file:bg-yellow-100 cursor-pointer">
            </div>

            <button type="submit"
                class="bg-yellow-500 text-black py-3 px-8 rounded-full text-lg font-semibold hover:bg-yellow-600 transition duration-300">
                {{ __('إرسال الطلب') }}
            </button>
        </form>
    </section>
    @stop