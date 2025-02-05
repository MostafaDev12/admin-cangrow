
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
        <?php echo e(__('translation.services')); ?>

        <?php $__env->endSlot(); ?>
    <?php echo $__env->renderComponent(); ?>
 
          <input type="hidden" id="headerdata" value="<?php echo e(__('translation.services')); ?>">
                         <div class="col-lg-12"  >
                            <div class="card">
                                <div class="card-header">
                                   	<?php echo $__env->make('includes.admin.form-success', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                   	  	<div class="btn-area"></div>
                                </div>
                                <div class="card-body">
                                    <table id="geniustable" class="table nowrap dt-responsive align-middle table-hover table-bordered" style="width:100%">
                                        <thead>
                                            <tr>
                                              <th><?php echo e(__('translation.photo')); ?></th>
                                          
                                          <th><?php echo e(__('translation.actions')); ?></th>
                                            </tr>
                                        </thead>

                                    </table>
                                </div>
                            </div>
                        </div>





<div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="modal1" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">

  <div class="modal-header d-block text-center">
    <h4 class="modal-title d-inline-block"><?php echo e(__("Confirm Delete")); ?></h4>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
  </div>

      <!-- Modal body -->
      <div class="modal-body">
            <p class="text-center"><?php echo e(__('You are about to delete this service.')); ?></p>
            <p class="text-center"><?php echo e(__('Do you want to proceed?')); ?></p>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer justify-content-center">
            <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo e(__('Cancel')); ?></button>
            <a class="btn btn-danger btn-ok"><?php echo e(__('Delete')); ?></a>
      </div>

    </div>
  </div>
</div>






<!-- Grids in modals -->
 
<div class="modal fade" id="setgallery" tabindex="-1" aria-labelledby="exampleModalgridLabel" aria-modal="true">
  <div class="modal-dialog modal-lg">
      <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalCenterTitle"><?php echo e(__("Image Gallery")); ?></h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div class="top-area">
              <div class="row">
                <div class="col-sm-12 text-center mb-3">( <small><?php echo e(__("You can upload multiple Images")); ?>.</small> )</div>
                <div class="col-md-10 col-8">
                <form  method="POST" enctype="multipart/form-data" id="form-gallery">
                  <?php echo e(csrf_field()); ?>

                    <input type="hidden" id="pid" name="service_id" value="">
                    <input type="file" name="gallery[]" class="hidden" id="uploadgallery" accept="image/*" multiple>
                      <label for="image-upload" id="prod_gallery"><i class="icofont-upload-alt"></i><?php echo e(__('Upload File')); ?></label>
                  </form>
              </div>
                <div class="col-md-2 col-4">
                  <a href="javascript:;" class="upload-done-btn main-bg-dark text-white" data-bs-dismiss="modal"> <i class="fas fa-check"></i> <?php echo e(__('Done')); ?></a>
                </div>
              </div>
            </div>
            <div class="gallery-images mt-3">
              <div class="selected-image">
                <div class="row"></div>
              </div>
            </div>
          </div>
      </div>
  </div>
</div>
 





<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>




    <script type="text/javascript">

    var table = $('#geniustable').DataTable({
         ordering: false,
               processing: true,
               serverSide: true,
               ajax: '<?php echo e(route('admin-services-datatables')); ?>',
               columns: [
                        { data: 'photo', name: 'photo' },
                         
                        { data: 'action', searchable: false, orderable: false }

                     ],
                language : {
                  processing: '<img src="<?php echo e(asset('assets/images/'.$gs->admin_loader)); ?>">'
                }
            });

        $(function() {
        $(".btn-area").append('<div class="col-sm-4 table-contents">'+
          '<a class="add-btn  btn btn-sm btn-secondary" href="<?php echo e(route('admin-services-create')); ?>">'+
          '<i class="fas fa-plus"></i> <?php echo e(__("translation.add_service")); ?>'+
          '</a>'+
          '</div>');
      });



</script>



<script type="text/javascript">
	

  // Gallery Section Update
  
      $(document).on("click", ".set-gallery" , function(){
          var pid = $(this).find('input[type=hidden]').val();
          $('#pid').val(pid);
          $('.selected-image .row').html('');
              $.ajax({
                      type: "GET",
                      url:"<?php echo e(route('admin-gallery-show')); ?>",
                      data:{id:pid},
                      success:function(data){
                        if(data[0] == 0)
                        {
                        $('.selected-image .row').addClass('justify-content-center');
                  $('.selected-image .row').html('<h3 style="text-align: center;"><?php echo e(__("No Images Found.")); ?></h3>');
                 }
                        else {
                        $('.selected-image .row').removeClass('justify-content-center');
                  $('.selected-image .row h3').remove();      
                            var arr = $.map(data[1], function(el) {
                            return el });
  
                            for(var k in arr)
                            {
                  $('.selected-image .row').append('<div class="col-sm-6">'+
                                          '<div class="img gallery-img">'+
                                              '<span class="remove-img"><i class="fas fa-times"></i>'+
                                              '<input type="hidden" value="'+arr[k]['id']+'">'+
                                              '</span>'+
                                              '<a href="'+arr[k]['photo_url']+'" target="_blank">'+
                                              '<img src="'+arr[k]['photo_url']+'" alt="gallery image">'+
                                              '</a>'+
                                          '</div>'+
                                      '</div>');
                            }                         
                         }
   
                      }
                    });
        });
  
  
    $(document).on('click', '.remove-img' ,function() {
      var id = $(this).find('input[type=hidden]').val();
      $(this).parent().parent().remove();
        $.ajax({
            type: "GET",
            url:"<?php echo e(route('admin-gallery-delete')); ?>",
            data:{id:id}
        });
    });
  
    $(document).on('click', '#prod_gallery' ,function() {
      $('#uploadgallery').click();
    });
                                          
                                  
    $("#uploadgallery").change(function(){
      $("#form-gallery").submit();  
    });
  
    $(document).on('submit', '#form-gallery' ,function() {
        $.ajax({
         url:"<?php echo e(route('admin-gallery-store')); ?>",
         method:"POST",
         data:new FormData(this),
         dataType:'JSON',
         contentType: false,
         cache: false,
         processData: false,
         success:function(data)
         {
          if(data != 0)
          {
                        $('.selected-image .row').removeClass('justify-content-center');
                  $('.selected-image .row h3').remove();   
              var arr = $.map(data, function(el) {
              return el });
              for(var k in arr)
                 {
                  $('.selected-image .row').append('<div class="col-sm-6">'+
                                          '<div class="img gallery-img">'+
                                              '<span class="remove-img"><i class="fas fa-times"></i>'+
                                              '<input type="hidden" value="'+arr[k]['id']+'">'+
                                              '</span>'+
                                              '<a href="'+arr[k]['photo_url']+'" target="_blank">'+
                                              '<img src="'+arr[k]['photo_url']+'" alt="gallery image">'+
                                              '</a>'+
                                          '</div>'+
                                      '</div>');
                  }          
          }
                           
                             }
  
        });
        return false;
   }); 
  
  
  // Gallery Section Update Ends	
  
  
  </script>
  

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\admin-cangrows\resources\views/admin/services/index.blade.php ENDPATH**/ ?>