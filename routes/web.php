<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\front\BlogController;
use App\Http\Controllers\front\HomeController;
use App\Http\Controllers\front\JobsController;
use App\Http\Controllers\front\NewsAdsController;
use App\Http\Controllers\front\KnowledgeCenterController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
######################################### LANGUAGE ROUTE ######################################

Route::get('lang/{locale}', function ($locale) {
    if (in_array($locale, ['en', 'ar'])) {
    session()->put('locale', $locale);
    }
    return redirect()->back();
})->name('lang'); 
require __DIR__.'/admin.php';
Route::get('/'  , [HomeController::class , 'index'])->name('home');
Route::get('/blog'  , [BlogController::class , 'index'])->name('blog');
Route::get('/news'  , [NewsAdsController::class , 'index'])->name('news');
Route::get('/knowledge_center'  , [KnowledgeCenterController::class , 'index'])->name('knowledge_center');
Route::get('/jobs'  , [JobsController::class , 'index'])->name('jobs');
Route::get('/application/{slug}'  , [JobsController::class , 'application'])->name('application');
Route::post('/application'  , [JobsController::class , 'store'])->name('store-application');
// Route::get('/verify_email/{code}'  , [JobsController::class , 'verifyEmailView'])->name('verify_code_view');
Route::post('/verify_email'  , [JobsController::class , 'verifyEmail'])->name('verify_code');
require __DIR__.'/moderator.php';
