<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ScreenController;

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

// Crud EarPhone
Route::prefix('admin/screens')->group(function () {
    Route::get('/', [ScreenController::class, 'indexScreen'])->name('admin.screen.index');
    Route::get('/create', [ScreenController::class, 'addScreen'])->name('admin.screen.create');
    Route::post('/store', [ScreenController::class, 'storeScreen'])->name('admin.screen.store');
    Route::get('/edit/{id}', [ScreenController::class, 'editScreen'])->name('admin.screen.edit');
    Route::post('/update/{id}', [ScreenController::class, 'updateScreen'])->name('admin.screen.update');
    Route::get('/delete/{id}', [ScreenController::class, 'deleteScreen'])->name('admin.screen.delete');
});


