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
        {{ __("translation.add") }}
        @endslot
    @endcomponent


    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">



            </div>
            <div class="card-body">
                <form id="geniusform" action="{{ route('admin-meetings-create') }}" method="POST" enctype="multipart/form-data">
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
                                               
                                              {{-- <div class="mb-3">
                                                  <label for="short_details_ar" class="form-label">{{ __('translation.short_details') }}</label>
                                                  <textarea class="form-control ckeditor" name="short_details_ar"  id="short_details_ar" rows="3" placeholder="{{ __('translation.short_details') }}"></textarea>
                                              </div> 
                                              <div class="mb-3">
                                                  <label for="details_ar" class="form-label">{{ __('translation.details') }}</label>
                                                  <textarea class="form-control ckeditor" name="details_ar"  id="details_ar" rows="3" placeholder="{{ __('translation.details') }}"></textarea>
                                              </div>--}}
                                              <div class="mb-3">
                                                  <label for="short_details_ar" class="form-label">{{ __('translation.short_details') }}</label>
                                                  <textarea class="form-control  " name="short_details_ar"  id="short_details_ar" rows="3" placeholder="{{ __('translation.short_details') }}"></textarea>
                                              </div>
                                             {{-- <div class="mb-3">
                                                  <label for="slug_ar" class="form-label">{{ __('translation.slug') }}</label>
                                                  <input type="text" class="form-control" name="slug_ar" id="slug_ar" required placeholder="{{ __('translation.slug') }}">
                                              </div>
                                              
                                           <hr>
                                            <div class="mb-3">
                                                  <label for="meta_title_ar" class="form-label">{{ __('translation.meta_title') }}</label>
                                                  <input type="text" class="form-control" name="meta_title_ar" id="meta_title_ar" placeholder="{{ __('translation.meta_title') }}">
                                              </div>
                                               
                                              <div class="mb-3">
                                                  <label for="meta_details_ar" class="form-label">{{ __('translation.meta_details') }}</label>
                                                  <textarea class="form-control" name="meta_details_ar"  id="meta_details_ar" rows="3" placeholder="{{ __('translation.meta_details') }}"></textarea>
                                              </div>     --}}
                                        </div>
                                        <div class="tab-pane {{$gs->lang_arabic == 0 ? 'active' : '' }}" id="base-justified-product" role="tabpanel">
                                            <h6 style="text-align: center;"> {{ __('translation.english') }}</h6>
                                           
                                            <div class="mb-3">
                                              <label for="title_en" class="form-label">{{ __('translation.title') }}</label>
                                              <input type="text" class="form-control" name="title_en" id="title_en" placeholder="{{ __('translation.title') }}">
                                          </div>
{{--                                            
                                          <div class="mb-3">
                                              <label for="short_details_en" class="form-label">{{ __('translation.short_details') }}</label>
                                              <textarea class="form-control ckeditor" name="short_details_en"  id="short_details_en" rows="3" placeholder="{{ __('translation.short_details') }}"></textarea>
                                          </div>
                                           
                                          <div class="mb-3">
                                              <label for="details_en" class="form-label">{{ __('translation.details') }}</label>
                                              <textarea class="form-control ckeditor" name="details_en"  id="details_en" rows="3" placeholder="{{ __('translation.details') }}"></textarea>
                                          </div>
                                          --}}
                                          
                                          <div class="mb-3">
                                              <label for="short_details_en" class="form-label">{{ __('translation.short_details') }}</label>
                                              <textarea class="form-control  " name="short_details_en"  id="short_details_en" rows="3" placeholder="{{ __('translation.short_details') }}"></textarea>
                                          </div>
                                          
