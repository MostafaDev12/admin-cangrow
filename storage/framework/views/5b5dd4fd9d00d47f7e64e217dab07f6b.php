
<?php $__env->startSection('title'); ?>
    <?php echo app('translator')->get('translation.settings'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="position-relative mx-n4 mt-n4">
        <div class="profile-wid-bg profile-setting-img">
            <img src="<?php echo e(URL::asset('build/images/profile-bg.jpg')); ?>" class="profile-wid-img" alt="">
            
        </div>
    </div>

    <div class="row">
        <div class="col-xxl-3">
            <div class="card mt-n5">
                <div class="card-body p-4">
                    <div class="text-center">
                        <div class="profile-user position-relative d-inline-block mx-auto  mb-4">
                            <img src="<?php if(Auth::guard('admin')->user()->photo != ''): ?> <?php echo e(URL::asset('images/' . Auth::guard('admin')->user()->photo)); ?><?php else: ?><?php echo e(URL::asset('build/images/cangrow.png')); ?> <?php endif; ?>"
                                class="rounded-circle avatar-xl img-thumbnail user-profile-image" alt="user-profile-image">
                            <div class="avatar-xs p-0 rounded-circle profile-photo-edit">
                           
                                <label for="profile-img-file-input" class="profile-photo-edit avatar-xs">
                                    <span class="avatar-title rounded-circle bg-light text-body">
                                        <i class="ri-camera-fill"></i>
                                    </span>
                                </label>
                            </div>
                        </div>
                        <h5 class="fs-17 mb-1"><?php echo e(Auth::guard('admin')->user()->name); ?></h5>
                        <p class="text-muted mb-0">
                            <?php echo e(empty(Auth::guard('admin')->user()->role)  ? __('translation.admin')  : Auth::guard('admin')->user()->role->name); ?>

                             


                        </p>
                    </div>
                </div>
            </div>
            <!--end card-->
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-center mb-5">
                        <div class="flex-grow-1">
                            <h5 class="card-title mb-0">Complete Your Profile</h5>
                        </div>
                        <div class="flex-shrink-0">
                            <a href="javascript:void(0);" class="badge bg-light text-primary fs-12"><i
                                    class="ri-edit-box-line align-bottom me-1"></i> Edit</a>
                        </div>
                    </div>
                    <div class="progress animated-progress custom-progress progress-label">
                        <div class="progress-bar bg-danger" role="progressbar" style="width: 100%" aria-valuenow="100"
                            aria-valuemin="0" aria-valuemax="100">
                            <div class="label">100%</div>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
        <!--end col-->
        <div class="col-xxl-9">
            <div class="card mt-xxl-n5">
                <div class="card-header">
                    <ul class="nav nav-tabs-custom rounded card-header-tabs border-bottom-0" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-bs-toggle="tab" href="#personalDetails" role="tab">
                                <i class="fas fa-home"></i>
                                Personal Details
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" href="#changePassword" role="tab">
                                <i class="far fa-user"></i>
                                Change Password
                            </a>
                        </li>
                        
                    </ul>
                </div>
                <div class="card-body p-4">
                    <div class="tab-content">
                        <div class="tab-pane active" id="personalDetails" role="tabpanel">

                             <form id="geniusform" action="<?php echo e(route('admin.profile.update')); ?>" method="POST" enctype="multipart/form-data">
                                <?php echo e(csrf_field()); ?>

                                <?php echo $__env->make('includes.admin.form-both', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                                <input id="profile-img-file-input" name="photo" type="file" class="profile-img-file-input d-none">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="firstnameInput" class="form-label">
                                                Name</label>
                                            <input type="text" name="name" class="form-control" id="firstnameInput"
                                                placeholder="Enter your firstname" required value="<?php echo e(Auth::guard('admin')->user()->name); ?>">
                                        </div>
                                    </div>
                                    <!--end col-->
                                   
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="phonenumberInput" class="form-label">Phone
                                                Number</label>
                                            <input type="text" class="form-control" id="phonenumberInput"
                                                placeholder="Enter your phone number" required name="phone" value="<?php echo e(Auth::guard('admin')->user()->phone); ?>">
                                        </div>
                                    </div>
                                    <!--end col-->
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="emailInput" class="form-label">Email
                                                Address</label>
                                            <input type="email" class="form-control" id="emailInput"
                                                placeholder="Enter your email" required name="email" value="<?php echo e(Auth::guard('admin')->user()->email); ?>">
                                        </div>
                                    </div>
                                    <!--end col-->
                                   
                                    
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="cityInput" class="form-label">City</label>
                                            <input type="text" class="form-control" name="city" id="cityInput" placeholder="City"
                                                value="<?php echo e(Auth::guard('admin')->user()->city); ?>" />
                                        </div>
                                    </div>
                                     
                                    
                                    <div class="col-lg-12">
                                        <div class="hstack gap-2 justify-content-end">
                                            <button type="submit" class="btn btn-primary">Updates</button>
                                            
                                        </div>
                                    </div>
                                    <!--end col-->
                                </div>
                                <!--end row-->
                            </form>
                        </div>
                        <!--end tab-pane-->
                        <div class="tab-pane" id="changePassword" role="tabpanel">
                          
                          <form id="geniusform" action="<?php echo e(route('admin.password.update')); ?>" method="POST" enctype="multipart/form-data">
                                    <?php echo e(csrf_field()); ?>

                                    <?php echo $__env->make('includes.admin.form-both', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                <div class="row g-2">
                                    <div class="col-lg-4">
                                        <div>
                                            <label for="oldpasswordInput" class="form-label">Old
                                                Password*</label>
                                            <input type="password" class="form-control" name="cpass" id="oldpasswordInput" required
                                                placeholder="Enter current password">
                                        </div>
                                    </div>
                                    <!--end col-->
                                    <div class="col-lg-4">
                                        <div>
                                            <label for="newpasswordInput" class="form-label">New
                                                Password*</label>
                                            <input type="password"  name="newpass"  class="form-control" id="newpasswordInput" required
                                                placeholder="Enter new password">
                                        </div>
                                    </div>
                                    <!--end col-->
                                    <div class="col-lg-4">
                                        <div>
                                            <label for="confirmpasswordInput" class="form-label">Confirm
                                                Password*</label>
                                            <input type="password"  name="renewpass"  class="form-control" id="confirmpasswordInput" required
                                                placeholder="Confirm password">
                                        </div>
                                    </div>
                                    <!--end col-->
                                    
                                    <!--end col-->
                                    <div class="col-lg-12">
                                        <div class="text-end">
                                            <button type="submit" class="btn btn-success">Change
                                                Password</button>
                                        </div>
                                    </div>
                                    <!--end col-->
                                </div>
                                <!--end row-->
                            </form>
                        
                        </div>
                        <!--end tab-pane-->
                      
                    </div>
                </div>
            </div>
        </div>
        <!--end col-->
    </div>
    <!--end row-->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
    <script src="<?php echo e(URL::asset('build/js/pages/profile-setting.init.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('build/js/app.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\admin-cangrow\resources\views/admin/profile.blade.php ENDPATH**/ ?>