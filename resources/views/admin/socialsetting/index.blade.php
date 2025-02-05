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
        {{ __("translation.social_settings") }}
        @endslot
    @endcomponent


    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">



            </div>
            <div class="card-body">
              <form id="geniusform" action="{{ route('admin-social-update-all') }}" method="POST" enctype="multipart/form-data">
                {{csrf_field()}}
                @include('includes.admin.form-both')

 
                    <div class="row">


                        <div class="col-xxl-12">

                            <div class="card">
                                <div class="card-body">
 
                                    
                                         <h6 style="text-align: center;">   {{ __('translation.social_media_links') }}</h6>
                                            
                                      
                                         <div class="row" style="">
                                                
                                          <div class="col-lg-3"></div>
                                          <div class="col-lg-6">
                                              <!-- Checkbox Input -->
                                              <div class="input-group">
                                                  <div class="input-group-text ">
                                                    <div class="form-check form-switch form-switch-secondary" style="padding-top: 4px;">
                                                          <input class="form-check-input mt-0" name="f_status" {{$data->f_status==1?"checked":""}} type="checkbox" value="1" aria-label="Checkbox for following text input">
                                                  
                                                    </div>
                                                  </div>
                                                  <input type="text" class="form-control" name="facebook" id="facebook"  value="{{ $data->facebook }}" aria-label="write link here">
                                                  <label class="input-group-text" for="facebook">Facebook</label>
                                              </div> 
                                              <br>


                                              <!-- Checkbox Input -->
                                              <div class="input-group">
                                                  <div class="input-group-text">
                                                    <div class="form-check form-switch form-switch-secondary" style="padding-top: 4px;">
                                                      <input class="form-check-input mt-0" name="t_status" {{$data->t_status==1?"checked":""}} type="checkbox" value="1" aria-label="Checkbox for following text input">
                                                  </div>
                                                  </div>
                                                  <input type="text" class="form-control" name="twitter" id="twitter" value="{{ $data->twitter }}" aria-label="write link here">
                                                  <label class="input-group-text" for="twitter">Twitter</label>
                                              </div> 
                                              <br>


                                              <!-- Checkbox Input -->
                                              <div class="input-group">
                                                  <div class="input-group-text">
                                                    <div class="form-check form-switch form-switch-secondary" style="padding-top: 4px;">
                                                      <input class="form-check-input mt-0" name="ystatus" {{$data->ystatus==1?"checked":""}} type="checkbox" value="1" aria-label="Checkbox for following text input">
                                                  </div>
                                                  </div>
                                                  <input type="text" class="form-control" name="youtube" id="youtube" value="{{ $data->youtube }}"  aria-label="write link here">
                                                  <label class="input-group-text" for="youtube">Youtube</label>
                                              </div> 
                                              <br>


                                              <!-- Checkbox Input -->
                                              <div class="input-group">
                                                  <div class="input-group-text">
                                                    <div class="form-check form-switch form-switch-secondary" style="padding-top: 4px;">
                                                      <input class="form-check-input mt-0" name="l_status" {{$data->l_status==1?"checked":""}} type="checkbox" value="1" aria-label="Checkbox for following text input">
                                                  </div>
                                                  </div>
                                                  <input type="text" class="form-control" name="linkedin" id="linkedin" value="{{ $data->linkedin }}"  aria-label="write link here">
                                                  <label class="input-group-text" for="linkedin">Linkedin</label>
                                              </div> 
                                              <br>

                                              <!-- Checkbox Input -->
                                              <div class="input-group">
                                                  <div class="input-group-text">
                                                    <div class="form-check form-switch form-switch-secondary" style="padding-top: 4px;">
                                                      <input class="form-check-input mt-0" name="d_status" {{$data->d_status==1?"checked":""}}  type="checkbox" value="1" aria-label="Checkbox for following text input">
                                                  </div>
                                                  </div>
                                                  <input type="text" class="form-control" name="dribble" id="dribble" value="{{ $data->dribble }}"  aria-label="write link here">
                                                  <label class="input-group-text" for="dribble">Tiktok</label>
                                              </div> 
                                              <br>


                                          </div>
           
          
                                      </div><!--end row-->
                                      
        
                                  
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
