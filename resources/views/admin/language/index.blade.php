@extends('layouts.master' )

@section('title')
    @lang('translation.analytics')
@endsection
@section('css')
<style>
#setgallery .modal-body .top-area {
  display: -ms-flexbox;
  border-bottom: 1px solid rgba(0, 0, 0, 0.1);
  padding-bottom: 15px;
  margin-bottom: 30px;
}

.exp-form .set-gallery-prod, label#prod_gallery, label#prod_gallery_mobile, .upload-done-btn {
  background: #fff;
  color: #211c51;
  font-weight: 500;
  border: 1px dashed #ccc;
  border-radius: 30px;
  height: 50px;
  display: flex;
  align-items: center;
  justify-content: center;
  cursor: pointer;
  transition: all .2s ease-in-out;
}

.exp-form .set-gallery-prod, label#prod_gallery, label#prod_gallery_mobile, .upload-done-btn {
  background: #fff;
    background-color: rgb(255, 255, 255);
  color: #211c51;
  font-weight: 500;
  border: 1px dashed #ccc;
  border-radius: 30px;
  height: 50px;
  display: flex;
  align-items: center;
  justify-content: center;
  cursor: pointer;
  transition: all .2s ease-in-out;
}

.main-bg-dark {
  background-color: #211C51 !important;
}
.text-white {
  color: #fff !important;
}

#setgallery .modal-body .selected-image .img {
  text-align: center;
  margin-bottom: 20px;
  border: 1px solid rgba(0, 0, 0, 0.1);
  position: relative;
}

#setgallery .modal-body .selected-image .img .remove-img {
  position: absolute;
  top: -12px;
  right: -12px;
  background: #fff;
  width: 20px;
  height: 20px;
  border: 1px solid rgba(0, 0, 0, 0.1);
  font-size: 12px;
  color: rgba(0, 0, 0, 0.5);
  border-radius: 50%;
  line-height: 20px;
  text-align: center;
  -webkit-box-shadow: 0px 5px 10px rgba(0, 0, 0, 0.2);
  box-shadow: 0px 5px 10px rgba(0, 0, 0, 0.2);
  cursor: pointer;
}

.hidden {
  display: none;
}

.gallery-img img{

  width: 310px;

} 

</style>
  
