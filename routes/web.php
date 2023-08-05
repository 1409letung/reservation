<?php

use App\Http\Controllers\BookingController;
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
//step 1a
Route::get('/', [BookingController::class, 'index']);

//step 1b
Route::get('/step1b/{id}', [BookingController::class, 'step1b']);

//change
Route::get('/change', [BookingController::class, 'change'])->name('change');

//AJAX
Route::get('/service/{day}', [BookingController::class, 'getHours'])->name('getHours');
Route::get('/room/{typeRoom}', [BookingController::class, 'getFee'])->name('getFee');

//step 1b2
Route::post('/step1b2', [BookingController::class, 'inTmpStep1b'])->name('step1b2');
// [BookingController::class, 'inTmpStep1b']

//step back screen
Route::get('/back', [BookingController::class, 'backScreen'])->name('back');

//step 2
Route::post('/end', [BookingController::class, 'step3'])->name('end');
