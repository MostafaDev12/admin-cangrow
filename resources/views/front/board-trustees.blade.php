 @extends('layouts.front')

 @section('title')

     {{ __('مجلس الأمناء') }} - {{ $gs->{'title_' . $sign} }}

 @stop

 @section('gsearch')
     <meta property="og:image" content=" {{ $gs->{'logo_' . $sign} }}" />
 @stop

 @section('css')

 @stop

 @section('content')


     <main>
         <section class="py-16 md:py-24">
             <div class="container mx-auto px-4">

                 <!-- العنوان الرئيسي -->
                 <div class="text-center mb-12 max-w-3xl mx-auto">
                     <div class="relative mb-10">
                         <h1 class="text-sm font-extrabold text-custom-orange mb-4"> {{ __('مجلس الأمناء') }}</h1>
                     </div>
                     <p class="text-lg text-gray-600 leading-relaxed">
                         {{ __('اعرف أعضاء مجلس الأمناء بمؤسسة دار التوفيق') }}
                     </p>
                 </div>

                 <!-- القسم الأول: مجلس الإدارة -->
                 <div class="mb-16">
                      <h2 class="text-2xl font-bold text-center text-slate-800 mb-10">مجلس الإدارة</h2> 
                     
                      <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 md:gap-8">
                @foreach ($teams as $team)
                      <article class="rounded-lg group cursor-pointer transition-all duration-300">
                     <img src="{{ $team->photo_url }}" alt="{!! $team->{'name_' . $sign} ?? '' !!} "
                         class="w-full h-64 rounded-t-lg">
                     <div
                         class="p-6 text-center py-3 bg-white transition-all duration-300 group-hover:shadow-2xl group-hover:rounded-lg group-hover:w-fit group-hover:mx-auto  group-hover:-translate-y-6">
                         <h3 class="text-xl font-bold text-slate-800 mb-1">   {!! $team->{'name_' . $sign} ?? '' !!}    </h3>
                         <p class="text-accent font-semibold">{!! $team->{'title_' . $sign} ?? '' !!}</p>
                     </div>
                 </article>

                @endforeach
                
             </div>
                 </div>

                 <!-- القسم الثاني: الأعضاء -->
                 <!-- <div>
                        <h2 class="text-2xl font-bold text-center text-slate-800 mb-10">الأعضاء</h2>
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">

                            <div
                                class="bg-white rounded-lg shadow-lg p-8 text-center transition-all duration-300 hover:shadow-xl hover:-translate-y-1">
                                <img src="./assets/imgs/about/about-2.jpg" alt="عضو مجلس الأمناء"
                                    class="w-32 h-32 rounded-full object-cover border-4 border-white shadow-lg mx-auto mb-5">
                                <div>
                                    <h3 class="text-xl font-bold text-slate-800 mb-1">فاطمة عبد الحميد</h3>
                                    <p class="text-accent font-semibold text-sm mb-3">عضو مجلس الأمناء</p>
                                    <p class="text-gray-600 text-sm">"بدأت مشوارها التطوعي منذ أكثر من عشر سنوات، وتسعى لغرس
                                        روح العطاء."</p>
                                </div>
                            </div>

                            <div
                                class="bg-white rounded-lg shadow-lg p-8 text-center transition-all duration-300 hover:shadow-xl hover:-translate-y-1">
                                <img src="./assets/imgs/about/about-2.jpg" alt="عضو مجلس الأمناء"
                                    class="w-32 h-32 rounded-full object-cover border-4 border-white shadow-lg mx-auto mb-5">
                                <div>
                                    <h3 class="text-xl font-bold text-slate-800 mb-1">سيف الدين محمود</h3>
                                    <p class="text-accent font-semibold text-sm mb-3">عضو مجلس الأمناء</p>
                                    <p class="text-gray-600 text-sm">"يعمل على دعم وتنفيذ المشاريع الخيرية في محافظات مصر
                                        المختلفة."</p>
                                </div>
                            </div>

                            <div
                                class="bg-white rounded-lg shadow-lg p-8 text-center transition-all duration-300 hover:shadow-xl hover:-translate-y-1">
                                <img src="./assets/imgs/about/about-2.jpg" alt="عضو مجلس الأمناء"
                                    class="w-32 h-32 rounded-full object-cover border-4 border-white shadow-lg mx-auto mb-5">
                                <div>
                                    <h3 class="text-xl font-bold text-slate-800 mb-1">يمنى سعيد</h3>
                                    <p class="text-accent font-semibold text-sm mb-3">عضو مجلس الأمناء</p>
                                    <p class="text-gray-600 text-sm">"تعمل على نشر ثقافة التطوع والمشاركة المجتمعية بين
                                        الشباب."</p>
                                </div>
                            </div>
                        </div>
                    </div> -->

             </div>
         </section>


         @include('includes.share')

     </main>
 @stop
