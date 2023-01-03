<?php

namespace App\Exports;

use App\Models\Reservation;
use Maatwebsite\Excel\Concerns\FromCollection;
use PhpParser\Node\Expr\Cast\Object_;

class ReservationsExport implements FromCollection
{
    public function collection()
    {
        return Reservation::select('venue_id', 'username', 'number_of_seats', 'company', 'email', 'phone_number')->orderBy('venue_id')->get();
    }
}
