<?php

namespace App\Observers;

use App\Models\Reservation;
use App\Models\Venue;
use Illuminate\Support\Facades\DB;

class ReservationObserver
{
    /**
     * Handle the Reservation "created" event.
     *
     * @param  \App\Models\Reservation  $reservation
     * @return void
     */
    public function created(Reservation $reservation)
    {

        $id = $reservation->venue_id;

        $venues = Venue::where('id', $id)->get();

        $seats = Reservation::where('venue_id', $id)->sum('number_of_seats');
        foreach ($venues as $venue) {
            $venuecapacity = ($venue->capacity);
        }

        $free_seats = $venuecapacity - $seats;
        //  $free_seats=$venue->capacity - $seats;
        if ($free_seats == 0) {
            $venue->update(['free_seats' => $free_seats, 'status' => "INACTIVE"]);
        } else {
            $venue->update(['free_seats' => $free_seats]);
        }







        //
    }

    /**
     * Handle the Reservation "updated" event.
     *
     * @param  \App\Models\Reservation  $reservation
     * @return void
     */
    public function updated(Reservation $reservation)
    {
        //
    }

    /**
     * Handle the Reservation "deleted" event.
     *
     * @param  \App\Models\Reservation  $reservation
     * @return void
     */
    public function deleted(Reservation $reservation)
    {
        $id = $reservation->venue_id;

        $venues = Venue::where('id', $id)->get();

        $seats = Reservation::where('venue_id', $id)->sum('number_of_seats');
        foreach ($venues as $venue) {
            $venuecapacity = ($venue->capacity);
        }

        $free_seats = $venuecapacity - $seats;
        if ($free_seats > 0) {
            $venue->update(['free_seats' => $free_seats, 'status' => "ACTIVE"]);
        } else {
            $venue->update(['free_seats' => $free_seats]);
        }
    }

    /**
     * Handle the Reservation "restored" event.
     *
     * @param  \App\Models\Reservation  $reservation
     * @return void
     */
    public function restored(Reservation $reservation)
    {
        //
    }

    /**
     * Handle the Reservation "force deleted" event.
     *
     * @param  \App\Models\Reservation  $reservation
     * @return void
     */
    public function forceDeleted(Reservation $reservation)
    {
        //
    }
}
