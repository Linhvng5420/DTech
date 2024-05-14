<?php

use App\Http\Controllers\PhoneController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('phones', [PhoneController::class, 'index'])->name('phone.all');
Route::get('add-phones', [PhoneController::class, 'addphone'])->name('phone.add');
Route::post('add-phones', [PhoneController::class, 'store'])->name('phone.store');
Route::get('edit-phone/{id}', [PhoneController::class, 'edit'])->name('phone.edit');
Route::post('update-phone/{id}', [PhoneController::class, 'update'])->name('phone.update');
Route::get('phone/delete/{id}', [PhoneController::class, 'delete'])->name('phone.delete');
