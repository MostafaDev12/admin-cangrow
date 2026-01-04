 
 
@extends('layouts.front')

@section('title')
   
{{ __('قصص نجاح المتطوعيين') }} -  {{ $gs->{'title_' . $sign} }}
     
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
                               {{ __('تعرف المتطوعين') }}    {{ __('') }}
                        </h1>
                        <!-- <div
                            class="font-['Aref_Ruqaa'] text-[60px] font-normal text-[color:var(--funden-heading-color)] opacity-10 tracking-[0] absolute left-0 top-[30%] w-full -translate-y-1/2 capitalize leading-[1] z-1">
                            دار التوفيق
                        </div> -->
                    </div>
                    <p class="text-lg text-gray-600 leading-relaxed">
                     {{ __('اعرف المتطوعين بمؤسسة دار التوفيق') }}
                    </p>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @foreach ($models as $model)
                       
                    <div
                        class="bg-white rounded-lg shadow-lg p-8 text-center transition-all duration-300 hover:shadow-xl hover:-translate-y-1">
                        <img src="{{ $model->photo }}" alt="{!! $model->{'name_' . $sign} ?? '' !!}"
                            class="w-32 h-32 rounded-full object-cover border-4 border-white shadow-lg mx-auto mb-5">
                        <div>
                            <h3 class="text-xl font-bold text-slate-800 mb-1">    {!! $model->{'name_' . $sign} ?? '' !!}   </h3>
                            <p class="text-accent font-semibold text-sm mb-3"> {!! $model->{'title_' . $sign} ?? '' !!} 
                            </p>
                            <p class="text-gray-600 text-sm">  {!! $model->{'details_' . $sign} ?? '' !!} </p>
                        </div>
                    </div> 
                    @endforeach
 
 
                </div>
                <div class="text-center mt-12">
                    {{-- <button
                        class="bg-gray-100 text-gray-700 font-semibold py-2 px-6 rounded-full border border-gray-300 hover:bg-gray-200 transition-colors">
                        عرض المزيد
                    </button> --}}
                     {{ $models->links() }}
                </div>
            </div>
        </section>


      
         @include('includes.share')

    </main>

@stop