<?php

namespace App\Exports;



use App\Models\Reservation;
use App\Models\Venue;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithCustomValueBinder;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\DefaultValueBinder;
use Maatwebsite\Excel\Sheet;
use mysql_xdevapi\Collection;
use PhpOffice\PhpSpreadsheet\Cell\Cell;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class StatsExport implements  FromCollection , WithMapping ,WithHeadings ,ShouldAutoSize,WithStyles
{



    public function Collection()
    {

        $venues=Venue::all();
        foreach ($venues as $v){
            $v->sum=Reservation::where('venue_id',$v->id)->sum('number_of_seats');
        }

        $totalsum=new Venue();


        $totalsum->venue_date="ΣΥΝΟΛΟ";
        $totalsum->sum=Reservation::sum('number_of_seats');
        $venues->push($totalsum);


        $companies=Reservation::select('company')->distinct()->get();




        $space=new Venue();

        $venues->push($space);
        $venues->push($space);
        $venues->push($space);
        $venues->push($space);


        foreach ($companies as $c){
            $company=new Venue;
            $company->venue_date=$c->company;
            $company->sum=Reservation::where('company',$c->company)->sum('number_of_seats');
            $venues->push($company);
        }


        $totalsum=new Venue();

        $totalsum->venue_date="ΣΥΝΟΛΟ";
        $totalsum->sum=Reservation::sum('number_of_seats');
        $venues->push($totalsum);


        return $venues;


    }




    public function headings(): array
    {
        return [ 'Ημερομηνία Παράστασης', 'Άθροισμα Θέσεων'];

    }

    public function map($venue): array
    {

        return [
            $venue->venue_date,
            $venue->sum

        ];
    }

    public function styles(Worksheet $sheet)
    {
        return
       [ 'A'  => ['font' => ['bold' => true]] , '1'  => ['font' => ['bold' => true] ]

       ];
    }
}
