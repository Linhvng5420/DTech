<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CrudUserController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PhoneController;

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

// Personal Page
Route::get('/view', [CrudUserController::class, 'viewUser'])->name('users.view');

// Log in
Route::get('login', [CrudUserController::class, 'login'])->name('login');
Route::post('login', [CrudUserController::class, 'authUser'])->name('user.authUser');

// Log Out
Route::post('/logout', [CrudUserController::class, 'logout'])->name('logout');

// Home
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/products/phones', [HomeController::class, 'showPhones'])->name('products.phones');
Route::get('/products/laptops', [HomeController::class, 'showLaptops'])->name('products.laptops');
Route::get('/products/desktops', [HomeController::class, 'showDesktops'])->name('products.desktops');
Route::get('/products/mice', [HomeController::class, 'showMice'])->name('products.mice');
Route::get('/products/earphones', [HomeController::class, 'showEarphones'])->name('products.earphones');
Route::get('/products/screens', [HomeController::class, 'showScreens'])->name('products.screens');
Route::get('/search', [HomeController::class, 'search'])->name('search.products');
Route::get('/product/{productType}/{id}', [HomeController::class, 'showProductDetail'])->name('product.view');

// CRUD Users
Route::prefix('admin/')->group(function () {
    Route::get('/users', [CrudUserController::class, 'listUser'])->name('users.list');
    Route::get('/users/delete', [CrudUserController::class, 'deleteUser'])->name('users.delete');
    Route::get('/users/update', [CrudUserController::class, 'updateUser'])->name('users.updateForm');
    Route::post('/users/update', [CrudUserController::class, 'postUpdateUser'])->name('users.update');
});

// CRUD Phone
Route::prefix('admin/phones')->group(function () {
    Route::get('/', [PhoneController::class, 'index'])->name('admin.phone.index');
    Route::get('/create', [PhoneController::class, 'addphone'])->name('admin.phone.create');
    Route::post('/create', [PhoneController::class, 'store'])->name('admin.phone.store');
    Route::get('/edit/{id}', [PhoneController::class, 'edit'])->name('admin.phone.edit');
    Route::post('/update/{id}', [PhoneController::class, 'update'])->name('admin.phone.update');
    Route::get('/delete/{id}', [PhoneController::class, 'delete'])->name('admin.phone.delete');
});


