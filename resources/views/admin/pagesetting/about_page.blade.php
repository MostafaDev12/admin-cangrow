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
        {{ __("محتوى صفحة من نحن") }}
        @endslot
    @endcomponent


    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">



            </div>
            <div class="card-body">
              <form id="geniusform" action="{{route('admin-ps-update')}}" method="POST" enctype="multipart/form-data">
                {{csrf_field()}}
                @include('includes.admin.form-both')


                    <div class="row">
                        <div class="col-xxl-12">

                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title mb-0">هيرو صفحة من نحن</h4>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="about_hero_badge_ar" class="form-label">الشارة بالعربية</label>
                                                <input type="text" class="form-control" name="about_hero_badge_ar" value="{{ $ps->about_hero_badge_ar }}" id="about_hero_badge_ar" placeholder="الشارة بالعربية">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="about_hero_badge_en" class="form-label">الشارة بالإنجليزية</label>
                                                <input type="text" class="form-control" name="about_hero_badge_en" value="{{ $ps->about_hero_badge_en }}" id="about_hero_badge_en" placeholder="الشارة بالإنجليزية">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="about_hero_title_ar" class="form-label">العنوان بالعربية</label>
                                                <input type="text" class="form-control" name="about_hero_title_ar" value="{{ $ps->about_hero_title_ar }}" id="about_hero_title_ar" placeholder="العنوان بالعربية">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="about_hero_title_en" class="form-label">العنوان بالإنجليزية</label>
                                                <input type="text" class="form-control" name="about_hero_title_en" value="{{ $ps->about_hero_title_en }}" id="about_hero_title_en" placeholder="العنوان بالإنجليزية">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="about_hero_details_ar" class="form-label">التفاصيل بالعربية</label>
                                                <textarea class="form-control" name="about_hero_details_ar" id="about_hero_details_ar" rows="2" placeholder="التفاصيل بالعربية">{{ $ps->about_hero_details_ar }}</textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="about_hero_details_en" class="form-label">التفاصيل بالإنجليزية</label>
                                                <textarea class="form-control" name="about_hero_details_en" id="about_hero_details_en" rows="2" placeholder="التفاصيل بالإنجليزية">{{ $ps->about_hero_details_en }}</textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="about_hero_image" class="form-label">صورة الهيرو</label>
                                                <div class="currrent-logo mb-2" style="text-align: center;">
                                                    <img style="width:171px" src="{{ $ps->about_hero_image ?: asset('assets/images/noimage.png') }}" alt="">
                                                </div>
                                                <input type="file" class="form-control" name="about_hero_image" id="about_hero_image" accept="image/png, image/jpeg, image/gif, image/webp">
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- end card-body -->
                            </div><!-- end card -->

                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title mb-0">محتوى الصفحة</h4>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="about_badge_ar" class="form-label">شارة القسم بالعربية</label>
                                                <input type="text" class="form-control" name="about_badge_ar" value="{{ $ps->about_badge_ar }}" id="about_badge_ar" placeholder="شارة القسم بالعربية">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="about_badge_en" class="form-label">شارة القسم بالإنجليزية</label>
                                                <input type="text" class="form-control" name="about_badge_en" value="{{ $ps->about_badge_en }}" id="about_badge_en" placeholder="شارة القسم بالإنجليزية">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="about_side_image" class="form-label">الصورة الجانبية</label>
                                                <div class="currrent-logo mb-2" style="text-align: center;">
                                                    <img style="width:171px" src="{{ $ps->about_side_image ?: asset('assets/images/noimage.png') }}" alt="">
                                                </div>
                                                <input type="file" class="form-control" name="about_side_image" id="about_side_image" accept="image/png, image/jpeg, image/gif, image/webp">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="about_features_title_ar" class="form-label">عنوان مميزات المنتجات بالعربية</label>
                                                <input type="text" class="form-control" name="about_features_title_ar" value="{{ $ps->about_features_title_ar }}" id="about_features_title_ar" placeholder="عنوان مميزات المنتجات بالعربية">
                                            </div>
                                            <div class="mb-3">
                                                <label for="about_features_title_en" class="form-label">عنوان مميزات المنتجات بالإنجليزية</label>
                                                <input type="text" class="form-control" name="about_features_title_en" value="{{ $ps->about_features_title_en }}" id="about_features_title_en" placeholder="عنوان مميزات المنتجات بالإنجليزية">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <p class="text-muted mb-0">عنوان ونص "من نحن" يُعدلان من صفحة من نحن الحالية؛ الإحصائيات والقيم والمميزات تُدار من قسمي الإحصائيات والكروت</p>
                                        </div>
                                    </div>
                                </div><!-- end card-body -->
                            </div><!-- end card -->

                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title mb-0">رسالتنا</h4>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="mission_title_ar" class="form-label">العنوان بالعربية</label>
                                                <input type="text" class="form-control" name="mission_title_ar" value="{{ $ps->mission_title_ar }}" id="mission_title_ar" placeholder="العنوان بالعربية">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="mission_title_en" class="form-label">العنوان بالإنجليزية</label>
                                                <input type="text" class="form-control" name="mission_title_en" value="{{ $ps->mission_title_en }}" id="mission_title_en" placeholder="العنوان بالإنجليزية">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="mission_details_ar" class="form-label">التفاصيل بالعربية</label>
                                                <textarea class="form-control" name="mission_details_ar" id="mission_details_ar" rows="3" placeholder="التفاصيل بالعربية">{{ $ps->mission_details_ar }}</textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="mission_details_en" class="form-label">التفاصيل بالإنجليزية</label>
                                                <textarea class="form-control" name="mission_details_en" id="mission_details_en" rows="3" placeholder="التفاصيل بالإنجليزية">{{ $ps->mission_details_en }}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- end card-body -->
                            </div><!-- end card -->

                        </div>
                    </div>


                        <br>
                        <br>
                        <br>
                        <div class="row">
                            <div class="col-lg-5">
                                <div class="left-area">

                                </div>
                            </div>
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
