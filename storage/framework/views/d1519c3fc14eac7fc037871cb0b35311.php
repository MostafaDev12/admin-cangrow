
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
            website content
        <?php $__env->endSlot(); ?>
    <?php echo $__env->renderComponent(); ?>

 <style>
        .featured-keyword-area {
            background-color: #f8f9fa;
            border: 1px solid #dee2e6;
            border-radius: 8px;
            padding: 20px;
            margin-bottom: 20px;
        }

        .heading-area {
            margin-bottom: 20px;
        }

        .title {
            font-size: 1.8rem;
            color: #495057;
        }

        .feature-tag-top-filds {
            margin-bottom: 20px;
        }

        .feature-area {
            border: 1px solid #ced4da;
            border-radius: 8px;
            padding: 15px;
            margin-bottom: 15px;
        }

        .remove {
            cursor: pointer;
            color: #dc3545;
            float: right;
            font-size: 1.2rem;
        }

        .remove:hover {
            color: #bd2130;
        }

        .row {
            margin-bottom: 15px;
        }

        .col-lg-12 {
            width: 100%;
        }

        .input-field {
            width: 100%;
            padding: 12px;
            box-sizing: border-box;
            border: 1px solid #ced4da;
            border-radius: 4px;
            transition: border-color 0.3s;
        }

        .input-field:focus {
            border-color: #007bff;
        }

        .add-fild-btn {
            display: inline-block;
            padding: 10px 20px;
            font-size: 1rem;
            text-decoration: none;
            background-color: #007bff;
            color: #fff;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        .add-fild-btn:hover {
            background-color: #0056b3;
        }

        .icofont-plus {
            margin-right: 5px;
        }
    </style>

