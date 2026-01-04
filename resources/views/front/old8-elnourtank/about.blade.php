 
   @extends('layouts.front')

@section('title')
   
{{ __('عن الشركه') }} -  {{ $gs->{'title_' . $sign} }}
     
@stop

@section('gsearch')
    <meta property="og:image" content=" {{ $gs->{'logo_' . $sign} }}" />
@stop

@section('css')

 @stop

@section('content')

    <section id="about" class="py-20 bg-gray-50 text-gray-800" style="padding-top: 8rem;">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid lg:grid-cols-2 gap-16 items-center">

                <div class="space-y-8">
                    <div>
                        <h2 class="text-4xl font-bold text-primary mb-6">
                        {{ $ps->{'about_title_' . $sign} ?? '' }}
                        </h2>
                        <div class="space-y-4 text-gray-600 leading-relaxed">
                           {!! $ps->{'about_details_' . $sign} ?? '' !!}
                        </div>


                    </div>

                    <div class="grid grid-cols-2 gap-8">
                        <div class="text-center">
                            <div class="text-3xl font-bold text-primary mb-2">{{ __('20+') }}</div>
                            <div class="text-gray-600">   {{ __('عام خبرة') }}</div>
                        </div>
                        <div class="text-center">
                            <div class="text-3xl font-bold text-primary mb-2">{{ __('99.7%') }}</div>
                            <div class="text-gray-600"> {{ __('رضا العملاء') }}  </div>
                        </div>
                        <div class="text-center">
                            <div class="text-3xl font-bold text-primary mb-2">{{ __('45+') }}</div>
                            <div class="text-gray-600">    {{ __('منتج متنوع') }}  </div>
                        </div>
                        <div class="text-center">
                            <div class="text-3xl font-bold text-primary mb-2">{{ __('24/7') }}</div>
                            <div class="text-gray-600">    {{ __('خدمة الدعم') }}  </div>
                        </div>
                    </div>

                    <div class="bg-white p-6 rounded-lg border border-gray-200">
                        <h3 class="text-lg font-semibold text-primary mb-4">
                                 {{ __('ما يميز منتجاتنا') }}  
                        </h3>
                        <div class="grid grid-cols-2 gap-3">
                            <div class="flex items-center text-sm gap-2 text-gray-700">
                                <div class="w-2 h-2 bg-accent rounded-full"></div>
                                     {{ __('خامات عالية الجودة') }}  
                            </div>
                            <div class="flex items-center text-sm gap-2 text-gray-700">
                                <div class="w-2 h-2 bg-accent rounded-full"></div>
                                     {{ __('مقاومة للصدأ والتآكل') }}  
                            </div>
                            <div class="flex items-center text-sm gap-2 text-gray-700">
                                <div class="w-2 h-2 bg-accent rounded-full"></div>
                                     {{ __('تصميم آمن وصحي') }}  
                            </div>
                            <div class="flex items-center text-sm gap-2 text-gray-700">
                                <div class="w-2 h-2 bg-accent rounded-full"></div>
                                     {{ __('سهولة النقل والتركيب') }}  
                            </div>
                        </div>
                    </div>

                    <div class="bg-white p-6 rounded-lg border border-gray-200">
                        <h3 class="text-2xl font-bold text-primary mb-4 flex items-center">
                       {{ __('رسالتنا') }}     
                        </h3>
                        <p class="text-gray-600 leading-relaxed">
                          {{ __('أن نكون الرواد في مجال صناعة خزانات المياه والحلول المتكاملة لتخزين المياه والمواد، مع توفير منتجات آمنة، صحية، وبأسعار في متناول الجميع.') }}      
                        </p>
                    </div>
                </div>

                <div class="space-y-6">
                    <div
                        class="flex items-start gap-4 p-6 rounded-lg bg-white hover:bg-gray-100 transition-colors border border-gray-200">
                        <div class="bg-accent p-3 rounded-lg flex-shrink-0 text-white">
                            <i data-lucide="award" class="h-6 w-6"></i>
                        </div>
                        <div>
                            <h3 class="text-lg font-semibold text-secondary mb-2">     {{ __('جودة مضمونة') }}</h3>
                            <p class="text-gray-600">
                              {{ __('جميع الخزانات مصنوعة من خامات معتمدة ومعالجة غذائيًا لتخزين مياه الشرب بشكل آمن.') }}
                            </p>
                        </div>
                    </div>

                    <div
                        class="flex items-start gap-4 p-6 rounded-lg bg-white hover:bg-gray-100 transition-colors border border-gray-200">
                        <div class="bg-accent p-3 rounded-lg flex-shrink-0 text-white">
                            <i data-lucide="target" class="h-6 w-6"></i>
                        </div>
                        <div>
                            <h3 class="text-lg font-semibold text-secondary mb-2">   {{ __('التزام وموثوقية') }}</h3>
                            <p class="text-gray-600">
                             {{ __('نحرص على تسليم منتجاتنا في المواعيد المحددة مع متابعة مستمرة لما بعد البيع.') }}
                            </p>
                        </div>
                    </div>

                    <div
                        class="flex items-start gap-4 p-6 rounded-lg bg-white hover:bg-gray-100 transition-colors border border-gray-200">
                        <div class="bg-accent p-3 rounded-lg flex-shrink-0 text-white">
                            <i data-lucide="users" class="h-6 w-6"></i>
                        </div>
                        <div>
                            <h3 class="text-lg font-semibold text-secondary mb-2">   {{ __('عملاء سعداء') }}</h3>
                            <p class="text-gray-600">
                                  {{ __('نفتخر بوجود آلاف العملاء الراضين عن منتجاتنا داخل مصر وخارجها.') }}
                            </p>
                        </div>
                    </div>

                    <div
                        class="flex items-start gap-4 p-6 rounded-lg bg-white hover:bg-gray-100 transition-colors border border-gray-200">
                        <div class="bg-accent p-3 rounded-lg flex-shrink-0 text-white">
                            <i data-lucide="lightbulb" class="h-6 w-6"></i>
                        </div>
                        <div>
                            <h3 class="text-lg font-semibold text-secondary mb-2">   {{ __('ابتكار وتطوير') }}</h3>
                            <p class="text-gray-600">
                                   {{ __('نواكب أحدث التقنيات العالمية في صناعة الخزانات ونطور منتجاتنا باستمرار.') }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@stop