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

//Route::get('/', function () {
//    return view('welcome',['']);
//});

//Route::any('/',[VenueController::class,'index'])-


Route::get("/", function () {

    return redirect('/venues');

});



Route::get('/newvenue', function () {
    return View('newvenue');
})->name('newvenue');







Route::get('reservation/create/{venue_id}', [ReservationController::class, 'create'])->name('reservation.create');
Route::post('reservation/create/', [ReservationController::class, 'store'])->name('reservation.store');
Route::get('reservation/edit/{venue_id}', [ReservationController::class, 'edit'])->name('reservation.edit');
Route::get('reservation/destroy/{venue}', [ReservationController::class, 'destroy'])->name('reservation.delete');



//Route::post('/reservations',[ReservationController::class,'store'])->name('newreservation');

// Route::post('/reservations', [ReservationController::class, 'store'])->name('newreservation');
Route::resource('venues', VenueController::class,['only' => ['index', 'show']]);

//Route::get('/getVenueDetails/{venueid}', [VenueController::class, 'getVenueDetails'])->name('getVenueDetails');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
  Route::get('/deletetevenue/{venue}', [VenueController::class, 'destroy'])->name('venues.delete');
  Route::resource('venues', VenueController::class)->except(['index','show']);










    // Route::post('/newvenue',[VenueController::class,'store']);


    //Route::get('/newvenue',[VenueController::class,'store'])->name("newvenue");
    //  Route::resource('venues', VenueController::class);

});
//Route::post('/venues', VenueController::class);
require __DIR__ . '/auth.php';
