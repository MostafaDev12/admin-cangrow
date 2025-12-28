  @extends('layouts.front')

  @section('title')

      {{ __('التبرعات العينية') }} - {{ $gs->{'title_' . $sign} }}

  @stop

  @section('gsearch')
      <meta property="og:image" content=" {{ $gs->{'logo_' . $sign} }}" />
  @stop

  @section('css')
      <link rel="stylesheet" href="{{ asset('front/highline/') }}/css/articles.css">
  @stop
  @section('content')

<div id="zakatModal" class="fixed inset-0 bg-black/60 hidden items-center justify-center z-50">
    <div class="bg-white rounded-2xl shadow-xl w-full max-w-md p-6 relative">

        <!-- زر الإغلاق -->
        <button onclick="closeZakatModal()"
                class="absolute left-4 top-4 text-gray-400 hover:text-red-500">
            <i class="fa-solid fa-xmark text-xl"></i>
        </button>

        <!-- العنوان -->
        <h2 class="text-2xl font-bold text-center mb-6 text-green-700">
            {{ __('حاسبة الزكاة') }}
        </h2>

        <!-- المبلغ -->
        <label class="block mb-2 font-semibold text-gray-700">
            {{ __('أدخل المبلغ') }}
        </label>

        <input type="number"
               id="amount"
               oninput="calculateZakat()"
               class="w-full border border-gray-300 rounded-xl p-3 focus:ring-2 focus:ring-green-500 outline-none"
               placeholder="مثال: 100000">

        <!-- تنبيه النصاب -->
        <p id="nisabAlert"
           class="mt-3 text-sm text-red-600 hidden">
            {{ __('المبلغ أقل من النصاب، لا تجب الزكاة') }}
        </p>

        <!-- النتيجة -->
        <div class="mt-6 bg-green-50 rounded-xl p-4 text-center">
            <p class="text-gray-600 mb-1">{{ __('قيمة الزكاة المستحقة') }}</p>
            <p id="zakatResult" class="text-2xl font-bold text-green-700">
                0
            </p>
        </div>

        <!-- ملاحظة -->
        <p class="text-xs text-gray-500 mt-4 text-center leading-relaxed">
            {{ __('يتم حساب الزكاة بنسبة 2.5% عند بلوغ النصاب وحلول الحول') }}
        </p>
    </div>
