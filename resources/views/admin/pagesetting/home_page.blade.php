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
        {{ __("محتوى الصفحة الرئيسية") }}
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
                                    <h4 class="card-title mb-0">قسم الهيرو</h4>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="home_hero_title_ar" class="form-label">العنوان بالعربية</label>
                                                <input type="text" class="form-control" name="home_hero_title_ar" value="{{ $ps->home_hero_title_ar }}" id="home_hero_title_ar" placeholder="العنوان بالعربية">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="home_hero_title_en" class="form-label">العنوان بالإنجليزية</label>
                                                <input type="text" class="form-control" name="home_hero_title_en" value="{{ $ps->home_hero_title_en }}" id="home_hero_title_en" placeholder="العنوان بالإنجليزية">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="home_hero_cta_text_ar" class="form-label">نص الزر بالعربية</label>
                                                <input type="text" class="form-control" name="home_hero_cta_text_ar" value="{{ $ps->home_hero_cta_text_ar }}" id="home_hero_cta_text_ar" placeholder="نص الزر بالعربية">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="home_hero_cta_text_en" class="form-label">نص الزر بالإنجليزية</label>
                                                <input type="text" class="form-control" name="home_hero_cta_text_en" value="{{ $ps->home_hero_cta_text_en }}" id="home_hero_cta_text_en" placeholder="نص الزر بالإنجليزية">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label for="home_hero_cta_link" class="form-label">رابط الزر (اتركه فارغاً لصفحة اتصل بنا)</label>
                                                <input type="text" class="form-control" name="home_hero_cta_link" value="{{ $ps->home_hero_cta_link }}" id="home_hero_cta_link" placeholder="رابط الزر (اتركه فارغاً لصفحة اتصل بنا)">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="home_hero_image" class="form-label">خلفية الهيرو - كمبيوتر</label>
                                                <div class="currrent-logo mb-2" style="text-align: center;">
                                                    <img style="width:171px" src="{{ $ps->home_hero_image ?: asset('assets/images/noimage.png') }}" alt="">
                                                </div>
                                                <input type="file" class="form-control" name="home_hero_image" id="home_hero_image" accept="image/png, image/jpeg, image/gif, image/webp">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="home_hero_image_mobile" class="form-label">خلفية الهيرو - موبايل</label>
                                                <div class="currrent-logo mb-2" style="text-align: center;">
                                                    <img style="width:171px" src="{{ $ps->home_hero_image_mobile ?: asset('assets/images/noimage.png') }}" alt="">
                                                </div>
                                                <input type="file" class="form-control" name="home_hero_image_mobile" id="home_hero_image_mobile" accept="image/png, image/jpeg, image/gif, image/webp">
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- end card-body -->
                            </div><!-- end card -->

                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title mb-0">قسم من نحن (مختصر)</h4>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="home_about_badge_ar" class="form-label">الشارة بالعربية</label>
                                                <input type="text" class="form-control" name="home_about_badge_ar" value="{{ $ps->home_about_badge_ar }}" id="home_about_badge_ar" placeholder="الشارة بالعربية">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="home_about_badge_en" class="form-label">الشارة بالإنجليزية</label>
                                                <input type="text" class="form-control" name="home_about_badge_en" value="{{ $ps->home_about_badge_en }}" id="home_about_badge_en" placeholder="الشارة بالإنجليزية">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="home_about_cta_text_ar" class="form-label">نص الزر بالعربية</label>
                                                <input type="text" class="form-control" name="home_about_cta_text_ar" value="{{ $ps->home_about_cta_text_ar }}" id="home_about_cta_text_ar" placeholder="نص الزر بالعربية">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="home_about_cta_text_en" class="form-label">نص الزر بالإنجليزية</label>
                                                <input type="text" class="form-control" name="home_about_cta_text_en" value="{{ $ps->home_about_cta_text_en }}" id="home_about_cta_text_en" placeholder="نص الزر بالإنجليزية">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="home_about_image" class="form-label">صورة القسم</label>
                                                <div class="currrent-logo mb-2" style="text-align: center;">
                                                    <img style="width:171px" src="{{ $ps->home_about_image ?: asset('assets/images/noimage.png') }}" alt="">
                                                </div>
                                                <input type="file" class="form-control" name="home_about_image" id="home_about_image" accept="image/png, image/jpeg, image/gif, image/webp">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <p class="text-muted mb-0">العنوان والنص يُعدلان من صفحة "من نحن" في الإعدادات</p>
                                        </div>
                                    </div>
                                </div><!-- end card-body -->
                            </div><!-- end card -->

                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title mb-0">قسم الكروت (استثمار يدوم)</h4>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="home_cards_title_ar" class="form-label">العنوان بالعربية</label>
                                                <input type="text" class="form-control" name="home_cards_title_ar" value="{{ $ps->home_cards_title_ar }}" id="home_cards_title_ar" placeholder="العنوان بالعربية">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="home_cards_title_en" class="form-label">العنوان بالإنجليزية</label>
                                                <input type="text" class="form-control" name="home_cards_title_en" value="{{ $ps->home_cards_title_en }}" id="home_cards_title_en" placeholder="العنوان بالإنجليزية">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="home_cards_details_ar" class="form-label">التفاصيل بالعربية</label>
                                                <textarea class="form-control" name="home_cards_details_ar" id="home_cards_details_ar" rows="2" placeholder="التفاصيل بالعربية">{{ $ps->home_cards_details_ar }}</textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="home_cards_details_en" class="form-label">التفاصيل بالإنجليزية</label>
                                                <textarea class="form-control" name="home_cards_details_en" id="home_cards_details_en" rows="2" placeholder="التفاصيل بالإنجليزية">{{ $ps->home_cards_details_en }}</textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="home_cards_cta_text_ar" class="form-label">نص الزر بالعربية</label>
                                                <input type="text" class="form-control" name="home_cards_cta_text_ar" value="{{ $ps->home_cards_cta_text_ar }}" id="home_cards_cta_text_ar" placeholder="نص الزر بالعربية">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="home_cards_cta_text_en" class="form-label">نص الزر بالإنجليزية</label>
                                                <input type="text" class="form-control" name="home_cards_cta_text_en" value="{{ $ps->home_cards_cta_text_en }}" id="home_cards_cta_text_en" placeholder="نص الزر بالإنجليزية">
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- end card-body -->
                            </div><!-- end card -->

                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title mb-0">قسم عملاؤنا</h4>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="home_clients_badge_ar" class="form-label">الشارة بالعربية</label>
                                                <input type="text" class="form-control" name="home_clients_badge_ar" value="{{ $ps->home_clients_badge_ar }}" id="home_clients_badge_ar" placeholder="الشارة بالعربية">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="home_clients_badge_en" class="form-label">الشارة بالإنجليزية</label>
                                                <input type="text" class="form-control" name="home_clients_badge_en" value="{{ $ps->home_clients_badge_en }}" id="home_clients_badge_en" placeholder="الشارة بالإنجليزية">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="home_clients_title_ar" class="form-label">العنوان بالعربية</label>
                                                <input type="text" class="form-control" name="home_clients_title_ar" value="{{ $ps->home_clients_title_ar }}" id="home_clients_title_ar" placeholder="العنوان بالعربية">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="home_clients_title_en" class="form-label">العنوان بالإنجليزية</label>
                                                <input type="text" class="form-control" name="home_clients_title_en" value="{{ $ps->home_clients_title_en }}" id="home_clients_title_en" placeholder="العنوان بالإنجليزية">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="home_clients_details_ar" class="form-label">التفاصيل بالعربية</label>
                                                <textarea class="form-control" name="home_clients_details_ar" id="home_clients_details_ar" rows="2" placeholder="التفاصيل بالعربية">{{ $ps->home_clients_details_ar }}</textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="home_clients_details_en" class="form-label">التفاصيل بالإنجليزية</label>
                                                <textarea class="form-control" name="home_clients_details_en" id="home_clients_details_en" rows="2" placeholder="التفاصيل بالإنجليزية">{{ $ps->home_clients_details_en }}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- end card-body -->
                            </div><!-- end card -->

                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title mb-0">قسم منتجاتنا</h4>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="home_products_badge_ar" class="form-label">الشارة بالعربية</label>
                                                <input type="text" class="form-control" name="home_products_badge_ar" value="{{ $ps->home_products_badge_ar }}" id="home_products_badge_ar" placeholder="الشارة بالعربية">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="home_products_badge_en" class="form-label">الشارة بالإنجليزية</label>
                                                <input type="text" class="form-control" name="home_products_badge_en" value="{{ $ps->home_products_badge_en }}" id="home_products_badge_en" placeholder="الشارة بالإنجليزية">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="home_products_title_ar" class="form-label">العنوان بالعربية</label>
                                                <input type="text" class="form-control" name="home_products_title_ar" value="{{ $ps->home_products_title_ar }}" id="home_products_title_ar" placeholder="العنوان بالعربية">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="home_products_title_en" class="form-label">العنوان بالإنجليزية</label>
                                                <input type="text" class="form-control" name="home_products_title_en" value="{{ $ps->home_products_title_en }}" id="home_products_title_en" placeholder="العنوان بالإنجليزية">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="home_products_details_ar" class="form-label">التفاصيل بالعربية</label>
                                                <textarea class="form-control" name="home_products_details_ar" id="home_products_details_ar" rows="2" placeholder="التفاصيل بالعربية">{{ $ps->home_products_details_ar }}</textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="home_products_details_en" class="form-label">التفاصيل بالإنجليزية</label>
                                                <textarea class="form-control" name="home_products_details_en" id="home_products_details_en" rows="2" placeholder="التفاصيل بالإنجليزية">{{ $ps->home_products_details_en }}</textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="home_products_cta_text_ar" class="form-label">نص الزر بالعربية</label>
                                                <input type="text" class="form-control" name="home_products_cta_text_ar" value="{{ $ps->home_products_cta_text_ar }}" id="home_products_cta_text_ar" placeholder="نص الزر بالعربية">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="home_products_cta_text_en" class="form-label">نص الزر بالإنجليزية</label>
                                                <input type="text" class="form-control" name="home_products_cta_text_en" value="{{ $ps->home_products_cta_text_en }}" id="home_products_cta_text_en" placeholder="نص الزر بالإنجليزية">
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- end card-body -->
                            </div><!-- end card -->

                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title mb-0">قسم الشهادات</h4>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="certificates_title_ar" class="form-label">العنوان بالعربية</label>
                                                <input type="text" class="form-control" name="certificates_title_ar" value="{{ $ps->certificates_title_ar }}" id="certificates_title_ar" placeholder="العنوان بالعربية">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="certificates_title_en" class="form-label">العنوان بالإنجليزية</label>
                                                <input type="text" class="form-control" name="certificates_title_en" value="{{ $ps->certificates_title_en }}" id="certificates_title_en" placeholder="العنوان بالإنجليزية">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="certificates_subtitle_ar" class="form-label">العنوان الفرعي بالعربية</label>
                                                <textarea class="form-control" name="certificates_subtitle_ar" id="certificates_subtitle_ar" rows="2" placeholder="العنوان الفرعي بالعربية">{{ $ps->certificates_subtitle_ar }}</textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="certificates_subtitle_en" class="form-label">العنوان الفرعي بالإنجليزية</label>
                                                <textarea class="form-control" name="certificates_subtitle_en" id="certificates_subtitle_en" rows="2" placeholder="العنوان الفرعي بالإنجليزية">{{ $ps->certificates_subtitle_en }}</textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="certificates_description_ar" class="form-label">الوصف بالعربية</label>
                                                <textarea class="form-control" name="certificates_description_ar" id="certificates_description_ar" rows="3" placeholder="الوصف بالعربية">{{ $ps->certificates_description_ar }}</textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="certificates_description_en" class="form-label">الوصف بالإنجليزية</label>
                                                <textarea class="form-control" name="certificates_description_en" id="certificates_description_en" rows="3" placeholder="الوصف بالإنجليزية">{{ $ps->certificates_description_en }}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- end card-body -->
                            </div><!-- end card -->

                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title mb-0">قسم تواصل معنا</h4>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="home_contact_badge_ar" class="form-label">الشارة بالعربية</label>
                                                <input type="text" class="form-control" name="home_contact_badge_ar" value="{{ $ps->home_contact_badge_ar }}" id="home_contact_badge_ar" placeholder="الشارة بالعربية">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="home_contact_badge_en" class="form-label">الشارة بالإنجليزية</label>
                                                <input type="text" class="form-control" name="home_contact_badge_en" value="{{ $ps->home_contact_badge_en }}" id="home_contact_badge_en" placeholder="الشارة بالإنجليزية">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="home_contact_title_ar" class="form-label">العنوان بالعربية</label>
                                                <input type="text" class="form-control" name="home_contact_title_ar" value="{{ $ps->home_contact_title_ar }}" id="home_contact_title_ar" placeholder="العنوان بالعربية">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="home_contact_title_en" class="form-label">العنوان بالإنجليزية</label>
                                                <input type="text" class="form-control" name="home_contact_title_en" value="{{ $ps->home_contact_title_en }}" id="home_contact_title_en" placeholder="العنوان بالإنجليزية">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="home_contact_details_ar" class="form-label">التفاصيل بالعربية</label>
                                                <textarea class="form-control" name="home_contact_details_ar" id="home_contact_details_ar" rows="2" placeholder="التفاصيل بالعربية">{{ $ps->home_contact_details_ar }}</textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="home_contact_details_en" class="form-label">التفاصيل بالإنجليزية</label>
                                                <textarea class="form-control" name="home_contact_details_en" id="home_contact_details_en" rows="2" placeholder="التفاصيل بالإنجليزية">{{ $ps->home_contact_details_en }}</textarea>
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
