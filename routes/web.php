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
use App\Http\Controllers\Admin\UsersAdminController;
use App\Http\Controllers\Admin\NotificationController;
use App\Http\Controllers\Admin\PackagestorageController;
use App\Http\Controllers\NaphosoController;
use App\Http\Controllers\Account\ThongbaoController;
use App\Http\Controllers\Account\MygoidangController;
use App\Http\Controllers\Account\UngvienController;
use App\Http\Controllers\LikeController;




// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/',[TrangchuController::class, 'index'])->name('index');
//phan tim kiem
Route::get('/search', [TrangchuController::class, 'search'])->name('search');

// Định nghĩa route cho chi tiết một việc làm

//Giới thiệu
Route::get('/gioithieu', [GioithieuController::class, 'index'])->name('gioithieu');




//phần đăng nhâp
Route::get('/login',[UserController::class, 'login'])->name('login');
Route::post('/login',[UserController::class, 'postLogin'])->name('postLogin');
Route::get('/logout', [UserController::class, 'logout'])->name('logout');


// Route::get('/register',[UserController::class, 'register'])->name('register');
Route::post('/register',[UserController::class, 'postRegister'])->name('postRegister');
//tuyên dụng
Route::get('/account', [AccountController::class, 'index'])->name('account');
//xem thông báo user
Route::resource('thongbao', ThongbaoController::class);

Route::get('/tuyendung',[TuyendungController::class, 'index'])->name('tuyendung');
Route::get('/vieclam',[ViecLamController::class, 'index'])->name('vieclam');
Route::get('/vieclam/{id}', [ViecLamController::class, 'show'])->name('vieclam.show');
//check gói
// Route::middleware(['checkgoi'])->group(function (){
// });
//check đăng nhập
Route::middleware(['auth'])->group(function (){
//thay đổi mật khẩu
Route::post('/change-password', [UserController::class, 'changePassword'])->name('change.password');
Route::get('/change-password', [UserController::class, 'changePasswordForm'])->name('change.password.form');
//phan viec lam
Route::get('/vieclam/{id}/themhoso', [ViecLamController::class, 'themhoso'])->name('vieclam.themhoso');
//phần gói đăng
Route::get('goidang',[GoidangController::class, 'index'])->name('goidang');
Route::get('thanhtoan/{id}',[GoidangController::class, 'pay'])->name('thanhtoan');
Route::get('thanhtoanok/{id}',[GoidangController::class, 'payok'])->name('thanhtoanok');
//nap hồ sơ
Route::post('naphoso',[NaphosoController::class, 'naphoso'])->name('naphoso');
//ứng viên
Route::resource('ungvien', UngvienController::class);
Route::put('/candidates/{candidates}/update-status', [UngvienController::class, 'updateStatus'])->name('candidates.update_status');
//quan ly tài khoản cá nhân

Route::get('/profile', [AccountController::class, 'profile'])->name('profile');

//goi đăng
Route::resource('mygoidang', MygoidangController::class);

Route::resource('dangtuyen', DangtuyenController::class);
});
Route::get('/register',[UserController::class, 'register'])->name('register');
Route::get('/logon',[AdminController::class, 'logon'])->name('logon');
Route::get('/singout',[AdminController::class, 'singout'])->name('singout');
Route::post('/logon',[AdminController::class, 'postLogon'])->name('postLogon');

//xác thục người dùng admin đã đang nhập
Route::prefix('admin')->middleware('admin')->group(function(){
    Route::get('/', [HomeController::class, 'index'])->name('admin.index');
    Route::resource('menu', MenuController::class);
    Route::resource('posts', PostsController::class);
    Route::put('/posts/{post}/update-status', [PostsController::class, 'updateStatus'])->name('posts.update_status');
    Route::resource('order', OrderController::class);
    Route::put('/order/{order}/update-status', [OrderController::class, 'updateStatus'])->name('order.update_status');
    Route::resource('users', UsersAdminController::class);
    Route::put('/users/{users}/update-status', [UsersAdminController::class, 'updateStatus'])->name('users.update_status');
    //xem thông báo admin
    Route::resource('notification', NotificationController::class);
    Route::resource('packagestorage', PackagestorageController::class);
});


//like
Route::post('/like/{post}', [LikeController::class, 'increaseLike'])->name('like');
Route::post('/like-comment/{comment}', [LikeController::class, 'increaseCommentLike'])->name('like.comment');

Route::post('/comments', [ViecLamController::class, 'store'])->name('comments.store');

