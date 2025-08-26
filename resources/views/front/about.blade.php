  @extends('layouts.front')

@section('title')
   
{{ __('About Us') }} -  {{ $gs->{'title_' . $sign} }}
     
@stop

@section('gsearch')
    <meta property="og:image" content=" {{ $gs->{'logo_' . $sign} }}" />
@stop

@section('css')

 @stop
@section('content')


    <section class="relative h-screen w-full">
        <div class="relative h-screen w-full  bg-[url('{{ asset('front/gulddal/') }}/images/about.jpg')] md:bg-cover bg-center">
            <div class="flex flex-column items-center w-full h-full justify-center" data-carousel-item>
                <div class="text-center text-white bg-black/50 w-full py-10  mb-16">
                    <h2 class="text-4xl font-bold mb-4">
                        {{ __('أم دابليو أم جولدال سيستمز') }}</h2>

                </div>
            </div>

    </section>

    <section id="about" class="py-20 bg-black text-white" dir="{{ session::get('front_language_duraction') }}">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid lg:grid-cols-2 gap-16 items-center">

                <div class="space-y-8">
                    <div>
                        <h2 class="text-4xl md:text-5xl font-bold text-yellow-500 mb-4">
                           {{ __('أم دابليو أم جولدال سيستمز') }}</h2>
                        <div class="text-primary text-lg max-w-2xl mx-auto">
                            <p>
                                {!! $ps->{'about_details_' . $sign} ?? '' !!}
                                {{-- نهدف إلى أن نكون الشركة الرائدة في الصناعة في قطاعات السوق والمناطق المختارة استراتيجيا.
                                نريد من عملائنا أن يقدرونا تقديرا عاليا لتفانينا واحترافنا وأن نكون معروفين باسم شركة
                                الدهانات الأكثر استدامة. نريد أيضا أن ننمو لنصبح مكانا يتمتع بثقافة أداء قوية وأن نكون
                                صاحب العمل المفضل. --}}
                            </p>


                        </div>
                    </div>

                    <div class="grid grid-cols-2 gap-8">
                        <div class="text-center">
                            <div class="text-3xl font-bold text-primary mb-2">300+</div>
                        <div class="text-gray-300">    {{ __('المشاريع المنجزة') }}</div>
                        </div>
                        <div class="text-center">
                             <div class="text-3xl font-bold text-primary mb-2">99.8%</div>
                        <div class="text-gray-300">   {{ __('معايير الجودة') }}</div>
                        </div>
                        <div class="text-center">
                            <div class="text-3xl font-bold text-primary mb-2">12+</div>
                        <div class="text-gray-300">    {{ __('وكيل و موزع معتمد') }}</div>
                        </div>
                        <div class="text-center">
                            <div class="text-3xl font-bold text-primary mb-2">24/7</div>
                        <div class="text-gray-300">    {{ __('دعم فنى دائم') }}</div>
                        </div>
                    </div>

                    <div class="bg-gray-900 p-6 rounded-lg border border-gray-800">
                        <h3 class="text-lg font-semibold text-primary mb-4">
                            {{ __('شهادات الصناعة و الإعتمادات') }}
                        </h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 md:gap-8">
                            <div class="flex items-center text-sm text-gray-200">
                                <div class="w-2 h-2 bg-primary rounded-full ml-3"></div>
                                {{ __('عضو إتحاد الصناعات المصريه') }}
                            </div>
                            <div class="flex items-center text-sm text-gray-200">
                                <div class="w-2 h-2 bg-primary rounded-full ml-3"></div>
                                {{ __('عضو بالإتحاد الأفريقي للتشييد و البناء') }}
                            </div>
                            <div class="flex items-center text-sm text-gray-200">
                                <div class="w-2 h-2 bg-primary rounded-full ml-3"></div>
                                {{ __('إعتمادات من مكاتب إستشاريه محليه و دوليه') }}
                            </div>
                            <div class="flex items-center text-sm text-gray-200">
                                <div class="w-2 h-2 bg-primary rounded-full ml-3"></div>
                                {{ __('إعتمادات من معامل إختبارات معتمدة محليه و دوليه') }}
                            </div>
                        </div>
                    </div>
                    <div class="bg-gray-900 p-6 rounded-lg border border-gray-800">
                        <h3 class="text-2xl font-bold text-primary mb-4 flex items-center">
                            {{ __('علامات الطرق') }}
                        </h3>
                        <p class="text-gray-300 leading-relaxed">
                            <strong dir="{{ session::get('front_language_duraction') }}">  {{ __('مواد علامات الطرق من GULDDAL SYSTEMS') }}</strong> 
                            {{ __('هي جزء خاص من أنظمتنا، مدعومة') }}
                            <strong dir="{{ session::get('front_language_duraction') }}"> {{ __('بعقود من الخبرة') }}</strong>  
                            {{ __('في تقديم حلول متينة وعالية الأداء لمختلف تطبيقات الطرق والسلامة. يضمن التزامنا بالجودة نتائج موثوقة لمشاريع البنية التحتية') }}
                        </p>
                    </div>
                </div>

                <div class="space-y-6">
                    <div
                        class="flex gap-4 items-start space-x-4 p-6 rounded-lg bg-gray-900 shadow-lg shadow-gray-900/50 hover:shadow-xl hover:shadow-yellow-500/30 transition-all group hover:-translate-y-2 duration-300 border border-gray-800">
                        <div class="bg-primary p-3 rounded-lg flex-shrink-0 text-white">
                            <i data-lucide="award" class="h-6 w-6"></i>
                        </div>
                        <div class="">
                            <h3 class="text-lg font-semibold text-primary mb-2"> {{ __('شهادات الجوده') }}</h3>
                            <p class="text-gray-200">
                                ISO 45001:2018
                                -
                                ISO14001:2015
                                -
                                ISO9001:2015
                            </p>
                        </div>
                    </div>

                    <div class="flex gap-4 items-start space-x-4 p-6 rounded-lg bg-gray-900 shadow-lg shadow-gray-900/50 hover:shadow-xl hover:shadow-yellow-500/30 transition-all group hover:-translate-y-2 duration-300 border border-gray-800"
                        dir="{{ session::get('front_language_duraction') }}">
                        <div class="bg-primary p-3 rounded-lg flex-shrink-0 text-white">
                            <i data-lucide="target" class="h-6 w-6"></i>
                        </div>
                        <div class="">
                            <h3 class="text-lg font-semibold text-primary mb-2"> {{ __('تكنولوجيا متطورة') }}</h3>
                            <p class="text-gray-200">
                                {{ __('تقديم افضل انظمة الدهانات المتطوره للمسطحات الاسفلتية والخرصانية والمعدنية') }}
                            </p>
                        </div>
                    </div>

                    <div class="flex gap-4 items-start space-x-4 p-6 rounded-lg bg-gray-900 shadow-lg shadow-gray-900/50 hover:shadow-xl hover:shadow-yellow-500/30 transition-all group hover:-translate-y-2 duration-300 border border-gray-800"
                        dir="{{ session::get('front_language_duraction') }}">
                        <div class="bg-primary p-3 rounded-lg flex-shrink-0 text-white">
                            <i data-lucide="users" class="h-6 w-6"></i>
                        </div>
                        <div class="">
                            <h3 class="text-lg font-semibold text-primary mb-2"> {{ __('شراكة استراتيجية') }}</h3>
                            <p class="text-gray-200">
                                {{ __('علاقات طويلة الامد مع عملاء وموزعين معتمدين محليا ودوليا') }}
                            </p>
                        </div>
                    </div>

                    <div class="flex gap-4 items-start space-x-4 p-6 rounded-lg bg-gray-900 shadow-lg shadow-gray-900/50 hover:shadow-xl hover:shadow-yellow-500/30 transition-all group hover:-translate-y-2 duration-300 border border-gray-800"
                        dir="{{ session::get('front_language_duraction') }}">
                        <div class="bg-primary p-3 rounded-lg flex-shrink-0 text-white">
                            <i data-lucide="lightbulb" class="h-6 w-6"></i>
                        </div>
                        <div class="">
                            <h3 class="text-lg font-semibold text-primary mb-2"> {{ __('رياده الابتكار') }}</h3>
                            <p class="text-gray-200">
                                 
{{ __('الرياده في تطبيق احدث التكنولوجيا المتطوره في صناعه الدهانات المتخصصه للتقديم احدث الحلول الاقتصادية والمستدامة') }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
     @stop