<div class="page-content">
    <div class="container-fluid">
  
                      <input type="hidden" id="headerdata" value="<?php echo e(__("Website Contents")); ?>" style="box-shadow: rgba(0, 0, 0, 0.19) 0px 10px 20px, rgba(0, 0, 0, 0.23) 0px 6px 6px;">
                           <div class="col-lg-12 content_row"  >
                              <div class="card">
                                  <div class="card-header">
                                         <?php echo $__env->make('includes.admin.form-success', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                         <div class="btn-area"></div>
                                  </div>
                                  <div class="card-body" style="box-shadow: rgba(60, 64, 67, 0.3) 0px 1px 2px 0px, rgba(60, 64, 67, 0.15) 0px 2px 6px 2px;">
                                       <form action="<?php echo e(route('admin-gs-update')); ?>" id="geniusform" method="POST" enctype="multipart/form-data">
        <?php echo e(csrf_field()); ?>


        <?php echo $__env->make('includes.admin.form-both', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


   <!-- Nav tabs -->
                                    <ul class="nav nav-tabs nav-justified mb-3" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active" data-bs-toggle="tab" href="#base-justified-home"
                                                role="tab" aria-selected="false">
                                             
                                                <?php echo e(__('translation.website_content')); ?>

                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link " data-bs-toggle="tab" href="#base-justified-product"
                                                role="tab" aria-selected="false">
                                                 
                                                <?php echo e(__('translation.contact_information')); ?>

                                            </a>
                                        </li>
                                      
                                     
                                      

                                    </ul>
                                    <!-- Tab panes -->
                                    <div class="tab-content  text-muted">
                                        <div class="tab-pane active" id="base-justified-home" role="tabpanel">
                                            <h6 style="text-align: center;">   <?php echo e(__('translation.website_content')); ?></h6>
                                            
                                      
                                              <div class="mb-3">
                                                    <div class="row" style="">
            <div class="col-4">
                <div class="mb-3">
                    <label for="firstNameinput" class="form-label"><?php echo e(__('Website Title arabic')); ?></label>
                    <input type="text" class="form-control" placeholder="<?php echo e(__('Write Your Site Title Here')); ?>"
                        name="title_ar" value="<?php echo e($gs->title_ar); ?>" required="">
                </div>
            </div><!--end col-->   
            
            <div class="col-4">
                <div class="mb-3">
                    <label for="firstNameinput" class="form-label"><?php echo e(__('Website Title english')); ?></label>
                    <input type="text" class="form-control" placeholder="<?php echo e(__('Write Your Site Title Here')); ?>"
                        name="title_en" value="<?php echo e($gs->title_en); ?>" required="">
                </div>
            </div><!--end col-->
            
              <div class="col-4">
                <div class="mb-3">
                    <label for="firstNameinput" class="form-label"><?php echo e(__('Website Title france')); ?></label>
                    <input type="text" class="form-control" placeholder="<?php echo e(__('Write Your Site Title Here')); ?>"
                        name="title_fr" value="<?php echo e($gs->title_fr); ?>" required="">
                </div>
            </div><!--end col-->
            
            
        
        
             <div class="col-12">
                <div class="mb-3">
                    <label for="footer_ar" class="form-label"><?php echo e(__('Arabic footer')); ?></label>
                   
                        <textarea  class="form-control" name="footer_ar" id="footer_ar"  placeholder="<?php echo e(__('Write footer Here')); ?>" row="3"><?php echo e($gs->footer_ar); ?></textarea>
                </div>
            </div><!--end col-->
            
            
        
             <div class="col-12">
                <div class="mb-3">
                    <label for="footer_en" class="form-label"><?php echo e(__('english footer')); ?></label>
                   
                        <textarea  class="form-control" name="footer_en" id="footer_en"  placeholder="<?php echo e(__('Write footer Here')); ?>" row="3"><?php echo e($gs->footer_en); ?></textarea>
                </div>
            </div><!--end col-->
            
            
        
             <div class="col-12">
                <div class="mb-3">
                    <label for="footer_fr" class="form-label"><?php echo e(__('France footer')); ?></label>
                   
                        <textarea  class="form-control" name="footer_fr" id="footer_fr"  placeholder="<?php echo e(__('Write footer Here')); ?>" row="3"><?php echo e($gs->footer_fr); ?></textarea>
                </div>
            </div><!--end col-->
            
            
             <div class="col-12">
                <div class="mb-3">
                    <label for="map" class="form-label"><?php echo e(__('map link')); ?></label>
                   
                        <textarea  class="form-control" name="map" id="map"  placeholder="<?php echo e(__('Write map Here')); ?>" row="3"><?php echo e($gs->map); ?></textarea>
                </div>
            </div><!--end col-->
            
            
            
            <div class="col-6">
                <br>
                <div class="mb-3">
                    <div class="form-check form-switch form-switch-lg" dir="ltr">
                        <input type="checkbox" class="form-check-input" value="1" name="is_capcha"
                            id="customSwitchsizelg" <?php echo e($gs->is_capcha == 1 ? 'checked' : ''); ?>>
                        <label class="form-check-label" for="customSwitchsizelg">is_capcha</label>
                    </div>
                </div>
            </div>
            
            <!--end col-->

     
        </div><!--end row-->
        
                                              </div>
                                             
                                              
                                        </div>
                                        <div class="tab-pane " id="base-justified-product" role="tabpanel">
                                            <h6 style="text-align: center;"> <?php echo e(__('translation.contact_information')); ?></h6>
                                           
                                            <div class="mb-3">
                                              
                                                <div class="row" style="">
                                                
                                                   
                                                    <div class="col-lg-6">
                                                        <div class="featured-keyword-area">
                                                            <div class="heading-area">
                                                                <h4 class="title"><?php echo e(__('ارقام الهاتف')); ?></h4>
                                                            </div>
                    
                                                            <div class="feature-tag-top-filds" id="feature-section2">
                                                                <?php if(!empty($gs->phones)): ?>
                                                                    <?php
                                                                        $title = explode(',',$gs->phones);
                                                                   
                    
                                                                    ?>
                                                                    <?php $__currentLoopData = $title; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $data1): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                        <div class="feature-area">
                                                                            <span class="remove feature-remove2"><i
                                                                                    class="las la-times"></i></span>
                                                                            <div class="row">
                                                                                <div class="col-lg-12">
                                                                                    <input type="text" name="phones[]"
                                                                                        class="input-field" placeholder="<?php echo e(__('الهاتف')); ?>"
                                                                                        value="<?php echo e($title[$key]); ?>">
                                                                                </div>
                                                                               
                    
                    
                                                                            </div>
                    
                                                                        </div>
                                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                <?php else: ?>
                                                                    <div class="feature-area">
                                                                        <span class="remove feature-remove2"><i
                                                                                class="las la-times"></i></span>
                                                                        <div class="row">
                                                                            <div class="col-lg-12">
                                                                                <input type="text" name="phones[]"
                                                                                    class="input-field" placeholder="<?php echo e(__('الهاتف')); ?>">
                                                                            </div>
                                                                          
                    
                    
                                                                        </div>
                    
                                                                    </div>
                                                                <?php endif; ?>
                                                            </div>
                    
                                                            <a href="javascript:;" id="feature-btn2" class="add-fild-btn"><i
                                                                    class="icofont-plus"></i> <?php echo e(__('اضافه حقول اخرى')); ?></a>
                                                        </div>
                                                    </div>
                    
                      
                                                    <div class="col-lg-6">
                                                        <div class="featured-keyword-area">
                                                            <div class="heading-area">
                                                                <h4 class="title"><?php echo e(__(' البريد الالكترونى  ')); ?></h4>
                                                            </div>
                    
                                                            <div class="feature-tag-top-filds" id="feature-section3">
                                                                <?php if(!empty($gs->emails)): ?>
                                                                    <?php
                                                                        $title = explode(',',$gs->emails);
                                                                   
                    
                                                                    ?>
                                                                    <?php $__currentLoopData = $title; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $data1): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                        <div class="feature-area">
                                                                            <span class="remove feature-remove3"><i
                                                                                    class="las la-times"></i></span>
                                                                            <div class="row">
                                                                                <div class="col-lg-12">
                                                                                    <input type="text" name="emails[]"
                                                                                        class="input-field" placeholder="<?php echo e(__('email')); ?>"
                                                                                        value="<?php echo e($title[$key]); ?>">
                                                                                </div>
                                                                               
                    
                    
                                                                            </div>
                    
                                                                        </div>
                                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                <?php else: ?>
                                                                    <div class="feature-area">
                                                                        <span class="remove feature-remove3"><i
                                                                                class="las la-times"></i></span>
                                                                        <div class="row">
                                                                            <div class="col-lg-12">
                                                                                <input type="text" name="emails[]"
                                                                                    class="input-field" placeholder="<?php echo e(__('email')); ?>">
                                                                            </div>
                                                                          
                    
                    
                                                                        </div>
                    
                                                                    </div>
                                                                <?php endif; ?>
                                                            </div>
                    
                                                            <a href="javascript:;" id="feature-btn3" class="add-fild-btn"><i
                                                                    class="icofont-plus"></i> <?php echo e(__('اضافه حقول اخرى')); ?></a>
                                                        </div>
                                                    </div>
                    
                    
                                                  
                    
                                                    <div class="col-lg-12">
                                                        <div class="featured-keyword-area">
                                                            <div class="heading-area">
                                                                <h4 class="title"><?php echo e(__('العناوين')); ?></h4>
                                                            </div>
                    
                                                            <div class="feature-tag-top-filds" id="feature-section">
                                                                <?php if(!empty($gs->addresses_ar)): ?>
                                                                    <?php
                                                                        $addresses_ar = json_decode($gs->addresses_ar);
                                                                        $addresses_en = json_decode($gs->addresses_en);
                                                                        $addresses_fr = json_decode($gs->addresses_fr);
                    
                                                                    ?>
                                                                    <?php $__currentLoopData = $addresses_ar; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $data1): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                        <div class="feature-area">
                                                                            <span class="remove feature-remove"><i
                                                                                    class="las la-times"></i></span>
                                                                            <div class="row">
                                                                                <div class="col-lg-4">
                                                                                    <input type="text" name="addresses_ar[]"
                                                                                        class="input-field" placeholder="<?php echo e(__('arabic')); ?>"
                                                                                        value="<?php echo e($addresses_ar[$key]); ?>">
                                                                                </div>
                                                                                  <div class="col-lg-4">
                                                                                    <input type="text" name="addresses_en[]"
                                                                                        class="input-field" placeholder="<?php echo e(__('english')); ?>"
                                                                                        value="<?php echo e($addresses_en[$key]); ?>">
                                                                                </div>
                                                                                  <div class="col-lg-4">
                                                                                    <input type="text" name="addresses_fr[]"
                                                                                        class="input-field" placeholder="<?php echo e(__('france')); ?>"
                                                                                        value="<?php echo e($addresses_fr[$key]); ?>">
                                                                                </div>
                                                                                 
                    
                                                                            </div>
                    
                                                                        </div>
                                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                <?php else: ?>
                                                                    <div class="feature-area">
                                                                        <span class="remove feature-remove"><i
                                                                                class="las la-times"></i></span>
                                                                        <div class="row">
                                                                          <div class="col-lg-4">
                                                                                    <input type="text" name="addresses_ar[]"
                                                                                        class="input-field" placeholder="<?php echo e(__('arabic')); ?>"
                                                                                        value="">
                                                                                </div>
                                                                                  <div class="col-lg-4">
                                                                                    <input type="text" name="addresses_en[]"
                                                                                        class="input-field" placeholder="<?php echo e(__('english')); ?>"
                                                                                        value="">
                                                                                </div>
                                                                                  <div class="col-lg-4">
                                                                                    <input type="text" name="addresses_fr[]"
                                                                                        class="input-field" placeholder="<?php echo e(__('france')); ?>"
                                                                                        value="">
                                                                                </div>
                                                                                 
                    
                                                                        </div>
                    
                                                                    </div>
                                                                <?php endif; ?>
                                                            </div>
                    
                                                            <a href="javascript:;" id="feature-btn" class="add-fild-btn"><i
                                                                    class="icofont-plus"></i> <?php echo e(__('اضافه حقول اخرى')); ?></a>
                                                        </div>
                                                    </div>
                    
                                                      <div class="col-lg-12">
                                                        <div class="featured-keyword-area">
                                                            <div class="heading-area">
                                                                <h4 class="title"><?php echo e(__('contact_form_emails')); ?></h4>
                                                            </div>
                    
                                                            <div class="feature-tag-top-filds" id="feature-section4">
                                                                <?php if(!empty($gs->contact_emails)): ?>
                                                                    <?php
                                                                        $title = explode(',',$gs->contact_emails);
                                                                   
                    
                                                                    ?>
                                                                    <?php $__currentLoopData = $title; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $data1): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                        <div class="feature-area">
                                                                            <span class="remove feature-remove4"><i
                                                                                    class="las la-times"></i></span>
                                                                            <div class="row">
                                                                                <div class="col-lg-12">
                                                                                    <input type="text" name="contact_emails[]"
                                                                                        class="input-field" placeholder="<?php echo e(__('email')); ?>"
                                                                                        value="<?php echo e($title[$key]); ?>">
                                                                                </div>
                                                                               
                    
                    
                                                                            </div>
                    
                                                                        </div>
                                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                <?php else: ?>
                                                                    <div class="feature-area">
                                                                        <span class="remove feature-remove4"><i
                                                                                class="las la-times"></i></span>
                                                                        <div class="row">
                                                                            <div class="col-lg-12">
                                                                                <input type="text" name="contact_emails[]"
                                                                                    class="input-field" placeholder="<?php echo e(__('email')); ?>">
                                                                            </div>
                                                                          
                    
                    
                                                                        </div>
                    
                                                                    </div>
                                                                <?php endif; ?>
                                                            </div>
                    
                                                            <a href="javascript:;" id="feature-btn4" class="add-fild-btn"><i
                                                                    class="icofont-plus"></i> <?php echo e(__('اضافه حقول اخرى')); ?></a>
                                                        </div>
                                                    </div>
                    
                                                </div><!--end row-->
                                                
                  
                                              
                                          </div>
                                           
                                         
                                          
                                        </div>
                                     
                                        <div class="tab-pane " id="social_media_links" role="tabpanel">
                                            <h6 style="text-align: center;"> <?php echo e(__('translation.social_media_links')); ?></h6>
                                           
                                            <div class="mb-3">
                                              
                                                
                                           </div>
                                           
                                         
                                          
                                        </div>
                                        

                                    </div>

      
        
                
                            
                            
                            
                            
    <div class="row"
                                style="">
                            
                              
        <div class="col-lg-12">
                <div class="text-end">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div><!--end col-->
                            </div><!--end row-->
                            
                            
    </form>

                                  </div>
                              </div>
                          </div>
                        </div>
                      </div>
   
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
    <script>
        $("#feature-btn4").on('click', function() {

            $("#feature-section4").append('' +
                '<div class="feature-area">' +
                '<span class="remove feature-remove4"><i class="las la-times"></i></span>' +
                '<div  class="row">' +
                '<div class="col-lg-12">' +
                '<input type="text" name="contact_emails[]" class="input-field" placeholder="email">' +
                '</div>'   +

                '</div>' +

                '</div>' +
                '</div>' +
                '');

        });
        $(document).on('click', '.feature-remove4', function() {

            $(this.parentNode).remove();
            if (isEmpty($('#feature-section4'))) {

                $("#feature-section4").append('' +
                    '<div class="feature-area">' +
                    '<span class="remove feature-remove4"><i class="las la-times"></i></span>' +
                    '<div  class="row">' +
                    '<div class="col-lg-6">' +
                    '<input type="text" name="contact_emails[]" class="input-field" placeholder="email">' +
                    '</div>'   +

                    '</div>' +

                    '</div>' +
                    '</div>' +
                    '');
                
            }

        });


        $("#feature-btn3").on('click', function() {

            $("#feature-section3").append('' +
                '<div class="feature-area">' +
                '<span class="remove feature-remove3"><i class="las la-times"></i></span>' +
                '<div  class="row">' +
                '<div class="col-lg-12">' +
                '<input type="text" name="emails[]" class="input-field" placeholder="email">' +
                '</div>'   +

                '</div>' +

                '</div>' +
                '</div>' +
                '');

        });
        $(document).on('click', '.feature-remove3', function() {

            $(this.parentNode).remove();
            if (isEmpty($('#feature-section3'))) {

                $("#feature-section3").append('' +
                    '<div class="feature-area">' +
                    '<span class="remove feature-remove3"><i class="las la-times"></i></span>' +
                    '<div  class="row">' +
                    '<div class="col-lg-6">' +
                    '<input type="text" name="emails[]" class="input-field" placeholder="email">' +
                    '</div>'   +

                    '</div>' +

                    '</div>' +
                    '</div>' +
                    '');
                
            }

        });



        $("#feature-btn2").on('click', function() {

            $("#feature-section2").append('' +
                '<div class="feature-area">' +
                '<span class="remove feature-remove2"><i class="las la-times"></i></span>' +
                '<div  class="row">' +
                '<div class="col-lg-12">' +
                '<input type="text" name="phones[]" class="input-field" placeholder="الرقم">' +
                '</div>'   +

                '</div>' +

                '</div>' +
                '</div>' +
                '');

        });
        $(document).on('click', '.feature-remove2', function() {

            $(this.parentNode).remove();
            if (isEmpty($('#feature-section2'))) {

                $("#feature-section2").append('' +
                    '<div class="feature-area">' +
                    '<span class="remove feature-remove2"><i class="las la-times"></i></span>' +
                    '<div  class="row">' +
                    '<div class="col-lg-12">' +
                    '<input type="text" name="phones[]" class="input-field" placeholder="phone">' +
                    '</div>'  +

                    '</div>' +

                    '</div>' +
                    '</div>' +
                    '');
                
            }

        });


         $("#feature-btn").on('click', function() {

            $("#feature-section").append('' +
                '<div class="feature-area">' +
                '<span class="remove feature-remove"><i class="las la-times"></i></span>' +
                '<div  class="row">' +
                '<div class="col-lg-4">' +
                '<input type="text" name="addresses_ar[]" class="input-field" placeholder="arabic">' +
                '</div>' +
                '<div class="col-lg-4">' +
                '<input type="text" name="addresses_en[]" class="input-field" placeholder="english">' +
                '</div>'+
                '<div class="col-lg-4">' +
                '<input type="text" name="addresses_fr[]" class="input-field" placeholder="france">' +
                '</div>' +

                '</div>' +

                '</div>' +
                '</div>' +
                '');

        });
        $(document).on('click', '.feature-remove', function() {

            $(this.parentNode).remove();
            if (isEmpty($('#feature-section'))) {

                $("#feature-section").append('' +
                    '<div class="feature-area">' +
                    '<span class="remove feature-remove"><i class="las la-times"></i></span>' +
                    '<div  class="row">' +
                    '<div class="col-lg-4">' +
                    '<input type="text" name="addresses_ar[]" class="input-field" placeholder="arabic">' +
                    '</div>' +
                    '<div class="col-lg-4">' +
                    '<input type="text" name="addresses_en[]" class="input-field" placeholder="english">' +
                    '</div>'+
                    '<div class="col-lg-4">' +
                    '<input type="text" name="addresses_fr[]" class="input-field" placeholder="france">' +
                    '</div>' +


                    '</div>' +

                    '</div>' +
                    '</div>' +
                    '');
                
            }

        });



    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\admin-cangrows\resources\views/admin/generalsetting/websitecontent.blade.php ENDPATH**/ ?>