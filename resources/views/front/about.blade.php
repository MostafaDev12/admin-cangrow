  
   @extends('layouts.front')

@section('title')
   
{{ __('من نحن') }} -  {{ $gs->{'title_' . $sign} }}
     
@stop

@section('gsearch')
    <meta property="og:image" content=" {{ $gs->{'logo_' . $sign} }}" />
@stop

@section('css')

 @stop

@section('content')
 
  



 <main>
     
     <!--<section class="py-16 md:py-24 overflow-hidden min-h-screen flex items-center justify-center">-->
     <!--    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative">-->

     <!--        <div class="hidden lg:block absolute top-1/2 -translate-y-1/2 start-1/2 translate-x-3/4 w-48 h-80 z-[-1]"-->
     <!--            style="background-image: radial-gradient(circle at center, #d1d5db 1px, transparent 1.5px); background-size: 1.25rem 1.25rem;">-->
     <!--        </div>-->

     <!--        <div class="grid grid-cols-1 lg:grid-cols-5 gap-16 lg:gap-24 items-center">-->

     <!--            <div class="lg:col-span-2 relative mt-20 lg:mt-0">-->
     <!--                <img src="{{ $ps->about_photo }}" alt="أطفال مبتسمون"-->
     <!--                    class="w-full h-auto rounded-lg shadow-xl object-cover">-->

     <!--                <div-->
     <!--                    class="absolute bottom-0 start-0 w-2/3 md:w-3/4  rounded-lg shadow-2xl transform translate-y-1/3 md:translate-x-1/2">-->
     <!--                    <img src="{{ asset('front/dareltawfik/') }}/assets/imgs/banner/image-2.jpg" alt="Life Makers Logo"-->
     <!--                        class="w-full h-full rounded-lg object-cover">-->
     <!--                </div>-->
     <!--            </div>-->

     <!--            <div class="lg:col-span-3">-->
     <!--                <div class="mb-8">-->


     <!--                    <div class="mb-12 max-w-3xl mx-auto">-->
     <!--                        <div class="relative mb-10">-->
     <!--                            <h1 class="text-sm font-extrabold text-custom-orange  mb-4">-->
     <!--                                 {{ __('من نحن') }}-->
     <!--                            </h1>-->

     <!--                        </div>-->
     <!--                        <p class="text-lg text-gray-600 leading-relaxed">-->
     <!--                             {{ $ps->{'about_title_' . $sign} ?? '' }}  -->
     <!--                        </p>-->
     <!--                        <div class="w-20 h-1.5 bg-custom-orange rounded-full"></div>-->

     <!--                    </div>-->

     <!--                </div>-->

                    <!-- <p class="text-lg text-gray-700 leading-relaxed mb-8">-->
                    <!--      {!! $ps->{'about_details_' . $sign} ?? '' !!}-->
                    <!--</p>-->

     <!--                <div class="space-y-6">-->

                         
     <!--                    <div class="space-y-6">-->
     <!--                        {{-- <div class="flex items-start">-->
     <!--                            <div class="flex-shrink-0">-->
     <!--                                <span-->
     <!--                                    class="flex items-center justify-center h-7 w-7 rounded-full bg-custom-orange shadow-md">-->
     <!--                                    <i class="fas fa-check text-white text-sm"></i>-->
     <!--                                </span>-->
     <!--                            </div>-->
     <!--                            <p class="mr-4 text-base text-gray-700">-->
     <!--                                برامج الدعم الإنساني والاجتماعي-->
     <!--                            </p>-->
     <!--                        </div> --}}-->
     <!--                        @foreach ($points as $point)-->
                                  
     <!--                           <div class="flex items-start">-->
     <!--                               <div class="flex-shrink-0">-->
     <!--                                   <span-->
     <!--                                       class="flex items-center justify-center h-7 w-7 rounded-full bg-custom-orange shadow-md">-->
     <!--                                       <i class="fas fa-check text-white text-sm"></i>-->
     <!--                                   </span>-->
     <!--                               </div>-->
     <!--                               <p class="mr-4 text-base text-gray-700">-->
     <!--                                     {!! $point->{'title_' . $sign} ?? '' !!}-->
     <!--                               </p>-->
     <!--                           </div>-->

     <!--                         @endforeach  -->
 
     <!--                    </div>-->
 

     <!--                </div>-->
     <!--            </div>-->

     <!--        </div>-->
     <!--               <div class="text-center mt-12">-->
     <!--                   <a href="{{ route('events.index',$sign) }}"-->
     <!--                       class="inline-flex items-center justify-center bg-custom-orange text-white font-bold py-3 px-8 rounded-lg transition-all duration-300 hover:bg-white hover:text-custom-orange border-2 border-custom-orange focus:outline-none focus:ring-2 focus:ring-orange-400 focus:ring-opacity-75">-->
     <!--                       <span>           {{ __('مناسبات دائمة خاصة بالمؤسسة') }}  -->
     <!--                       </span>-->
     <!--                       <i class="fa-solid fa-arrow-left-long mr-2"></i>-->
     <!--                   </a>-->
     <!--                   <a href="{{ route('parties.index',$sign) }}"-->
     <!--                       class="inline-flex items-center justify-center bg-custom-orange text-white font-bold py-3 px-8 rounded-lg transition-all duration-300 hover:bg-white hover:text-custom-orange border-2 border-custom-orange focus:outline-none focus:ring-2 focus:ring-orange-400 focus:ring-opacity-75">-->
     <!--                       <span>      {{ __('الاحتفالات') }}-->
     <!--                       </span>-->
     <!--                       <i class="fa-solid fa-arrow-left-long mr-2"></i>-->
     <!--                   </a>-->
     <!--               </div>-->
     <!--    </div>-->
     <!--</section>-->
     
              <section class="py-16 md:py-24 overflow-hidden min-h-screen flex items-center justify-center">
             <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative">

                 <div class="hidden lg:block absolute top-1/2 -translate-y-1/2 start-1/2 translate-x-3/4 w-48 h-80 z-[-1]"
                     style="background-image: radial-gradient(circle at center, #d1d5db 1px, transparent 1.5px); background-size: 1.25rem 1.25rem;">
                 </div>

                 <div class="grid grid-cols-1 lg:grid-cols-5 gap-16 lg:gap-24 items-center">

                     <div class="lg:col-span-2 relative mt-20 h-full  lg:mt-0 flex items-start  ">
                            <div class="overflow-hidden relative max-h-90">
                                 <img src="{{ $ps->about_photo }}" alt="أطفال مبتسمون"
                             class="w-full h-auto rounded-lg shadow-xl object-cover">

                         <!--<div-->
                         <!--    class="absolute bottom-0 start-0 w-2/3 md:w-3/4  rounded-lg shadow-2xl transform translate-y-1/3 md:translate-x-1/2">-->
                         <!--    <img src="{{ asset('front/dareltawfik/') }}/assets/imgs/banner/image-2.jpg" alt="Life Makers Logo"-->
                         <!--        class="w-full h-full rounded-lg object-cover">-->
                         <!--</div>-->
                            </div>
                     </div>

                     <div class="lg:col-span-3">
                         <div class="mb-8">


                             <div class="mb-12 max-w-3xl mx-auto">
                                 <div class="relative mb-10">
                                     <h1 class="text-sm font-extrabold text-custom-orange  mb-4">
                                            {{ __('من نحن') }}
                                     </h1>

                                 </div>
                                 <p class="text-lg text-gray-600 leading-relaxed">
                                   {{ $ps->{'about_title_' . $sign} ?? '' }}
                                 </p>
                                 <div class="w-20 h-1.5 bg-custom-orange rounded-full"></div>

                             </div>

                         </div>

                        
                          
                        <div class="space-y-6">
 
                            <div class="space-y-6"> 

                                {!! $ps->{'about_details_' . $sign} ?? '' !!}

                              @foreach ($points as $point)
                                  
                                <div class="flex items-start">
                                    <div class="flex-shrink-0">
                                        <span
                                            class="flex items-center justify-center h-7 w-7 rounded-full bg-custom-orange shadow-md">
                                            <i class="fas fa-check text-white text-sm"></i>
                                        </span>
                                    </div>
                                    <p class="mr-4 text-base text-gray-700">
                                          {!! $point->{'title_' . $sign} ?? '' !!}
                                    </p>
                                </div>

                              @endforeach  
 
                            </div>

                           
                        </div>
                     </div>

                 </div>
                    <div class="text-center mt-12">
                        <a href="{{ route('events.index',$sign) }}"
                            class="inline-flex items-center justify-center bg-custom-orange text-white font-bold py-3 px-8 rounded-lg transition-all duration-300 hover:bg-white hover:text-custom-orange border-2 border-custom-orange focus:outline-none focus:ring-2 focus:ring-orange-400 focus:ring-opacity-75">
                            <span>           {{ __('مناسبات دائمة خاصة بالمؤسسة') }}  
                            </span>
                            <i class="fa-solid fa-arrow-left-long mr-2"></i>
                        </a>
                        <a href="{{ route('parties.index',$sign) }}"
                            class="inline-flex items-center justify-center bg-custom-orange text-white font-bold py-3 px-8 rounded-lg transition-all duration-300 hover:bg-white hover:text-custom-orange border-2 border-custom-orange focus:outline-none focus:ring-2 focus:ring-orange-400 focus:ring-opacity-75">
                            <span>      {{ __('الاحتفالات') }}
                            </span>
                            <i class="fa-solid fa-arrow-left-long mr-2"></i>
                        </a>
                    </div>
             </div>
         </section>

     <section class="relative bg-no-repeat bg-cover bg-center flex items-center justify-center"
         style=" background-image:
            url('{{ asset('front/dareltawfik/') }}/assets/imgs/home/bg-1-3.png')">

         <!-- <div class="absolute inset-0 bg-blue-900 bg-opacity-80"></div> -->

         <div class="grid grid-cols-1 lg:grid-cols-5">

             <div class="lg:col-span-2 relative h-64 lg:h-auto">
                 <img src="{{ asset('front/dareltawfik/') }}/assets/imgs/about/about-1.jpg" alt="Child" class="w-full h-full object-cover">

                 <!-- <div class="absolute top-0 left-0 w-32 h-32 md:w-48 md:h-48">
                        <img src="https://via.placeholder.com/200x200/ea580c/ea580c?text=SPLATTER" alt="Splatter effect"
                            class="opacity-75">
                    </div> -->
             </div>

             <div class="lg:col-span-3  text-gray-300 p-12 md:p-16 relative">

                 <i class="fa-solid fa-earth-africa text-9xl absolute bottom-10 left-10 text-white opacity-5"
                     style="font-size: 20rem;"></i>

                 <div class="relative z-10">

                     <div class="mb-12">


                         <div class=" mb-12 max-w-3xl mx-auto">
                             <div class="relative mb-10">
                                 <h1 class="text-sm font-extrabold text-custom-orange  mb-4">
                                 {{ __('مؤسسة دار التوفيق مصر') }}             
                                 </h1>
                                 <div
                                     class="font-['Aref_Ruqaa'] text-[60px] font-normal text-[color:var(--funden-heading-color)] opacity-10 tracking-[0] absolute left-0 top-[30%] w-full -translate-y-1/2 capitalize leading-[1] z-1">
                                         {{ __('عن المؤسسة') }}
                                 </div>
                             </div>
                             <p class="text-lg  leading-relaxed">
                            {{ __('هي مؤسسة أهلية وطنية غير حكومية وغير هادفة للربح أسست عام 2011 ومشهرة مركزياً برقم 839. في مؤسسة دار التوفيق مصر، نؤمن أن تنمية الإنسان هي السبيل لبناء مجتمعات قوية ومزدهرة.') }}
                            </p>
                         </div>

                     </div>

                     <!-- الرؤية -->
                     @foreach ($about_visions as $point)
                         
                     <div class="flex items-center gap-4 mb-6">
                         <div
                             class="flex-shrink-0 w-12 h-12 flex items-center justify-center rounded-full bg-white bg-opacity-10 text-primary">
                             <i class="{{ $point->icon }}"></i>
                         </div>
                         <div>
                             <h3 class="text-xl font-bold text-white mb-2">  {!! $point->{'title_' . $sign} ?? '' !!}</h3>
                             <p class="text-sm text-white">
                                 {!! $point->{'details_' . $sign} ?? '' !!}
                             </p>
                         </div>
                     </div>

                     @endforeach
                  
                 </div>
             </div>
         </div>
     </section>

     <section class="py-16 md:py-24 mb-20">
         <div class="container mx-auto px-4">

             <div class="flex flex-col md:flex-row justify-between items-start gap-8 mb-12">
                 <div class="md:max-w-2xl">


                     <div class="mb-12 max-w-3xl mx-auto">
                         <div class="relative mb-10">
                             <h1 class="text-sm font-extrabold text-custom-orange  mb-4">
                                    {{ __('مجلس الأمناء') }}
                             </h1>
                             <div
                                 class="font-['Aref_Ruqaa'] text-[60px] font-normal text-[color:var(--funden-heading-color)] opacity-10 tracking-[0] absolute left-0 top-[30%] w-full -translate-y-1/2 capitalize leading-[1] z-1">
                                    {{ __('دار التوفيق') }}
                             </div>
                         </div>

                     </div>


                     <!--<p class="text-gray-600 leading-relaxed">-->
                     <!--   {{ __('تدار مؤسسة دار التوفيق مصر من خلال مجلس أمناء يضم نخبة متميزة من الشخصيات العامة والوزراء السابقين وأساتذة الجامعات وأصحاب الخبرات في مجال العمل الشبابي والتطوعي.') }}-->
                     <!--</p>-->
                 </div>

                 <div class="flex-shrink-0">
                     <a href="{{ route('board-trustees.index',$sign) }}"
                         class="inline-block bg-primary text-white font-bold py-3 px-8 rounded-full transition-all duration-300 hover:bg-accent hover:shadow-lg">
                          {{ __('شاهد الكل') }}
                     </a>
                 </div>
             </div>
             <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 md:gap-8">
                @foreach ($teams as $team)
                      <article class="rounded-lg group cursor-pointer transition-all duration-300">
                          <a href="{{ route('about-doctor.index', ['lang' => $sign, 'id' => $team->id ]) }}">
                     <img src="{{ $team->photo_url }}" alt="{!! $team->{'name_' . $sign} ?? '' !!} "
                         class="w-full h-64 rounded-t-lg">
                     <div
                         class="p-6 text-center py-3 bg-white transition-all duration-300 group-hover:shadow-2xl group-hover:rounded-lg group-hover:w-fit group-hover:mx-auto  group-hover:-translate-y-6">
                         <h3 class="text-xl font-bold text-slate-800 mb-1">   {!! $team->{'name_' . $sign} ?? '' !!}    </h3>
                         <p class="text-accent font-semibold">{!! $team->{'title_' . $sign} ?? '' !!}</p>
                     </div></a>
                 </article>

                @endforeach
                
             </div>

         </div>
     </section>
     <section
         class="bg-slate-900 py-16 md:py-24 relative bg-no-repeat bg-cover bg-center flex items-center justify-center"
         style=" background-image:
            url('{{ asset('front/dareltawfik/') }}/assets/imgs/home/bg-1-3.png')">
         <div class="container mx-auto px-4">

             <div class="relative max-w-4xl mx-auto -mt-48 mb-16 md:mb-24 rounded-lg overflow-hidden shadow-2xl">
                 <img src="{{ asset('front/dareltawfik/') }}/assets/imgs/home/bg-1-3.png" alt="Promotional Video" class="w-full h-auto block">

                 <div class="absolute inset-0 bg-black bg-opacity-30"></div>

                 <a href="#"
                     class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-20 h-20 md:w-24 md:h-24 bg-white bg-opacity-90 rounded-full flex items-center justify-center transition-all duration-300 hover:scale-110 group">
                     <i
                         class="fa-solid fa-play text-slate-900 text-3xl md:text-4xl ml-1 group-hover:text-accent transition-colors"></i>
                 </a>
             </div>

             <div class="grid grid-cols-2 md:grid-cols-4 gap-8 text-center text-white">
                @foreach ($processes as $process)
                 <div>
                     <i class="{{ $process->icon }} text-primary text-4xl mb-3"></i>
                     <p class="text-3xl font-extrabold">   {!! $process->{'title_' . $sign} ?? '' !!}  </p>
                     <p class="text-gray-300">   {!! $process->{'details_' . $sign} ?? '' !!}  </p>
                 </div>
                    
                @endforeach
                 

                 
             </div>

         </div>
     </section>

      <section class="py-16 md:py-24">
             <div class="container mx-auto px-4">

                 <div class="text-center mb-12 max-w-3xl mx-auto">
                     <div class="relative mb-10">
                         <h1 class="text-sm font-extrabold text-custom-orange  mb-4">
                          {{ __('شركاء النجاح') }}       </h1>

                     </div>
                     <p class="text-lg text-gray-600 leading-relaxed">
                         
                         {{ __('شركاء نجاح مؤسسة دار التوفيق') }}
                     </p>
                 </div>

                 <!-- Swiper -->
                 <div class="swiper partners-swiper">
                     <div class="swiper-wrapper">
                         <!-- توليد 19 شريكًا -->
                         @foreach ($partners as $partner) 
                         <div class="swiper-slide">
                             <div
                                 class="bg-slate-100 rounded-lg p-6 flex items-center justify-center h-32 transition-all duration-300 hover:shadow-lg">
                                 <img src="{{ $partner->photo }}" alt="Partner 1"
                                     class="max-h-12 w-auto object-contain" />
                             </div>
                         </div>
                             @endforeach
                     </div>

                     <!-- أزرار التحكم -->
                     <div class="swiper-button-next !text-primary"></div>
                     <div class="swiper-button-prev !text-primary"></div>

                     <!-- النقاط -->
                     <div class="swiper-pagination mt-6"></div>
                 </div>
             </div>
      </section>

 
        @include('includes.share')
 </main>
 @stop