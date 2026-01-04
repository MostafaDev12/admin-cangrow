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
        {{ __("translation.add_language") }}
        @endslot
    @endcomponent

     <div class="body-wrapper">
         <div class="container-fluid">
            
             <div class="row justify-content-center">
                 <div class="card">
                     <div class="px-4 py-3 border-bottom">
                         <h5 class="card-title fw-semibold mb-0">{{ __('language information') }}</h5>
                     </div>
                     <div class="card-body p-4">

                         @include('includes.admin.form-submit')


                         <form id="geniusform2" action="{{ route('admin-flang-store') }}" method="POST"  enctype="multipart/form-data"
                             >
                             {{ csrf_field() }}

                              <div class="row pt-5 pb-5">
                                 <div class="col-lg-6">

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
                                                    accept="image/png, image/jpeg, image/gif, image/webp, image/svg" />
                                            </div>
    
    
                                        </div>
                                        <!-- end card body -->
    
    
                                    </div>
                                    <!-- end card -->
                                     <div class="mb-4">
                                         <label for="exampleInputPassword3" class="form-label fw-semibold">{{ __('language name') }}</label>
                                         <div class="input-group border rounded-1">
                                             <span class="input-group-text bg-transparent px-6 border-0" id="basic-addon1">
                                                 <i class="las la-user fs-6"></i>
                                             </span>
                                             <input type="text" name="language" required class="form-control border-0 ps-2"
                                                 placeholder="{{ __('write language name') }}">
                                         </div>
                                     </div>
                                      
                                     <div class="mb-4">
                                         <label for="exampleInputPassword3" class="form-label fw-semibold">{{ __('sign') }}</label>
                                         <div class="input-group border rounded-1">
                                             <span class="input-group-text bg-transparent px-6 border-0" id="basic-addon1">
                                                 <i class="las la-user fs-6"></i>
                                             </span>
                                             

                                                 <select name="sign" class="form-control" required="">
                                                    <option value="en">{{ __('en') }}</option>
                                                    <option value="ar">{{ __('ar') }}</option>
                                                    <option value="fr">{{ __('fr') }}</option>
                                                  </select>
                                         </div>
                                     </div>
                                      <div class="mb-4">
                                         <label for="exampleInputPassword3" class="form-label fw-semibold">{{ __('language direction') }}</label>
                                         <div class="input-group border rounded-1">
                                             <span class="input-group-text bg-transparent px-6 border-0" id="basic-addon1">
                                                 <i class="las la-file fs-6"></i>
                                             </span>
                                             <select name="rtl" class="form-control" required="">
                                                <option value="0">{{ __('left to right') }}</option>
                                                <option value="1">{{ __('right to left') }}</option>
                                              </select>

                                         </div>
                                     </div>


                                     <hr>

                                        <h4 class="text-center">{{ __('set language keys & values') }}</h4>

                                    <hr>

                                    <div class="row">
                                        {{-- <div class="col-lg-2">
                                          <div class="left-area">

                                          </div>
                                        </div> --}}
                                       <div class="col-lg-12">
                                          <div class="featured-keyword-area">

                                            <div class="lang-tag-top-filds" id="lang-section">

                                              <div class="lang-area">
                                                <span class="remove lang-remove" style="color:red"><i class="las la-times"></i></span>
                                                <div class="row">
                                                  <div class="col-lg-6">
                                                    <textarea name="keys[]" class="form-control" placeholder="{{ __('enter language key') }}" required=""></textarea>
                                                  </div>

                                                  <div class="col-lg-6">
                                                    <textarea  name="values[]" class="form-control" placeholder="{{ __('enter language value') }}" required=""></textarea>
                                                  </div>
                                                </div>
                                              </div>



                                            </div>

                                            <a href="javascript:;" id="lang-btn" class="btn btn-primary" style="margin: 10px;"><i class="fa fa-plus"></i> {{ __('add more field') }}</a>
                                          </div>
                                        </div>


                                        <div class="col-lg-2">
                                          <div class="left-area">

                                          </div>
                                        </div>

                                      </div>

              <hr>

                                     <div class="d-flex justify-content-center">
                                         <BUtton class="btn btn-success">{{ __('save') }}</BUtton>
                                     </div>
                                 </div>
                                 <div class="col-sm-6">
                                     <div class="img-box w-50 m-auto">
                                         <img src="/admin/images/nsvg/design-team.svg" alt="team image">
                                     </div>
                                 </div>
                             </div>

                         </form>
                     </div>
                 </div>
             </div>
         </div>
     </div>
 @stop

 @section('script')

 <script type="text/javascript">

   function isEmpty(el){
       return !$.trim(el.html())
   }


 $("#lang-btn").on('click', function(){

     $("#lang-section").append(''+
                                 '<div class="lang-area">'+
                                   '<span class="remove lang-remove" style="color:red"><i class="las la-times"></i></span>'+
                                   '<div class="row">'+
                                     '<div class="col-lg-6">'+
                                     '<textarea name="keys[]" class="form-control" placeholder="{{ __('Enter Language Key') }}" required=""></textarea>'+
                                     '</div>'+
                                     '<div class="col-lg-6">'+
                                     '<textarea  name="values[]" class="form-control" placeholder="{{ __('Enter Language Value') }}" required=""></textarea>'+
                                     '</div>'+
                                   '</div>'+
                                 '</div>'+
                             '');

 });

 $(document).on('click','.lang-remove', function(){

     $(this.parentNode).remove();
     if (isEmpty($('#lang-section'))) {

     $("#lang-section").append(''+
                                 '<div class="lang-area">'+
                                   '<span class="remove lang-remove" style="color:red"><i class="las la-times"></i></span>'+
                                   '<div class="row">'+
                                     '<div class="col-lg-6">'+
                                     '<textarea name="keys[]" class="form-control" placeholder="{{ __('Enter Language Key') }}" required=""></textarea>'+
                                     '</div>'+
                                     '<div class="col-lg-6">'+
                                     '<textarea  name="values[]" class="form-control" placeholder="{{ __('Enter Language Value') }}" required=""></textarea>'+
                                     '</div>'+
                                   '</div>'+
                                 '</div>'+
                             '');


     }

 });

 </script>

 @endsection
