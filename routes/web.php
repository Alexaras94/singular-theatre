<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\VenueController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get("/", function () {
    if (Auth::user()) {
        return redirect('venues/create');
    };
    return redirect('/reservations');
});


Route::get("/resgister", function () {
    if (Auth::user()) {
        return redirect('venues/create');
    };
    return redirect('/reservations');
});


//


Route::resource('reservations', ReservationController::class)->middleware('guest');





Route::middleware('auth')->group(function () {
    Route::resource('venues', VenueController::class);
    Route::get('reservation/export', [ReservationController::class, 'export'])->name('reservation.export');
});

require __DIR__ . '/auth.php';
