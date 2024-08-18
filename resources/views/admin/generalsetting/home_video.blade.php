@extends('layouts.master')
@section('title')
    @lang('translation.home_video')
@endsection
@section('css')

@endsection
@section('content')
    @component('components.breadcrumb')
        @slot('li_1')
            Dashboards
        @endslot
        @slot('title')
        @lang('translation.home_video')
        @endslot 
    @endcomponent

 
       
            <div class="row  ">
               
                
                <div class="col-xl-12 col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title mb-0">Home Video</h4>
                        </div><!-- end card header -->

                        <form class="uplogo-form" id="geniusform" action="{{ route('admin-gs-update') }}" method="POST"
                            enctype="multipart/form-data">
                            {{ csrf_field() }}

                            @include('includes.admin.form-both')
                        <div class="card-body">
                            <p class="text-muted">FilePond is a JavaScript library with profile picture-shaped file
                                upload variation.</p>
                                <div class="currrent-logo" style="text-align: center;">
                                   
                                <video width="640" height="360" controls>
                                      <source src="{{$gs->home_video}}" type="video/mp4">
                                      <source src="video.ogg" type="video/ogg">
                                      Your browser does not support the video tag.
                                 </video>
                                        
                                </div>
                            <div class="avatar-xl mx-auto">
                                <input type="file" class="filepond filepond-input-circle" name="home_video"
                                    accept="" />
                            </div>

                        <div class="submit-area mb-4">
                            <button type="submit" class="submit-btn btn btn-primary">{{ __('Submit') }}</button>
                        </div>

                        </div>
                        <!-- end card body -->

                    </form>
                    </div>
                    <!-- end card -->
                </div> <!-- end col -->
   
         
            </div>
         
   
@endsection
@section('script')
   
    <script src="{{ URL::asset('build/js/app.js') }}"></script>
@endsection
