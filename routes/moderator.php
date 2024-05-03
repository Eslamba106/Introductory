<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\NewsController;
use App\Http\Controllers\Admin\PageController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\ArticalController;
use App\Http\Controllers\Admin\KnowledgeController;
use App\Http\Controllers\Admin\ModeratorController;
use App\Http\Controllers\Admin\ListSettingsController;
use App\Http\Controllers\Admin\NewsCategoryController;
use App\Http\Controllers\Admin\GeneralSettingsController;
use App\Http\Controllers\Admin\KnowledgeCategoryController;

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

    // Route::get('/', function () {
    //     return view('admin.dashboard');
    // })->middleware('auth.type:admin');
Route::get('/dashboard', function () {
    return view('moderator.dashboard');
})->name('moderator.dashboard')->middleware('auth.type:moderator');



//################################## Route moderator ##############################################

Route::get('/login', [AuthController::class, 'loginPage'])->middleware('guest')->name('moderator.login-page');

Route::post('/login', [AuthController::class, 'login'])->middleware('guest')->name('login.moderator');

Route::get('/logout', [AuthController::class, 'logout'])->middleware('auth.type:moderator')->name('logout.moderator');

################################### Pages ##############################################

Route::get('pages/index' , [PageController::class , 'index'])->name('moderator.page.index');
Route::get('pages/create' , [PageController::class , 'create'])->name('moderator.create-page');
Route::post('pages/store' , [PageController::class , 'store'])->name('moderator.store-page');
Route::post('pages/store-image' , [PageController::class , 'upload'])->name('moderator.store-image');
Route::get('pages/show/{slug}' , [PageController::class , 'show'])->name('moderator.page-show');
Route::get('pages/edit/{slug}' , [PageController::class , 'show'])->name('moderator.page.edit');
Route::delete('pages/delete/{slug}' , [PageController::class , 'destroy'])->name('moderator.page.destroy');

########################################################################################

####################################### General Settings ####################################

Route::get('/settings/general/index' , [GeneralSettingsController::class , 'index'])->name('moderator.settings');
Route::get('/settings/general/edit' , [GeneralSettingsController::class , 'edit'])->name('moderator.settings.edit');
Route::put('/settings/general/update/{id}' , [GeneralSettingsController::class , 'update'])->name('moderator.settings.update');

####################################### List Settings ####################################

Route::get('/settings/list_settings' , [ListSettingsController::class , 'index'])->name('moderator.list_settings');
Route::get('/settings/list_settings/edit' , [ListSettingsController::class , 'edit'])->name('moderator.list_settings.edit');
Route::put('/settings/list_settings/update/{id}' , [ListSettingsController::class , 'update'])->name('moderator.list_settings.update');

################################# Create Moderators  #########################

// Route::get('moderators/index' , [ModeratorController::class , 'index'])->name('moderator.moderator.index');
// Route::get('moderators/create' , [ModeratorController::class , 'create'])->name('moderator.moderator.create');
// Route::post('moderators/store' , [ModeratorController::class , 'store'])->name('moderator.moderator.store');
// Route::get('moderators/show/{id}' , [ModeratorController::class , 'show'])->name('moderator.moderator.show');
// Route::get('moderators/edit/{id}' , [ModeratorController::class , 'edit'])->name('moderator.moderator.edit');
// Route::put('moderators/update/{id}' , [ModeratorController::class , 'update'])->name('moderator.moderator.update');
// Route::delete('moderators/delete/{id}' , [ModeratorController::class , 'destroy'])->name('moderator.moderator.destroy');

################################# Blog Department  #########################

Route::get('/blog/department/index' , [BlogController::class , 'index'])->name('moderator.blog_department.index');
Route::post('/blog/department/store' , [BlogController::class , 'store'])->name('moderator.blog_department.store');
Route::put('/blog/department/update' , [BlogController::class , 'update'])->name('moderator.blog_department.update');
Route::delete('/blog/department/delete' , [BlogController::class , 'delete'])->name('moderator.blog_department.delete');

