<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\VenueController;
use Illuminate\Mail\Markdown;
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

Route::get("/poster", function () {
    return view('poster');
})->name('poster');



// Route::get("/mail", function () {
//     return view('Mails.ReservationSuccess');
// })->name('mail');


Route::resource('reservations', ReservationController::class)->middleware('guest');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::resource('venues', VenueController::class);
    Route::get('reservation/export', [ReservationController::class, 'export'])->name('reservation.export');
});

require __DIR__ . '/auth.php';
