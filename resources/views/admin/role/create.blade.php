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
            roles
        @endslot
    @endcomponent


 <div class="col-lg-12"  >
                            <div class="card">
                                <div class="card-header">
                                   
                                    

                                </div>
                                <div class="card-body">
                                     <form id="geniusform" action="{{route('admin-role-create')}}" method="POST" enctype="multipart/form-data">
                        {{csrf_field()}}
                      @include('includes.admin.form-both')

                        <div class="row">
                          <div class="col-lg-2">
                            <div class="left-area">
                                <h4 class="heading">{{ __("الاسم") }} *</h4>
                                
                            </div>
                          </div>
                          <div class="col-lg-10">
                            <input type="text" class="form-control" name="name" placeholder="{{ __('الاسم') }}" required="" value="">
                          </div>
                        </div>

                        <hr>
                        <h5 class="text-center">{{ __('الصلاحيات') }}</h5>
                        <hr>


                        <!-- Switches Color -->
                        <div class="form-check form-switch form-check-inline">
                            <input class="form-check-input" type="checkbox"  value="users" role="switch" name="section[]"  id="users" >
                            <label class="form-check-label" for="users">{{ __('المستخدمين') }}  </label>
                        </div>

                        <!-- Switches Color -->
                        <div class="form-check form-switch form-check-inline">
                            <input class="form-check-input" type="checkbox"  value="general_settings" role="switch" name="section[]"  id="general_settings" >
                            <label class="form-check-label" for="general_settings">{{ __('   الاعدادات') }}  </label>
                        </div>

                        <!-- Switches Color -->
                        <div class="form-check form-switch form-check-inline">
                            <input class="form-check-input" type="checkbox"  value="manage_staffs" role="switch" name="section[]"  id="manage_staffs" >
                            <label class="form-check-label" for="manage_staffs">{{ __('Manage Staffs') }}  </label>
                        </div>
 <!-- Switches Color -->
                        <div class="form-check form-switch form-check-inline">
                            <input class="form-check-input" type="checkbox"  value="social_settings" role="switch" name="section[]"  id="social_settings" >
                            <label class="form-check-label" for="social_settings">{{ __('Manage Staffs') }}  </label>
                        </div>

                        <!-- Switches Color -->
                        <div class="form-check form-switch form-check-inline">
                            <input class="form-check-input" type="checkbox"  value="super" role="switch" name="section[]"  id="super" >
                            <label class="form-check-label" for="super">{{ __('Manage Role & Cache clear') }}  </label>
                        </div>

                        <!-- Switches Color -->
                        <div class="form-check form-switch form-check-inline">
                            <input class="form-check-input" type="checkbox"  value="page_settings" role="switch" name="section[]"  id="page_settings" >
                            <label class="form-check-label" for="page_settings">محتوى الصفحات</label>
                        </div>

                        <!-- Switches Color -->
                        <div class="form-check form-switch form-check-inline">
                            <input class="form-check-input" type="checkbox"  value="slider" role="switch" name="section[]"  id="slider" >
                            <label class="form-check-label" for="slider">السلايدر</label>
                        </div>

                        <!-- Switches Color -->
                        <div class="form-check form-switch form-check-inline">
                            <input class="form-check-input" type="checkbox"  value="categories" role="switch" name="section[]"  id="categories" >
                            <label class="form-check-label" for="categories">أقسام المنتجات</label>
                        </div>

                        <!-- Switches Color -->
                        <div class="form-check form-switch form-check-inline">
                            <input class="form-check-input" type="checkbox"  value="services" role="switch" name="section[]"  id="services" >
                            <label class="form-check-label" for="services">المنتجات</label>
                        </div>

                        <!-- Switches Color -->
                        <div class="form-check form-switch form-check-inline">
                            <input class="form-check-input" type="checkbox"  value="site_stats" role="switch" name="section[]"  id="site_stats" >
                            <label class="form-check-label" for="site_stats">الإحصائيات</label>
                        </div>

                        <!-- Switches Color -->
                        <div class="form-check form-switch form-check-inline">
                            <input class="form-check-input" type="checkbox"  value="features" role="switch" name="section[]"  id="features" >
                            <label class="form-check-label" for="features">الكروت والمميزات</label>
                        </div>

                        <!-- Switches Color -->
                        <div class="form-check form-switch form-check-inline">
                            <input class="form-check-input" type="checkbox"  value="partners" role="switch" name="section[]"  id="partners" >
                            <label class="form-check-label" for="partners">عملاؤنا</label>
                        </div>

                        <!-- Switches Color -->
                        <div class="form-check form-switch form-check-inline">
                            <input class="form-check-input" type="checkbox"  value="certificates" role="switch" name="section[]"  id="certificates" >
                            <label class="form-check-label" for="certificates">شهادات الجودة</label>
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
                            <button class="addProductSubmit-btn btn btn-secondary" type="submit">{{ __('   حفظ') }}</button>
                          </div>
                        </div>
                      </form>
                                </div>
                            </div>
                        </div>




@endsection
