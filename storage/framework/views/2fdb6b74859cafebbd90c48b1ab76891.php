
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
        <?php echo e(__("translation.our_team")); ?>

        <?php $__env->endSlot(); ?>
    <?php echo $__env->renderComponent(); ?>


    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">



            </div>
            <div class="card-body">
              <form id="geniusform" action="<?php echo e(route('admin-ps-update')); ?>" method="POST" enctype="multipart/form-data">
                <?php echo e(csrf_field()); ?>

                <?php echo $__env->make('includes.admin.form-both', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>



                    <div class="row">


                        <div class="col-xxl-12">

                            <div class="card">
                                <div class="card-body">

                                    <!-- Nav tabs -->
                                    <ul class="nav nav-tabs nav-justified mb-3" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active" data-bs-toggle="tab" href="#base-justified-home"
                                                role="tab" aria-selected="false">
                                                <img style="width: 35px;" src="<?php echo e(asset('assets/images/ar.jpg')); ?>">
                                                <?php echo e(__('translation.arabic')); ?>

                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link " data-bs-toggle="tab" href="#base-justified-product"
                                                role="tab" aria-selected="false">
                                                <img style="width: 35px;" src="<?php echo e(asset('assets/images/en.png')); ?>">
                                                <?php echo e(__('translation.english')); ?>

                                            </a>
                                        </li>
                                       

                                    </ul>
                                    <!-- Tab panes -->
                                    <div class="tab-content  text-muted">
                                        <div class="tab-pane active" id="base-justified-home" role="tabpanel">
                                            <h6 style="text-align: center;">   <?php echo e(__('translation.arabic')); ?></h6>
                                            
                                      
                                              <div class="mb-3">
                                                  <label for="title_ar" class="form-label"><?php echo e(__('translation.title')); ?></label>
                                                  <input type="text" class="form-control" name="our_team_title_ar" value="<?php echo e($ps->our_team_title_ar); ?>" id="title_ar" placeholder="<?php echo e(__('translation.title')); ?>">
                                              </div>
                                               
                                              <div class="mb-3">
                                                  <label for="details_ar" class="form-label"><?php echo e(__('translation.details')); ?></label>
                                                  <textarea class="form-control ckeditor" name="our_team_details_ar"  id="details_ar" rows="3" placeholder="<?php echo e(__('translation.details')); ?>"><?php echo e($ps->our_team_details_ar); ?></textarea>
                                              </div>
                                              
                                        </div>
                                        <div class="tab-pane " id="base-justified-product" role="tabpanel">
                                            <h6 style="text-align: center;"> <?php echo e(__('translation.english')); ?></h6>
                                           
                                            <div class="mb-3">
                                              <label for="title_en" class="form-label"><?php echo e(__('translation.title')); ?></label>
                                              <input type="text" class="form-control" name="our_team_title_en"  value="<?php echo e($ps->our_team_title_en); ?>"  id="title_en" placeholder="<?php echo e(__('translation.title')); ?>">
                                          </div>
                                           
                                          <div class="mb-3">
                                              <label for="details_en" class="form-label"><?php echo e(__('translation.details')); ?></label>
                                              <textarea class="form-control ckeditor" name="our_team_details_en"  id="details_en" rows="3" placeholder="<?php echo e(__('translation.details')); ?>"><?php echo e($ps->our_team_details_en); ?></textarea>
                                          </div>
                                          
                                        </div>
                                    

                                    </div>
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

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\admin-cangrows\resources\views/admin/pagesetting/our_team.blade.php ENDPATH**/ ?>