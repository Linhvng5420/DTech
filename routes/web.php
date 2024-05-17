<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ScreenController;
use App\Http\Controllers\MouseController;
use App\Http\Controllers\EarPhoneController;
use App\Http\Controllers\CrudUserController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PhoneController;
use App\Http\Controllers\LaptopController;
use App\Http\Controllers\DesktopController;

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

// Log in
Route::get('login', [CrudUserController::class, 'login'])->name('login');
Route::post('login', [CrudUserController::class, 'authUser'])->name('user.authUser');

// Log Out
Route::post('/logout', [CrudUserController::class, 'logout'])->name('logout');

// Personal Page
Route::get('/users/view', [CrudUserController::class, 'viewUser'])->name('users.view');
Route::get('/users/update', [CrudUserController::class, 'updateUser'])->name('users.updateForm');

// CRUD Users
Route::prefix('admin/')->group(function () {
    Route::get('/users', [CrudUserController::class, 'listUser'])->name('users.list');
    Route::get('/users/delete', [CrudUserController::class, 'deleteUser'])->name('users.delete');
    Route::post('/users/update', [CrudUserController::class, 'postUpdateUser'])->name('users.update');
});

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

// CRUD Phone
Route::prefix('admin/phones')->group(function () {
    Route::get('/', [PhoneController::class, 'index'])->name('admin.phone.index');
    Route::get('/create', [PhoneController::class, 'addphone'])->name('admin.phone.create');
    Route::post('/create', [PhoneController::class, 'store'])->name('admin.phone.store');
    Route::get('/edit/{id}', [PhoneController::class, 'edit'])->name('admin.phone.edit');
    Route::post('/update/{id}', [PhoneController::class, 'update'])->name('admin.phone.update');
    Route::get('/delete/{id}', [PhoneController::class, 'delete'])->name('admin.phone.delete');
});

// Crud EarPhone
Route::prefix('admin/earphones')->group(function () {
    Route::get('/', [EarPhoneController::class, 'indexEarPhones'])->name('admin.earphone.index');
    Route::get('/create', [EarPhoneController::class, 'addEarPhones'])->name('admin.earphone.create');
    Route::post('/store', [EarPhoneController::class, 'storeEarPhones'])->name('admin.earphone.store');
    Route::get('/edit/{id}', [EarPhoneController::class, 'editEarPhones'])->name('admin.earphone.edit');
    Route::post('/update/{id}', [EarPhoneController::class, 'updateEarPhones'])->name('admin.earphone.update');
    Route::get('/delete/{id}', [EarPhoneController::class, 'deleteEarPhones'])->name('admin.earphone.delete');
});

// Crud Mouse
Route::prefix('admin/mouses')->group(function () {
    Route::get('/', [MouseController::class, 'indexMouses'])->name('admin.mouse.index');
    Route::get('/create', [MouseController::class, 'addMouses'])->name('admin.mouse.create');
    Route::post('/store', [MouseController::class, 'storeMouses'])->name('admin.mouse.store');
    Route::get('/edit/{id}', [MouseController::class, 'editMouses'])->name('admin.mouse.edit');
    Route::post('/update/{id}', [MouseController::class, 'updateMouses'])->name('admin.mouse.update');
    Route::get('/delete/{id}', [MouseController::class, 'deleteMouses'])->name('admin.mouse.delete');
});

// Crud Screen
Route::prefix('admin/screens')->group(function () {
    Route::get('/', [ScreenController::class, 'indexScreen'])->name('admin.screen.index');
    Route::get('/create', [ScreenController::class, 'addScreen'])->name('admin.screen.create');
    Route::post('/store', [ScreenController::class, 'storeScreen'])->name('admin.screen.store');
    Route::get('/edit/{id}', [ScreenController::class, 'editScreen'])->name('admin.screen.edit');
    Route::post('/update/{id}', [ScreenController::class, 'updateScreen'])->name('admin.screen.update');
    Route::get('/delete/{id}', [ScreenController::class, 'deleteScreen'])->name('admin.screen.delete');
});

// Crud Laptop
Route::get('laptops', [LaptopController::class, 'index'])->name('laptop.all');
Route::get('add-laptops', [LaptopController::class, 'addlaptop'])->name('laptop.add');
Route::post('add-laptops', [LaptopController::class, 'store'])->name('laptop.store');
Route::get('edit-laptop/{id}', [LaptopController::class, 'edit'])->name('laptop.edit');
Route::post('update-laptop/{id}', [LaptopController::class, 'update'])->name('laptop.update');
Route::get('laptop/delete/{id}', [LaptopController::class, 'delete'])->name('laptop.delete');

// Crud Desktop
Route::get('desktops', [DesktopController::class, 'index'])->name('desktop.all');
Route::get('add-desktops', [DesktopController::class, 'adddesktop'])->name('desktop.add');
Route::post('add-desktops', [DesktopController::class, 'store'])->name('desktop.store');
Route::get('edit-desktop/{id}', [DesktopController::class, 'edit'])->name('desktop.edit');
Route::post('update-desktop/{id}', [DesktopController::class, 'update'])->name('desktop.update');
Route::get('desktop/delete/{id}', [DesktopController::class, 'delete'])->name('desktop.delete');
