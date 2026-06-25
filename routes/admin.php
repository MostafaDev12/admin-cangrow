<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\StaffController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\PartnerController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\ModelController;
use App\Http\Controllers\Admin\GeneralSettingController;
use App\Http\Controllers\Admin\PageSettingController;
use App\Http\Controllers\Admin\ModelCategoryController;
use App\Http\Controllers\Admin\SocialSettingController;
use App\Http\Controllers\Admin\GalleryController;
use App\Http\Controllers\Admin\MediaController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\SubcategoryController;
use App\Http\Controllers\Admin\LanguageController;
use App\Http\Controllers\Admin\FormController;
use App\Http\Controllers\Admin\LeadController;
use App\Http\Controllers\Admin\BeforeAfterController;
use App\Http\Controllers\Admin\ServiceVideoController;
use App\Http\Controllers\Admin\TestimonialController;
use App\Http\Controllers\Admin\MapSettingController;
use App\Http\Controllers\Admin\DoctorController;
use App\Http\Controllers\Admin\MedicalTourismController;
use App\Http\Controllers\Admin\MedicalTourismBlockController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::prefix('admin')->group(function () {


  Route::middleware('auth.admin')->group(function () {

    //------------ ADMIN DASHBOARD & PROFILE SECTION ------------
    Route::get('/', [DashboardController::class, 'index'])->name('admin.dashboard');
    Route::get('/profile',  [DashboardController::class, 'profile'])->name('admin.profile');
    Route::post('/profile/update', [DashboardController::class, 'profileupdate'])->name('admin.profile.update');
    Route::get('/password', [DashboardController::class, 'passwordreset'])->name('admin.password');
    Route::post('/password/update',  [DashboardController::class, 'changepass'])->name('admin.password.update');
    //------------ ADMIN DASHBOARD & PROFILE SECTION ENDS ------------



    Route::group(['middleware' => 'permissions:super'], function () {


      Route::get('/cache/clear', function () {
        Artisan::call('cache:clear');
        Artisan::call('config:clear');
        Artisan::call('route:clear');
        Artisan::call('view:clear');
        return redirect()->route('admin.dashboard')->with('cache', 'System Cache Has Been Removed.');
      })->name('admin-cache-clear');



      // ------------ ROLE SECTION ----------------------

      Route::get('/role/datatables',  [RoleController::class, 'datatables'])->name('admin-role-datatables');
      Route::get('/role',  [RoleController::class, 'index'])->name('admin-role-index');
      Route::get('/role/create',  [RoleController::class, 'create'])->name('admin-role-create');
      Route::post('/role/create',  [RoleController::class, 'store'])->name('admin-role-store');
      Route::get('/role/edit/{id}',  [RoleController::class, 'edit'])->name('admin-role-edit');
      Route::post('/role/edit/{id}', [RoleController::class, 'update'])->name('admin-role-update');
      Route::get('/role/delete/{id}',  [RoleController::class, 'destroy'])->name('admin-role-delete');

      // ------------ ROLE SECTION ENDS ----------------------


    });



    Route::group(['middleware' => 'permissions:manage_staffs'], function () {

      Route::get('/staff/datatables',  [StaffController::class, 'datatables'])->name('admin-staff-datatables');
      Route::get('/staff',  [StaffController::class, 'index'])->name('admin-staff-index');
      Route::get('/staff/create',   [StaffController::class, 'create'])->name('admin-staff-create');
      Route::post('/staff/create',  [StaffController::class, 'store'])->name('admin-staff-store');
      Route::get('/staff/edit/{id}',  [StaffController::class, 'edit'])->name('admin-staff-edit');
      Route::post('/staff/update/{id}', [StaffController::class, 'update'])->name('admin-staff-update');
      Route::get('/staff/show/{id}', [StaffController::class, 'show'])->name('admin-staff-show');
      Route::get('/staff/delete/{id}',  [StaffController::class, 'destroy'])->name('admin-staff-delete');
    });



    Route::group(['middleware' => 'permissions:slider'], function () {

      Route::get('/slider/datatables',  [SliderController::class, 'datatables'])->name('admin-slider-datatables');
      Route::get('/slider',  [SliderController::class, 'index'])->name('admin-slider-index');
      Route::get('/slider/create',   [SliderController::class, 'create'])->name('admin-slider-create');
      Route::post('/slider/create',  [SliderController::class, 'store'])->name('admin-slider-store');
      Route::get('/slider/edit/{id}',  [SliderController::class, 'edit'])->name('admin-slider-edit');
      Route::post('/slider/update/{id}', [SliderController::class, 'update'])->name('admin-slider-update');

      Route::get('/slider/delete/{id}',  [SliderController::class, 'destroy'])->name('admin-slider-delete');
    });


    Route::group(['middleware' => 'permissions:models'], function () {

      Route::get('/models/datatables',  [ModelController::class, 'datatables'])->name('admin-models-datatables');
      Route::get('/models',  [ModelController::class, 'index'])->name('admin-models-index');
      Route::get('/models/create',   [ModelController::class, 'create'])->name('admin-models-create');
      Route::post('/models/create',  [ModelController::class, 'store'])->name('admin-models-store');
      Route::get('/models/edit/{id}',  [ModelController::class, 'edit'])->name('admin-models-edit');
      Route::post('/models/update/{id}', [ModelController::class, 'update'])->name('admin-models-update');

      Route::get('/models/delete/{id}',  [ModelController::class, 'destroy'])->name('admin-models-delete');


      Route::get('/models-category/datatables',  [ModelCategoryController::class, 'datatables'])->name('admin-models_category-datatables');
      Route::get('/models-category',  [ModelCategoryController::class, 'index'])->name('admin-models_category-index');
      Route::get('/models-category/create',   [ModelCategoryController::class, 'create'])->name('admin-models_category-create');
      Route::post('/models-category/create',  [ModelCategoryController::class, 'store'])->name('admin-models_category-store');
      Route::get('/models-category/edit/{id}',  [ModelCategoryController::class, 'edit'])->name('admin-models_category-edit');
      Route::post('/models-category/update/{id}', [ModelCategoryController::class, 'update'])->name('admin-models_category-update');

      Route::get('/models-category/delete/{id}',  [ModelCategoryController::class, 'destroy'])->name('admin-models_category-delete');
    });


    Route::group(['middleware' => 'permissions:faqs'], function () {

      Route::get('/faqs/datatables',  [FaqController::class, 'datatables'])->name('admin-faqs-datatables');
      Route::get('/faqs',  [FaqController::class, 'index'])->name('admin-faqs-index');
      Route::get('/faqs/create',   [FaqController::class, 'create'])->name('admin-faqs-create');
      Route::post('/faqs/create',  [FaqController::class, 'store'])->name('admin-faqs-store');
      Route::get('/faqs/edit/{id}',  [FaqController::class, 'edit'])->name('admin-faqs-edit');
      Route::post('/faqs/update/{id}', [FaqController::class, 'update'])->name('admin-faqs-update');

      Route::get('/faqs/delete/{id}',  [FaqController::class, 'destroy'])->name('admin-faqs-delete');

 
    });


    Route::group(['middleware' => 'permissions:partners'], function () {


      Route::get('/partners/datatables',  [PartnerController::class, 'datatables'])->name('admin-partners-datatables');
      Route::get('/partners',  [PartnerController::class, 'index'])->name('admin-partners-index');
      Route::get('/partners/create',   [PartnerController::class, 'create'])->name('admin-partners-create');
      Route::post('/partners/create',  [PartnerController::class, 'store'])->name('admin-partners-store');
      Route::get('/partners/edit/{id}',  [PartnerController::class, 'edit'])->name('admin-partners-edit');
      Route::post('/partners/update/{id}', [PartnerController::class, 'update'])->name('admin-partners-update');

      Route::get('/partners/delete/{id}',  [PartnerController::class, 'destroy'])->name('admin-partners-delete');
    });

    Route::group(['middleware' => 'permissions:media'], function () {
      Route::get('/media/datatables',  [MediaController::class, 'datatables'])->name('admin-media-datatables');
      Route::get('/media',  [MediaController::class, 'index'])->name('admin-media-index');
      Route::get('/media/create',   [MediaController::class, 'create'])->name('admin-media-create');
      Route::post('/media/create',  [MediaController::class, 'store'])->name('admin-media-store');
      Route::get('/media/edit/{id}',  [MediaController::class, 'edit'])->name('admin-media-edit');
      Route::post('/media/update/{id}', [MediaController::class, 'update'])->name('admin-media-update');

      Route::get('/media/delete/{id}',  [MediaController::class, 'destroy'])->name('admin-media-delete');
    });
    Route::group(['middleware' => 'permissions:services'], function () {

      Route::get('/services/datatables',  [ServiceController::class, 'datatables'])->name('admin-services-datatables');
      Route::get('/services',  [ServiceController::class, 'index'])->name('admin-services-index');
      Route::get('/services/create',   [ServiceController::class, 'create'])->name('admin-services-create');
      Route::post('/services/create',  [ServiceController::class, 'store'])->name('admin-services-store');
      Route::get('/services/edit/{id}',  [ServiceController::class, 'edit'])->name('admin-services-edit');
      Route::post('/services/update/{id}', [ServiceController::class, 'update'])->name('admin-services-update');

      Route::get('/services/delete/{id}',  [ServiceController::class, 'destroy'])->name('admin-services-delete');
    });

    Route::group(['middleware' => 'permissions:categories'], function () {

      Route::get('/categories/datatables',  [CategoryController::class, 'datatables'])->name('admin-categories-datatables');
      Route::get('/categories',  [CategoryController::class, 'index'])->name('admin-categories-index');
      Route::get('/categories/create',   [CategoryController::class, 'create'])->name('admin-categories-create');
      Route::post('/categories/create',  [CategoryController::class, 'store'])->name('admin-categories-store');
      Route::get('/categories/edit/{id}',  [CategoryController::class, 'edit'])->name('admin-categories-edit');
      Route::post('/categories/update/{id}', [CategoryController::class, 'update'])->name('admin-categories-update');

      Route::get('/categories/delete/{id}',  [CategoryController::class, 'destroy'])->name('admin-categories-delete');
    });

    Route::group(['middleware' => 'permissions:subcategories'], function () {

      Route::get('/subcategories/datatables',  [SubcategoryController::class, 'datatables'])->name('admin-subcategories-datatables');
      Route::get('/subcategories',  [SubcategoryController::class, 'index'])->name('admin-subcategories-index');
      Route::get('/subcategories/create',   [SubcategoryController::class, 'create'])->name('admin-subcategories-create');
      Route::post('/subcategories/create',  [SubcategoryController::class, 'store'])->name('admin-subcategories-store');
      Route::get('/subcategories/edit/{id}',  [SubcategoryController::class, 'edit'])->name('admin-subcategories-edit');
      Route::post('/subcategories/update/{id}', [SubcategoryController::class, 'update'])->name('admin-subcategories-update');

      Route::get('/subcategories/delete/{id}',  [SubcategoryController::class, 'destroy'])->name('admin-subcategories-delete');
    });
    Route::get('/load/subcategories/{id}/',[SubcategoryController::class, 'load'])->name('admin-subcat-load'); //JSON REQUEST



    Route::group(['middleware' => 'permissions:blogs'], function () {

      Route::get('/blogs/datatables',  [BlogController::class, 'datatables'])->name('admin-blogs-datatables');
      Route::get('/blogs',  [BlogController::class, 'index'])->name('admin-blogs-index');
      Route::get('/blogs/create',   [BlogController::class, 'create'])->name('admin-blogs-create');
      Route::post('/blogs/create',  [BlogController::class, 'store'])->name('admin-blogs-store');
      Route::get('/blogs/edit/{id}',  [BlogController::class, 'edit'])->name('admin-blogs-edit');
      Route::post('/blogs/update/{id}', [BlogController::class, 'update'])->name('admin-blogs-update');

      Route::get('/blogs/delete/{id}',  [BlogController::class, 'destroy'])->name('admin-blogs-delete');
    });


    Route::group(['middleware' => 'permissions:general_settings'], function () {

      Route::get('/general-settings/logo', [GeneralSettingController::class, 'logo'])->name('admin-gs-logo');
      Route::get('/general-settings/contents', [GeneralSettingController::class, 'contents'])->name('admin-gs-contents');
      Route::post('/general-settings/update/all', [GeneralSettingController::class, 'generalupdate'])->name('admin-gs-update');
      Route::get('/general-settings/Adminloader', [GeneralSettingController::class, 'load2'])->name('admin-gs-load2');
      Route::get('/general-settings/home_video', [GeneralSettingController::class, 'home_video'])->name('admin-gs-home_video');

      Route::get('/general-settings/contact_messages/datatables',  [GeneralSettingController::class, 'contact_messages_datatables'])->name('admin-contact_messages-datatables');
      Route::get('/general-settings/contact_messages', [GeneralSettingController::class, 'contact_messages'])->name('admin-gs-contact_messages');


      Route::get('/general-settings/subscriptions/datatables',  [GeneralSettingController::class, 'subscriptions_datatables'])->name('admin-subscriptions-datatables');
      Route::get('/general-settings/subscriptions', [GeneralSettingController::class, 'subscriptions'])->name('admin-gs-subscriptions');


      Route::get('/general-settings/admin/loader/{status}', [GeneralSettingController::class, 'isadminloader'])->name('admin-gs-is-admin-loader');
    });



    Route::group(['middleware' => 'permissions:page_settings'], function () {


      Route::get('/page-settings/about_us', [PageSettingController::class, 'aboutUs'])->name('admin-ps-about_us');
      Route::get('/page-settings/portfolio', [PageSettingController::class, 'portfolio'])->name('admin-ps-portfolio');
      Route::get('/page-settings/after_before', [PageSettingController::class, 'after_before'])->name('admin-ps-after_before');
      Route::get('/page-settings/our_team', [PageSettingController::class, 'our_team'])->name('admin-ps-our_team');
      Route::post('/page-settings/update/all', [PageSettingController::class, 'pageupdate'])->name('admin-ps-update');
    });



    Route::group(['middleware' => 'permissions:social_settings'], function () {

      Route::get('/social',   [SocialSettingController::class, 'index'])->name('admin-social-index');
      Route::post('/social/update',  [SocialSettingController::class, 'socialupdate'])->name('admin-social-update');
      Route::post('/social/update/all',  [SocialSettingController::class, 'socialupdateall'])->name('admin-social-update-all');
      Route::get('/social/facebook',  [SocialSettingController::class, 'facebook'])->name('admin-social-facebook');
      Route::get('/social/google',  [SocialSettingController::class, 'google'])->name('admin-social-google');
      Route::get('/social/facebook/{status}', [SocialSettingController::class, 'facebookup'])->name('admin-social-facebookup');
      Route::get('/social/google/{status}', [SocialSettingController::class, 'googleup'])->name('admin-social-googleup');
    });


    Route::group(['middleware' => 'permissions:language'], function () {

      Route::get('/languages', [LanguageController::class, 'index'])->name('admin-flang-index');
      Route::get('/languages/create', [LanguageController::class, 'create'])->name('admin-flang-create');
      Route::post('/languages/create', [LanguageController::class, 'store'])->name('admin-flang-store');
      Route::get('/languages/edit/{id}', [LanguageController::class, 'edit'])->name('admin-flang-edit');
      Route::post('/languages/update/{id}', [LanguageController::class, 'update'])->name('admin-flang-update');
      Route::get('/languages/delete/{id}', [LanguageController::class, 'destroy'])->name('admin-flang-delete');
      Route::get('/languages/statusupdate/{id}/{status}', [LanguageController::class, 'statusupdate'])->name('admin-flang-statusupdate');
       });
    // ------------ WEBSITE CONTENT SECTION ------------

    Route::group(['middleware' => 'permissions:website_content'], function () {

      // Forms (settings + fields)
      Route::get('/forms/datatables', [FormController::class, 'datatables'])->name('admin-forms-datatables');
      Route::get('/forms', [FormController::class, 'index'])->name('admin-forms-index');
      Route::get('/forms/edit/{id}', [FormController::class, 'edit'])->name('admin-forms-edit');
      Route::post('/forms/update/{id}', [FormController::class, 'update'])->name('admin-forms-update');
      Route::get('/forms/{id}/fields/datatables', [FormController::class, 'fieldsDatatables'])->name('admin-forms-fields-datatables');
      Route::get('/forms/{id}/fields/create', [FormController::class, 'fieldCreate'])->name('admin-forms-field-create');
      Route::post('/forms/{id}/fields/store', [FormController::class, 'fieldStore'])->name('admin-forms-field-store');
      Route::get('/forms/fields/edit/{id}', [FormController::class, 'fieldEdit'])->name('admin-forms-field-edit');
      Route::post('/forms/fields/update/{id}', [FormController::class, 'fieldUpdate'])->name('admin-forms-field-update');
      Route::get('/forms/fields/delete/{id}', [FormController::class, 'fieldDestroy'])->name('admin-forms-field-delete');

      // Before & After cases
      Route::get('/before-after/datatables', [BeforeAfterController::class, 'datatables'])->name('admin-before-after-datatables');
      Route::get('/before-after', [BeforeAfterController::class, 'index'])->name('admin-before-after-index');
      Route::get('/before-after/create', [BeforeAfterController::class, 'create'])->name('admin-before-after-create');
      Route::post('/before-after/store', [BeforeAfterController::class, 'store'])->name('admin-before-after-store');
      Route::get('/before-after/edit/{id}', [BeforeAfterController::class, 'edit'])->name('admin-before-after-edit');
      Route::post('/before-after/update/{id}', [BeforeAfterController::class, 'update'])->name('admin-before-after-update');
      Route::get('/before-after/delete/{id}', [BeforeAfterController::class, 'destroy'])->name('admin-before-after-delete');

      // Service videos
      Route::get('/service-video/datatables', [ServiceVideoController::class, 'datatables'])->name('admin-service-video-datatables');
      Route::get('/service-video', [ServiceVideoController::class, 'index'])->name('admin-service-video-index');
      Route::get('/service-video/edit/{id}', [ServiceVideoController::class, 'edit'])->name('admin-service-video-edit');
      Route::post('/service-video/update/{id}', [ServiceVideoController::class, 'update'])->name('admin-service-video-update');

      // Testimonials
      Route::get('/testimonials/datatables', [TestimonialController::class, 'datatables'])->name('admin-testimonials-datatables');
      Route::get('/testimonials', [TestimonialController::class, 'index'])->name('admin-testimonials-index');
      Route::get('/testimonials/create', [TestimonialController::class, 'create'])->name('admin-testimonials-create');
      Route::post('/testimonials/store', [TestimonialController::class, 'store'])->name('admin-testimonials-store');
      Route::get('/testimonials/edit/{id}', [TestimonialController::class, 'edit'])->name('admin-testimonials-edit');
      Route::post('/testimonials/update/{id}', [TestimonialController::class, 'update'])->name('admin-testimonials-update');
      Route::get('/testimonials/delete/{id}', [TestimonialController::class, 'destroy'])->name('admin-testimonials-delete');

      // Maps
      Route::get('/maps', [MapSettingController::class, 'index'])->name('admin-maps-index');
      Route::get('/maps/edit/{key}', [MapSettingController::class, 'edit'])->name('admin-maps-edit');
      Route::post('/maps/update/{key}', [MapSettingController::class, 'update'])->name('admin-maps-update');

      // Doctors / Article Authors
      Route::get('/doctors/datatables', [DoctorController::class, 'datatables'])->name('admin-doctors-datatables');
      Route::get('/doctors', [DoctorController::class, 'index'])->name('admin-doctors-index');
      Route::get('/doctors/create', [DoctorController::class, 'create'])->name('admin-doctors-create');
      Route::post('/doctors/store', [DoctorController::class, 'store'])->name('admin-doctors-store');
      Route::get('/doctors/edit/{id}', [DoctorController::class, 'edit'])->name('admin-doctors-edit');
      Route::post('/doctors/update/{id}', [DoctorController::class, 'update'])->name('admin-doctors-update');
      Route::get('/doctors/delete/{id}', [DoctorController::class, 'destroy'])->name('admin-doctors-delete');
    });

    // ------------ MEDICAL TOURISM SECTION ------------

    Route::group(['middleware' => 'permissions:medical_tourism'], function () {
      Route::get('/medical-tourism/settings', [MedicalTourismController::class, 'settings'])->name('admin-mt-settings');
      Route::post('/medical-tourism/settings/update', [MedicalTourismController::class, 'settingsUpdate'])->name('admin-mt-settings-update');
      Route::get('/medical-tourism/featured', [MedicalTourismController::class, 'featured'])->name('admin-mt-featured');
      Route::post('/medical-tourism/featured/update', [MedicalTourismController::class, 'featuredUpdate'])->name('admin-mt-featured-update');

      // Blocks (benefit | journey | support | faq)
      Route::get('/medical-tourism/blocks/{type}/datatables', [MedicalTourismBlockController::class, 'datatables'])->name('admin-mt-blocks-datatables');
      Route::get('/medical-tourism/blocks/{type}', [MedicalTourismBlockController::class, 'index'])->name('admin-mt-blocks-index');
      Route::get('/medical-tourism/blocks/{type}/create', [MedicalTourismBlockController::class, 'create'])->name('admin-mt-blocks-create');
      Route::post('/medical-tourism/blocks/{type}/store', [MedicalTourismBlockController::class, 'store'])->name('admin-mt-blocks-store');
      Route::get('/medical-tourism/blocks/{type}/edit/{id}', [MedicalTourismBlockController::class, 'edit'])->name('admin-mt-blocks-edit');
      Route::post('/medical-tourism/blocks/{type}/update/{id}', [MedicalTourismBlockController::class, 'update'])->name('admin-mt-blocks-update');
      Route::get('/medical-tourism/blocks/{type}/delete/{id}', [MedicalTourismBlockController::class, 'destroy'])->name('admin-mt-blocks-delete');
    });

    // ------------ LEADS SECTION ------------

    Route::group(['middleware' => 'permissions:leads'], function () {
      Route::get('/leads/datatables', [LeadController::class, 'datatables'])->name('admin-leads-datatables');
      Route::get('/leads', [LeadController::class, 'index'])->name('admin-leads-index');
      Route::get('/leads/show/{id}', [LeadController::class, 'show'])->name('admin-leads-show');
      Route::post('/leads/update/{id}', [LeadController::class, 'update'])->name('admin-leads-update');
      Route::get('/leads/delete/{id}', [LeadController::class, 'destroy'])->name('admin-leads-delete');
    });

    // GALLERY SECTION ------------

    Route::get('/gallery/show', [GalleryController::class, 'show'])->name('admin-gallery-show');

    Route::post('/gallery/store',  [GalleryController::class, 'store'])->name('admin-gallery-store');
    Route::get('/gallery/delete', [GalleryController::class, 'destroy'])->name('admin-gallery-delete');

    // GALLERY SECTION ENDS------------




  });


  //------------ ADMIN LOGIN SECTION ------------

  Route::get('/login', [LoginController::class, 'showLoginForm'])->name('admin.login');
  Route::post('/login', [LoginController::class, 'login'])->name('admin.login.submit');
  Route::get('/forgot', [LoginController::class, 'showForgotForm'])->name('admin.forgot');
  Route::post('/forgot', [LoginController::class, 'forgot'])->name('admin.forgot.submit');
  Route::get('/logout', [LoginController::class, 'logout'])->name('admin.logout');


  //Update User Details
  Route::post('/update-profile/{id}', [DashboardController::class, 'updateProfile'])->name('updateProfile');
  Route::post('/update-password/{id}', [DashboardController::class, 'updatePassword'])->name('updatePassword');
});
