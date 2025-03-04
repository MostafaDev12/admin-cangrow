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


    // Route::get('/', function () {

    //     $data = Language::where('is_default', '=', '1')->first();

    //     return Redirect::to('/' . $data->sign);
    // });

    Route::prefix('{lang}')->group(function () {});


        Route::get('/', [HomeController::class, 'index'])->name('front.index');
        Route::get('/عن-الشركه', [HomeController::class, 'about'])->name('about.index');
        Route::get('/services', [HomeController::class, 'services'])->name('services.index');
        Route::get('/projects', [HomeController::class, 'projects'])->name('projects.index');

        Route::get('/services/{slug}', [HomeController::class, 'singleService'])->name('single-service.index');

        Route::get('/category/{slug}', [HomeController::class, 'blogsCategory'])->name('blogs-category.index');

        Route::get('/فيديوهات', [HomeController::class, 'videos'])->name('videos.index');
        Route::get('/news', [HomeController::class, 'news'])->name('news.index');    
        Route::get('/المقالات', [HomeController::class, 'blogs'])->name('blogs.index');    
        
        Route::get('/اتصل-بنا', [HomeController::class, 'contact'])->name('contact.index');
        Route::post('/contact-submit', [HomeController::class, 'contactemail'])->name('front.contact.submit');
        Route::get('/احجز-الان', [HomeController::class, 'BookNow'])->name('book.index');

        Route::get('/contact/refresh_code', [HomeController::class, 'refresh_code'])->name('refresh_code.index');
        
    
        Route::get('/import-xml', [HomeController::class, 'import_xml'])->name('import_xml.index');
    

        Route::get('news/{new}', [HomeController::class, 'singleNews'])->name('single-news.index');
        Route::get('/{blog}', [HomeController::class, 'singleBlog'])->name('single-blog.index');

        
        Route::get('/languages/change/{id}', [HomeController::class, 'change'])->name('front.lang-change');


});