{{--                                           
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
                                           --}}
                                        </div>
                                        <div class="tab-pane" id="base-justified-messages" role="tabpanel">
                                            <h6 style="text-align: center;">{{ __('translation.france') }}</h6>
                                           

                                            <div class="mb-3">
                                              <label for="title_fr" class="form-label">{{ __('translation.title') }}</label>
                                              <input type="text" class="form-control" name="title_fr" id="title_fr" placeholder="{{ __('translation.title') }}">
                                          </div>
                                           
                                          <div class="mb-3">
                                              <label for="short_details_fr" class="form-label">{{ __('translation.short_details') }}</label>
                                              <textarea class="form-control ckeditor" name="short_details_fr"  id="short_details_fr" rows="3" placeholder="{{ __('translation.short_details') }}"></textarea>
                                          </div>
                                          
                                          <div class="mb-3">
                                              <label for="details_fr" class="form-label">{{ __('translation.details') }}</label>
                                              <textarea class="form-control ckeditor" name="details_fr"  id="details_fr" rows="3" placeholder="{{ __('translation.details') }}"></textarea>
                                          </div>
                                          
                                          
                                          <div class="mb-3">
                                              <label for="short_details_fr" class="form-label">{{ __('translation.short_details') }}</label>
                                              <textarea class="form-control  " name="short_details_fr"  id="short_details_fr" rows="3" placeholder="{{ __('translation.short_details') }}"></textarea>
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
                         {{--            <div class="col-xl-12 col-md-12">

                                <div class="mb-3">
                                    <label for="parent_id" class="form-label">{{ __('translation.parent_service') }}</label>
                                    <select class="form-control" name="parent_id" id="parent_id"> 
                                        <option value="0">{{ __('translation.select') }}</option>
                                        @foreach ($parentmeetings as $cat)
                                            <option  value="{{ $cat->id }}">{{ $cat->title_ar ??  $cat->title_en }}</option>
 
                                        @endforeach
                                       
                                    </select>
                                </div>  
                            </div>

                            <div class="col-xl-12 col-md-12">

                                <div class="mb-3">
                                    <label for="category_id" class="form-label">{{ __('translation.categories') }}</label>
                                    <select class="form-control" name="category_id" id="cat"> 
                                        <option value="">{{ __('translation.select') }}</option>
                                        @foreach ($cats as $cat)
                                            <option  data-href="{{ route('admin-subcat-load',$cat->id) }}"  value="{{ $cat->id }}">{{ $cat->title_ar ??  $cat->title_en }}</option>
 
                                        @endforeach
                                       
                                    </select>
                                </div>  
                            </div>
                        
                          <div class="col-xl-12 col-md-12">

                                <div class="mb-3">
                                    <label for="category_id" class="form-label">{{ __('translation.subcategories') }}</label>
                                    <select class="form-control" name="subcategory_id" id="subcat" disabled="" > 
                                        <option value="">{{ __('translation.select') }}</option>
                                     
                                    </select>
                                </div>  
                            </div> --}}
                            
                            
                            <div class="col-xl-12 col-md-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title mb-0">{{ __('translation.videos') }}</h4>
                                    </div>
                                    <div class="card-body">
                                        <div id="variations-container">
                                            <div class="row variation-row mb-3">
                                                <div class="col-md-12">
                                                    <label for="videos_0" class="form-label">{{ __('translation.emped_link') }}</label>
                                                    <input type="text" class="form-control" name="videos[]" id="videos_0" placeholder="{{ __('translation.videos') }}">
                                                </div>
                                               
                                                <div class="col-md-2 d-flex align-items-end">
                                                    <button type="button" class="btn btn-danger remove-variation" style="display: none;">
                                                        <i class="ri-delete-bin-line"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        <button type="button" class="btn btn-primary" id="add-variation">
                                            <i class="ri-add-line"></i> {{ __('translation.add') }}  
                                        </button>
                                    </div>
                                </div>
                            </div>
                            {{--  --}}
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


$(document).on('change','#cat',function () {
        var link = $(this).find(':selected').attr('data-href');
        if(link != "")
        {
          $('#subcat').load(link);
          $('#subcat').prop('disabled',false);
        }
      
      });
</script>

<script type="text/javascript">
    $(document).ready(function() {
        let variationCount = 1;
        
        // Add new variation row
        $('#add-variation').on('click', function() {
            let newRow = `
                <div class="row variation-row mb-3">
                    <div class="col-md-12">
                        <label for="videos_${variationCount}" class="form-label">{{ __('translation.emped_link') }}</label>
                        <input type="text" class="form-control" name="videos[]" id="videos_${variationCount}" placeholder="{{ __('translation.videos') }}">
                    </div>
                    
                    <div class="col-md-2 d-flex align-items-end">
                        <button type="button" class="btn btn-danger remove-variation">
                            <i class="ri-delete-bin-line"></i>
                        </button>
                    </div>
                </div>
            `;
            
            $('#variations-container').append(newRow);
            variationCount++;
            
            // Show remove buttons if more than one row
            if ($('.variation-row').length > 1) {
                $('.remove-variation').show();
            }
        });
        
        // Remove variation row
        $(document).on('click', '.remove-variation', function() {
            $(this).closest('.variation-row').remove();
            
            // Hide remove buttons if only one row left
            if ($('.variation-row').length === 1) {
                $('.remove-variation').hide();
            }
        });
    });
</script>
@stop
