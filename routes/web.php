<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\VenueController;
use Illuminate\Support\Facades\Route;

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

    return redirect('/reservations');
});




//


Route::resource('reservations', ReservationController::class);

Route::get('reservation/export', [ReservationController::class,'export'])->name('reservation.export');




// Route::get('reservation/create/{venue_id}', [ReservationController::class, 'create'])->name('reservation.create');
// Route::post('reservation/create/', [ReservationController::class, 'store'])->name('reservation.store');
// Route::get('reservation/edit/{venue_id}', [ReservationController::class, 'edit'])->name('reservation.edit');
// Route::get('reservation/destroy/{venue}', [ReservationController::class, 'destroy'])->name('reservation.delete');

// Route::get('/reservationslist/show', [ReservationController::class, 'show'])->name('reservations.show');

// Route::get('/reservationslist', [VenueController::class, 'venuesId'])->name('venues.id');



// Route::resource('venues', VenueController::class, ['only' => ['index', 'show']]);;


Route::middleware('auth')->group(function () {
    // Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    // Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    // Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/deletetevenue/{venue}', [VenueController::class, 'destroy'])->name('venues.delete');
    Route::resource('venues', VenueController::class);
    // Route::get('/newvenue', [VenueController::class, 'create'])->name('venues.create');
});

require __DIR__ . '/auth.php';
