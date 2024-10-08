<?php

use App\Http\Controllers\Admin\HomeController as AdminHomeController;
use App\Http\Controllers\Admin\LoginController as AdminLoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});
Route::group(['prefix' => 'account'],function() {

    Route::group(['middleware' => 'guest'],function() {
        Route::get('login',[LoginController::class, 'index'])->name('account.login');
        Route::get('register',[LoginController::class, 'register'])->name('account.register');
        Route::post('process-register',[LoginController::class, 'processRegister'])->name('account.processRegister');
        Route::post('authenticate',[LoginController::class, 'authenticate'])->name('account.authenticate');
    });

    Route::group(['middleware' => 'auth'],function() {
    
        Route::get('logout',[LoginController::class, 'logout'])->name('account.logout');
        Route::get('home',[HomeController::class, 'index'])->name('account.home');
    });
});

Route::group(['prefix' => 'admin'],function() {

    Route::group(['middleware' => 'admin.guest'],function() {
        Route::get('login',[AdminLoginController::class, 'index'])->name('admin.login');
        Route::post('authenticate',[AdminLoginController::class, 'authenticate'])->name('admin.authenticate');

    });

    Route::group(['middleware' => 'admin.auth'],function() {
       Route::get('home',[AdminHomeController::class, 'index'])->name('admin.home');
       Route::get('logout',[AdminLoginController::class, 'logout'])->name('admin.logout');

    });
});
