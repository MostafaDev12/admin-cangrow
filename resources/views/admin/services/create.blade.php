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
        {{ __("translation.add_service") }}
        @endslot
    @endcomponent


    <style>
        .featured-keyword-area {
            background-color: #f8f9fa;
            border: 1px solid #dee2e6;
            border-radius: 8px;
            padding: 20px;
            margin-bottom: 20px;
        }

        .heading-area {
            margin-bottom: 20px;
        }

        .title {
            font-size: 1.8rem;
            color: #495057;
        }

        .feature-tag-top-filds {
            margin-bottom: 20px;
        }

        .feature-area {
            border: 1px solid #ced4da;
            border-radius: 8px;
            padding: 15px;
            margin-bottom: 15px;
        }

        .remove {
            cursor: pointer;
            color: #dc3545;
            float: right;
            font-size: 1.2rem;
        }

        .remove:hover {
            color: #bd2130;
        }

        .row {
            margin-bottom: 15px;
        }

        .col-lg-12 {
            width: 100%;
        }

        .input-field {
            width: 100%;
            padding: 12px;
            box-sizing: border-box;
            border: 1px solid #ced4da;
            border-radius: 4px;
            transition: border-color 0.3s;
        }

        .input-field:focus {
            border-color: #007bff;
        }

        .add-fild-btn {
            display: inline-block;
            padding: 10px 20px;
            font-size: 1rem;
            text-decoration: none;
            background-color: #007bff;
            color: #fff;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        .add-fild-btn:hover {
            background-color: #0056b3;
        }

        .icofont-plus {
            margin-right: 5px;
        }
    </style>

    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">



            </div>
            <div class="card-body">
                <form id="geniusform" action="{{ route('admin-services-create') }}" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    @include('includes.admin.form-both')



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
                                               
                                              <div class="mb-3">
                                                  <label for="details_ar" class="form-label">{{ __('translation.details') }}</label>
                                                  <textarea class="form-control ckeditor" name="details_ar"  id="details_ar" rows="3" placeholder="{{ __('translation.details') }}"></textarea>
                                              </div>
                                             <div class="mb-3">
                                                  <label for="slug_ar" class="form-label">{{ __('translation.slug') }}</label>
                                                  <input type="text" class="form-control" name="slug_ar" id="slug_ar"  placeholder="{{ __('translation.slug') }}">
                                              </div>
                                               
                                           <hr>
                                            <div class="mb-3">
                                                  <label for="meta_title_ar" class="form-label">{{ __('translation.meta_title') }}</label>
                                                  <input type="text" class="form-control" name="meta_title_ar" id="meta_title_ar" placeholder="{{ __('translation.meta_title') }}">
                                              </div>
                                               
                                              <div class="mb-3">
                                                  <label for="meta_details_ar" class="form-label">{{ __('translation.meta_details') }}</label>
                                                  <textarea class="form-control" name="meta_details_ar"  id="meta_details_ar" rows="3" placeholder="{{ __('translation.meta_details') }}"></textarea>
                                              </div>   
                                        </div>
                                        <div class="tab-pane {{$gs->lang_arabic == 0 ? 'active' : '' }}" id="base-justified-product" role="tabpanel">
                                            <h6 style="text-align: center;"> {{ __('translation.english') }}</h6>
                                           
                                            <div class="mb-3">
                                              <label for="title_en" class="form-label">{{ __('translation.title') }}</label>
                                              <input type="text" class="form-control" name="title_en" id="title_en" placeholder="{{ __('translation.title') }}">
                                          </div>
                                           
                                          <div class="mb-3">
                                              <label for="details_en" class="form-label">{{ __('translation.details') }}</label>
                                              <textarea class="form-control ckeditor" name="details_en"  id="details_en" rows="3" placeholder="{{ __('translation.details') }}"></textarea>
                                          </div>
                                          
                                          
                                           <div class="mb-3">
                                                  <label for="slug_en" class="form-label">{{ __('translation.slug') }}</label>
                                                  <input type="text" class="form-control" name="slug_en" id="slug_en"   placeholder="{{ __('translation.slug') }}">
                                              </div>
                                               
                                           <hr>
                                            <div class="mb-3">
                                                  <label for="meta_title_en" class="form-label">{{ __('translation.meta_title') }}</label>
                                                  <input type="text" class="form-control" name="meta_title_en" id="meta_title_en" placeholder="{{ __('translation.meta_title') }}">
                                              </div>
                                               
                                              <div class="mb-3">
                                                  <label for="meta_details_en" class="form-label">{{ __('translation.meta_details') }}</label>
                                                  <textarea class="form-control" name="meta_details_en"  id="meta_details_en" rows="3" placeholder="{{ __('translation.meta_details') }}"></textarea>
                                              </div>   
                                          
                                        </div>
                                        <div class="tab-pane" id="base-justified-messages" role="tabpanel">
                                            <h6 style="text-align: center;">{{ __('translation.france') }}</h6>
                                           

                                            <div class="mb-3">
                                              <label for="title_fr" class="form-label">{{ __('translation.title') }}</label>
                                              <input type="text" class="form-control" name="title_fr" id="title_fr" placeholder="{{ __('translation.title') }}">
                                          </div>
                                           
                                          <div class="mb-3">
                                              <label for="details_fr" class="form-label">{{ __('translation.details') }}</label>
                                              <textarea class="form-control ckeditor" name="details_fr"  id="details_fr" rows="3" placeholder="{{ __('translation.details') }}"></textarea>
                                          </div>
                                          
                                          
                                           <div class="mb-3">
                                                  <label for="slug_fr" class="form-label">{{ __('translation.slug') }}</label>
                                                  <input type="text" class="form-control" name="slug_fr" id="slug_fr" placeholder="{{ __('translation.slug') }}">
                                              </div>
                                               
                                           <hr>
                                            <div class="mb-3">
                                                  <label for="meta_title_fr" class="form-label">{{ __('translation.meta_title') }}</label>
                                                  <input type="text" class="form-control" name="meta_title_fr" id="meta_title_fr" placeholder="{{ __('translation.meta_title') }}">
                                              </div>
                                               
                                              <div class="mb-3">
                                                  <label for="meta_details_fr" class="form-label">{{ __('translation.meta_details') }}</label>
                                                  <textarea class="form-control" name="meta_details_fr"  id="meta_details_fr" rows="3" placeholder="{{ __('translation.meta_details') }}"></textarea>
                                              </div>   
                                        </div>

                                    </div>
                                </div><!-- end card-body -->
                            </div><!-- end card -->
                        </div>
                    </div>
  
                        <div class="row">

                            <div class="col-xl-12 col-md-12">

                                <div class="mb-3">
                                    <label for="category_id" class="form-label">{{ __('translation.categories') }}</label>
                                    <select class="form-control" name="category_id"> 
                                        <option value="">{{ __('translation.select') }}</option>
                                        @foreach ($cats as $cat)
                                            <option value="{{ $cat->id }}">{{ $cat->title_ar ??  $cat->title_en}}</option>
 
                                        @endforeach
                                       
                                    </select>
                                </div>  
                            </div>


                            <div class="col-lg-12">
                                <div class="featured-keyword-area">
                                    <div class="heading-area">
                                        <h4 class="title">{{ __('العناوين') }}</h4>
                                    </div>

                                    <div class="feature-tag-top-filds" id="feature-section">

                                            <div class="feature-area">
                                                <span class="remove feature-remove"><i
                                                        class="las la-times"></i></span>
                                                <div class="row">
                                                  <div class="col-lg-6">
                                                            <input type="text" name="table_titles_ar[]"
                                                                class="input-field" placeholder="{{ __('arabic') }}"
                                                                value="">
                                                        </div>
                                                          <div class="col-lg-6">
                                                            <input type="text" name="table_titles_en[]"
                                                                class="input-field" placeholder="{{ __('english') }}"
                                                                value="">
                                                        </div>
                                                          <div class="col-lg-6">
                                                            <input type="text" name="table_details_ar[]"
                                                                class="input-field" placeholder="{{ __('details arabic') }}"
                                                                value="">
                                                        </div>
                                                         
                                                          <div class="col-lg-6">
                                                            <input type="text" name="table_details_en[]"
                                                                class="input-field" placeholder="{{ __('details english') }}"
                                                                value="">
                                                        </div>
                                                         

                                                </div>

                                            </div>
                                       
                                    </div>

                                    <a href="javascript:;" id="feature-btn" class="add-fild-btn"><i
                                            class="icofont-plus"></i> {{ __('اضافه حقول اخرى') }}</a>
                                </div>
                            </div>


                            <div class="col-xl-12 col-md-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title mb-0"> {{ __('translation.photo') }}</h4>
                                    </div><!-- end card header -->

                                    <div class="card-body">
                                        <p class="text-muted">FilePond is a JavaScript library with profile picture-shaped
                                            file
                                            upload variation.</p>
                                        <div class="currrent-logo" style="text-align: center;">
                                            <img style="width: 171px;" src="{{ asset('assets/images/noimage.png') }}"
                                                alt="">
                                        </div>
                                        <div class="avatar-xl mx-auto">
                                            <input type="file" class="filepond filepond-input-circle" name="photo"
                                                accept="image/png, image/jpeg, image/gif, image/webp" />
                                        </div>


                                    </div>
                                    <!-- end card body -->


                                </div>
                                <!-- end card -->
                            </div> <!-- end col -->

                            <div class="col-xl-12 col-md-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title mb-0"> {{ __('translation.details_photo') }}</h4>
                                    </div><!-- end card header -->

                                    <div class="card-body">
                                        <p class="text-muted">FilePond is a JavaScript library with profile picture-shaped
                                            file
                                            upload variation.</p>
                                        <div class="currrent-logo" style="text-align: center;">
                                            <img style="width: 171px;" src="{{ asset('assets/images/noimage.png') }}"
                                                alt="">
                                        </div>
                                        <div class="avatar-xl mx-auto">
                                            <input type="file" class="filepond filepond-input-circle" name="details_photo"
                                                accept="image/png, image/jpeg, image/gif, image/webp" />
                                        </div>


                                    </div>
                                    <!-- end card body -->


                                </div>
                                <!-- end card -->
                            </div> <!-- end col -->


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


