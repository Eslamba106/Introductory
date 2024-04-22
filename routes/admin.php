<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\PageController;
use App\Http\Controllers\Admin\SettingsController;

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

    Route::get('/', function () {
        return view('admin.dashboard');
    })->middleware('auth:admin');
Route::get('/dashboard', function () {
    return view('admin.dashboard');
})->name('admin.dashboard')->middleware('auth:admin');



//################################## Route Admin ##############################################

Route::get('/login', [AuthController::class, 'loginPage'])->middleware('guest')->name('admin.login-page');

Route::post('/login', [AuthController::class, 'login'])->middleware('guest')->name('login.admin');

Route::get('/logout', [AuthController::class, 'logout'])->middleware('auth:admin')->name('logout.admin');

################################### Pages ##############################################

Route::get('pages/index' , [PageController::class , 'index'])->name('admin.page.index');
Route::get('pages/create' , [PageController::class , 'create'])->name('admin.create-page');
Route::post('pages/store' , [PageController::class , 'store'])->name('admin.store-page');
Route::post('pages/store-image' , [PageController::class , 'upload'])->name('admin.store-image');
Route::get('pages/show/{slug}' , [PageController::class , 'show'])->name('admin.page-show');
Route::get('pages/edit/{slug}' , [PageController::class , 'show'])->name('admin.page.edit');
Route::delete('pages/delete/{slug}' , [PageController::class , 'destroy'])->name('admin.page.destroy');

########################################################################################

Route::get('/settings/index' , [SettingsController::class , 'index'])->name('settings');
Route::get('/settings/list_settings' , [SettingsController::class , 'list'])->name('list_settings');