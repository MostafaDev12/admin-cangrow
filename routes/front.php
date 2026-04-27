<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\FrontPagesController;
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


// Sitemap — registered outside the IpLocation/FrontLanguages middleware so
// crawlers don't trigger session writes or geo-IP lookups.
Route::get('/sitemap.xml', [FrontPagesController::class, 'sitemap'])->name('front.sitemap');


Route::middleware(['IpLocation', 'FrontLanguages'])->group(function () {

    //------------ ADMIN DASHBOARD & PROFILE SECTION ------------


    

     Route::get('change/{id}', [HomeController::class, 'change'])->name('change-lang.index');

        
    Route::get('/', function () {

        $data = Language::where('is_default', '=', '1')->first();

        return Redirect::to('/' . $data->sign);
    });

    Route::prefix('{lang}')->group(function () {

        // Per-lang homepage now resolved through the dynamic Pages system
        // (slug = "home"). Route name is preserved for compatibility with the
        // 19 Blade files / HomeController references that call route('front.index').
        Route::get('/', [FrontPagesController::class, 'show'])->name('front.index');

        Route::get('/about-us', [HomeController::class, 'about'])->name('about.index');
        Route::get('/products', [HomeController::class, 'products'])->name('products.index');
        Route::get('/services', [HomeController::class, 'services'])->name('services.index');


        Route::get('/farm-to-fork', [HomeController::class, 'farm_to_fork'])->name('farm-to-fork.index');

        Route::get('/b2b-services', [HomeController::class, 'b2b_services'])->name('b2b-services.index');
        Route::get('/quality', [HomeController::class, 'quality'])->name('quality.index');
        Route::get('/quality-list/{id}', [HomeController::class, 'quality_list'])->name('quality_list.index');


        Route::get('/careers', [HomeController::class, 'careers'])->name('careers.index');
        Route::get('/certificate', [HomeController::class, 'certificate'])->name('certificate.index');
        Route::get('/success-volunteers', [HomeController::class, 'success_volunteers'])->name('success-volunteers.index');
        Route::get('/agenda', [HomeController::class, 'agenda'])->name('agenda.index');
        Route::get('/donate-campaigns', [HomeController::class, 'donate_campaigns'])->name('donate_campaigns.index');
     
        Route::get('/donate-campaign/{slug}', [HomeController::class, 'singleDonate_campaigns'])->name('single-donate_campaigns.index');
        Route::get('/cross-bank-donation', [HomeController::class, 'cross_bank_donation'])->name('cross-bank-donation.index');
        Route::get('/contributions-kind', [HomeController::class, 'contributions_kind'])->name('contributions-kind.index');
        Route::get('/humanitarian-cases', [HomeController::class, 'humanitarian_cases'])->name('humanitarian-cases.index');
        Route::get('/about-volunteering', [HomeController::class, 'About_volunteering'])->name('About_volunteering.index');
        Route::get('/be-volunteer', [HomeController::class, 'be_volunteer'])->name('be-volunteer.index');
        Route::get('/stories-success-volunteers', [HomeController::class, 'stories_success_volunteers'])->name('stories-success-volunteers.index');
        Route::get('/privacy', [HomeController::class, 'privacy'])->name('privacy.index');
        Route::get('/events', [HomeController::class, 'events'])->name('events.index');
     
        Route::get('/event/{slug}', [HomeController::class, 'singleEvent'])->name('single-events.index');
     
        Route::get('/parties', [HomeController::class, 'parties'])->name('parties.index');
     
        Route::get('/party/{slug}', [HomeController::class, 'singleParty'])->name('single-parties.index');

        Route::get('/product/{slug}', [HomeController::class, 'singleProduct'])->name('single-service.index');
         Route::get('/gallery', [HomeController::class, 'gallery'])->name('gallery.index');
          Route::get('/services-category/{slug}', [HomeController::class, 'singleCategoryService'])->name('single-category-service.index');
         
          Route::get('/service/{slug}', [HomeController::class, 'singleService'])->name('single-service-service.index');

        Route::get('/category/{slug}', [HomeController::class, 'blogsCategory'])->name('blogs-category.index');

        Route::get('/locations', [HomeController::class, 'locations'])->name('locations.index');

        Route::get('/health-trust', [HomeController::class, 'blogs'])->name('blogs.index');
        Route::get('/reviews', [HomeController::class, 'reviews'])->name('reviews.index');

        Route::get('/contact-us', [HomeController::class, 'contact'])->name('contact.index');

    

        // Contact form submit handler (POST). Different verb than the GET below,
        // so no routing conflict with the Pages whitelist.
        // throttle:5,1 = 5 submissions per minute per IP (basic spam guard).
        Route::post('/contact', [FrontPagesController::class, 'submitContact'])
            ->middleware('throttle:5,1')
            ->name('front.bekdash.contact.submit');

        // Bekdash dynamic Pages — registered BEFORE the legacy /{blog} catch-all
        // but constrained to the explicit slug whitelist below, so any other
        // slug falls through to HomeController::singleBlog as before.
        // To add a new Bekdash page: append the slug to the where() pattern AND
        // seed it in BekdashPageSeeder.
        Route::get('/{slug}', [FrontPagesController::class, 'show'])
            ->name('front.bekdash.page')
            ->where('slug', 'home|about|goals|principles|contact');

        Route::get('/{blog}', [HomeController::class, 'singleBlog'])->name('single-blog.index');

        Route::get('/references/{id}', [HomeController::class, 'singleModelCategory'])->name('single-model-category.index');
    
    });
         Route::get('/agenda/events/{date}', [HomeController::class, 'getAgendaEvents'])->name('agenda.events');

     
 Route::post('/subscripe-submit', [HomeController::class, 'subscribe'])->name('front.subscripe.submit');
       

           Route::post('/contact-submit', [HomeController::class, 'contactemail'])->name('front.contact.submit');
      
        Route::get('/contact/refresh_code', [HomeController::class, 'refresh_code'])->name('refresh_code.index');
        

        Route::get('/import-xml', [HomeController::class, 'import_xml'])->name('import_xml.index');
    

   });
 
