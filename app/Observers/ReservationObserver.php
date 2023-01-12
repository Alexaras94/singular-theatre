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

        $venue = $reservation->venue();
        $free_seats=$venue->free_seats-$reservation->number_of_seats;
        if ($free_seats == 0) {
            $venue->update(['free_seats' => $free_seats, 'status' => "SOLD OUT"]);
        } else {
            $venue->update(['free_seats' => $free_seats]);
        }

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



        $venue = $reservation->venue();
        $free_seats=$venue->free_seats+$reservation->number_of_seats;

        if ($free_seats > 0 && $venue->status='SOLD OUT') {
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