</div>

      <main>
          <section class="py-16 md:py-24">
              <div class="container mx-auto px-4 max-w-5xl">

                  <div class="flex flex-col md:flex-row justify-between items-center gap-6 mb-12">
                      <div class="text-center md:text-right">
                          <h2 class="text-5xl md:text-6xl font-extrabold text-gray-200 select-none mb-2">
                              {{ __('دار التوفيق') }}
                          </h2>
                          <h1 class="text-4xl md:text-5xl font-extrabold text-slate-800 -mt-8 md:-mt-10">
                              {{ __('تبرع عيني') }}
                          </h1>
                          <p class="text-gray-600 mt-4 text-lg font-medium">
                              {{ __('نسعي دائما لمواصلة الود بيننا') }}
                          </p>
                      </div>

                      <div class="flex flex-col sm:flex-row gap-3 flex-shrink-0">
                          {{-- <a href="#"
                              class="inline-flex items-center justify-center bg-green-600 text-white font-bold py-3 px-6 rounded-full transition-all duration-300 hover:bg-green-700 hover:shadow-lg">
                              <span> {{ __('احسب زكاتك') }} </span>
                              <i class="fa-solid fa-calculator mr-2"></i>
                          </a> --}}
                          <a href="javascript:void(0)"
                            onclick="openZakatModal()"
                            class="inline-flex items-center justify-center bg-green-600 text-white font-bold py-3 px-6 rounded-full transition-all duration-300 hover:bg-green-700 hover:shadow-lg">
                                <span>{{ __('احسب زكاتك') }}</span>
                                <i class="fa-solid fa-calculator mr-2"></i>
                            </a>
                          <a href="{{ route('donate_campaigns.index', $sign) }}"
                              class="inline-flex items-center justify-center bg-primary text-white font-bold py-3 px-6 rounded-full transition-all duration-300 hover:bg-accent hover:shadow-lg">
                              <span> {{ __('تبرع الآن') }} </span>
                              <i class="fa-solid fa-heart mr-2"></i>
                          </a>
                      </div>
                  </div>

                  <form action="{{ route('front.contact.submit') }}" name="appointment" id="email-form" method="POST"
                      autocomplete="off" class="bg-white p-8 md:p-12 rounded-lg shadow-xl border border-gray-100">
                      {{ csrf_field() }}
                      <div class="form-group w-100">
                          <div class="response w-100"></div>
                      </div>
                      <input type="hidden" name="form_type" value="contribution_kind">

                      <div class="grid grid-cols-1 md:grid-cols-2 gap-x-6 gap-y-8">

                          <div class="md:col-span-2">
                              <label for="donor-name" class="block text-sm font-semibold text-gray-700 mb-2">
                                  {{ __('اسم المتبرع') }} </label>
                              <input type="text" name="name" id="donor-name" required
                                  placeholder="      {{ __('اكتب اسمك بالكامل') }} "
                                  class="w-full px-4 py-3 bg-white border fname border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent">
                          </div>

                          <div>
                              <label class="block text-sm font-semibold text-gray-700 mb-2"> {{ __('نوع المتبرع') }}
                              </label>
                              <div class="flex gap-6 mt-3">
                                  <label class="inline-flex items-center cursor-pointer">
                                      <input type="radio" name="gender" value="{{ __('ذكر') }}"
                                          class="form-radio text-primary h-5 w-5">
                                      <span class="mr-2 text-gray-700">{{ __('ذكر') }}</span>
                                  </label>
                                  <label class="inline-flex items-center cursor-pointer">
                                      <input type="radio" name="gender" value="{{ __('أنثى') }}"
                                          class="form-radio text-primary h-5 w-5">
                                      <span class="mr-2 text-gray-700">{{ __('أنثى') }}</span>
                                  </label>
                              </div>
                          </div>

                          <div>
                              <label for="mobile" class="block text-sm font-semibold text-gray-700 mb-2">
                                  {{ __('رقم الهاتف') }}</label>
                              <input type="tel" name="mobile" id="mobile" placeholder="01xxxxxxxxx" required
                                  class="w-full px-4 py-3 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent"
                                  dir="ltr">
                          </div>

                          <div class="md:col-span-2">
                              <label for="donation-type" class="block text-sm font-semibold text-gray-700 mb-2">
                                  {{ __('نوع التبرع العيني') }}</label>
                              <select id="donation-type" name="donation-type"
                                  class="w-full px-4 py-3 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent">
                                  <option value="" disabled selected> {{ __('اختر نوع التبرع') }}</option>
                                  <option value="{{ __('ملابس') }}">{{ __('ملابس') }}</option>
                                  <option value="{{ __('أحذية') }}">{{ __('أحذية') }}</option>
                                  <option value="{{ __('أثاث') }}">{{ __('أثاث') }}</option>
                                  <option value="{{ __('ورق') }}">{{ __('ورق') }}</option>
                                  <option value="{{ __('مفروشات') }}">{{ __('مفروشات') }}</option>
                                  <option value="{{ __('مواد غذائية جافة') }}"> {{ __('مواد غذائية جافة') }}</option>
                                  <option value="{{ __('أجهزة منزلية') }}"> {{ __('أجهزة منزلية') }}</option>
                                  <option value="{{ __('أجهزة إلكترونية') }}"> {{ __('أجهزة إلكترونية') }}</option>
                                  <option value=" {{ __('أدوات مطبخ') }}"> {{ __('أدوات مطبخ') }}</option>
                                  <option value="{{ __('أجهزة طبية') }}"> {{ __('أجهزة طبية') }}</option>
                                  <option value="{{ __('أدوية') }}">{{ __('أدوية') }}</option>
                                  <option value="{{ __('مواد بناء') }}"> {{ __('مواد بناء') }}</option>
                              </select>
                          </div>

                          <div>
                              <label for="governorate"
                                  class="block text-sm font-semibold text-gray-700 mb-2">{{ __('المحافظة') }}</label>
                              <select id="governorate" name="governorate" required
                                  class="w-full px-4 py-3 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent">
                                  <option value="" disabled selected> {{ __('اختر المحافظة') }}</option>
                                  <option value="{{ __('القاهرة') }}">{{ __('القاهرة') }}</option>
                                  <option value="{{ __('الإسكندرية') }}">{{ __('الإسكندرية') }}</option>
                                  <option value="{{ __('الجيزة') }}">{{ __('الجيزة') }}</option>
                                  <option value="{{ __('القليوبية') }}">{{ __('القليوبية') }}</option>
                                  <option value="{{ __('الدقهلية') }}">{{ __('الدقهلية') }}</option>
                                  <option value="{{ __('الشرقية') }}">{{ __('الشرقية') }}</option>
                                  <option value="{{ __('المنوفية') }}">{{ __('المنوفية') }}</option>
                                  <option value="{{ __('البحيرة') }}">{{ __('البحيرة') }}</option>
                                  <option value="{{ __('الغربية') }}">{{ __('الغربية') }}</option>
                                  <option value="{{ __('بورسعيد') }}">{{ __('بورسعيد') }}</option>
                                  <option value="{{ __('دمياط') }}">{{ __('دمياط') }}</option>
                                  <option value="{{ __('الإسماعلية') }}">{{ __('الإسماعلية') }}</option>
                                  <option value="{{ __('السويس') }}">{{ __('السويس') }}</option>
                                  <option value="{{ __('كفر الشيخ') }}">{{ __('كفر الشيخ') }}</option>
                                  <option value="{{ __('الفيوم') }}">{{ __('الفيوم') }}</option>
                                  <option value="{{ __('بني سويف') }}">{{ __('بني سويف') }}</option>
                                  <option value="{{ __('مطروح') }}">{{ __('مطروح') }}</option>
                                  <option value="{{ __('شمال سيناء') }}">{{ __('شمال سيناء') }}</option>
                                  <option value="{{ __('جنوب سيناء') }}">{{ __('جنوب سيناء') }}</option>
                                  <option value="{{ __('المنيا') }}">{{ __('المنيا') }}</option>
                                  <option value="{{ __('أسيوط') }}">{{ __('أسيوط') }}</option>
                                  <option value="{{ __('سوهاج') }}">{{ __('سوهاج') }}</option>
                                  <option value="{{ __('قنا') }}">{{ __('قنا') }}</option>
                                  <option value="{{ __('البحر الأحمر') }}">{{ __('البحر الأحمر') }}</option>
                                  <option value="{{ __('الأقصر') }}">{{ __('الأقصر') }}</option>
                                  <option value="{{ __('أسوان') }}">{{ __('أسوان') }}</option>
                                  <option value="{{ __('الواحات') }}">{{ __('الواحات') }}</option>
                                  <option value="{{ __('الوادي الجديد') }}">{{ __('الوادي الجديد') }}</option>
                              </select>
                          </div>

                          <div>
                              <label for="area"
                                  class="block text-sm font-semibold text-gray-700 mb-2">{{ __('المنطقة') }}</label>
                              <input type="text" name="area" id="area" required
                                  placeholder="   {{ __('اسم المنطقة') }}"
                                  class="w-full px-4 py-3 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent">
                          </div>

                          <div class="md:col-span-2">
                              <label for="address" class="block text-sm font-semibold text-gray-700 mb-2"> 
                                   {{ __('العنوان بالتفاصيل') }}</label>
                              <input type="text" name="address" id="address" required
                                  placeholder="{{ __('اسم الشارع، رقم العقار، علامة مميزة') }}"
                                  class="w-full px-4 py-3 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent">
                          </div>

                          <div class="md:col-span-2">
                              <label for="notes"
                                  class="block text-sm font-semibold text-gray-700 mb-2">{{ __('الملاحظات') }}</label>
                              <textarea name="notes" id="notes" rows="4"
                                  placeholder="{{ __('أي تفاصيل إضافية عن التبرع') }}"
                                  class="w-full px-4 py-3 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent"></textarea>
                          </div>

                          <div class="md:col-span-2 mt-4">
                              <button type="submit"
                                  class="w-full md:w-auto bg-primary text-white font-bold py-3 px-12 rounded-full transition-all duration-300 hover:bg-accent hover:shadow-lg focus:outline-none focus:ring-2 focus:ring-primary focus:ring-offset-2">
                                  {{ __('إرسال') }}
                              </button>
                          </div>

                      </div>
                  </form>

              </div>
          </section>

          @include('includes.share')


      </main>

  @stop
    @section('js')
       <script>
    const NISAB = 507450; // تقريبي بالجنيه (قيمة 85 جرام ذهب)

    function openZakatModal() {
        const modal = document.getElementById('zakatModal');
        modal.classList.remove('hidden');
        modal.classList.add('flex');
    }

    function closeZakatModal() {
        const modal = document.getElementById('zakatModal');
        modal.classList.add('hidden');
        modal.classList.remove('flex');
    }

    function calculateZakat() {
        let amount = parseFloat(document.getElementById('amount').value) || 0;
        let zakatResult = document.getElementById('zakatResult');
        let nisabAlert = document.getElementById('nisabAlert');

        if (amount < NISAB) {
            zakatResult.innerText = '0';
            nisabAlert.classList.remove('hidden');
            return;
        }

        nisabAlert.classList.add('hidden');
        let zakat = amount * 0.025;
        zakatResult.innerText = zakat.toLocaleString('ar-EG', {
            minimumFractionDigits: 2
        });
    }
</script>

       @stop
