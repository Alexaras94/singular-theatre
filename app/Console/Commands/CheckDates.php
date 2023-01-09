<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Venue;
use Carbon\Carbon;
use function GuzzleHttp\Promise\each_limit;

class CheckDates extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'CheckDates:Current';

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
        $venues = Venue::all();
        foreach ($venues as $venue){
            $venueDateTime=Carbon::parse(strtotime("$venue->venue_date $venue->venue_time"));
            $currentTime=Carbon::now();
            if ($currentTime->isAfter($venueDateTime)){
                $venue->STATUS='INACTIVE';
                $venue->save();
            }
        }

        $this->info('Checked Venues Dates And Statuses');

        return Command::SUCCESS;
    }
}
