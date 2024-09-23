<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\FrontController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
// git clone https://github.com/MostafaDev12/admin-cangrow.git
// git clone --branch branch-name https://github.com/MostafaDev12/admin-cangrow.git
// git pull origin branch-name


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});



Route::get('/sliders',  [FrontController::class, 'sliders']);
Route::get('/teams',  [FrontController::class, 'partners']);
Route::get('/services',  [FrontController::class, 'services']);
Route::get('/single-service/{id}',  [FrontController::class, 'singleService']);
Route::get('/settings',  [FrontController::class, 'settings']);
Route::get('/about-us',  [FrontController::class, 'about_us']);
Route::get('/portfolio',  [FrontController::class, 'portfolio']);
Route::get('/visitors',  [FrontController::class, 'visitors']);
Route::get('/models-category',  [FrontController::class, 'modelsCategory']);
Route::get('/models/{category_id}',  [FrontController::class, 'models']);

Route::get('/single-model/{id}',  [FrontController::class, 'Singlemodel']);

Route::post('/contact-submit',  [FrontController::class, 'contactSubmit']);
 

Route::post('/submit-subscriptions',  [FrontController::class, 'subscriptions']);
Route::post('/social-media',  [FrontController::class, 'social_settings']);
Route::get('/about-us-models',  [FrontController::class, 'about_us_models']);
Route::get('/videos',  [FrontController::class, 'videos']);
Route::get('/galleries',  [FrontController::class, 'partners']);

Route::get('/categories',  [FrontController::class, 'categories']);
Route::get('/single-category/{id}',  [FrontController::class, 'singleCategory']);

Route::get('/blogs',  [FrontController::class, 'blogs']);
Route::get('/single-blog/{id}',  [FrontController::class, 'singleBlog']);
Route::get('/business',  [FrontController::class, 'portfolio']);
Route::get('/business-models',  [FrontController::class, 'about_us_models']);