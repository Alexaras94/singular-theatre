<?php

namespace App\Listeners;

use App\Events\ReservationEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class ReservationStore
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\ReservationEvent  $event
     * @return void
     */
    public function handle(Reservation $event)
    {


        //Θα αφαιρώ το άθροισμα των Θέσεων για κάθε Venue id οπότε θέλω και Ωε
        //Θα ενημερώνω το free_Seats στον πίνακα Venues

        //
    }
}
