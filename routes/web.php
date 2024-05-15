<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

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

// Home
Route::get('/home', [HomeController::class, 'index'])->name('products');
Route::get('/phones', [HomeController::class, 'showPhones'])->name('phones');
Route::get('/laptops', [HomeController::class, 'showLaptops'])->name('laptops');
Route::get('/desktops', [HomeController::class, 'showDesktops'])->name('desktops');
Route::get('/mice', [HomeController::class, 'showMice'])->name('mice');
Route::get('/earphones', [HomeController::class, 'showEarphones'])->name('earphones');
Route::get('/screens', [HomeController::class, 'showScreens'])->name('screens');
Route::get('/search', [HomeController::class, 'search'])->name('search.products');
