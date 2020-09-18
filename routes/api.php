<?php

use App\Http\Controllers\booking\AvailableBookingController;
use App\Http\Controllers\booking\CreateBookingController;
use App\Http\Controllers\booking\DeleteBookingController;
use App\Http\Controllers\table\CreateTableController;
use App\Http\Controllers\table\DeleteTableController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::prefix('v1')->group(function () {
    Route::post('/table', CreateTableController::class)->name('table.create');
    Route::delete('/table/{id}', DeleteTableController::class)->name('table.delete');
    Route::post('/booking', CreateBookingController::class)->name('booking.create');
    Route::delete('/booking/{id}', DeleteBookingController::class)->name('booking.delete');
    Route::get('/booking/available', AvailableBookingController::class)->name('availableBooking.show');
});
