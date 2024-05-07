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
use App\Http\Controllers\Admin\EmploymentController;
use App\Http\Controllers\Admin\ListSettingsController;
use App\Http\Controllers\Admin\NewsCategoryController;
use App\Http\Controllers\Admin\EmploymentModelController;
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

Route::get('/dashboard', function () {
    return view('admin.dashboard');
})->name('admin.dashboard')->middleware('auth.type:admin');



//################################## Route Admin ##############################################

Route::get('/login', [AuthController::class, 'loginPage'])->middleware('guest')->name('admin.login-page');

Route::post('/login', [AuthController::class, 'login'])->middleware('guest')->name('login.admin');

Route::get('/logout', [AuthController::class, 'logout'])->middleware('auth.type:admin')->name('logout.admin');

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

// Route::get('moderators/index' , [ModeratorController::class , 'index'])->name('admin.moderator.index');
// Route::get('moderators/create' , [ModeratorController::class , 'create'])->name('admin.moderator.create');
// Route::post('moderators/store' , [ModeratorController::class , 'store'])->name('admin.moderator.store');
// Route::get('moderators/show/{id}' , [ModeratorController::class , 'show'])->name('admin.moderator.show');
// Route::get('moderators/edit/{id}' , [ModeratorController::class , 'edit'])->name('admin.moderator.edit');
// Route::put('moderators/update/{id}' , [ModeratorController::class , 'update'])->name('admin.moderator.update');
// Route::delete('moderators/delete/{id}' , [ModeratorController::class , 'destroy'])->name('admin.moderator.destroy');

################################# Blog Department  #########################

Route::get('/blog/department/index' , [BlogController::class , 'index'])->name('admin.blog_department.index');
Route::post('/blog/department/store' , [BlogController::class , 'store'])->name('admin.blog_department.store');
Route::put('/blog/department/update' , [BlogController::class , 'update'])->name('admin.blog_department.update');
Route::delete('/blog/department/delete' , [BlogController::class , 'delete'])->name('admin.blog_department.delete');

################################ Blog Department ###########################


################################ Blog Artical ###########################

Route::get('/blog/artical/index' , [ArticalController::class ,"index"])->name('admin.blog_artical.index');
Route::get('/blog/artical/edit/{id}' , [ArticalController::class ,"edit"])->name('admin.blog_artical.edit');
Route::get('/blog/artical/show/{id}' , [ArticalController::class ,"show"])->name('admin.blog_artical.show');
Route::post('/blog/artical/store' , [ArticalController::class ,"store"])->name('admin.blog_artical.store');
Route::put('/blog/artical/update/{id}' , [ArticalController::class ,"update"])->name('admin.blog_artical.update');
Route::delete('/blog/artical/delete' , [ArticalController::class ,"delete"])->name('admin.blog_artical.delete');

################################ Blog Artical ###########################

################################# News Categories  #########################

Route::get('/news/categories/index' , [NewsCategoryController::class , 'index'])->name('admin.news_categories.index');
Route::post('/news/categories/store' , [NewsCategoryController::class , 'store'])->name('admin.news_categories.store');
Route::put('/news/categories/update' , [NewsCategoryController::class , 'update'])->name('admin.news_categories.update');
Route::delete('/news/categories/delete' , [NewsCategoryController::class , 'delete'])->name('admin.news_categories.delete');

################################ News Categories ###########################

Route::get('/news/news_ads/index' , [NewsController::class , 'index'])->name('admin.news_ads.index');
Route::get('/news/news_ads/edit/{id}' , [NewsController::class , 'edit'])->name('admin.news_ads.edit');
Route::get('/news/news_ads/show/{id}' , [NewsController::class , 'show'])->name('admin.news_ads.show');
Route::post('/news/news_ads/store' , [NewsController::class , 'store'])->name('admin.news_ads.store');
Route::put('/news/news_ads/update' , [NewsController::class , 'update'])->name('admin.news_ads.update');
Route::delete('/news/news_ads/delete' , [NewsController::class , 'delete'])->name('admin.news_ads.delete');

############################################################################

########################### Knowledge Category #############################


Route::get('/knowledge/categories/index' , [KnowledgeCategoryController::class , 'index'])->name('admin.knowledge_categories.index');
Route::post('/knowledge/categories/store' , [KnowledgeCategoryController::class , 'store'])->name('admin.knowledge_categories.store');
Route::put('/knowledge/categories/update' , [KnowledgeCategoryController::class , 'update'])->name('admin.knowledge_categories.update');
Route::delete('/knowledge/categories/delete' , [KnowledgeCategoryController::class , 'delete'])->name('admin.knowledge_categories.delete');

#############################################################################

############################## Knowledge Center #############################


Route::get('/knowledge/center/index' , [KnowledgeController::class , 'index'])->name('admin.knowledge_center.index');
Route::get('/knowledge/center/edit/{id}' , [KnowledgeController::class , 'edit'])->name('admin.knowledge_center.edit');
Route::get('/knowledge/center/show/{id}' , [KnowledgeController::class , 'show'])->name('admin.knowledge_center.show');
Route::post('/knowledge/center/store' , [KnowledgeController::class , 'store'])->name('admin.knowledge_center.store');
Route::put('/knowledge/center/update' , [KnowledgeController::class , 'update'])->name('admin.knowledge_center.update');
Route::delete('/knowledge/center/delete' , [KnowledgeController::class , 'delete'])->name('admin.knowledge_center.delete');

#############################################################################

################################# Employment Section ########################

Route::get('/job' , [EmploymentController::class , 'index'])->name('admin.job');
Route::get('/job/edit/{id}' , [EmploymentController::class , 'edit'])->name('admin.job.edit');
Route::post('/job/store' , [EmploymentController::class , 'store'])->name('admin.job.store');
Route::put('/job/update/{id}' , [EmploymentController::class , 'update'])->name('admin.job.update');
Route::delete('/job/delete' , [EmploymentController::class , 'delete'])->name('admin.job.delete');

#############################################################################

################################# Employment Model Section ########################

Route::get('/job_model' , [EmploymentModelController::class , 'index'])->name('admin.job_model');
Route::get('/job_model/edit/{id}' , [EmploymentModelController::class , 'edit'])->name('admin.job_model.edit');
Route::post('/job_model/store' , [EmploymentModelController::class , 'store'])->name('admin.job_model.store');
Route::put('/job_model/update/{id}' , [EmploymentModelController::class , 'update'])->name('admin_model.job.update');
Route::delete('/job_model/delete' , [EmploymentModelController::class , 'delete'])->name('admin.job_model.delete');

#############################################################################

Route::middleware(['auth.type:admin'])->group(function(){
    Route::resource('/moderator', ModeratorController::class);
    Route::resource('roles', RoleController::class);
});







// Route::middleware(['auth.type:admin'])->group(function(){
//     Route::resource('/moderator', ModeratorController::class);
//     Route::resource('roles', RoleController::class);
// }); 

