<?php

namespace App\Providers;

use App\Providers\ReservationEvent;
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
     * @param  \App\Providers\ReservationEvent  $event
     * @return void
     */
    public function handle(ReservationEvent $event)
    {
        //
    }
}
