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
        إضافة إحصائية
        @endslot
    @endcomponent


    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">



            </div>
            <div class="card-body">
                <form id="geniusform" action="{{ route('admin-site_stats-create') }}" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    @include('includes.admin.form-both')


                    <div class="row">


                        <div class="col-xxl-12">

                            <div class="card">
                                <div class="card-body">

                                    <div class="mb-3">
                                        <label for="section" class="form-label">القسم</label>
                                        <select name="section" id="section" class="form-control">
                                            <option value="home_hero">إحصائيات الهيرو - الصفحة الرئيسية</option>
                                            <option value="home_about">إحصائيات من نحن - الصفحة الرئيسية</option>
                                            <option value="about_page">إحصائيات صفحة من نحن</option>
                                        </select>
                                    </div>

                                    <div class="mb-3">
                                        <label for="icon" class="form-label">الأيقونة (FontAwesome)</label>
                                        <input type="text" class="form-control" name="icon" id="icon" placeholder="مثال: fas fa-shield-alt">
                                    </div>

                                    <div class="mb-3">
                                        <label for="value" class="form-label">القيمة</label>
                                        <input type="text" class="form-control" name="value" id="value" placeholder="مثال: 5000+">
                                    </div>

                                    <div class="mb-3">
                                        <label for="sort_order" class="form-label">الترتيب</label>
                                        <input type="number" class="form-control" name="sort_order" id="sort_order" value="0">
                                    </div>

                                    <div class="mb-3">
                                        <label for="is_active" class="form-label">الحالة</label>
                                        <select name="is_active" id="is_active" class="form-control">
                                            <option value="1">مفعل</option>
                                            <option value="0">مخفي</option>
                                        </select>
                                    </div>

                                </div><!-- end card-body -->
                            </div><!-- end card -->
                        </div>
                    </div>

                    <div class="row">


                        <div class="col-xxl-12">

                            <div class="card">
                                <div class="card-body">

                                    <!-- Nav tabs -->
                                    <ul class="nav nav-tabs nav-justified mb-3" role="tablist">
                                        @if($gs->lang_arabic == 1)
                                        <li class="nav-item">
                                            <a class="nav-link active" data-bs-toggle="tab" href="#base-justified-home"
                                                role="tab" aria-selected="false">
                                                <img style="width: 35px;" src="{{ asset('assets/images/ar.jpg') }}">
                                                {{ __('translation.arabic') }}
                                            </a>
                                        </li>
                                        @endif
                                        @if($gs->lang_english == 1)
                                        <li class="nav-item">
                                            <a class="nav-link " data-bs-toggle="tab" href="#base-justified-product"
                                                role="tab" aria-selected="false">
                                                <img style="width: 35px;" src="{{ asset('assets/images/en.png') }}">
                                                {{ __('translation.english') }}
                                            </a>
                                        </li>
                                        @endif
                                        @if($gs->lang_france == 1)
                                        <li class="nav-item">
                                            <a class="nav-link" data-bs-toggle="tab" href="#base-justified-messages"
                                                role="tab" aria-selected="false">
                                                <img style="width: 35px;" src="{{ asset('assets/images/fr.png') }}">
                                                {{ __('translation.france') }}
                                            </a>
                                        </li>
                                        @endif

                                    </ul>
                                    <!-- Tab panes -->
                                    <div class="tab-content  text-muted">
                                        <div class="tab-pane {{$gs->lang_arabic == 1 ? 'active' : '' }}" id="base-justified-home" role="tabpanel">
                                            <h6 style="text-align: center;">   {{ __('translation.arabic') }}</h6>


                                              <div class="mb-3">
                                                  <label for="title_ar" class="form-label">{{ __('translation.title') }}</label>
                                                  <input type="text" class="form-control" name="title_ar" id="title_ar" placeholder="{{ __('translation.title') }}">
                                              </div>

                                        </div>
                                        <div class="tab-pane {{$gs->lang_arabic == 0 ? 'active' : '' }}" id="base-justified-product" role="tabpanel">
                                            <h6 style="text-align: center;"> {{ __('translation.english') }}</h6>

                                            <div class="mb-3">
                                              <label for="title_en" class="form-label">{{ __('translation.title') }}</label>
                                              <input type="text" class="form-control" name="title_en" id="title_en" placeholder="{{ __('translation.title') }}">
                                          </div>

                                        </div>
                                        <div class="tab-pane" id="base-justified-messages" role="tabpanel">
                                            <h6 style="text-align: center;">{{ __('translation.france') }}</h6>


                                            <div class="mb-3">
                                              <label for="title_fr" class="form-label">{{ __('translation.title') }}</label>
                                              <input type="text" class="form-control" name="title_fr" id="title_fr" placeholder="{{ __('translation.title') }}">
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
