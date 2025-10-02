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


Route::middleware(['IpLocation', 'FrontLanguages'])->group(function () {

    //------------ ADMIN DASHBOARD & PROFILE SECTION ------------



        Route::get('change/{id}', [HomeController::class, 'change'])->name('change-lang.index');
        
 Route::post('/subscripe-submit', [HomeController::class, 'subscribe'])->name('front.subscripe.submit');
       

           Route::post('/contact-submit', [HomeController::class, 'contactemail'])->name('front.contact.submit');
      
        Route::get('/contact/refresh_code', [HomeController::class, 'refresh_code'])->name('refresh_code.index');
        

        Route::get('/import-xml', [HomeController::class, 'import_xml'])->name('import_xml.index');
    

    Route::get('/', function () {

        $data = Language::where('is_default', '=', '1')->first();

        return Redirect::to('/' . $data->sign);
    });

    Route::prefix('{lang}')->group(function () {

 Route::get('/', [HomeController::class, 'index'])->name('front.index');
        Route::get('/about-us', [HomeController::class, 'about'])->name('about.index');
        Route::get('/service', [HomeController::class, 'services'])->name('services.index');

     
        Route::get('/service/{slug?}', [HomeController::class, 'singleService'])->name('single-service.index');
         Route::get('/gallery/{slug?}', [HomeController::class, 'gallery'])->name('gallery.index');
          Route::get('/services-category/{slug?}', [HomeController::class, 'singleCategoryService'])->name('single-category-service.index');

        Route::get('/category/{slug}', [HomeController::class, 'blogsCategory'])->name('blogs-category.index');

        Route::get('/فيديوهات', [HomeController::class, 'videos'])->name('videos.index');
       
        Route::get('/blogs', [HomeController::class, 'blogs'])->name('blogs.index');    
        Route::get('/careers', [HomeController::class, 'careers'])->name('careers.index');    
        
        Route::get('/contact-us', [HomeController::class, 'contact'])->name('contact.index');
      Route::get('/appointments', [HomeController::class, 'BookNow'])->name('appointments.index');
        Route::get('/doctors', [HomeController::class, 'doctors'])->name('doctors.index');
      
        Route::get('/dentistry', [HomeController::class, 'dentistry'])->name('dentistry.index');
        Route::get('/invisalign', [HomeController::class, 'invisalign'])->name('invisalign.index');
        Route::get('/veneers', [HomeController::class, 'veneers'])->name('veneers.index');
        Route::get('/dental-implants', [HomeController::class, 'dental_implants'])->name('dental-implants.index');

    
        Route::get('/references/{id?}', [HomeController::class, 'singleModelCategory'])->name('single-model-category.index');
    

        Route::get('/{blog}', [HomeController::class, 'singleBlog'])->name('single-blog.index');

    });

        
   });
 
