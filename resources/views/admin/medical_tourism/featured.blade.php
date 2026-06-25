@extends('layouts.master')
@section('title') Featured Content @endsection
@section('content')
    @component('components.breadcrumb')
        @slot('li_1') Medical Tourism @endslot
        @slot('title') Featured Content @endslot
    @endcomponent

    <div class="col-lg-12"><div class="card"><div class="card-body">
        <p class="text-muted">Select the services, before/after cases, and testimonials that appear on the Medical Tourism page.</p>
        <form id="geniusform" action="{{ route('admin-mt-featured-update') }}" method="POST">
            {{ csrf_field() }}
            @include('includes.admin.form-both')

            <div class="row">
                <div class="col-md-4 mb-4">
                    <h5>Featured Services</h5>
                    <div style="max-height:340px;overflow:auto" class="border rounded p-2">
                        @forelse($services as $s)
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="services[]" value="{{ $s->id }}" id="svc{{ $s->id }}" @checked($s->mt_featured)>
                                <label class="form-check-label" for="svc{{ $s->id }}">{{ $s->title_ar ?: $s->title_en }}</label>
                            </div>
                        @empty
                            <p class="text-muted mb-0">No services found.</p>
                        @endforelse
                    </div>
                </div>

                <div class="col-md-4 mb-4">
                    <h5>Featured Before/After</h5>
                    <div style="max-height:340px;overflow:auto" class="border rounded p-2">
                        @forelse($beforeAfters as $b)
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="before_afters[]" value="{{ $b->id }}" id="ba{{ $b->id }}" @checked($b->mt_featured)>
                                <label class="form-check-label" for="ba{{ $b->id }}">
                                    #{{ $b->id }} — {{ $b->service->title_ar ?? $b->service->title_en ?? '—' }} {{ $b->title_ar ? '('.$b->title_ar.')' : '' }}
                                </label>
                            </div>
                        @empty
                            <p class="text-muted mb-0">No cases found.</p>
                        @endforelse
                    </div>
                </div>

                <div class="col-md-4 mb-4">
                    <h5>Featured Testimonials</h5>
                    <div style="max-height:340px;overflow:auto" class="border rounded p-2">
                        @forelse($testimonials as $t)
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="testimonials[]" value="{{ $t->id }}" id="tst{{ $t->id }}" @checked($t->mt_featured)>
                                <label class="form-check-label" for="tst{{ $t->id }}">{{ $t->name }} — {{ $t->location }}</label>
                            </div>
                        @empty
                            <p class="text-muted mb-0">No testimonials found.</p>
                        @endforelse
                    </div>
                </div>
            </div>

            <div class="text-end"><button class="addProductSubmit-btn btn btn-secondary" type="submit">Save Featured</button></div>
        </form>
    </div></div></div>
@endsection
