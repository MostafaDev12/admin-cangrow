@extends('layouts.front')

@section('content')
<div class="container text-center mt-5 py-5">
    <div class="card mx-auto" style="max-width: 600px;">
        <div class="card-body p-5">
            <i class="fa-solid fa-circle-check text-success" style="font-size: 80px;"></i>
            <h2 class="mt-4 mb-3">{{ __('تم التبرع بنجاح') }}</h2>
            <p class="text-muted">{{ __('شكراً لتبرعك الكريم، جزاك الله خيراً') }}</p>
            
            <div class="alert alert-info mt-4">
                <strong>{{ __('رقم الطلب') }}:</strong> {{ $orderId ?? 'N/A' }}<br>
                @if(isset($transactionId))
                <strong>{{ __('رقم المعاملة') }}:</strong> {{ $transactionId }}
                @endif
            </div>
            
            <a href="{{ url('/') }}" class="btn btn-primary mt-3 px-5">
                <i class="fa-solid fa-home me-2"></i>
                {{ __('العودة للرئيسية') }}
            </a>
        </div>
    </div>
</div>
@endsection