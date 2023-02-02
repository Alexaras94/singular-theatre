<?php

namespace App\Console\Commands;


use App\Mail\venueCancellation;
use App\Models\Reservation;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\SerializesModels;

class SendEmails extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'Sendemails:old';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $reservations = Reservation::where('venue_id', 3)->with('venue')->get();
        foreach ($reservations as $reservation) {
            Mail::to($reservation->email)->queue(new venueCancellation($reservation, $reservation->venue));
        }
        return Command::SUCCESS;
    }
}