################################ Blog Department ###########################


################################ Blog Artical ###########################

Route::get('/blog/artical/index' , [ArticalController::class ,"index"])->name('moderator.blog_artical.index');
Route::get('/blog/artical/edit/{id}' , [ArticalController::class ,"edit"])->name('moderator.blog_artical.edit');
Route::get('/blog/artical/show/{id}' , [ArticalController::class ,"show"])->name('moderator.blog_artical.show');
Route::post('/blog/artical/store' , [ArticalController::class ,"store"])->name('moderator.blog_artical.store');
Route::put('/blog/artical/update/{id}' , [ArticalController::class ,"update"])->name('moderator.blog_artical.update');
Route::delete('/blog/artical/delete' , [ArticalController::class ,"delete"])->name('moderator.blog_artical.delete');

################################ Blog Artical ###########################

################################# News Categories  #########################

Route::get('/news/categories/index' , [NewsCategoryController::class , 'index'])->name('moderator.news_categories.index');
Route::post('/news/categories/store' , [NewsCategoryController::class , 'store'])->name('moderator.news_categories.store');
Route::put('/news/categories/update' , [NewsCategoryController::class , 'update'])->name('moderator.news_categories.update');
Route::delete('/news/categories/delete' , [NewsCategoryController::class , 'delete'])->name('moderator.news_categories.delete');

################################ News Categories ###########################

Route::get('/news/news_ads/index' , [NewsController::class , 'index'])->name('moderator.news_ads.index');
Route::get('/news/news_ads/edit/{id}' , [NewsController::class , 'edit'])->name('moderator.news_ads.edit');
Route::get('/news/news_ads/show/{id}' , [NewsController::class , 'show'])->name('moderator.news_ads.show');
Route::post('/news/news_ads/store' , [NewsController::class , 'store'])->name('moderator.news_ads.store');
Route::put('/news/news_ads/update' , [NewsController::class , 'update'])->name('moderator.news_ads.update');
Route::delete('/news/news_ads/delete' , [NewsController::class , 'delete'])->name('moderator.news_ads.delete');

############################################################################

########################### Knowledge Category #############################


Route::get('/knowledge/categories/index' , [KnowledgeCategoryController::class , 'index'])->name('moderator.knowledge_categories.index');
Route::post('/knowledge/categories/store' , [KnowledgeCategoryController::class , 'store'])->name('moderator.knowledge_categories.store');
Route::put('/knowledge/categories/update' , [KnowledgeCategoryController::class , 'update'])->name('moderator.knowledge_categories.update');
Route::delete('/knowledge/categories/delete' , [KnowledgeCategoryController::class , 'delete'])->name('moderator.knowledge_categories.delete');

#############################################################################

############################## Knowledge Center #############################


Route::get('/knowledge/center/index' , [KnowledgeController::class , 'index'])->name('moderator.knowledge_center.index');
Route::get('/knowledge/center/edit/{id}' , [KnowledgeController::class , 'edit'])->name('moderator.knowledge_center.edit');
Route::get('/knowledge/center/show/{id}' , [KnowledgeController::class , 'show'])->name('moderator.knowledge_center.show');
Route::post('/knowledge/center/store' , [KnowledgeController::class , 'store'])->name('moderator.knowledge_center.store');
Route::put('/knowledge/center/update' , [KnowledgeController::class , 'update'])->name('moderator.knowledge_center.update');
Route::delete('/knowledge/center/delete' , [KnowledgeController::class , 'delete'])->name('moderator.knowledge_center.delete');

#############################################################################

Route::middleware(['auth.type:moderator'])->group(function(){
    Route::resource('/moderator', ModeratorController::class);
    Route::resource('roles', RoleController::class);
});







// Route::middleware(['auth.type:admin'])->group(function(){
//     Route::resource('/moderator', ModeratorController::class);
//     Route::resource('roles', RoleController::class);
// }); 

