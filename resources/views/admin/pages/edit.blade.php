@extends('layouts.master')
@section('title')
    Edit Page
@endsection
@section('css')
    <style>
        .page-key-label   { font-family: monospace; font-size: 12px; color: #6c757d; }
        .img-preview      { max-height: 80px; max-width: 160px; object-fit: cover; border: 1px solid #dee2e6; padding: 2px; background: #f8f9fa; }
        .img-block        { padding: 12px; border: 1px solid #e9ecef; border-radius: .375rem; margin-bottom: .5rem; background: #fdfdfd; }
        .img-block + .img-block { margin-top: 0; }
    </style>
@endsection
@section('content')
    @component('components.breadcrumb')
        @slot('li_1')
            <a href="{{ route('admin-pages-index') }}">Pages</a>
        @endslot
        @slot('title')
            Edit: {{ $page->slug }}
        @endslot
    @endcomponent

    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <form action="{{ route('admin-pages-update', $page->id) }}" method="POST" enctype="multipart/form-data">
        @csrf

        {{-- ============ Page-level settings ============ --}}
        <div class="card mb-3">
            <div class="card-header">
                <h5 class="card-title mb-0">Page Settings</h5>
            </div>
            <div class="card-body">
                <div class="row g-3">
                    <div class="col-md-4">
                        <label class="form-label">Slug</label>
                        <input type="text" class="form-control" value="{{ $page->slug }}" disabled>
                        <small class="text-muted">Slug is locked — managed by the seeder.</small>
                    </div>
                    <div class="col-md-5">
                        <label class="form-label">Template</label>
                        <input type="text" class="form-control" value="{{ $page->template }}" disabled>
                    </div>
                    <div class="col-md-3 d-flex align-items-end">
                        <div class="form-check form-switch">
                            <input type="hidden" name="is_published" value="0">
                            <input class="form-check-input" type="checkbox" id="is_published" name="is_published" value="1" {{ $page->is_published ? 'checked' : '' }}>
                            <label class="form-check-label" for="is_published">Published</label>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- ============ Translations (one tab per language) ============ --}}
        <div class="card mb-3">
            <div class="card-header">
                <h5 class="card-title mb-0">Content (per language)</h5>
            </div>
            <div class="card-body">
                @if($languages->isEmpty())
                    <div class="alert alert-warning mb-0">No languages found. Add one via Settings → Language.</div>
                @else
                    <ul class="nav nav-tabs mb-3" role="tablist">
                        @foreach($languages as $i => $lang)
                            <li class="nav-item" role="presentation">
                                <button type="button"
                                        class="nav-link {{ $i === 0 ? 'active' : '' }}"
                                        data-bs-toggle="tab"
                                        data-bs-target="#lang-tab-{{ $lang->id }}">
                                    {{ $lang->language ?? $lang->name ?? ('Lang #' . $lang->id) }}
                                </button>
                            </li>
                        @endforeach
                    </ul>

                    <div class="tab-content">
                        @foreach($languages as $i => $lang)
                            @php($trans = $translations->get($lang->id))
                            @php($content = is_array($trans?->content_json) ? $trans->content_json : [])
                            <div class="tab-pane fade {{ $i === 0 ? 'show active' : '' }}" id="lang-tab-{{ $lang->id }}">
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <label class="form-label">Meta Title</label>
                                        <input type="text"
                                               class="form-control"
                                               name="translations[{{ $lang->id }}][meta_title]"
                                               value="{{ $trans->meta_title ?? '' }}">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Meta Description</label>
                                        <textarea class="form-control" rows="2"
                                                  name="translations[{{ $lang->id }}][meta_description]">{{ $trans->meta_description ?? '' }}</textarea>
                                    </div>
                                </div>

                                <hr>

                                @if($contentKeys->isEmpty())
                                    <div class="alert alert-info mb-0">
                                        No content keys defined yet. Run <code>php artisan db:seed --class=BekdashPageSeeder</code> to seed the canonical keys.
                                    </div>
                                @else
                                    <div class="row g-3">
                                        @foreach($contentKeys as $key)
                                            @php($val = data_get($content, $key, ''))
                                            <div class="col-md-6">
                                                <label class="form-label mb-0">{{ $key }}</label>
                                                <div class="page-key-label mb-1">key: <code>{{ $key }}</code></div>
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
                                @endif
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>
        </div>

        {{-- ============ Images ============ --}}
        <div class="card mb-3">
            <div class="card-header">
                <h5 class="card-title mb-0">Images</h5>
                <small class="text-muted">Upload a "Default" image to use for every language. Per-language uploads override the default for that language only.</small>
            </div>
            <div class="card-body">
                @if(count($imageKeys) === 0)
                    <div class="alert alert-info mb-0">No image keys for this page yet. Image keys are seeded via <code>BekdashPageSeeder</code>.</div>
                @else
                    @foreach($imageKeys as $key)
                        <div class="img-block">
                            <h6 class="mb-2">{{ $key }} <span class="page-key-label">key: <code>{{ $key }}</code></span></h6>
                            <div class="row g-3 align-items-end">
                                {{-- Default --}}
                                <div class="col-md-4">
                                    <label class="form-label mb-1"><strong>Default</strong> <span class="text-muted small">(all languages)</span></label>
                                    @php($defaultImg = $imagesByKey[$key]['default'] ?? null)
                                    @if($defaultImg && $defaultImg->path)
                                        <div class="mb-1">
                                            <img src="{{ asset($defaultImg->path) }}" class="img-preview" alt="">
                                        </div>
                                        <div class="page-key-label mb-1">{{ $defaultImg->path }}</div>
                                    @else
                                        <div class="text-muted small mb-1">No default image set.</div>
                                    @endif
                                    <input type="file" class="form-control form-control-sm" name="images[{{ $key }}][default]" accept="image/*">
                                </div>

                                {{-- Per language --}}
                                @foreach($languages as $lang)
                                    <div class="col-md-4">
                                        <label class="form-label mb-1">{{ $lang->language ?? $lang->name ?? ('Lang #' . $lang->id) }} override</label>
                                        @php($langImg = $imagesByKey[$key]['per_lang'][$lang->id] ?? null)
                                        @if($langImg && $langImg->path)
                                            <div class="mb-1">
                                                <img src="{{ asset($langImg->path) }}" class="img-preview" alt="">
                                            </div>
                                            <div class="page-key-label mb-1">{{ $langImg->path }}</div>
                                        @else
                                            <div class="text-muted small mb-1">Falls back to default.</div>
                                        @endif
                                        <input type="file" class="form-control form-control-sm" name="images[{{ $key }}][lang_{{ $lang->id }}]" accept="image/*">
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>

        <div class="d-flex justify-content-end gap-2 mb-4">
            <a href="{{ route('admin-pages-index') }}" class="btn btn-light">Cancel</a>
            <button type="submit" class="btn btn-primary">Save Changes</button>
        </div>
    </form>
@endsection

@section('script')
@endsection
