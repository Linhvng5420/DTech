<?php

use App\Http\Controllers\PhoneController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CrudUserController;

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

// Sign Up
Route::get('signup', [CrudUserController::class, 'signup'])->name('signup');
Route::post('signup', [CrudUserController::class, 'postUser'])->name('user.postUser');

// Home
Route::get('/home', [HomeController::class, 'index'])->name('products');
Route::get('/phones', [HomeController::class, 'showPhones'])->name('phones');
Route::get('/laptops', [HomeController::class, 'showLaptops'])->name('laptops');
Route::get('/desktops', [HomeController::class, 'showDesktops'])->name('desktops');
Route::get('/mice', [HomeController::class, 'showMice'])->name('mice');
Route::get('/earphones', [HomeController::class, 'showEarphones'])->name('earphones');
Route::get('/screens', [HomeController::class, 'showScreens'])->name('screens');

// CRUD
Route::get('phones', [PhoneController::class, 'index'])->name('phone.all');
Route::get('add-phones', [PhoneController::class, 'addphone'])->name('phone.add');
Route::post('add-phones', [PhoneController::class, 'store'])->name('phone.store');
Route::get('edit-phone/{id}', [PhoneController::class, 'edit'])->name('phone.edit');
Route::post('update-phone/{id}', [PhoneController::class, 'update'])->name('phone.update');
Route::get('phone/delete/{id}', [PhoneController::class, 'delete'])->name('phone.delete');


Route::get('/', function () {
    return view('welcome');
});