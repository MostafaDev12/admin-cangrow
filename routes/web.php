<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
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
 

Auth::routes();
Route::get('/sitemap-services.xml', \App\Http\Controllers\ServiceSitemapController::class)->name('services.sitemap');
Route::get('/{locale}/service/{slug}', \App\Http\Controllers\LegacyServiceRedirectController::class)
    ->where('locale', 'ar|en')->name('services.legacy');
//Language Translation
Route::get('index/{locale}', [App\Http\Controllers\HomeController::class, 'lang']);


//Route::get('{any}', [App\Http\Controllers\HomeController::class, 'index'])->name('index');


