 @extends('layouts.front')

 @section('title')
        {{ __('عن التطوع') }} - {{ $gs->{'title_' . $sign} }}
 @stop

 @section('gsearch')
     <meta property="og:image" content="{{ $gs->{'logo_' . $sign} }}" />
 @stop
 @section('css')
 
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('front/dareltawfik/') }}/assets/style/service_details.css">
    
    <style>

    </style>
 @stop



 @section('content')
     @php
         $phones = explode(',', $gs->phones);
         $randomPhone = Arr::random($phones);
     @endphp
 
     
    <div class="container-body">
        
        <main class="content-section">
            <div class="breadcrumbs">
             {{ __('الرئيسية') }}     <span>›</span>      {{ __('عن التطوع') }}
            </div>

            <div class="page-header">
                <h1 class="page-title">      {{ $ps->{'volunteering_title_' . $sign}  ?? ''}}</h1>
                {{-- <button class="share-btn">
                    <i class="fa-solid fa-share-from-square"></i> {{ __('شارك') }}
                </button> --}}
            </div>

            <div class="main-image-container">
                <img src="{{ $ps->volunteering_photo }}" alt=" {{ $ps->{'volunteering_title_' . $sign}  ?? ''}}" class="main-image">
            </div>

            {{-- <div class="progress-bar-container">
                <div class="progress-fill"></div>
                <div class="progress-text">نسبة التبرع 1%</div>
            </div> --}}

            {{-- <span class="tag">#الاحتياجات الأساسية</span> --}}

            <div class="description">
              {!! $ps->{'volunteering_details_' . $sign}  ?? '' !!}
                 </div>

            {{-- <h3 class="cost-text">   {{ __('تكلفة السهم') }}: 500 {{ __('ج.م') }}</h3> --}}
        </main>

        
    </div>
 @stop
    @section('js')
        <script>
            // JavaScript to handle button selection and custom amount input
            document.addEventListener('DOMContentLoaded', function() {
                const typeButtons = document.querySelectorAll('.option-btn.type');
                const amountButtons = document.querySelectorAll('.option-btn.amount');
                const customAmountInput = document.querySelector('.custom-amount-input');
                const customtypeInput = document.querySelector('.custom-amount-type');
    
                typeButtons.forEach(button => {
                    button.addEventListener('click', function() {
                        typeButtons.forEach(btn => btn.classList.remove('outline-active'));
                        this.classList.add('outline-active');
                          customtypeInput.value = this.textContent;
                    });
                });
    
                amountButtons.forEach(button => {
                    button.addEventListener('click', function() {
                        amountButtons.forEach(btn => btn.classList.remove('outline-active'));
                        this.classList.add('outline-active');
                        customAmountInput.value = this.textContent;
                    });
                });
    
                customAmountInput.addEventListener('input', function() {
                    amountButtons.forEach(btn => btn.classList.remove('outline-active'));
                });
            });
        </script>
 @stop