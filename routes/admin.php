<?php

use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Kitchen\KitchenController;
use App\Http\Controllers\Payment\PaymentController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\RecordController;
use App\Http\Controllers\Admin\QRController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class,'index'])->name('admin.home');
Route::resource('profiles', ProfileController::class)->names('admin.profiles');
Route::resource('products', ProductController::class)->names('admin.products');
Route::resource('categorys', CategoryController::class)->names('admin.categorys');
Route::resource('roles', RoleController::class)->names('admin.roles');
Route::resource('records', RecordController::class)->names('admin.records');
Route::resource('qrs', QRController::class)->names('admin.qrs');
Route::resource('kitchen', KitchenController::class)->names('admin.kitchen');
Route::resource('payment', PaymentController::class)->names('admin.payment');