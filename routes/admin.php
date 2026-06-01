<?php

use App\Http\Controllers\Admin\AboutPointController;
use App\Http\Controllers\Admin\AboutVisionController;
use App\Http\Controllers\Admin\AfterBeforeController;
use App\Http\Controllers\Admin\AgendaController;
use App\Http\Controllers\Admin\DonateCampaignController;
use App\Http\Controllers\Admin\EventController;
use App\Http\Controllers\Admin\HumanitarianCaseController;
use App\Http\Controllers\Admin\PartyController;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\Admin\ProjectCategoryController;
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
use App\Http\Controllers\Admin\BlogCategoryController;
use App\Http\Controllers\Admin\CertificateController;
use App\Http\Controllers\Admin\DoctorController;
use App\Http\Controllers\Admin\LocationController;
use App\Http\Controllers\Admin\ProcessController;
use App\Http\Controllers\Admin\TimelineController;
use App\Http\Controllers\Admin\TestimonialController;
use App\Http\Controllers\Admin\MuseumController;
use App\Http\Controllers\Admin\SeminarController;
use App\Http\Controllers\Admin\MeetingController;

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


  Route::middleware(['auth.admin'])->group(function () {

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

    Route::group(['middleware' => 'permissions:locations'], function () {

      Route::get('/locations/datatables',  [LocationController::class, 'datatables'])->name('admin-locations-datatables');
      Route::get('/locations',  [LocationController::class, 'index'])->name('admin-locations-index');
      Route::get('/locations/create',   [LocationController::class, 'create'])->name('admin-locations-create');
      Route::post('/locations/create',  [LocationController::class, 'store'])->name('admin-locations-store');
      Route::get('/locations/edit/{id}',  [LocationController::class, 'edit'])->name('admin-locations-edit');
      Route::post('/locations/update/{id}', [LocationController::class, 'update'])->name('admin-locations-update');

      Route::get('/locations/delete/{id}',  [LocationController::class, 'destroy'])->name('admin-locations-delete');
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

    Route::group(['middleware' => 'permissions:certificates'], function () {


      Route::get('/certificates/datatables',  [CertificateController::class, 'datatables'])->name('admin-certificates-datatables');
      Route::get('/certificates',  [CertificateController::class, 'index'])->name('admin-certificates-index');
      Route::get('/certificates/create',   [CertificateController::class, 'create'])->name('admin-certificates-create');
      Route::post('/certificates/create',  [CertificateController::class, 'store'])->name('admin-certificates-store');
      Route::get('/certificates/edit/{id}',  [CertificateController::class, 'edit'])->name('admin-certificates-edit');
      Route::post('/certificates/update/{id}', [CertificateController::class, 'update'])->name('admin-certificates-update');

      Route::get('/certificates/delete/{id}',  [CertificateController::class, 'destroy'])->name('admin-certificates-delete');
    });

    Route::group(['middleware' => 'permissions:after_befores'], function () {


      Route::get('/after_befores/datatables',  [AfterBeforeController::class, 'datatables'])->name('admin-after_befores-datatables');
      Route::get('/after_befores',  [AfterBeforeController::class, 'index'])->name('admin-after_befores-index');
      Route::get('/after_befores/create',   [AfterBeforeController::class, 'create'])->name('admin-after_befores-create');
      Route::post('/after_befores/create',  [AfterBeforeController::class, 'store'])->name('admin-after_befores-store');
      Route::get('/after_befores/edit/{id}',  [AfterBeforeController::class, 'edit'])->name('admin-after_befores-edit');
      Route::post('/after_befores/update/{id}', [AfterBeforeController::class, 'update'])->name('admin-after_befores-update');

      Route::get('/after_befores/delete/{id}',  [AfterBeforeController::class, 'destroy'])->name('admin-after_befores-delete');
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

    Route::group(['middleware' => 'permissions:humanitarian_cases'], function () {

      Route::get('/humanitarian_cases/datatables',  [HumanitarianCaseController::class, 'datatables'])->name('admin-humanitarian_cases-datatables');
      Route::get('/humanitarian_cases',  [HumanitarianCaseController::class, 'index'])->name('admin-humanitarian_cases-index');
      Route::get('/humanitarian_cases/create',   [HumanitarianCaseController::class, 'create'])->name('admin-humanitarian_cases-create');
      Route::post('/humanitarian_cases/create',  [HumanitarianCaseController::class, 'store'])->name('admin-humanitarian_cases-store');
      Route::get('/humanitarian_cases/edit/{id}',  [HumanitarianCaseController::class, 'edit'])->name('admin-humanitarian_cases-edit');
      Route::post('/humanitarian_cases/update/{id}', [HumanitarianCaseController::class, 'update'])->name('admin-humanitarian_cases-update');

      Route::get('/humanitarian_cases/delete/{id}',  [HumanitarianCaseController::class, 'destroy'])->name('admin-humanitarian_cases-delete');
    });

    Route::group(['middleware' => 'permissions:events'], function () {

      Route::get('/events/datatables',  [EventController::class, 'datatables'])->name('admin-events-datatables');
      Route::get('/events',  [EventController::class, 'index'])->name('admin-events-index');
      Route::get('/events/create',   [EventController::class, 'create'])->name('admin-events-create');
      Route::post('/events/create',  [EventController::class, 'store'])->name('admin-events-store');
      Route::get('/events/edit/{id}',  [EventController::class, 'edit'])->name('admin-events-edit');
      Route::post('/events/update/{id}', [EventController::class, 'update'])->name('admin-events-update');

      Route::get('/events/delete/{id}',  [EventController::class, 'destroy'])->name('admin-events-delete');
    });
    Route::group(['middleware' => 'permissions:seminars'], function () {

      Route::get('/seminars/datatables',  [SeminarController::class, 'datatables'])->name('admin-seminars-datatables');
      Route::get('/seminars',  [SeminarController::class, 'index'])->name('admin-seminars-index');
      Route::get('/seminars/create',   [SeminarController::class, 'create'])->name('admin-seminars-create');
      Route::post('/seminars/create',  [SeminarController::class, 'store'])->name('admin-seminars-store');
      Route::get('/seminars/edit/{id}',  [SeminarController::class, 'edit'])->name('admin-seminars-edit');
      Route::post('/seminars/update/{id}', [SeminarController::class, 'update'])->name('admin-seminars-update');

      Route::get('/seminars/delete/{id}',  [SeminarController::class, 'destroy'])->name('admin-seminars-delete');
    });
    Route::group(['middleware' => 'permissions:meetings'], function () {

      Route::get('/meetings/datatables',  [MeetingController::class, 'datatables'])->name('admin-meetings-datatables');
      Route::get('/meetings',  [MeetingController::class, 'index'])->name('admin-meetings-index');
      Route::get('/meetings/create',   [MeetingController::class, 'create'])->name('admin-meetings-create');
      Route::post('/meetings/create',  [MeetingController::class, 'store'])->name('admin-meetings-store');
      Route::get('/meetings/edit/{id}',  [MeetingController::class, 'edit'])->name('admin-meetings-edit');
      Route::post('/meetings/update/{id}', [MeetingController::class, 'update'])->name('admin-meetings-update');

      Route::get('/meetings/delete/{id}',  [MeetingController::class, 'destroy'])->name('admin-meetings-delete');
    });
    Route::group(['middleware' => 'permissions:museums'], function () {

      Route::get('/museums/datatables',  [MuseumController::class, 'datatables'])->name('admin-museums-datatables');
      Route::get('/museums',  [MuseumController::class, 'index'])->name('admin-museums-index');
      Route::get('/museums/create',   [MuseumController::class, 'create'])->name('admin-museums-create');
      Route::post('/museums/create',  [MuseumController::class, 'store'])->name('admin-museums-store');
      Route::get('/museums/edit/{id}',  [MuseumController::class, 'edit'])->name('admin-museums-edit');
      Route::post('/museums/update/{id}', [MuseumController::class, 'update'])->name('admin-museums-update');

      Route::get('/museums/delete/{id}',  [MuseumController::class, 'destroy'])->name('admin-museums-delete');
    });
    Route::group(['middleware' => 'permissions:parties'], function () {

      Route::get('/parties/datatables',  [PartyController::class, 'datatables'])->name('admin-parties-datatables');
      Route::get('/parties',  [PartyController::class, 'index'])->name('admin-parties-index');
      Route::get('/parties/create',   [PartyController::class, 'create'])->name('admin-parties-create');
      Route::post('/parties/create',  [PartyController::class, 'store'])->name('admin-parties-store');
      Route::get('/parties/edit/{id}',  [PartyController::class, 'edit'])->name('admin-parties-edit');
      Route::post('/parties/update/{id}', [PartyController::class, 'update'])->name('admin-parties-update');

      Route::get('/parties/delete/{id}',  [PartyController::class, 'destroy'])->name('admin-parties-delete');
    });

    Route::group(['middleware' => 'permissions:projects'], function () {

      Route::get('/projects/datatables',  [ProjectController::class, 'datatables'])->name('admin-projects-datatables');
      Route::get('/projects',  [ProjectController::class, 'index'])->name('admin-projects-index');
      Route::get('/projects/create',   [ProjectController::class, 'create'])->name('admin-projects-create');
      Route::post('/projects/create',  [ProjectController::class, 'store'])->name('admin-projects-store');
      Route::get('/projects/edit/{id}',  [ProjectController::class, 'edit'])->name('admin-projects-edit');
      Route::post('/projects/update/{id}', [ProjectController::class, 'update'])->name('admin-projects-update');

      Route::get('/projects/delete/{id}',  [ProjectController::class, 'destroy'])->name('admin-projects-delete');
    
      Route::get('/project_categories/datatables',  [ProjectCategoryController::class, 'datatables'])->name('admin-project_categories-datatables');
      Route::get('/project_categories',  [ProjectCategoryController::class, 'index'])->name('admin-project_categories-index');
      Route::get('/project_categories/create',   [ProjectCategoryController::class, 'create'])->name('admin-project_categories-create');
      Route::post('/project_categories/create',  [ProjectCategoryController::class, 'store'])->name('admin-project_categories-store');
      Route::get('/project_categories/edit/{id}',  [ProjectCategoryController::class, 'edit'])->name('admin-project_categories-edit');
      Route::post('/project_categories/update/{id}', [ProjectCategoryController::class, 'update'])->name('admin-project_categories-update');

      Route::get('/project_categories/delete/{id}',  [ProjectCategoryController::class, 'destroy'])->name('admin-project_categories-delete');
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


      
      Route::get('/blog_categories/datatables',  [BlogCategoryController::class, 'datatables'])->name('admin-blog_categories-datatables');
      Route::get('/blog_categories',  [BlogCategoryController::class, 'index'])->name('admin-blog_categories-index');
      Route::get('/blog_categories/create',   [BlogCategoryController::class, 'create'])->name('admin-blog_categories-create');
      Route::post('/blog_categories/create',  [BlogCategoryController::class, 'store'])->name('admin-blog_categories-store');
      Route::get('/blog_categories/edit/{id}',  [BlogCategoryController::class, 'edit'])->name('admin-blog_categories-edit');
      Route::post('/blog_categories/update/{id}', [BlogCategoryController::class, 'update'])->name('admin-blog_categories-update');

      Route::get('/blog_categories/delete/{id}',  [BlogCategoryController::class, 'destroy'])->name('admin-blog_categories-delete');
    
    
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


      Route::get('/page-settings/about-volunteering', [PageSettingController::class, 'about_volunteering'])->name('admin-ps-about-volunteering');
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

    Route::group(['middleware' => 'permissions:about_points'], function () {

     
      Route::get('/about_points/datatables',  [AboutPointController::class, 'datatables'])->name('admin-about_points-datatables');
      Route::get('/about_points',  [AboutPointController::class, 'index'])->name('admin-about_points-index');
      Route::get('/about_points/create',   [AboutPointController::class, 'create'])->name('admin-about_points-create');
      Route::post('/about_points/create',  [AboutPointController::class, 'store'])->name('admin-about_points-store');
      Route::get('/about_points/edit/{id}',  [AboutPointController::class, 'edit'])->name('admin-about_points-edit');
      Route::post('/about_points/update/{id}', [AboutPointController::class, 'update'])->name('admin-about_points-update');

      Route::get('/about_points/delete/{id}',  [AboutPointController::class, 'destroy'])->name('admin-about_points-delete');
   
    });

    Route::group(['middleware' => 'permissions:about_visions'], function () {

     
      Route::get('/about_visions/datatables',  [AboutVisionController::class, 'datatables'])->name('admin-about_visions-datatables');
      Route::get('/about_visions',  [AboutVisionController::class, 'index'])->name('admin-about_visions-index');
      Route::get('/about_visions/create',   [AboutVisionController::class, 'create'])->name('admin-about_visions-create');
      Route::post('/about_visions/create',  [AboutVisionController::class, 'store'])->name('admin-about_visions-store');
      Route::get('/about_visions/edit/{id}',  [AboutVisionController::class, 'edit'])->name('admin-about_visions-edit');
      Route::post('/about_visions/update/{id}', [AboutVisionController::class, 'update'])->name('admin-about_visions-update');

      Route::get('/about_visions/delete/{id}',  [AboutVisionController::class, 'destroy'])->name('admin-about_visions-delete');
   
    });

    Route::group(['middleware' => 'permissions:doctors'], function () {

     
      Route::get('/teams/datatables',  [DoctorController::class, 'datatables'])->name('admin-doctors-datatables');
      Route::get('/teams',  [DoctorController::class, 'index'])->name('admin-doctors-index');
      Route::get('/teams/create',   [DoctorController::class, 'create'])->name('admin-doctors-create');
      Route::post('/teams/create',  [DoctorController::class, 'store'])->name('admin-doctors-store');
      Route::get('/teams/edit/{id}',  [DoctorController::class, 'edit'])->name('admin-doctors-edit');
      Route::post('/teams/update/{id}', [DoctorController::class, 'update'])->name('admin-doctors-update');

      Route::get('/teams/delete/{id}',  [DoctorController::class, 'destroy'])->name('admin-doctors-delete');
   
    });
    Route::group(['middleware' => 'permissions:agenda'], function () {

     
      Route::get('/agenda/datatables',  [AgendaController::class, 'datatables'])->name('admin-agenda-datatables');
      Route::get('/agenda/datatables',  [AgendaController::class, 'datatables'])->name('admin-agenda-datatables');
      Route::get('/agenda',  [AgendaController::class, 'index'])->name('admin-agenda-index');
      Route::get('/agenda/create',   [AgendaController::class, 'create'])->name('admin-agenda-create');
      Route::post('/agenda/create',  [AgendaController::class, 'store'])->name('admin-agenda-store');
      Route::get('/agenda/edit/{id}',  [AgendaController::class, 'edit'])->name('admin-agenda-edit');
      Route::post('/agenda/update/{id}', [AgendaController::class, 'update'])->name('admin-agenda-update');

      Route::get('/agenda/delete/{id}',  [AgendaController::class, 'destroy'])->name('admin-agenda-delete');
   
    });
    Route::group(['middleware' => 'permissions:donate_campaigns'], function () {

     
      Route::get('/donate_campaigns/datatables',  [DonateCampaignController::class, 'datatables'])->name('admin-donate_campaigns-datatables');
      Route::get('/donate_campaigns/datatables',  [DonateCampaignController::class, 'datatables'])->name('admin-donate_campaigns-datatables');
      Route::get('/donate_campaigns',  [DonateCampaignController::class, 'index'])->name('admin-donate_campaigns-index');
      Route::get('/donate_campaigns/create',   [DonateCampaignController::class, 'create'])->name('admin-donate_campaigns-create');
      Route::post('/donate_campaigns/create',  [DonateCampaignController::class, 'store'])->name('admin-donate_campaigns-store');
      Route::get('/donate_campaigns/edit/{id}',  [DonateCampaignController::class, 'edit'])->name('admin-donate_campaigns-edit');
      Route::post('/donate_campaigns/update/{id}', [DonateCampaignController::class, 'update'])->name('admin-donate_campaigns-update');

      Route::get('/donate_campaigns/delete/{id}',  [DonateCampaignController::class, 'destroy'])->name('admin-donate_campaigns-delete');
   
    });
    Route::group(['middleware' => 'permissions:timelines'], function () {

     
      Route::get('/timelines/datatables',  [TimelineController::class, 'datatables'])->name('admin-timelines-datatables');
      Route::get('/timelines',  [TimelineController::class, 'index'])->name('admin-timelines-index');
      Route::get('/timelines/create',   [TimelineController::class, 'create'])->name('admin-timelines-create');
      Route::post('/timelines/create',  [TimelineController::class, 'store'])->name('admin-timelines-store');
      Route::get('/timelines/edit/{id}',  [TimelineController::class, 'edit'])->name('admin-timelines-edit');
      Route::post('/timelines/update/{id}', [TimelineController::class, 'update'])->name('admin-timelines-update');

      Route::get('/timelines/delete/{id}',  [TimelineController::class, 'destroy'])->name('admin-timelines-delete');
   
    });

    Route::group(['middleware' => 'permissions:testimonials'], function () {

     
      Route::get('/testimonials/datatables',  [TestimonialController::class, 'datatables'])->name('admin-testimonials-datatables');
      Route::get('/testimonials',  [TestimonialController::class, 'index'])->name('admin-testimonials-index');
      Route::get('/testimonials/create',   [TestimonialController::class, 'create'])->name('admin-testimonials-create');
      Route::post('/testimonials/create',  [TestimonialController::class, 'store'])->name('admin-testimonials-store');
      Route::get('/testimonials/edit/{id}',  [TestimonialController::class, 'edit'])->name('admin-testimonials-edit');
      Route::post('/testimonials/update/{id}', [TestimonialController::class, 'update'])->name('admin-testimonials-update');

      Route::get('/testimonials/delete/{id}',  [TestimonialController::class, 'destroy'])->name('admin-testimonials-delete');
   
    });

    Route::group(['middleware' => 'permissions:processes'], function () {

     
      Route::get('/processes/datatables',  [ProcessController::class, 'datatables'])->name('admin-processes-datatables');
      Route::get('/processes',  [ProcessController::class, 'index'])->name('admin-processes-index');
      Route::get('/processes/create',   [ProcessController::class, 'create'])->name('admin-processes-create');
      Route::post('/processes/create',  [ProcessController::class, 'store'])->name('admin-processes-store');
      Route::get('/processes/edit/{id}',  [ProcessController::class, 'edit'])->name('admin-processes-edit');
      Route::post('/processes/update/{id}', [ProcessController::class, 'update'])->name('admin-processes-update');

      Route::get('/processes/delete/{id}',  [ProcessController::class, 'destroy'])->name('admin-processes-delete');
   
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