@endsection
@section('content')

    @component('components.breadcrumb')
    @slot('li_1')
        Dashboards
    @endslot
    @slot('title')
    {{ __('translation.language') }}
    @endslot
    @endcomponent


    <input type="hidden" id="headerdata" value="{{ __('translation.blogs') }}">
    <div class="col-lg-12"  >
       <div class="card">
           <div class="card-header">
                  @include('includes.admin.form-success')
                        <div class="btn-area"></div>
           </div>
           <div class="card-body">
               <table id="geniustable" class="table nowrap dt-responsive align-middle table-hover table-bordered" style="width:100%">
                   <thead>

                    <th>
                      {{ __('translation.photo') }} 
                    </th>
                    <th>
                       {{ __('translation.language') }} 
                    </th>
                    <th class="text-center">
                      {{ __('translation.type') }} 
                    </th>
                    <th class="text-center">
                        {{ __('translation.status') }} 
                    </th>
                    <th class="text-center">{{ __('translation.actions') }}</th>
 
                   </thead>
                   <tbody>


                    @forelse($datas as $lang)
                        <tr>
                            <td>
                                <div class="d-flex align-items-center">
                                    <img src="{{ $lang->photo  }}" class="rounded-circle"
                                        width="40" height="40" />
                                    <div class="ms-3">
                                        <h6 class="fs-4 fw-semibold mb-0">{{ '' }}</h6>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <p class="mb-0 fw-normal">{{ $lang->language  }}</p>
                            </td>
                            <td class="text-center">
                                <p class="mb-0 fw-normal text-center">{{ $lang->rtl == 1 ? __('rtl') : __('ltr') }}</p>
                            </td>
                            <td class="text-center">
                                @if ($lang->is_default == '1')
                                    <span
                                        class="badge bg-success-subtle rounded-3 py-8 text-success fw-semibold fs-2">{{ __('default') }}</span>
                                @endif
                            </td>
                            <td class="text-center">

                                <div class="action-list">
                                    <a class=" btn btn-sm btn-secondary" href="{{  route('admin-flang-edit',$lang->id) }}"> <i class="las la-edit"></i>{{ __('edit') }}</a>
                                 
                                    
                                   
                                
                                  @if ($lang->is_default  == 0)
                                 
                                          <a class="btn btn-sm btn-secondary"
                                              href="javascript:void(0)"
                                              onclick="statusupdate('{{ route('admin-flang-statusupdate', ['id' => $lang->id, 'status' => '1']) }}')">
                                              <i class="las la-at-off"></i>
                                              {{ __('make default') }}
                                          </a>

                                 
                                  @endif
                                  @if ($lang->is_default  != 1)
                                 
                                      <a class="btn btn-sm btn-danger delete"
                                          href="javascript:;"
                                          data-href="{{ route('admin-flang-delete', $lang->id) }}"
                                          data-bs-toggle="modal" data-bs-target="#confirm-delete1">
                                          <i class="fs-4 las la-trash"></i>
                                          
                                      </a>
                                 
                                  @endif
                                </div>

                                 
                            </td>
                        </tr>

                        @empty
                <tr>
                    <td colspan="9">
                        <div class="row w-100">
                            <div class="col-sm-12 col-md-9 col-lg-7 col-xxl-6 m-auto text-center p-5">
                                <div class="w-100 h-100">
                                    <div class="img-box w-100">
                                        <img class="w-75" src="/admin/images/nsvg/no_data.svg" alt="game img"/>
                                    </div>
                                </div>
                                <div class="align-items-center" style="text-align: center;">
                                    <div>
                                        <h6 class="fs-6 fw-semibold mb-0">{{ __('no data found') }}</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
                    @endforelse
                </tbody>
               </table>
           </div>
       </div>
   </div>


 
        <div class="modal fade" id="confirm-delete1" tabindex="-1" role="dialog" aria-labelledby="modal1"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header">
                    <h4 class="modal-title d-inline-block" data-key="t-delete_Confirm">{{ __('confirm delete') }}</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <div class="delete_customer_message">
                         <div>
                             <i class="ti ti-trash"></i>
                         </div>
                         <p class="text-center" data-key="t-delete_customer">{{ __('are you sure') }}</p>
                     </div>

                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-bs-dismiss="modal"
                        data-key="t-cancel">{{ __('cancel') }}</button>
                    <a class="btn btn-danger btn-ok" data-key="t-delete">{{ __('delete') }}</a>
                </div>

            </div>
        </div>
    </div>
  @stop

  @section('script')
      <script>

var table = $('#geniustable').DataTable();
          function statusupdate(nexturl) {

              "use strict";

              const swalWithBootstrapButtons = Swal.mixin

              ({

                  customClass: {

                      confirmButton: 'btn btn-success mx-1',

                      cancelButton: 'btn btn-danger mx-1'

                  },

                  buttonsStyling: false

              })

              swalWithBootstrapButtons.fire({

                  title: "{{ __('are you sure') }}",

                  icon: 'warning',

                  showCancelButton: true,

                  confirmButtonText: "{{ __('yes') }}",

                  cancelButtonText: "{{ __('no') }}",

                  reverseButtons: true

              }).then((result) => {

                  if (result.isConfirmed) {

                      $.ajax({
                          type: "GET",
                          url: nexturl,
                          success: function(data) {

                              toastr.success('success');
                              $("#geniustable").load(location.href + " #geniustable", function() {
                                  // Callback function, executed after content is loaded
                                  console.log("Content reloaded!");
                                  // You can add more logic here if needed
                              });
                              //   $('.alert-success').show();
                              //   $('.alert-success p').html(data[0]);



                          }
                      });




                  } else {

                      result.dismiss === Swal.DismissReason.cancel

                  }

              })





          }


          
        $(function() {
        $(".btn-area").append('<div class="col-sm-4 table-contents">'+
          '<a class="add-btn  btn btn-sm btn-secondary" href="{{route('admin-flang-create')}}">'+
          '<i class="fas fa-plus"></i> {{ __("translation.add_language") }}'+
          '</a>'+
          '</div>');
      });

      </script>
  @stop

