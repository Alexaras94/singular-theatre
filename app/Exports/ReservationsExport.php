<?php

namespace App\Exports;

use App\Models\Reservation;
use App\Models\Venue;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use PhpParser\Node\Expr\Cast\Object_;


class ReservationsExport implements FromCollection,withHeadings,ShouldAutoSize,WithStyles
{





    public function collection()
    {

        $reservations = Reservation::select('venue_id', 'username', 'number_of_seats', 'company', 'email', 'phone_number')->orderBy('venue_id')->get();

        foreach ($reservations as $r) {

            $r->venue_date = Venue::find($r->venue_id)->venue_date;



        }


        return $reservations;

    }



   



    public function headings(): array
    {
        return ['Παράσταση','Όνομα','Αριθμός Θέσεων','Εταιρεία','Email','Αριθμός Τηλεφώνου','Ημερομηνία Παράστασης'];
    }

    public function styles(Worksheet $sheet)

    {
        return [
        1    => ['font' => ['bold' => true]]];
    }
}
