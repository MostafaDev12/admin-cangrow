

 @extends('layouts.front')

@section('title')
   
{{ __('services') }}  -  {{ $gs->{'title_' . $sign} }}
     
@stop

@section('gsearch')
    <meta property="og:image" content=" {{ $gs->{'logo_' . $sign} }}" />
@stop


@section('content')
    <section id="services" class="py-20" dir="rtl">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-bold text-yellow-500 mb-4">
                    خدمات الأتمتة الشاملة
                </h2>
                <p class="text-xl text-gray-300 max-w-3xl mx-auto">
                    من التصميم الأولي إلى الصيانة المستمرة، نقدم حلول أتمتة متكاملة مخصصة لمتطلبات صناعتك ومعايير
                    السلامة.
                </p>
            </div>

            <div id="services-grid" class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- عنصر الخدمة -->
                <div
                    class="bg-gray-900 rounded-xl p-8 shadow-lg shadow-gray-900/50 hover:shadow-xl hover:shadow-yellow-500/30 transition-all group hover:-translate-y-2 duration-300 border border-gray-800">
                    <div class="flex items-center mb-6">
                        <div class="bg-yellow-600 p-3 rounded-lg group-hover:bg-yellow-700 transition-colors">
                            <i data-lucide="settings"
                                class="h-8 w-8 text-black group-hover:text-gray-950 transition-colors"></i>
                        </div>
                    </div>
                    <h3 class="text-xl font-bold text-yellow-400 mb-3">برمجة وتكوين PLC</h3>
                    <p class="text-gray-300 mb-6 leading-relaxed">
                        برمجة احترافية لـ Siemens S7 وAllen-Bradley وSchneider Electric مع تكامل شامل مع HMI.
                    </p>
                    <ul class="space-y-2">
                        <li class="flex items-center text-sm text-gray-200">
                            <div class="w-1.5 h-1.5 bg-yellow-500 rounded-full ml-3"></div>
                            برمجة TIA Portal
                        </li>
                        <li class="flex items-center text-sm text-gray-200">
                            <div class="w-1.5 h-1.5 bg-yellow-500 rounded-full ml-3"></div>
                            RSLogix 5000 / Studio 5000
                        </li>
                        <li class="flex items-center text-sm text-gray-200">
                            <div class="w-1.5 h-1.5 bg-yellow-500 rounded-full ml-3"></div>
                            Unity Pro / EcoStruxure
                        </li>
                        <li class="flex items-center text-sm text-gray-200">
                            <div class="w-1.5 h-1.5 bg-yellow-500 rounded-full ml-3"></div>
                            Ladder Logic و Structured Text
                        </li>
                    </ul>
                </div>

                <!-- SCADA وأنظمة التحكم -->
                <div
                    class="bg-gray-900 rounded-xl p-8 shadow-lg shadow-gray-900/50 hover:shadow-xl hover:shadow-yellow-500/30 transition-all group hover:-translate-y-2 duration-300 border border-gray-800">
                    <div class="flex items-center mb-6">
                        <div class="bg-yellow-600 p-3 rounded-lg group-hover:bg-yellow-700 transition-colors">
                            <i data-lucide="cpu"
                                class="h-8 w-8 text-black group-hover:text-gray-950 transition-colors"></i>
                        </div>
                    </div>
                    <h3 class="text-xl font-bold text-yellow-400 mb-3">SCADA وأنظمة التحكم</h3>
                    <p class="text-gray-300 mb-6 leading-relaxed">
                        أنظمة تحكم إشرافية متقدمة مع مراقبة لحظية، وإنذارات، وتسجيل بيانات تاريخية.
                    </p>
                    <ul class="space-y-2">
                        <li class="flex items-center text-sm text-gray-200">
                            <div class="w-1.5 h-1.5 bg-yellow-500 rounded-full ml-3"></div>
                            WinCC Professional
                        </li>
                        <li class="flex items-center text-sm text-gray-200">
                            <div class="w-1.5 h-1.5 bg-yellow-500 rounded-full ml-3"></div>
                            FactoryTalk View
                        </li>
                        <li class="flex items-center text-sm text-gray-200">
                            <div class="w-1.5 h-1.5 bg-yellow-500 rounded-full ml-3"></div>
                            Wonderware InTouch
                        </li>
                        <li class="flex items-center text-sm text-gray-200">
                            <div class="w-1.5 h-1.5 bg-yellow-500 rounded-full ml-3"></div>
                            منصة Ignition
                        </li>
                    </ul>
                </div>

                <!-- يمكنك إضافة باقي البطاقات بنفس التنسيق -->

            </div>
        </div>
    </section>
 @stop