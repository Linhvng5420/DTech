<?php

use Illuminate\Support\Facades\Route;
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

// Desktop
Route::get('/desktops/create', [DesktopController::class, 'create']);
Route::post('/desktops', [DesktopController::class, 'store'])->name('desktops.store');

Route::get('/', function () {
    return view('adddesktop');
});
