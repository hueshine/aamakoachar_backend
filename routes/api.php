<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AppController;

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

Route::get('homepage',[AppController::class,'getHomePageData'])->name('homepage');
Route::get('about',[AppController::class,'getAboutUsData'])->name('about');
Route::get('shops',[AppController::class,'getShopData'])->name('shop');
Route::get('contact',[AppController::class,'getContactData'])->name('contact');
Route::post('contact-form',[AppController::class,'contactForm'])->name('contact.sendmail');
Route::get('product',[AppController::class,'getProductData'])->name('product');


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
