<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\TrangchuController;
use App\Http\Controllers\Admin\PostsController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ViecLamController;
use App\Http\Controllers\TuyendungController;
use App\Http\Controllers\Account\GoidangController;
use App\Http\Controllers\GioithieuController;
use App\Http\Controllers\Account\AccountController;
use App\Http\Controllers\Account\DangtuyenController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\UsersController;

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/',[TrangchuController::class, 'index'])->name('index');
//phan tim kiem
Route::get('/search', [TrangchuController::class, 'search'])->name('search');
//phan viec lam
Route::get('/vieclam',[ViecLamController::class, 'index'])->name('vieclam');
// Định nghĩa route cho chi tiết một việc làm
Route::get('/vieclam/{id}', [ViecLamController::class, 'show'])->name('vieclam.show');
//Giới thiệu
Route::get('/gioithieu', [GioithieuController::class, 'index'])->name('gioithieu');


//phần đăng nhâp
Route::get('/login',[UserController::class, 'login'])->name('login');
Route::post('/login',[UserController::class, 'postLogin'])->name('postLogin');
Route::get('/logout', [UserController::class, 'logout'])->name('logout');
Route::post('/change-password', [UserController::class, 'changePassword'])->name('change.password');
Route::get('/change-password', [UserController::class, 'changePasswordForm'])->name('change.password.form');

// Route::get('/register',[UserController::class, 'register'])->name('register');
Route::post('/register',[UserController::class, 'postRegister'])->name('postRegister');

//phần tuyển dụng
Route::get('/goidang',[GoidangController::class, 'index'])->name('goidang');
Route::get('thanhtoan/{id}',[GoidangController::class, 'pay'])->name('thanhtoan');
Route::get('thanhtoanok/{id}',[GoidangController::class, 'payok'])->name('thanhtoanok');


Route::get('/tuyendung',[TuyendungController::class, 'index'])->name('tuyendung');
//check gói
Route::middleware(['checkgoi'])->group(function (){

});
//check đăng nhập
Route::middleware(['auth'])->group(function (){

});
Route::get('/register',[UserController::class, 'register'])->name('register');
Route::get('/logon',[AdminController::class, 'logon'])->name('logon');
Route::get('/singout',[AdminController::class, 'singout'])->name('singout');
Route::post('/logon',[AdminController::class, 'postLogon'])->name('postLogon');

//xác thục người dùng admin đã đang nhập
Route::prefix('admin')->middleware('admin')->group(function(){
    Route::get('/', [HomeController::class, 'index'])->name('admin.index');
    // Route::get('/menu',[MenuController::class, 'index'])->name('menu.index');
    // Route::get('/admin/menus/create', [MenuController::class, 'create'])->name('menu.create');
    // Route::post('/admin/menus/store', [MenuController::class, 'store'])->name('menu.store');
    // Route::get('/admin/menus/{id}', [MenuController::class, 'show'])->name('menu.show');
    // Route::get('/admin/menus/destroy', [MenuController::class, 'destroy'])->name('menu.destroy');

    Route::resource('menu', MenuController::class);
    Route::resource('posts', PostsController::class);
    Route::put('/posts/{post}/update-status', [PostsController::class, 'updateStatus'])->name('posts.update_status');
    Route::resource('order', OrderController::class);
    Route::resource('users', UsersController::class);
});

//quan ly tài khoản cá nhân
Route::get('/account', [AccountController::class, 'index'])->name('account');
Route::resource('dangtuyen', DangtuyenController::class);

