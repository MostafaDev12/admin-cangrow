

<?php $__env->startSection('title'); ?>
    <?php echo app('translator')->get('translation.analytics'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('css'); ?>
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
  
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

    <?php $__env->startComponent('components.breadcrumb'); ?>
    <?php $__env->slot('li_1'); ?>
        Dashboards
    <?php $__env->endSlot(); ?>
    <?php $__env->slot('title'); ?>
    <?php echo e(__('translation.language')); ?>

    <?php $__env->endSlot(); ?>
    <?php echo $__env->renderComponent(); ?>


    <input type="hidden" id="headerdata" value="<?php echo e(__('translation.blogs')); ?>">
    <div class="col-lg-12"  >
       <div class="card">
           <div class="card-header">
                  <?php echo $__env->make('includes.admin.form-success', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        <div class="btn-area"></div>
           </div>
           <div class="card-body">
               <table id="geniustable" class="table nowrap dt-responsive align-middle table-hover table-bordered" style="width:100%">
                   <thead>

                    <th>
                      <?php echo e(__('translation.photo')); ?> 
                    </th>
                    <th>
                       <?php echo e(__('translation.language')); ?> 
                    </th>
                    <th class="text-center">
                      <?php echo e(__('translation.type')); ?> 
                    </th>
                    <th class="text-center">
                        <?php echo e(__('translation.status')); ?> 
                    </th>
                    <th class="text-center"><?php echo e(__('translation.actions')); ?></th>
 
                   </thead>
                   <tbody>


                    <?php $__empty_1 = true; $__currentLoopData = $datas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lang): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <tr>
                            <td>
                                <div class="d-flex align-items-center">
                                    <img src="<?php echo e($lang->photo); ?>" class="rounded-circle"
                                        width="40" height="40" />
                                    <div class="ms-3">
                                        <h6 class="fs-4 fw-semibold mb-0"><?php echo e(''); ?></h6>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <p class="mb-0 fw-normal"><?php echo e($lang->language); ?></p>
                            </td>
                            <td class="text-center">
                                <p class="mb-0 fw-normal text-center"><?php echo e($lang->rtl == 1 ? __('rtl') : __('ltr')); ?></p>
                            </td>
                            <td class="text-center">
                                <?php if($lang->is_default == '1'): ?>
                                    <span
                                        class="badge bg-success-subtle rounded-3 py-8 text-success fw-semibold fs-2"><?php echo e(__('default')); ?></span>
                                <?php endif; ?>
                            </td>
                            <td class="text-center">

                                <div class="action-list">
                                    <a class=" btn btn-sm btn-secondary" href="<?php echo e(route('admin-flang-edit',$lang->id)); ?>"> <i class="las la-edit"></i><?php echo e(__('edit')); ?></a>
                                 
                                    
                                   
                                
                                  <?php if($lang->is_default  == 0): ?>
                                 
                                          <a class="btn btn-sm btn-secondary"
                                              href="javascript:void(0)"
                                              onclick="statusupdate('<?php echo e(route('admin-flang-statusupdate', ['id' => $lang->id, 'status' => '1'])); ?>')">
                                              <i class="las la-at-off"></i>
                                              <?php echo e(__('make default')); ?>

                                          </a>

                                 
                                  <?php endif; ?>
                                  <?php if($lang->is_default  != 1): ?>
                                 
                                      <a class="btn btn-sm btn-danger delete"
                                          href="javascript:;"
                                          data-href="<?php echo e(route('admin-flang-delete', $lang->id)); ?>"
                                          data-bs-toggle="modal" data-bs-target="#confirm-delete1">
                                          <i class="fs-4 las la-trash"></i>
                                          
                                      </a>
                                 
                                  <?php endif; ?>
                                </div>

                                 
                            </td>
                        </tr>

                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
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
                                        <h6 class="fs-6 fw-semibold mb-0"><?php echo e(__('no data found')); ?></h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
                    <?php endif; ?>
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
                    <h4 class="modal-title d-inline-block" data-key="t-delete_Confirm"><?php echo e(__('confirm delete')); ?></h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <div class="delete_customer_message">
                         <div>
                             <i class="ti ti-trash"></i>
                         </div>
                         <p class="text-center" data-key="t-delete_customer"><?php echo e(__('are you sure')); ?></p>
                     </div>

                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-bs-dismiss="modal"
                        data-key="t-cancel"><?php echo e(__('cancel')); ?></button>
                    <a class="btn btn-danger btn-ok" data-key="t-delete"><?php echo e(__('delete')); ?></a>
                </div>

            </div>
        </div>
    </div>
  <?php $__env->stopSection(); ?>

  <?php $__env->startSection('script'); ?>
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

                  title: "<?php echo e(__('are you sure')); ?>",

                  icon: 'warning',

                  showCancelButton: true,

                  confirmButtonText: "<?php echo e(__('yes')); ?>",

                  cancelButtonText: "<?php echo e(__('no')); ?>",

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
          '<a class="add-btn  btn btn-sm btn-secondary" href="<?php echo e(route('admin-flang-create')); ?>">'+
          '<i class="fas fa-plus"></i> <?php echo e(__("translation.add_language")); ?>'+
          '</a>'+
          '</div>');
      });

      </script>
  <?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.master' , \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\admin-cangrows\resources\views/admin/language/index.blade.php ENDPATH**/ ?>