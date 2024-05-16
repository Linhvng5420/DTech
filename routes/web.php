<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MouseController;

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

// Crud Mouse
Route::prefix('admin/mouses')->group(function () {
    Route::get('/', [MouseController::class, 'indexMouses'])->name('admin.mouse.index');
    Route::get('/create', [MouseController::class, 'addMouses'])->name('admin.mouse.create');
    Route::post('/store', [MouseController::class, 'storeMouses'])->name('admin.mouse.store');
    Route::get('/edit/{id}', [MouseController::class, 'editMouses'])->name('admin.mouse.edit');
    Route::post('/update/{id}', [MouseController::class, 'updateMouses'])->name('admin.mouse.update');
    Route::get('/delete/{id}', [MouseController::class, 'deleteMouses'])->name('admin.mouse.delete');
});


