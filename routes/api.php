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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});



Route::get('/sliders',  [FrontController::class, 'sliders']);
Route::get('/partners',  [FrontController::class, 'partners']);
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