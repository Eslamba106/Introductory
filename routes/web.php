<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\front\Blogcontroller;
use App\Http\Controllers\front\Homecontroller;

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
Route::get('/'  , [Homecontroller::class , 'index'])->name('home');
Route::get('/blog'  , [Blogcontroller::class , 'index'])->name('blog');
require __DIR__.'/moderator.php';
