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

//Earphone
Route::get('/earphones/create', [EarPhoneController::class, 'create']);
Route::post('/earphones', [EarPhoneController::class, 'store'])->name('earphones.store');

Route::get('/', function () {
    return view();
});
