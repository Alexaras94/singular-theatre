<?php

namespace App\Providers;

use App\Providers\Reservation;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class StoreReservation
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
     * @param  \App\Providers\Reservation  $event
     * @return void
     */
    public function handle(Reservation $event)
    {
        //
    }
}
