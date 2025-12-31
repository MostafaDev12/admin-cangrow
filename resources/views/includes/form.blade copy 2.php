 @php
$phones =  explode(',', $gs->phones);
$emails =   explode(',', $gs->emails);
$addresses =  json_decode($gs->{'addresses_' . $sign});
$randomPhone = Arr::random($phones);
$email = Arr::random($emails);
@endphp
 
      <section class="contact-form">
         <div class="container">
             <div class="row">
                 <div class="col-12 col-lg-6 col-md-6">
                     <div>
                         <img src="{{ asset('front/highline/') }}/img/slider-3.jpg" alt="">
                     </div>
                 </div>
                 <div class="col-12 col-lg-6 col-md-6">
                     <div class="p-4 contact-form-box">
                         <form enctype="multipart/form-data" action="{{route('front.contact.submit')}}" name="appointment" id="email-form" method="POST" autocomplete="off" class="cons-contact-form">
                            {{csrf_field()}}
                            <div class="form-group w-100">
                              <div class="response w-100"></div>
                            </div>
                             <h3 class="fw-bold fs-5 mb-4"> {{ __('للحصول على تسعير مبدئى') }}</h3>
                             <div class="row mb-3">
                                 <div class="col-md-12">
                                     <label for="name" class="form-label">{{ __('الاسم') }}</label>
                                     <input type="text" id="name" name="name" class="form-control fname" placeholder="{{ __( 'أدخل اسمك') }}">
                                 </div>
                             </div>
                             <div class="row mb-3">
                                 <div class="col-md-6">
                                     <label for="mobile" class="form-label">{{ __('الموبايل') }}</label>
                                     <input type="tel" id="mobile" name="phone" class="form-control text-end"
                                         placeholder="ادخل رقم الموبايل">
                                 </div>
                                 <div class="col-md-6">
                                     <label for="sizes"> {{ __('اختار الخدمه') }}:</label>
                                     <select id="sizes" name="service">
                                        @foreach ($categories as $category)
                                            
                                         <option value="{!! $category->{'title_' . $sign} ?? '' !!}">{!! $category->{'title_' . $sign} ?? '' !!}</option>
                                          
                                        @endforeach
                                     </select>
                                 </div>
                             </div>
                             <div class="mb-3">
                                 <label for="measurementsPhoto" class="form-label"> {{ __('صورة المقاسات') }}</label>
                                 <div class="input-group">
                                     <input type="file" name="file" class="form-control" id="measurementsPhoto"
                                         style="display: none;">
                                     <label class="btn bg-body-tertiary	 w-100" for="measurementsPhoto" id="fileLabel">
                                         <i class="fas fa-cloud-upload-alt me-2"></i> {{ __('رفع الصورة') }}
                                     </label>
                                 </div>
                                 <small class="text-muted"> {{ __('يجب أن تكون الصورة بصيغة JPG, PNG أو PDF') }}</small>
                                 <div id="fileName" class="mt-2 text-success"></div>
                             </div>

                             <script>
                                 document.getElementById('measurementsPhoto').addEventListener('change', function(e) {
                                     const fileName = e.target.files[0]?.name || 'لم يتم رفع أي ملف';
                                     document.getElementById('fileName').textContent = 'تم اختيار: ' + fileName;
                                     document.getElementById('fileLabel').innerHTML =
                                         '<i class="fas fa-check-circle me-2"></i> تم التحديد';
                                 });
                             </script>
                             <div class="mb-3">
                                 <label for="details" class="form-label"> {{ __('التفاصيل') }}</label>
                                 <textarea id="details" name="text" class="form-control" rows="4" placeholder="تفاصيل "></textarea>
                             </div>
                             <div class="text-center">
                                 <button type="submit" class="btn btn-submit w-100 mt-3 px-5 btn-pulse">  {{ __('إرسال') }}<i
                                         class="fa-solid fa-envelope"></i> </button>
                             </div>
                         </form>
                     </div>
                 </div>
             </div>
         </div>
     </section>
