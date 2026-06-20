@extends('layouts.master')
@section('title') Maps @endsection
@section('content')
    @component('components.breadcrumb')
        @slot('li_1') Website Content @endslot
        @slot('title') Map Settings @endslot
    @endcomponent

    <div class="col-lg-12">
        @include('includes.admin.form-success')
        <div class="row">
            @foreach($maps as $key => $map)
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title mb-2">
                                {{ $key === 'contact_page' ? 'Contact Page Map' : 'Homepage Map' }}
                                @if($map->enabled)
                                    <span class="badge bg-success">Enabled</span>
                                @else
                                    <span class="badge bg-secondary">Disabled</span>
                                @endif
                            </h5>
                            <p class="text-muted mb-2">{{ $map->clinic_name ?: '—' }}</p>
                            <p class="text-muted small mb-3">{{ \Illuminate\Support\Str::limit($map->address_ar ?: $map->address_en, 80) }}</p>
                            <a href="{{ route('admin-maps-edit', $key) }}" class="btn btn-sm btn-secondary"><i class="las la-edit"></i> Edit</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
