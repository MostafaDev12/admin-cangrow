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
        {{ __("translation.add_location") }}
        @endslot
    @endcomponent


    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">



            </div>
            <div class="card-body">
                <form id="geniusform" action="{{ route('admin-locations-create') }}" method="POST" enctype="multipart/form-data">
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
                                                  <textarea class="form-control" name="details_ar"  id="details_ar" rows="3" placeholder="{{ __('translation.details') }}"></textarea>
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
                                              <textarea class="form-control" name="details_en"  id="details_en" rows="3" placeholder="{{ __('translation.details') }}"></textarea>
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
                                              <textarea class="form-control" name="details_fr"  id="details_fr" rows="3" placeholder="{{ __('translation.details') }}"></textarea>
                                          </div>

                                      
                                        
                                        </div>

                                    </div>
                                    
                                    
                                       <div class="row">


                            <div class="col-xl-12 col-md-12">
                                <div class="card">
                                  
                                    <div class="mb-3">
                                        <label for="map" class="form-label">{{ __('translation.map') }}</label>
                                        <textarea class="form-control" name="map"  id="map" rows="3" placeholder="{{ __('translation.map') }}"></textarea>
                                    </div>
                                </div>
                                <!-- end card -->
                            </div> <!-- end col -->


                            <div class="col-xl-12 col-md-12">
                                <div class="card">
                                  
                                    <div class="mb-3">
                                        <label for="address_ar" class="form-label">{{ __('translation.map_link') }}</label>
                                        <textarea class="form-control" name="address_ar"  id="address_ar" rows="3" placeholder="{{ __('translation.map_link') }}"></textarea>
                                    </div>
                                </div>
                                <!-- end card -->
                            </div> <!-- end col -->

                            <div class="col-xl-12 col-md-12">
                                <div class="card">
                                  
                                    <div class="mb-3">
                                        <label for="book_link" class="form-label">{{ __('translation.book_link') }}</label>
                                        <textarea class="form-control" name="book_link"  id="book_link" rows="1" placeholder="{{ __('translation.book_link') }}"></textarea>
                                    </div>
                                </div>
                                <!-- end card -->
                            </div> <!-- end col -->


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
