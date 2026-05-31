@extends('layouts.front')

@section('title')
    {{ __('تم استلام طلبك') }} - {{ $gs->{'title_' . $sign} }}
@stop

@section('gsearch')
    <meta property="og:image" content="{{ $gs->{'logo_' . $sign} }}" />
@stop

@section('content')

    <section class="min-h-[60vh] flex items-center justify-center px-4 py-16">
        <div class="bg-white rounded-3xl shadow-xl border border-gray-100 p-8 md:p-12 max-w-xl w-full text-center">

            <div class="mx-auto mb-6 w-20 h-20 rounded-full bg-green-100 flex items-center justify-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-10 h-10 text-green-600" fill="none"
                    viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                </svg>
            </div>

            <h1 class="text-2xl md:text-3xl font-extrabold text-[#0b4f8f] mb-3">
                {{ __('شكراً لك! تم استلام طلبك بنجاح') }}
            </h1>

            <p class="text-gray-500 text-sm md:text-base mb-8">
                {{ __('سيتواصل معك فريقنا في أقرب وقت لتأكيد موعد استشارتك.') }}
            </p>

            <a href="{{ route('front.index' . $lang, $lang) }}"
                class="inline-block px-10 py-3 rounded-xl bg-[#1670d8] text-white font-bold hover:bg-[#0b4f8f] transition">
                {{ __('العودة للرئيسية') }}
            </a>

        </div>
    </section>

@stop
