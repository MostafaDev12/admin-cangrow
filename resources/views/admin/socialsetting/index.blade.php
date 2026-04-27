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
                                              {{-- Bekdash front-site social links. Each row is just a URL/number
                                                   input — no enable/disable switch. The front hides any icon whose
                                                   value is empty, so leaving a field blank turns that icon off. --}}

                                              <div class="input-group">
                                                  <input type="text" class="form-control" name="facebook" id="facebook" value="{{ $data->facebook }}" placeholder="https://facebook.com/..." aria-label="write link here">
                                                  <label class="input-group-text" for="facebook">Facebook</label>
                                              </div>
                                              <br>

                                              <div class="input-group">
                                                  <input type="text" class="form-control" name="instagram" id="instagram" value="{{ $data->instagram }}" placeholder="https://instagram.com/..." aria-label="write link here">
                                                  <label class="input-group-text" for="instagram">Instagram</label>
                                              </div>
                                              <br>

                                              <div class="input-group">
                                                  <input type="text" class="form-control" name="x_url" id="x_url" value="{{ $data->x_url }}" placeholder="https://x.com/..." aria-label="write link here">
                                                  <label class="input-group-text" for="x_url">X / Twitter</label>
                                              </div>
                                              <br>

                                              <div class="input-group">
                                                  <input type="text" class="form-control" name="linkedin" id="linkedin" value="{{ $data->linkedin }}" placeholder="https://linkedin.com/..." aria-label="write link here">
                                                  <label class="input-group-text" for="linkedin">LinkedIn</label>
                                              </div>
                                              <br>

                                              <div class="input-group">
                                                  {{-- Accepts a full URL (https://wa.me/...) or just the phone number
                                                       (e.g. 201270297000). The front auto-builds wa.me/<digits> when
                                                       only a number is entered. --}}
                                                  <input type="text" class="form-control" name="whatsapp" id="whatsapp" value="{{ $data->whatsapp }}" placeholder="201270297000 or https://wa.me/..." aria-label="write link or number here">
                                                  <label class="input-group-text" for="whatsapp">WhatsApp</label>
                                              </div>
                                              <br>

                                              <div class="input-group">
                                                  <input type="text" class="form-control" name="snapchat" id="snapchat" value="{{ $data->snapchat }}" placeholder="https://snapchat.com/..." aria-label="write link here">
                                                  <label class="input-group-text" for="snapchat">Snapchat</label>
                                              </div>
                                              <br>

                                              <div class="input-group">
                                                  <input type="text" class="form-control" name="tiktok" id="tiktok" value="{{ $data->tiktok }}" placeholder="https://tiktok.com/@..." aria-label="write link here">
                                                  <label class="input-group-text" for="tiktok">TikTok</label>
                                              </div>
                                              <br>

                                              <div class="input-group">
                                                  {{-- Used as href="tel:<value>" — keep it dialable (digits, +, spaces). --}}
                                                  <input type="text" class="form-control" name="phone" id="phone" value="{{ $data->phone }}" placeholder="01270297000" aria-label="write phone number here">
                                                  <label class="input-group-text" for="phone">Phone (call)</label>
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
