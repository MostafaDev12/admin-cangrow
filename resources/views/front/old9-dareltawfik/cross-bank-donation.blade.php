 
  


      @extends('layouts.front')

  @section('title')

     {{ __('التبرع عبر البنوك') }} - {{ $gs->{'title_' . $sign} }}

  @stop

  @section('gsearch')
      <meta property="og:image" content=" {{ $gs->{'logo_' . $sign} }}" />
  @stop

  @section('css')
     <link rel="stylesheet" href="{{ asset('front/highline/') }}/css/articles.css">
  @stop
  @section('content')



    <main>

        <section class="bg-slate-50 py-12 md:py-16">
            <div class="container mx-auto px-4 max-w-6xl text-center">
                <h1 class="text-4xl md:text-5xl font-extrabold text-slate-800 mb-4">
                 {{ __('طرق التبرع عبر البنوك') }}
                </h1>
                <p class="text-xl text-gray-600 font-medium">
                     {{ __('يمكنك التبرع بسهولة من خلال التحويلات البنكية على الحسابات التالية') }}
                </p>
            </div>
        </section>

        <section class="py-10 bg-white">
            <div class="container mx-auto px-4 max-w-6xl">
                @if (count($insides) > 0)
                   
                <div class="mb-16">
                    <div class="flex items-center gap-4 mb-8 border-b-2 border-primary/20 pb-4">
                        <div class="bg-primary text-white p-3 rounded-lg">
                            <i class="fa-solid fa-building-columns text-xl"></i>
                        </div>
                        <h2 class="text-3xl font-bold text-slate-800">        {{ __('للتبرع من داخل مصر') }} </h2>
                    </div>

                    <div class="grid grid-cols-1 gap-8">
                        @foreach ($insides as $inside)
                        <div
                            class="border border-gray-200 rounded-xl shadow-sm overflow-hidden hover:shadow-md transition-shadow">
                            <div
                                class="bg-green-50 px-6 py-4 border-b border-green-100 flex justify-between items-center">
                                <h3 class="text-xl font-bold text-green-800">{!! $inside->{'title_' . $sign} ?? '' !!}  </h3>
                                <span
                                    class="text-sm text-green-700 font-semibold bg-green-200 px-3 py-1 rounded-full"> 
                                      {!! $inside->location ?? '' !!}</span>
                            </div>
                            <div class="overflow-x-auto">
                                <table class="w-full text-right text-sm">
                                    <thead class="bg-gray-50 text-gray-700">
                                        <tr>
                                            <th class="px-6 py-3 font-bold whitespace-nowrap">العملة</th>
                                            <th class="px-6 py-3 font-bold whitespace-nowrap">رقم الحساب</th>
                                            <th class="px-6 py-3 font-bold whitespace-nowrap">Swift Code</th>
                                        </tr>
                                    </thead>
                                    <tbody class="divide-y divide-gray-100">
                                            @php
                                                $inside_currency = json_decode($inside->currency);
                                                $inside_account = json_decode($inside->account);
                                                $inside_code = json_decode($inside->code);
                                            @endphp

                                        @foreach ($inside_currency as $index => $currency)
                                             
                                        <tr class="hover:bg-gray-50">

                                            <td class="px-6 py-4 font-semibold text-gray-800"> {{ $currency ?? '' }}  </td>
                                            <td class="px-6 py-4 font-mono text-lg text-primary select-all">
                                                {{ $inside_account[$index]  ?? ''}}</td>
                                            <td class="px-6 py-4 font-mono text-gray-600"> {{ $inside_code[$index]  ?? ''}}</td>
                                        </tr>
                                        @endforeach       
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
 
                @endif
 @if (count($outsides) > 0)
                
                <div>
                    <div class="flex items-center gap-4 mb-8 border-b-2 border-primary/20 pb-4">
                        <div class="bg-slate-700 text-white p-3 rounded-lg">
                            <i class="fa-solid fa-globe text-xl"></i>
                        </div>
                        <h2 class="text-3xl font-bold text-slate-800">        {{ __('للتبرع من خارج مصر') }} </h2>
                    </div>

                    <div class="grid grid-cols-1 gap-8">
             @foreach ($outsides as $outside)
                        <div
                            class="border border-gray-200 rounded-xl shadow-sm overflow-hidden hover:shadow-md transition-shadow">
                            <div
                                class="bg-green-50 px-6 py-4 border-b border-green-100 flex justify-between items-center">
                                <h3 class="text-xl font-bold text-green-800">{!! $outside->{'title_' . $sign} ?? '' !!}  </h3>
                                <span
                                    class="text-sm text-green-700 font-semibold bg-green-200 px-3 py-1 rounded-full"> 
                                      {!! $outside->location ?? '' !!}</span>
                            </div>
                            <div class="overflow-x-auto">
                                <table class="w-full text-right text-sm">
                                    <thead class="bg-gray-50 text-gray-700">
                                        <tr>
                                            <th class="px-6 py-3 font-bold whitespace-nowrap"> {{ __('العملة') }} </th>
                                            <th class="px-6 py-3 font-bold whitespace-nowrap">  {{ __('رقم الحساب') }} </th>
                                            <th class="px-6 py-3 font-bold whitespace-nowrap"> {{ __('IBAN') }} </th>
                                            <th class="px-6 py-3 font-bold whitespace-nowrap"> {{ __('Swift Code') }} </th>
                                        </tr>
                                    </thead>
                                    <tbody class="divide-y divide-gray-100">
                                            @php
                                                $outside_currency = json_decode($outside->currency);
                                                $outside_account = json_decode($outside->account);
                                                $outside_iban = json_decode($outside->iban);
                                                $outside_code = json_decode($outside->code);
                                            @endphp

                                        @foreach ($outside_currency as $index => $currency)
                                             
                                        <tr class="hover:bg-gray-50">

                                            <td class="px-6 py-4 font-semibold text-gray-800"> {{ $currency  ?? ''}}  </td>
                                            <td class="px-6 py-4 font-mono text-lg text-primary select-all">
                                                {{ $outside_account[$index]  ?? ''}}</td>
                                            <td class="px-6 py-4 font-mono text-gray-600"> {{ $outside_iban[$index]  ?? ''}}</td>
                                            <td class="px-6 py-4 font-mono text-gray-600"> {{ $outside_code[$index] ?? ''}}</td>
                                        </tr>
                                        @endforeach       
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        @endforeach
                        
                    </div>
                </div>
  @endif
            </div>
        </section>


        @include('includes.share')

    </main>

@stop