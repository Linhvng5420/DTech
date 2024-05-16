<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EarPhoneController;

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
Route::prefix('admin/earphones')->group(function () {
    Route::get('/', [EarPhoneController::class, 'indexEarPhones'])->name('admin.earphone.index');
    Route::get('/create', [EarPhoneController::class, 'addEarPhones'])->name('admin.earphone.create');
    Route::post('/create', [EarPhoneController::class, 'storeEarPhones'])->name('admin.earphone.store');
    Route::get('/edit/{id}', [EarPhoneController::class, 'editEarPhones'])->name('admin.earphone.edit');
    Route::post('/update/{id}', [EarPhoneController::class, 'updateEarPhones'])->name('admin.earphone.update');
    Route::get('/delete/{id}', [EarPhoneController::class, 'deleteEarPhones'])->name('admin.earphone.delete');
});


