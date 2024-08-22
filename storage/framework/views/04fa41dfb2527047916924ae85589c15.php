<?php $__env->startSection('title'); ?>
    <?php echo app('translator')->get('translation.home_video'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('css'); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <?php $__env->startComponent('components.breadcrumb'); ?>
        <?php $__env->slot('li_1'); ?>
            Dashboards
        <?php $__env->endSlot(); ?>
        <?php $__env->slot('title'); ?>
        <?php echo app('translator')->get('translation.home_video'); ?>
        <?php $__env->endSlot(); ?> 
    <?php echo $__env->renderComponent(); ?>

 
       
            <div class="row  ">
               
                
                <div class="col-xl-12 col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title mb-0">Home Video</h4>
                        </div><!-- end card header -->

                        <form class="uplogo-form" id="geniusform" action="<?php echo e(route('admin-gs-update')); ?>" method="POST"
                            enctype="multipart/form-data">
                            <?php echo e(csrf_field()); ?>


                            <?php echo $__env->make('includes.admin.form-both', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        <div class="card-body">
                            <p class="text-muted">FilePond is a JavaScript library with profile picture-shaped file
                                upload variation.</p>
                                <div class="currrent-logo" style="text-align: center;">
                                   
                                <video width="640" height="360" controls>
                                      <source src="<?php echo e($gs->home_video); ?>" type="video/mp4">
                                      <source src="video.ogg" type="video/ogg">
                                      Your browser does not support the video tag.
                                 </video>
                                        
                                </div>
                            <div class="avatar-xl mx-auto">
                                <input type="file" class="filepond filepond-input-circle" name="home_video"
                                    accept="" />
                            </div>

                        <div class="submit-area mb-4">
                            <button type="submit" class="submit-btn btn btn-primary"><?php echo e(__('Submit')); ?></button>
                        </div>

                        </div>
                        <!-- end card body -->

                    </form>
                    </div>
                    <!-- end card -->
                </div> <!-- end col -->
   
         
            </div>
         
   
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
   
    <script src="<?php echo e(URL::asset('build/js/app.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\admin-cangrow\resources\views/admin/generalsetting/home_video.blade.php ENDPATH**/ ?>