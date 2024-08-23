
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
        <?php echo e(__("translation.social_settings")); ?>

        <?php $__env->endSlot(); ?>
    <?php echo $__env->renderComponent(); ?>


    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">



            </div>
            <div class="card-body">
              <form id="geniusform" action="<?php echo e(route('admin-social-update-all')); ?>" method="POST" enctype="multipart/form-data">
                <?php echo e(csrf_field()); ?>

                <?php echo $__env->make('includes.admin.form-both', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

 
                    <div class="row">


                        <div class="col-xxl-12">

                            <div class="card">
                                <div class="card-body">
 
                                    
                                         <h6 style="text-align: center;">   <?php echo e(__('translation.social_media_links')); ?></h6>
                                            
                                      
                                         <div class="row" style="">
                                                
                                          <div class="col-lg-3"></div>
                                          <div class="col-lg-6">
                                              <!-- Checkbox Input -->
                                              <div class="input-group">
                                                  <div class="input-group-text ">
                                                    <div class="form-check form-switch form-switch-secondary" style="padding-top: 4px;">
                                                          <input class="form-check-input mt-0" name="f_status" <?php echo e($data->f_status==1?"checked":""); ?> type="checkbox" value="1" aria-label="Checkbox for following text input">
                                                  
                                                    </div>
                                                  </div>
                                                  <input type="text" class="form-control" name="facebook" id="facebook"  value="<?php echo e($data->facebook); ?>" aria-label="write link here">
                                                  <label class="input-group-text" for="facebook">Facebook</label>
                                              </div> 
                                              <br>


                                              <!-- Checkbox Input -->
                                              <div class="input-group">
                                                  <div class="input-group-text">
                                                    <div class="form-check form-switch form-switch-secondary" style="padding-top: 4px;">
                                                      <input class="form-check-input mt-0" name="t_status" <?php echo e($data->t_status==1?"checked":""); ?> type="checkbox" value="1" aria-label="Checkbox for following text input">
                                                  </div>
                                                  </div>
                                                  <input type="text" class="form-control" name="twitter" id="twitter" value="<?php echo e($data->twitter); ?>" aria-label="write link here">
                                                  <label class="input-group-text" for="twitter">Twitter</label>
                                              </div> 
                                              <br>


                                              <!-- Checkbox Input -->
                                              <div class="input-group">
                                                  <div class="input-group-text">
                                                    <div class="form-check form-switch form-switch-secondary" style="padding-top: 4px;">
                                                      <input class="form-check-input mt-0" name="ystatus" <?php echo e($data->ystatus==1?"checked":""); ?> type="checkbox" value="1" aria-label="Checkbox for following text input">
                                                  </div>
                                                  </div>
                                                  <input type="text" class="form-control" name="youtube" id="youtube" value="<?php echo e($data->youtube); ?>"  aria-label="write link here">
                                                  <label class="input-group-text" for="youtube">Youtube</label>
                                              </div> 
                                              <br>


                                              <!-- Checkbox Input -->
                                              <div class="input-group">
                                                  <div class="input-group-text">
                                                    <div class="form-check form-switch form-switch-secondary" style="padding-top: 4px;">
                                                      <input class="form-check-input mt-0" name="l_status" <?php echo e($data->l_status==1?"checked":""); ?> type="checkbox" value="1" aria-label="Checkbox for following text input">
                                                  </div>
                                                  </div>
                                                  <input type="text" class="form-control" name="linkedin" id="linkedin" value="<?php echo e($data->linkedin); ?>"  aria-label="write link here">
                                                  <label class="input-group-text" for="linkedin">Linkedin</label>
                                              </div> 
                                              <br>

                                              <!-- Checkbox Input -->
                                              <div class="input-group">
                                                  <div class="input-group-text">
                                                    <div class="form-check form-switch form-switch-secondary" style="padding-top: 4px;">
                                                      <input class="form-check-input mt-0" name="d_status" <?php echo e($data->d_status==1?"checked":""); ?>  type="checkbox" value="1" aria-label="Checkbox for following text input">
                                                  </div>
                                                  </div>
                                                  <input type="text" class="form-control" name="dribble" id="dribble" value="<?php echo e($data->dribble); ?>"  aria-label="write link here">
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
                                    type="submit"><?php echo e(__('translation.save')); ?></button>
                            </div>
                        </div>
                </form>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\admin-cangrows\resources\views/admin/socialsetting/index.blade.php ENDPATH**/ ?>