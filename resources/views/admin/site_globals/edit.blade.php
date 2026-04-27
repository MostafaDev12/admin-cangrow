@extends('layouts.master')
@section('title')
    Site Settings
@endsection
@section('css')
    <style>
        .gs-key-label { font-family: monospace; font-size: 12px; color: #6c757d; }
    </style>
@endsection
@section('content')
    @component('components.breadcrumb')
        @slot('li_1')
            Dashboards
        @endslot
        @slot('title')
            Site Settings
        @endslot
    @endcomponent

    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="card mb-3">
        <div class="card-header">
            <h5 class="card-title mb-0">Chrome strings (nav, footer, contact labels)</h5>
            <p class="text-muted small mb-0 mt-1">Defaults are seeded by <code>SiteGlobalSettingSeeder</code>. Social links live under Social Settings; this screen only covers nav/footer/contact text.</p>
        </div>
        <div class="card-body">
            <form action="{{ route('admin-site-globals-update') }}" method="POST">
                @csrf

                @if($languages->isEmpty())
                    <div class="alert alert-warning mb-0">No languages found. Add one via Settings → Language, then re-run <code>php artisan db:seed --class=SiteGlobalSettingSeeder</code>.</div>
                @elseif($contentKeys->isEmpty())
                    <div class="alert alert-info mb-0">
                        No keys defined yet. Run <code>php artisan db:seed --class=SiteGlobalSettingSeeder</code> to seed the canonical keys.
                    </div>
                @else
                    <ul class="nav nav-tabs mb-3" role="tablist">
                        @foreach($languages as $i => $lang)
                            <li class="nav-item" role="presentation">
                                <button type="button"
                                        class="nav-link {{ $i === 0 ? 'active' : '' }}"
                                        data-bs-toggle="tab"
                                        data-bs-target="#sg-tab-{{ $lang->id }}">
                                    {{ $lang->language ?? $lang->name ?? ('Lang #' . $lang->id) }}
                                </button>
                            </li>
                        @endforeach
                    </ul>

                    <div class="tab-content">
                        @foreach($languages as $i => $lang)
                            @php($row = $rows->get($lang->id))
                            @php($content = is_array($row?->content_json) ? $row->content_json : [])
                            <div class="tab-pane fade {{ $i === 0 ? 'show active' : '' }}" id="sg-tab-{{ $lang->id }}">
                                <div class="row g-3">
                                    @foreach($contentKeys as $key)
                                        @php($val = data_get($content, $key, ''))
                                        <div class="col-md-6">
                                            <label class="form-label mb-0">{{ $key }}</label>
                                            <div class="gs-key-label mb-1">key: <code>{{ $key }}</code></div>
                                            @if(strlen((string)$val) > 80 || str_contains((string)$val, "\n"))
                                                <textarea class="form-control" rows="3"
                                                          name="translations[{{ $lang->id }}][content][{{ $key }}]">{{ $val }}</textarea>
                                            @else
                                                <input type="text" class="form-control"
                                                       name="translations[{{ $lang->id }}][content][{{ $key }}]"
                                                       value="{{ $val }}">
                                            @endif
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <div class="d-flex justify-content-end gap-2 mt-4">
                        <button type="submit" class="btn btn-primary">Save Changes</button>
                    </div>
                @endif
            </form>
        </div>
    </div>
@endsection

@section('script')
@endsection
