<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\moderator\AuthController;
use App\Http\Controllers\moderator\BlogController;
use App\Http\Controllers\moderator\NewsController;
use App\Http\Controllers\moderator\PageController;
use App\Http\Controllers\moderator\ArticalController;
use App\Http\Controllers\moderator\DashboardController;
use App\Http\Controllers\moderator\KnowledgeController;
use App\Http\Controllers\moderator\ModeratorController;
use App\Http\Controllers\moderator\ListSettingsController;
use App\Http\Controllers\moderator\NewsCategoryController;
use App\Http\Controllers\moderator\GeneralSettingsController;
use App\Http\Controllers\moderator\KnowledgeCategoryController;

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
Route::get('dashboard', [DashboardController::class,'index'])->name('moderator.dashboard')->middleware('auth.type:moderator');

//################################## Route moderator ##############################################

Route::get('/login', [AuthController::class, 'loginPage'])->middleware('guest')->name('moderator.login-page');

Route::post('/login', [AuthController::class, 'login'])->middleware('guest')->name('login.moderator');

Route::get('/logout', [AuthController::class, 'logout'])->middleware('auth.type:moderator')->name('logout.moderator');


################################# Blog Department  #########################

Route::get('/blog/department/index' , [BlogController::class , 'index'])->name('user.blog_department.index');
Route::post('/blog/department/store' , [BlogController::class , 'store'])->name('user.blog_department.store');
Route::put('/blog/department/update' , [BlogController::class , 'update'])->name('user.blog_department.update');
Route::delete('/blog/department/delete' , [BlogController::class , 'delete'])->name('user.blog_department.delete');

################################ Blog Department ###########################


################################ Blog Artical ###########################

Route::get('/blog/artical/index' , [ArticalController::class ,"index"])->name('user.blog_artical.index');
Route::get('/blog/artical/edit/{id}' , [ArticalController::class ,"edit"])->name('user.blog_artical.edit');
Route::get('/blog/artical/show/{id}' , [ArticalController::class ,"show"])->name('user.blog_artical.show');
Route::post('/blog/artical/store' , [ArticalController::class ,"store"])->name('user.blog_artical.store');
Route::put('/blog/artical/update/{id}' , [ArticalController::class ,"update"])->name('user.blog_artical.update');
Route::delete('/blog/artical/delete' , [ArticalController::class ,"delete"])->name('user.blog_artical.delete');

################################ Blog Artical ###########################

################################# News Categories  #########################

Route::get('/news/categories/index' , [NewsCategoryController::class , 'index'])->name('user.news_categories.index');
Route::post('/news/categories/store' , [NewsCategoryController::class , 'store'])->name('user.news_categories.store');
Route::put('/news/categories/update' , [NewsCategoryController::class , 'update'])->name('user.news_categories.update');
Route::delete('/news/categories/delete' , [NewsCategoryController::class , 'delete'])->name('user.news_categories.delete');

################################ News Categories ###########################

Route::get('/news/news_ads/index' , [NewsController::class , 'index'])->name('user.news_ads.index');
Route::get('/news/news_ads/edit/{id}' , [NewsController::class , 'edit'])->name('user.news_ads.edit');
Route::get('/news/news_ads/show/{id}' , [NewsController::class , 'show'])->name('user.news_ads.show');
Route::post('/news/news_ads/store' , [NewsController::class , 'store'])->name('user.news_ads.store');
Route::put('/news/news_ads/update' , [NewsController::class , 'update'])->name('user.news_ads.update');
Route::delete('/news/news_ads/delete' , [NewsController::class , 'delete'])->name('user.news_ads.delete');

############################################################################

########################### Knowledge Category #############################


Route::get('/knowledge/categories/index' , [KnowledgeCategoryController::class , 'index'])->name('user.knowledge_categories.index');
Route::post('/knowledge/categories/store' , [KnowledgeCategoryController::class , 'store'])->name('user.knowledge_categories.store');
Route::put('/knowledge/categories/update' , [KnowledgeCategoryController::class , 'update'])->name('user.knowledge_categories.update');
Route::delete('/knowledge/categories/delete' , [KnowledgeCategoryController::class , 'delete'])->name('user.knowledge_categories.delete');

#############################################################################

############################## Knowledge Center #############################


Route::get('/knowledge/center/index' , [KnowledgeController::class , 'index'])->name('user.knowledge_center.index');
Route::get('/knowledge/center/edit/{id}' , [KnowledgeController::class , 'edit'])->name('user.knowledge_center.edit');
Route::get('/knowledge/center/show/{id}' , [KnowledgeController::class , 'show'])->name('user.knowledge_center.show');
Route::post('/knowledge/center/store' , [KnowledgeController::class , 'store'])->name('user.knowledge_center.store');
Route::put('/knowledge/center/update' , [KnowledgeController::class , 'update'])->name('user.knowledge_center.update');
Route::delete('/knowledge/center/delete' , [KnowledgeController::class , 'delete'])->name('user.knowledge_center.delete');

#############################################################################

// Route::middleware(['auth.type:moderator'])->group(function(){
//     Route::resource('/moderator', ModeratorController::class);
//     Route::resource('roles', RoleController::class);
// });







// Route::middleware(['auth.type:admin'])->group(function(){
//     Route::resource('/moderator', ModeratorController::class);
//     Route::resource('roles', RoleController::class);
// }); 

