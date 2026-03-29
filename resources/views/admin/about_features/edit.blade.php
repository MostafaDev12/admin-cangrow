@extends('layouts.master')
@section('title')
    @lang('translation.analytics')
@endsection
@section('css')
@endsection
@section('content')
    @component('components.breadcrumb')
        @slot('li_1')
            Dashboards
        @endslot
        @slot('title')
            {{ __('translation.edit_about_feature') }}
        @endslot
    @endcomponent

    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <form id="geniusform" action="{{ route('admin-about_features-update', $data->id) }}" method="POST"
                    enctype="multipart/form-data">
                    {{ csrf_field() }}
                    @include('includes.admin.form-both')

                    <div class="row">
                        <div class="col-xxl-12">
                            <div class="card">
                                <div class="card-body">

                                    {{-- Type Field --}}
                                    <div class="mb-3">
                                        <label for="type" class="form-label">{{ __('النوع') }}</label>
                                        <select class="form-control" name="type" id="type">
                                            <option value="feature" {{ $data->type == 'feature' ? 'selected' : '' }}>{{ __('ميزة (القسم العلوي)') }}</option>
                                            <option value="value" {{ $data->type == 'value' ? 'selected' : '' }}>{{ __('قيمة (قسم القيم)') }}</option>
                                        </select>
                                    </div>

                                    {{-- Icon Field --}}
                                    <div class="mb-3">
                                        <label for="icon" class="form-label">{{ __('translation.icon') }} (CSS Class)</label>
                                        <input type="text" class="form-control" name="icon" id="icon"
                                            value="{{ $data->icon }}" placeholder="icon-healthy-food">
                                        <small class="text-muted">
                                            {{ __('أدخل اسم كلاس الأيقونة مثل:') }}
                                            <code>icon-healthy-food</code>, <code>icon-butchering</code>,
                                            <code>icon-meat</code>, <code>icon-meat-2</code>,
                                            <code>icon-meat-3</code>, <code>icon-cow</code>,
                                            <code>icon-chicken</code>, <code>icon-fish</code>
                                        </small>
                                    </div>

                                    <div id="icon-preview" class="mb-3 text-center" style="font-size: 40px; color: #c2a74e;">
                                        <span class="{{ $data->icon }}"></span>
                                    </div>

                                    <hr>

                                    {{-- Language Tabs --}}
                                    <ul class="nav nav-tabs nav-justified mb-3" role="tablist">
                                        @if ($gs->lang_arabic == 1)
                                            <li class="nav-item">
                                                <a class="nav-link active" data-bs-toggle="tab"
                                                    href="#base-justified-home" role="tab">
                                                    <img style="width: 35px;"
                                                        src="{{ asset('assets/images/ar.jpg') }}">
                                                    {{ __('translation.arabic') }}
                                                </a>
                                            </li>
                                        @endif
                                        @if ($gs->lang_english == 1)
                                            <li class="nav-item">
                                                <a class="nav-link" data-bs-toggle="tab"
                                                    href="#base-justified-product" role="tab">
                                                    <img style="width: 35px;"
                                                        src="{{ asset('assets/images/en.png') }}">
                                                    {{ __('translation.english') }}
                                                </a>
                                            </li>
                                        @endif
                                        @if ($gs->lang_france == 1)
                                            <li class="nav-item">
                                                <a class="nav-link" data-bs-toggle="tab"
                                                    href="#base-justified-messages" role="tab">
                                                    <img style="width: 35px;"
                                                        src="{{ asset('assets/images/fr.png') }}">
                                                    {{ __('translation.france') }}
                                                </a>
                                            </li>
                                        @endif
                                    </ul>

                                    <div class="tab-content text-muted">
                                        <div class="tab-pane {{ $gs->lang_arabic == 1 ? 'active' : '' }}"
                                            id="base-justified-home" role="tabpanel">
                                            <h6 style="text-align: center;">{{ __('translation.arabic') }}</h6>
                                            <div class="mb-3">
                                                <label for="title_ar"
                                                    class="form-label">{{ __('translation.title') }}</label>
                                                <input type="text" class="form-control" name="title_ar"
                                                    value="{{ $data->title_ar }}" id="title_ar"
                                                    placeholder="{{ __('translation.title') }}">
                                            </div>
                                        </div>
                                        <div class="tab-pane {{ $gs->lang_arabic == 0 ? 'active' : '' }}"
                                            id="base-justified-product" role="tabpanel">
                                            <h6 style="text-align: center;">{{ __('translation.english') }}</h6>
                                            <div class="mb-3">
                                                <label for="title_en"
                                                    class="form-label">{{ __('translation.title') }}</label>
                                                <input type="text" class="form-control" name="title_en"
                                                    value="{{ $data->title_en }}" id="title_en"
                                                    placeholder="{{ __('translation.title') }}">
                                            </div>
                                        </div>
                                        <div class="tab-pane" id="base-justified-messages" role="tabpanel">
                                            <h6 style="text-align: center;">{{ __('translation.france') }}</h6>
                                            <div class="mb-3">
                                                <label for="title_fr"
                                                    class="form-label">{{ __('translation.title') }}</label>
                                                <input type="text" class="form-control" name="title_fr"
                                                    value="{{ $data->title_fr }}" id="title_fr"
                                                    placeholder="{{ __('translation.title') }}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <br>
                    <div class="row">
                        <div class="col-lg-5"></div>
                        <div class="col-lg-7">
                            <button class="addProductSubmit-btn btn btn-secondary"
                                type="submit">{{ __('translation.save') }}</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        document.getElementById('icon').addEventListener('input', function() {
            var preview = document.getElementById('icon-preview');
            preview.innerHTML = '<span class="' + this.value + '"></span>';
        });
    </script>
@endsection
