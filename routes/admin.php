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
