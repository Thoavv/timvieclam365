<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\TrangchuController;
use App\Http\Controllers\Admin\PostsController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\UserController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/',[TrangchuController::class, 'index'])->name('index');
Route::get('/login',[UserController::class, 'login'])->name('login');
Route::post('/login',[UserController::class, 'postLogin'])->name('postLogin');
Route::get('/logout', [UserController::class, 'logout'])->name('logout');
// Route::get('/register',[UserController::class, 'register'])->name('register');
Route::post('/register',[UserController::class, 'postRegister'])->name('postRegister');
Route::middleware(['auth'])->group(function (){
    //các trang người dùng có thể truy cập khi đăng nhặp
});
Route::get('/register',[UserController::class, 'register'])->name('register');
Route::get('/logon',[AdminController::class, 'logon'])->name('logon');
Route::get('/singout',[AdminController::class, 'singout'])->name('singout');
Route::post('/logon',[AdminController::class, 'postLogon'])->name('postLogon');
Route::prefix('admin')->middleware('admin')->group(function(){
    Route::get('/', [HomeController::class, 'index'])->name('admin.index');
    // Route::get('/menu',[MenuController::class, 'index'])->name('menu.index');
    // Route::get('/admin/menus/create', [MenuController::class, 'create'])->name('menu.create');
    // Route::post('/admin/menus/store', [MenuController::class, 'store'])->name('menu.store');
    // Route::get('/admin/menus/{id}', [MenuController::class, 'show'])->name('menu.show');
    // Route::get('/admin/menus/destroy', [MenuController::class, 'destroy'])->name('menu.destroy');
    Route::resource('menu', MenuController::class);
    Route::resource('posts', PostsController::class);
});
