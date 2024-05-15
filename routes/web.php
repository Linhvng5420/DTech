<?php

use App\Http\Controllers\PhoneController;
use Illuminate\Support\Facades\Route;

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


Route::get('phones', [PhoneController::class, 'index'])->name('phone.all');
Route::get('add-phones', [PhoneController::class, 'addphone'])->name('phone.add');
Route::post('add-phones', [PhoneController::class, 'store'])->name('phone.store');
Route::get('edit-phone/{id}', [PhoneController::class, 'edit'])->name('phone.edit');
Route::post('update-phone/{id}', [PhoneController::class, 'update'])->name('phone.update');
Route::get('phone/delete/{id}', [PhoneController::class, 'delete'])->name('phone.delete');
