<?php

namespace App\Exports;

use App\Models\Reservation;
use Hamcrest\Core\AllOf;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Events\AfterSheet;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use PhpParser\Node\Expr\Cast\Object_;


class ReservationsExport implements FromCollection, withHeadings, ShouldAutoSize, WithStyles,WithMapping,WithEvents
{





    public function collection()
    {



        return Reservation::with('venue')->get();
    }







    public function headings(): array
    {
        return ['Παράσταση', 'Ημερομηνία Παράστασης', 'Ώρα Παράστασης', 'Όνομα', 'Αριθμός Θέσεων','Εταιρεία', 'Email','Αριθμός Τηλεφώνου'];
    }

    public function styles(Worksheet $sheet)

    {
        return [
            1    => ['font' => ['bold' => true]],
        ];
    }

    public function map($reservation): array
    {
       return [
           $reservation->venue_id,
       $reservation->venue->venue_date,
       $reservation->venue->venue_time,
       $reservation->username,
       $reservation->number_of_seats,
       $reservation->company,
       $reservation->email,
       $reservation->phone_number
       ];
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class    => function(AfterSheet $event) {

               $event->sheet->getDelegate()->getStyle('A1:H999')
                   ->getAlignment()
                   ->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
              
            }
        ];
    }
}
