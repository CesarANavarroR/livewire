<?php

use App\Http\Controllers\Menu\HomeController;
use Illuminate\Support\Facades\Route;

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
Route::get('/welcome/{table}',[HomeController::class,'index'])->name('menu.welcome');
Route::get('/categorys/{table}', [HomeController::class, 'category'])->name('menu.category.index');
Route::get('/saucers/{table}', [HomeController::class, 'show'])->name('menu.category.show');
Route::get('/miorden/{table}', [HomeController::class, 'orden'])->name('menu.miorden.index');
Route::post('/miorden/confimation/{table}', [HomeController::class, 'storage'])->name('menu.miorden.save');

