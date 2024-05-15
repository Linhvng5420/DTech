<?php

use App\Http\Controllers\LaptopController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('laptops', [LaptopController::class, 'index'])->name('laptop.all');
Route::get('add-laptops', [LaptopController::class, 'addlaptop'])->name('laptop.add');
Route::post('add-laptops', [LaptopController::class, 'store'])->name('laptop.store');
Route::get('edit-laptop/{id}', [LaptopController::class, 'edit'])->name('laptop.edit');
Route::post('update-laptop/{id}', [LaptopController::class, 'update'])->name('laptop.update');
Route::get('laptop/delete/{id}', [LaptopController::class, 'delete'])->name('laptop.delete');

