<?php $__env->startSection('title'); ?>
    <?php echo app('translator')->get('translation.analytics'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('css'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <?php $__env->startComponent('components.breadcrumb'); ?>
        <?php $__env->slot('li_1'); ?>
            Dashboards
        <?php $__env->endSlot(); ?>
        <?php $__env->slot('title'); ?>
        <?php echo e(__("translation.edit_language")); ?>

        <?php $__env->endSlot(); ?>
    <?php echo $__env->renderComponent(); ?>

     <div class="body-wrapper">
         <div class="container-fluid">
            
             <div class="row justify-content-center">
                 <div class="card">
                     <div class="px-4 py-3 border-bottom">
                         <h5 class="card-title fw-semibold mb-0"><?php echo e(__('language information')); ?></h5>
                     </div>
                     <div class="card-body p-4">

                         <?php echo $__env->make('includes.admin.form-submit', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


                         
                    <form id="geniusform2" action="<?php echo e(route('admin-flang-update',$langg->id)); ?>" method="POST"  enctype="multipart/form-data"
                        >
                             <?php echo e(csrf_field()); ?>


                              <div class="row pt-5 pb-5">
                                 <div class="col-lg-6">

                                    <div class="card">
                                        <div class="card-header">
                                            <h4 class="card-title mb-0"> <?php echo e(__('translation.photo')); ?></h4>
                                        </div><!-- end card header -->
    
                                        <div class="card-body">
                                            <p class="text-muted">FilePond is a JavaScript library with profile picture-shaped
                                                file
                                                upload variation.</p>
                                            <div class="currrent-logo" style="text-align: center;">
                                                <img style="width: 171px;" src="<?php echo e($langg->photo); ?>"
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
                                         <label for="exampleInputPassword3" class="form-label fw-semibold"><?php echo e(__('language name')); ?></label>
                                         <div class="input-group border rounded-1">
                                             <span class="input-group-text bg-transparent px-6 border-0" id="basic-addon1">
                                                 <i class="las la-user fs-6"></i>
                                             </span>
                                             <input type="text" name="language"  value="<?php echo e($langg->language); ?>"  required class="form-control border-0 ps-2"
                                                 placeholder="<?php echo e(__('write language name')); ?>">
                                         </div>
                                     </div>
                                      
                                     <div class="mb-4">
                                         <label for="exampleInputPassword3" class="form-label fw-semibold"><?php echo e(__('sign')); ?></label>
                                         <div class="input-group border rounded-1">
                                             <span class="input-group-text bg-transparent px-6 border-0" id="basic-addon1">
                                                 <i class="las la-user fs-6"></i>
                                             </span>
                                              
                                                 <select name="sign" class="form-control" required="">
                                                    <option value="en" <?php echo e($langg->sign == 'en' ? 'selected': ''); ?>><?php echo e(__('en')); ?></option>
                                                    <option value="ar" <?php echo e($langg->sign == 'ar' ? 'selected': ''); ?>><?php echo e(__('ar')); ?></option>
                                                    <option value="fr" <?php echo e($langg->sign == 'fr' ? 'selected': ''); ?>><?php echo e(__('fr')); ?></option>
                                                  </select>
                                         </div>
                                     </div>
                                      <div class="mb-4">
                                         <label for="exampleInputPassword3" class="form-label fw-semibold"><?php echo e(__('language direction')); ?></label>
                                         <div class="input-group border rounded-1">
                                             <span class="input-group-text bg-transparent px-6 border-0" id="basic-addon1">
                                                 <i class="las la-file fs-6"></i>
                                             </span>
                                             <select name="rtl" class="form-control" required="">
                                                <option value="0" <?php echo e($langg->rtl == '0' ? 'selected': ''); ?>><?php echo e(__('left to right')); ?></option>
                                                <option value="1" <?php echo e($langg->rtl == '1' ? 'selected': ''); ?>><?php echo e(__('right to left')); ?></option>
                                              </select>

                                         </div>
                                     </div>


                                     <hr>

                                        <h4 class="text-center"><?php echo e(__('set language keys & values')); ?></h4>

                                    <hr>

                                    <div class="row">
                                        
                                       <div class="col-lg-12">
                                          <div class="featured-keyword-area">

                                            <div class="lang-tag-top-filds" id="lang-section">

                                                <?php $__currentLoopData = $lang; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                                <div class="lang-area">
                                                    <span class="remove lang-remove" style="color:red"><i class="las la-times"></i></span>
                                                  <div class="row">
                                                    <div class="col-lg-6">
                                                      <textarea name="keys[]" class="form-control" placeholder="<?php echo e(__('enter language key')); ?>" required=""><?php echo e($key); ?></textarea>
                                                    </div>
        
                                                    <div class="col-lg-6">
                                                      <textarea  name="values[]" class="form-control" placeholder="<?php echo e(__('enter language value')); ?>" required=""><?php echo e($val); ?></textarea>
                                                    </div>
                                                  </div>
                                                </div>
        
                                              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        

                                            </div>

                                            <a href="javascript:;" id="lang-btn" class="btn btn-primary" style="margin: 10px;"><i class="fa fa-plus"></i> <?php echo e(__('add more field')); ?></a>
                                          </div>
                                        </div>


                                        <div class="col-lg-2">
                                          <div class="left-area">

                                          </div>
                                        </div>

                                      </div>

              <hr>

                                     <div class="d-flex justify-content-center">
                                         <BUtton class="btn btn-success"><?php echo e(__('save')); ?></BUtton>
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
 <?php $__env->stopSection(); ?>

 <?php $__env->startSection('script'); ?>

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
                                     '<textarea name="keys[]" class="form-control" placeholder="<?php echo e(__('Enter Language Key')); ?>" required=""></textarea>'+
                                     '</div>'+
                                     '<div class="col-lg-6">'+
                                     '<textarea  name="values[]" class="form-control" placeholder="<?php echo e(__('Enter Language Value')); ?>" required=""></textarea>'+
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
                                     '<textarea name="keys[]" class="form-control" placeholder="<?php echo e(__('Enter Language Key')); ?>" required=""></textarea>'+
                                     '</div>'+
                                     '<div class="col-lg-6">'+
                                     '<textarea  name="values[]" class="form-control" placeholder="<?php echo e(__('Enter Language Value')); ?>" required=""></textarea>'+
                                     '</div>'+
                                   '</div>'+
                                 '</div>'+
                             '');


     }

 });

 </script>

 <?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/cangrowonline/public_html/dr-shams/resources/views/admin/language/edit.blade.php ENDPATH**/ ?>