<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AuthController;

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
});
Route::get('/dashboard', function () {
    return view('admin.dashboard');
})->name('admin.dashboard');



//################################## Route Admin ##############################################

Route::get('/login', [AuthController::class, 'loginPage'])->middleware('guest')->name('admin.login-page');

Route::post('/login', [AuthController::class, 'login'])->middleware('guest')->name('login.admin');

Route::get('/logout', [AuthController::class, 'logout'])->middleware('auth:admin')->name('logout.admin');

//#############################################################################################

