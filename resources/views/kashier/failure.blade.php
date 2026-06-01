@extends('layouts.front')

@section('content')
<div class="container text-center mt-5 py-5">
    <div class="card mx-auto" style="max-width: 600px;">
        <div class="card-body p-5">
            <i class="fa-solid fa-circle-xmark text-danger" style="font-size: 80px;"></i>
            <h2 class="mt-4 mb-3">{{ __('فشلت عملية الدفع') }}</h2>
            <p class="text-muted">{{ $reason ?? __('الرجاء المحاولة مرة أخرى') }}</p>
            
            @if(isset($orderId))
            <div class="alert alert-warning mt-4">
                <strong>{{ __('رقم الطلب') }}:</strong> {{ $orderId }}
            </div>
            @endif
            
            <div class="mt-4">
                <a href="{{ url()->previous() }}" class="btn btn-primary px-5 me-2">
                    <i class="fa-solid fa-rotate-right me-2"></i>
                    {{ __('إعادة المحاولة') }}
                </a>
                <a href="{{ url('/') }}" class="btn btn-outline-secondary px-5">
                    {{ __('العودة للرئيسية') }}
                </a>
            </div>
        </div>
    </div>
</div>
@endsection