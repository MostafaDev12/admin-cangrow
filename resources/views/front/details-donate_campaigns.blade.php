 @extends('layouts.front')

 @section('title')
     {{ $service->{'title_' . $sign} }} - {{ $gs->{'title_' . $sign} }}
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
             {{ __('الرئيسية') }}     <span>›</span>     {{ __('حملات التبرع') }}  <span>›</span>   {{ $service->{'title_' . $sign} }}  
            </div>

            <div class="page-header">
                <h1 class="page-title">    {{ $service->{'title_' . $sign} }}</h1>
                <button class="share-btn">
                    <i class="fa-solid fa-share-from-square"></i> {{ __('شارك') }}
                </button>
            </div>

            <div class="main-image-container">
                <img src="{{ $service->photo     }}" alt="{{ $service->{'title_' . $sign} }}" class="main-image">
            </div>

            {{-- <div class="progress-bar-container">
                <div class="progress-fill"></div>
                <div class="progress-text">نسبة التبرع 1%</div>
            </div> --}}

            {{-- <span class="tag">#الاحتياجات الأساسية</span> --}}

            <div class="description">
                {!! $service->{'details_' . $sign} !!}
                 </div>

            {{-- <h3 class="cost-text">   {{ __('تكلفة السهم') }}: 500 {{ __('ج.م') }}</h3> --}}
        </main>

        <aside class="donation-sidebar">
            <div class="donation-card">
                <h2 class="donation-title"> {{ __('تبرع الآن') }}</h2>
                
                <h3 class="donation-subtitle"> {{ __('تفاصيل التبرع') }}</h3>

                <span class="label"> :{{ __('نية التبرع') }}</span>
                <div class="btn-group">
                    <button class="option-btn type outline-active"> {{ __('زكاة المال') }}</button> 
                    <button class="option-btn type"> {{ __('صدقة جارية') }}</button>
                </div>

                <span class="label"> :{{ __('مبلغ التبرع') }}</span>
                <div class="btn-group">
                    <button class="option-btn amount outline-active">10</button> 
                    <button class="option-btn amount">20</button>
                    <button class="option-btn amount">30</button>
                    <div style="align-self: center; color: #555;">{{ __('ج.م') }}</div>
                </div>

                <input type="text" value="10" class="custom-amount-input"  id="amount"  placeholder="{{ __('أدخل قيمة') }}">

                <span class="label"> :{{ __('الاسم') }}</span>
                <input type="text" class="custom-amount-input" id="donor_name" placeholder="{{ __('أدخل اسمك') }}">

                <span class="label"> :{{ __('رقم الهاتف') }}</span>
                <input type="tel" class="custom-amount-input" id="donor_phone" placeholder="{{ __('أدخل رقم هاتفك') }}">

                <input type="hidden" value="{{ __('زكاة المال') }}"  id="type"  class="custom-amount-type">
                <input type="hidden" value="{{ $service->{'title_' . $sign} }}" id="service_name" class="custom-amount-service">

                <div class="action-buttons">
                    <button class="btn btn-donate">
                           {{ __('تبرع الآن') }}<i class="fa-regular fa-heart"></i>
                    </button>
                    {{-- <button class="btn btn-cart">
                        سلة التبرع <i class="fa-solid fa-cart-plus"></i>
                    </button> --}}
                </div>
            </div>
        </aside>

    </div>
 @stop
   @section('js')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const typeButtons = document.querySelectorAll('.option-btn.type');
        const amountButtons = document.querySelectorAll('.option-btn.amount');
        const customAmountInput = document.querySelector('.custom-amount-input');
        const customtypeInput = document.querySelector('.custom-amount-type');
        const donateBtn = document.querySelector('.btn-donate');

        typeButtons.forEach(button => {
            button.addEventListener('click', function() {
                typeButtons.forEach(btn => btn.classList.remove('outline-active'));
                this.classList.add('outline-active');
                customtypeInput.value = this.textContent.trim();
            });
        });

        amountButtons.forEach(button => {
            button.addEventListener('click', function() {
                amountButtons.forEach(btn => btn.classList.remove('outline-active'));
                this.classList.add('outline-active');
                customAmountInput.value = this.textContent.trim();
            });
        });

        customAmountInput.addEventListener('input', function() {
            amountButtons.forEach(btn => btn.classList.remove('outline-active'));
        });

        // Handle donate button click
        donateBtn.addEventListener('click', function() {
            const amount = document.getElementById('amount').value;
            const type = document.getElementById('type').value;
            const serviceName = document.getElementById('service_name').value;
            const donorName = document.getElementById('donor_name').value.trim();
            const donorPhone = document.getElementById('donor_phone').value.trim();

            // Validate amount
            if (!amount || amount <= 0) {
                alert('{{ __("الرجاء إدخال مبلغ التبرع") }}');
                return;
            }

            // Validate name
            if (!donorName) {
                alert('{{ __("الرجاء إدخال الاسم") }}');
                return;
            }

            // Validate phone
            if (!donorPhone) {
                alert('{{ __("الرجاء إدخال رقم الهاتف") }}');
                return;
            }

            // Show loading state
            donateBtn.disabled = true;
            donateBtn.innerHTML = '<i class="fa-solid fa-spinner fa-spin"></i> {{ __("جاري المعالجة...") }}';

            // Send data to server
            fetch('{{ route("kashier.create.session") }}', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({
                    amount: amount,
                    type: type,
                    service_name: serviceName,
                    name: donorName,
                    phone: donorPhone
                })
            })
            .then(response => response.json())
            .then(data => {
                if (data.success && data.redirect_url) {
                    // Redirect to Kashier payment page
                    window.location.href = data.redirect_url;
                } else {
                    alert(data.message || '{{ __("حدث خطأ أثناء المعالجة") }}');
                    donateBtn.disabled = false;
                    donateBtn.innerHTML = '{{ __("تبرع الآن") }}<i class="fa-regular fa-heart"></i>';
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('{{ __("حدث خطأ أثناء الاتصال بالخادم") }}');
                donateBtn.disabled = false;
                donateBtn.innerHTML = '{{ __("تبرع الآن") }}<i class="fa-regular fa-heart"></i>';
            });
        });
    });
</script>
@stop