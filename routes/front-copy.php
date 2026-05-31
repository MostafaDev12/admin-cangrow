<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use App\Models\Language;

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

// 'IpLocation', 
Route::middleware(['FrontLanguages'])->group(function () {

  //------------ ADMIN DASHBOARD & PROFILE SECTION ------------


  // Route::get('/', function () {

  //     $data = Language::where('is_default', '=', '1')->first();

  //     return Redirect::to('/' . $data->sign);
  // });

 Route::group([], function () {


    Route::get('/', [HomeController::class, 'index'])->name('front.index');
    Route::get('/about-us', [HomeController::class, 'about'])->name('about.index');
    Route::get('/services', [HomeController::class, 'services'])->name('services.index');

    Route::get('/services/{slug}', [HomeController::class, 'singleService'])->name('single-service.index');

    Route::get('/services-category/{slug}', [HomeController::class, 'singleCategoryService'])->name('single-category-service.index');

    Route::get('/category/{slug}', [HomeController::class, 'blogsCategory'])->name('blogs-category.index');

    Route::get('/videos', [HomeController::class, 'videos'])->name('videos.index');
    Route::get('/blogs', [HomeController::class, 'blogs'])->name('blogs.index');

    Route::get('/contact-us', [HomeController::class, 'contact'])->name('contact.index');
    
    Route::post('/subscripe-submit', [HomeController::class, 'subscribe'])->name('front.subscripe.submit');
    Route::get('/appointments', [HomeController::class, 'BookNow'])->name('appointments.index');
    Route::get('/doctors', [HomeController::class, 'doctors'])->name('doctors.index');

    Route::get('/dentistry', [HomeController::class, 'dentistry'])->name('dentistry.index');
    Route::get('/invisalign', [HomeController::class, 'invisalign'])->name('invisalign.index');
    Route::get('/veneers', [HomeController::class, 'veneers'])->name('veneers.index');
    Route::get('/dental-implants', [HomeController::class, 'dental_implants'])->name('dental-implants.index');


    Route::get('/blogs/{blog}', [HomeController::class, 'singleBlog'])->name('single-blog.index');
  });


  Route::prefix('{lang}')->where(['lang' => 'en'])->group(function () {


    Route::get('/', [HomeController::class, 'index'])->name('front.indexen');
    Route::get('/about-us', [HomeController::class, 'about'])->name('about.indexen');
    Route::get('/services', [HomeController::class, 'services'])->name('services.indexen');

    Route::get('/services/{slug}', [HomeController::class, 'singleServiceen'])->name('single-service.indexen');

    Route::get('/services-category/{slug}', [HomeController::class, 'singleCategoryService'])->name('single-category-service.indexen');

    Route::get('/category/{slug}', [HomeController::class, 'blogsCategory'])->name('blogs-category.indexen');

    Route::get('/videos', [HomeController::class, 'videos'])->name('videos.indexen');
    Route::get('/blogs', [HomeController::class, 'blogs'])->name('blogs.indexen');

    Route::get('/contact-us', [HomeController::class, 'contact'])->name('contact.indexen');
  
    Route::post('/subscripe-submit', [HomeController::class, 'subscribe'])->name('front.subscripe.submit');
    Route::get('/appointments', [HomeController::class, 'BookNow'])->name('appointments.indexen');
    Route::get('/doctors', [HomeController::class, 'doctors'])->name('doctors.indexen');

    Route::get('/dentistry', [HomeController::class, 'dentistry'])->name('dentistry.indexen');
    Route::get('/invisalign', [HomeController::class, 'invisalign'])->name('invisalign.indexen');
    Route::get('/veneers', [HomeController::class, 'veneers'])->name('veneers.indexen');
    Route::get('/dental-implants', [HomeController::class, 'dental_implants'])->name('dental-implants.indexen');


    Route::get('/blogs/{blog}', [HomeController::class, 'singleBlogen'])->name('single-blog.indexen');
  });
  Route::post('/contact-submit', [HomeController::class, 'contactemail'])->name('front.contact.submit');

  Route::get('/import-xml', [HomeController::class, 'import_xml'])->name('import_xml.index');


  Route::get('/contact/refresh_code', [HomeController::class, 'refresh_code'])->name('refresh_code.index');



  Route::get('/languages/change/{id}', [HomeController::class, 'change'])->name('front.lang-change');
});
