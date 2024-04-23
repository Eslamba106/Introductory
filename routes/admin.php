<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\PageController;
use App\Http\Controllers\Admin\ModeratorController;
use App\Http\Controllers\Admin\ListSettingsController;
use App\Http\Controllers\Admin\GeneralSettingsController;

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

####################################### General Settings ####################################

Route::get('/settings/general/index' , [GeneralSettingsController::class , 'index'])->name('admin.settings');
Route::get('/settings/general/edit' , [GeneralSettingsController::class , 'edit'])->name('admin.settings.edit');
Route::put('/settings/general/update/{id}' , [GeneralSettingsController::class , 'update'])->name('admin.settings.update');

####################################### List Settings ####################################

Route::get('/settings/list_settings' , [ListSettingsController::class , 'index'])->name('admin.list_settings');
Route::get('/settings/list_settings/edit' , [ListSettingsController::class , 'edit'])->name('admin.list_settings.edit');
Route::put('/settings/list_settings/update/{id}' , [ListSettingsController::class , 'update'])->name('admin.list_settings.update');

################################# Create Moderators  #########################

Route::get('moderators/index' , [ModeratorController::class , 'index'])->name('admin.moderator.index');
Route::get('moderators/create' , [ModeratorController::class , 'create'])->name('admin.moderator.create');
Route::post('moderators/store' , [ModeratorController::class , 'store'])->name('admin.moderator.store');
// Route::get('moderators/show/{id}' , [ModeratorController::class , 'show'])->name('admin.moderator.show');
Route::get('moderators/edit/{id}' , [ModeratorController::class , 'edit'])->name('admin.moderator.edit');
Route::put('moderators/update/{id}' , [ModeratorController::class , 'update'])->name('admin.moderator.update');
Route::delete('moderators/delete/{id}' , [ModeratorController::class , 'destroy'])->name('admin.moderator.destroy');

################################# Blog Department  #########################

Route::get('/blog/department/index' , [BlogController::class , 'index'])->name('admin.blog_department.index');
Route::post('/blog/department/store' , [BlogController::class , 'store'])->name('admin.blog_department.store');
Route::put('/blog/department/update' , [BlogController::class , 'update'])->name('admin.blog_department.update');
Route::delete('/blog/department/delete' , [BlogController::class , 'delete'])->name('admin.blog_department.delete');

################################ Blog Department ###########################

// Route::middleware(['auth:admin'])->group(function(){
//     Route::resource('/moderator', ModeratorController::class);
//     Route::resource('roles', RoleController::class);
// }); 

