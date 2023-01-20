<?php

namespace App\Exports;

use App\Models\Reservation;
use Hamcrest\Core\AllOf;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\HasReferencesToOtherSheets;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Events\BeforeExport;
use Maatwebsite\Excel\Events\BeforeSheet;
use Maatwebsite\Excel\Events\BeforeWriting;
use Maatwebsite\Excel\Excel;
use Maatwebsite\Excel\Files\LocalTemporaryFile;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use PhpParser\Node\Expr\Cast\Object_;


class ReservationsExport implements FromCollection, withHeadings, ShouldAutoSize, WithStyles,WithMapping,WithEvents,WithMultipleSheets
{
    public function collection()


    {

        return Reservation::orderBy('venue_id','ASC')->with('venue')->get();
    }


    public function headings(): array
    {
        return ['Παράσταση', 'Ημερομηνία Παράστασης', 'Ώρα Παράστασης', 'Όνομα', 'Αριθμός Θέσεων', 'Εταιρεία', 'Email', 'Αριθμός Τηλεφώνου' ];
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
            $reservation->phone_number,





        ];
    }

    public function registerEvents(): array
    {
        return [


            BeforeExport::class=>function(BeforeExport $event){

              //  $event->writer->reopen(new \Maatwebsite\Excel\Files\LocalTemporaryFile(storage_path('app/exports/ReservationsExport.xls')),Excel::XLS);


              //  $event->writer->getSheetByIndex(0)->setCellValue('K3','VALUE ADDED');
            },


            AfterSheet::class    => function(AfterSheet $event) {
                $event->sheet->freezePane('A2');


               $event->sheet->getDelegate()->getStyle('A1:H999')
                   ->getAlignment()
                   ->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
        }
        ];





    }





    public function sheets(): array
    {

        $sheets =[];
        $sheets[]=new ReservationsExport();
        $sheets[]=new StatsExport();


        return $sheets;

    }
}




