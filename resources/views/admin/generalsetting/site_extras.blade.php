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
            {{ __("إعدادات إضافية للموقع") }}
        @endslot
    @endcomponent


    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                @include('includes.admin.form-success')
            </div>
            <div class="card-body">
                <form action="{{ route('admin-gs-update') }}" id="geniusform" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}

                    @include('includes.admin.form-both')

                    <input type="hidden" name="is_capcha" value="{{ $gs->is_capcha }}">

                    <div class="row">
                        <div class="col-xxl-12">

                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title mb-0">كتالوج PDF</h4>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="catalog_file" class="form-label">ملف الكتالوج (كمبيوتر)</label>
                                                @if($gs->catalog_file)
                                                    <p class="text-muted mb-2">الملف الحالي:
                                                        <a href="{{ asset('assets/images/files/'.$gs->catalog_file) }}" target="_blank">{{ $gs->catalog_file }}</a>
                                                    </p>
                                                @endif
                                                <input type="file" class="form-control" name="catalog_file" id="catalog_file" accept="application/pdf">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="catalog_file_mobile" class="form-label">ملف الكتالوج (الموبايل)</label>
                                                @if($gs->catalog_file_mobile)
                                                    <p class="text-muted mb-2">الملف الحالي:
                                                        <a href="{{ asset('assets/images/files/'.$gs->catalog_file_mobile) }}" target="_blank">{{ $gs->catalog_file_mobile }}</a>
                                                    </p>
                                                @endif
                                                <input type="file" class="form-control" name="catalog_file_mobile" id="catalog_file_mobile" accept="application/pdf">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="catalog_label_ar" class="form-label">نص زر الكتالوج بالعربية</label>
                                                <input type="text" class="form-control" name="catalog_label_ar" value="{{ $gs->catalog_label_ar }}" id="catalog_label_ar" placeholder="نص زر الكتالوج بالعربية">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="catalog_label_en" class="form-label">نص زر الكتالوج بالإنجليزية</label>
                                                <input type="text" class="form-control" name="catalog_label_en" value="{{ $gs->catalog_label_en }}" id="catalog_label_en" placeholder="نص زر الكتالوج بالإنجليزية">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="catalog_label_short_ar" class="form-label">نص زر الكتالوج المختصر (موبايل) بالعربية</label>
                                                <input type="text" class="form-control" name="catalog_label_short_ar" value="{{ $gs->catalog_label_short_ar }}" id="catalog_label_short_ar" placeholder="نص زر الكتالوج المختصر بالعربية">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="catalog_label_short_en" class="form-label">نص زر الكتالوج المختصر (موبايل) بالإنجليزية</label>
                                                <input type="text" class="form-control" name="catalog_label_short_en" value="{{ $gs->catalog_label_short_en }}" id="catalog_label_short_en" placeholder="نص زر الكتالوج المختصر بالإنجليزية">
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- end card-body -->
                            </div><!-- end card -->

                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title mb-0">أكواد جوجل</h4>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="analytics_id" class="form-label">معرف Google Analytics</label>
                                                <input type="text" class="form-control" name="analytics_id" value="{{ $gs->analytics_id }}" id="analytics_id" placeholder="G-XXXXXXX">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="google_verification" class="form-label">كود Google Site Verification</label>
                                                <input type="text" class="form-control" name="google_verification" value="{{ $gs->google_verification }}" id="google_verification" placeholder="كود Google Site Verification">
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- end card-body -->
                            </div><!-- end card -->

                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title mb-0">ساعات العمل والخريطة</h4>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="working_days_ar" class="form-label">أيام العمل بالعربية</label>
                                                <input type="text" class="form-control" name="working_days_ar" value="{{ $gs->working_days_ar }}" id="working_days_ar" placeholder="أيام العمل بالعربية">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="working_days_en" class="form-label">أيام العمل بالإنجليزية</label>
                                                <input type="text" class="form-control" name="working_days_en" value="{{ $gs->working_days_en }}" id="working_days_en" placeholder="أيام العمل بالإنجليزية">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="working_hours_ar" class="form-label">ساعات العمل بالعربية</label>
                                                <input type="text" class="form-control" name="working_hours_ar" value="{{ $gs->working_hours_ar }}" id="working_hours_ar" placeholder="ساعات العمل بالعربية">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="working_hours_en" class="form-label">ساعات العمل بالإنجليزية</label>
                                                <input type="text" class="form-control" name="working_hours_en" value="{{ $gs->working_hours_en }}" id="working_hours_en" placeholder="ساعات العمل بالإنجليزية">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label for="map_link" class="form-label">رابط خرائط جوجل</label>
                                                <input type="text" class="form-control" name="map_link" value="{{ $gs->map_link }}" id="map_link" placeholder="رابط خرائط جوجل">
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- end card-body -->
                            </div><!-- end card -->

                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title mb-0">حقوق النشر</h4>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="copyright_ar" class="form-label">حقوق النشر بالعربية</label>
                                                <input type="text" class="form-control" name="copyright_ar" value="{{ $gs->copyright_ar }}" id="copyright_ar" placeholder="حقوق النشر بالعربية">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="copyright_en" class="form-label">حقوق النشر بالإنجليزية</label>
                                                <input type="text" class="form-control" name="copyright_en" value="{{ $gs->copyright_en }}" id="copyright_en" placeholder="حقوق النشر بالإنجليزية">
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- end card-body -->
                            </div><!-- end card -->

                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="text-end">
                                <button type="submit" class="btn btn-primary">{{ __('translation.save') }}</button>
                            </div>
                        </div><!--end col-->
                    </div><!--end row-->

                </form>
            </div>
        </div>
    </div>
@endsection
