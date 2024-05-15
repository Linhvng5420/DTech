<?php

use App\Http\Controllers\DesktopConTroller;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('desktops', [DesktopConTroller::class, 'index'])->name('desktop.all');
Route::get('add-desktops', [DesktopConTroller::class, 'adddesktop'])->name('desktop.add');
Route::post('add-desktops', [DesktopConTroller::class, 'store'])->name('desktop.store');
Route::get('edit-desktop/{id}', [DesktopConTroller::class, 'edit'])->name('desktop.edit');
Route::post('update-desktop/{id}', [DesktopConTroller::class, 'update'])->name('desktop.update');
Route::get('desktop/delete/{id}', [DesktopConTroller::class, 'delete'])->name('desktop.delete');