@section('script')

<script>
         $("#feature-btn").on('click', function() {

            $("#feature-section").append('' +
                '<div class="feature-area">' +
                '<span class="remove feature-remove"><i class="las la-times"></i></span>' +
                '<div  class="row">' +
                '<div class="col-lg-6">' +
                '<input type="text" name="table_titles_ar[]" class="input-field" placeholder="arabic">' +
                '</div>' +
                '<div class="col-lg-6">' +
                '<input type="text" name="table_titles_en[]" class="input-field" placeholder="english">' +
                '</div>'+
                '<div class="col-lg-6">' +
                '<input type="text" name="table_details_ar[]" class="input-field" placeholder="details arabic">' +
                '</div>' +
                '<div class="col-lg-6">' +
                '<input type="text" name="table_details_en[]" class="input-field" placeholder="details english">' +
                '</div>' +

                '</div>' +

                '</div>' +
                '</div>' +
                '');

        });
        $(document).on('click', '.feature-remove', function() {

            $(this.parentNode).remove();
            if (isEmpty($('#feature-section'))) {

                $("#feature-section").append('' +
                    '<div class="feature-area">' +
                    '<span class="remove feature-remove"><i class="las la-times"></i></span>' +
                    '<div  class="row">' +
                        '<div class="col-lg-6">' +
                        '<input type="text" name="table_titles_ar[]" class="input-field" placeholder="arabic">' +
                        '</div>' +
                        '<div class="col-lg-6">' +
                        '<input type="text" name="table_titles_en[]" class="input-field" placeholder="english">' +
                        '</div>'+
                        '<div class="col-lg-6">' +
                        '<input type="text" name="table_details_ar[]" class="input-field" placeholder="details arabic">' +
                        '</div>' +
                        '<div class="col-lg-6">' +
                        '<input type="text" name="table_details_en[]" class="input-field" placeholder="details english">' +
                        '</div>' +


                    '</div>' +

                    '</div>' +
                    '</div>' +
                    '');
                
            }

        });



    </script>
@endsection
