 
 
@extends('layouts.front')

@section('title')
   
{{ __('معرض الصور') }}  -  {{ $gs->{'title_' . $sign} }}
     
@stop

@section('gsearch')
    <meta property="og:image" content=" {{ $gs->{'logo_' . $sign} }}" />
@stop


@section('content')

    <main>

        <section class="py-16 md:py-24">
            <div class="container mx-auto px-4">

                <div class="text-center mb-12 max-w-3xl mx-auto">
                    <div class="relative mb-10">
                        <h1 class="text-sm font-extrabold text-custom-orange  mb-4">
                            تعرف المتطوعين
                        </h1>
                        <!-- <div
                            class="font-['Aref_Ruqaa'] text-[60px] font-normal text-[color:var(--funden-heading-color)] opacity-10 tracking-[0] absolute left-0 top-[30%] w-full -translate-y-1/2 capitalize leading-[1] z-1">
                            دار التوفيق
                        </div> -->
                    </div>
                    <p class="text-lg text-gray-600 leading-relaxed">
                        اعرف المتطوعين بمؤسسة دار التوفيق
                    </p>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">

                    <div
                        class="bg-white rounded-lg shadow-lg p-8 text-center transition-all duration-300 hover:shadow-xl hover:-translate-y-1">
                        <img src="./assets/imgs/about/about-2.jpg" alt="محمد فارس"
                            class="w-32 h-32 rounded-full object-cover border-4 border-white shadow-lg mx-auto mb-5">
                        <div>
                            <h3 class="text-xl font-bold text-slate-800 mb-1">داليا محمد توفيق عويضه</h3>
                            <p class="text-accent font-semibold text-sm mb-3">مسؤول المورد المركزي لمحافظة القاهرة
                            </p>
                            <p class="text-gray-600 text-sm">"أرى أن التطوع يملأ به الأثر، وأهم ما يحققه..."</p>
                        </div>
                    </div>

                    <div
                        class="bg-white rounded-lg shadow-lg p-8 text-center transition-all duration-300 hover:shadow-xl hover:-translate-y-1">
                        <img src="./assets/imgs/about/about-2.jpg" alt="محمد فارس"
                            class="w-32 h-32 rounded-full object-cover border-4 border-white shadow-lg mx-auto mb-5">
                        <div>
                            <h3 class="text-xl font-bold text-slate-800 mb-1">داليا محمد توفيق عويضه</h3>

                            <p class="text-accent font-semibold text-sm mb-3">مسؤول مشروع بنك الملابس في المنوفية
                            </p>
                            <p class="text-gray-600 text-sm">"كوني يُمنى، مسؤولة حملة "دفء" في محافظة المنوفية..."</p>
                        </div>
                    </div>

                    <div
                        class="bg-white rounded-lg shadow-lg p-8 text-center transition-all duration-300 hover:shadow-xl hover:-translate-y-1">
                        <img src="./assets/imgs/about/about-2.jpg" alt="محمد فارس"
                            class="w-32 h-32 rounded-full object-cover border-4 border-white shadow-lg mx-auto mb-5">
                        <div>
                            <h3 class="text-xl font-bold text-slate-800 mb-1">داليا محمد توفيق عويضه</h3>
                            <p class="text-accent font-semibold text-sm mb-3">المنسق الميداني لمكتب دار التوفيق
                                بالجيزة
                            </p>
                            <p class="text-gray-600 text-sm">"تعمل رفيدة- خريجة آداب- كمسؤولة عن مكتبة أجيال، فريق..."
                            </p>
                        </div>
                    </div>

                    <div
                        class="bg-white rounded-lg shadow-lg p-8 text-center transition-all duration-300 hover:shadow-xl hover:-translate-y-1">
                        <img src="./assets/imgs/about/about-2.jpg" alt="محمد فارس"
                            class="w-32 h-32 rounded-full object-cover border-4 border-white shadow-lg mx-auto mb-5">
                        <div>
                            <h3 class="text-xl font-bold text-slate-800 mb-1">داليا محمد توفيق عويضه</h3>
                            <p class="text-accent font-semibold text-sm mb-3">مسؤول مكتب دار التوفيق بمحافظة الشرقية
                            </p>
                            <p class="text-gray-600 text-sm">"سيف، أصبح مسؤولاً عن آلاف، مشاريع "مركب واحد..."</p>
                        </div>
                    </div>

                    <div
                        class="bg-white rounded-lg shadow-lg p-8 text-center transition-all duration-300 hover:shadow-xl hover:-translate-y-1">
                        <img src="./assets/imgs/about/about-2.jpg" alt="محمد فارس"
                            class="w-32 h-32 rounded-full object-cover border-4 border-white shadow-lg mx-auto mb-5">
                        <div>
                            <h3 class="text-xl font-bold text-slate-800 mb-1">داليا محمد توفيق عويضه</h3>
                            <p class="text-accent font-semibold text-sm mb-3">منسق قطاع الغذاء ب دار التوفيق</p>
                            <p class="text-gray-600 text-sm">"من مؤسسي دار التوفيق مصر في السويس، عملت أميرة..."</p>
                        </div>
                    </div>

                    <div
                        class="bg-white rounded-lg shadow-lg p-8 text-center transition-all duration-300 hover:shadow-xl hover:-translate-y-1">
                        <img src="./assets/imgs/about/about-2.jpg" alt="محمد فارس"
                            class="w-32 h-32 rounded-full object-cover border-4 border-white shadow-lg mx-auto mb-5">
                        <div>
                            <h3 class="text-xl font-bold text-slate-800 mb-1">داليا محمد توفيق عويضه</h3>
                            <p class="text-accent font-semibold text-sm mb-3">عضو مجلس إدارة المتطوعين</p>
                            <p class="text-gray-600 text-sm">"بدأت فاطمة التطوع في دار التوفيق بالتزامن مع نشأة..."</p>
                        </div>
                    </div>

                </div>
            </div>
        </section>


      
         @include('includes.share')

    </main>

@stop