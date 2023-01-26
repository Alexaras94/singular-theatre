<?php

namespace App\Http\Controllers;

use App\Exports\ReservationsExport;
use App\Http\Requests\StoreReservationRequest;
use App\Http\Requests\StoreVenueRequest;
use App\Mail\reservationsucceed;
use App\Mail\reservationDeleted;
use App\Models\Reservation;
use App\Models\Venue;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Mail;
use Maatwebsite\Excel\Facades\Excel;
use PhpOffice\PhpSpreadsheet\Cell\DataType;
use PhpOffice\PhpSpreadsheet\Exception;
use \PhpOffice\PhpSpreadsheet\IOFactory;

use Illuminate\Contracts\Database\Eloquent;
use PhpOffice\PhpSpreadsheet\Spreadsheet;


class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $venues = Venue::all();
        return view('newReservation', ['venues' => $venues]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $venues = Venue::all();
        return view('removeReservation', ['venues' => $venues]);

        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(StoreReservationRequest $request)
    {
        $reservation = Reservation::where('venue_id', $request->get('venue_id'))->where('email', $request->get('email'))->get();

        if ($reservation->count() > 0) {
            return back()->withInput()->with('status', 'repeated');
        }

        $venue = Venue::find($request->get('venue_id'));

        if (($venue->free_seats < $request->get('number_of_seats'))) {
            return back()->withInput()->with('status', 'invalid number of seats');
        }

        $newreservation = Reservation::create($request->validated());
        Mail::to($request->get('email'))->queue(new reservationsucceed($newreservation, $venue));

        return redirect()->to('/reservations')->with('status', 'success');
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    public function show($a)

    {

        return Reservation::all();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    public function edit($venue_id)
    {
        return view('removeReservation', ['venue_id' => $venue_id]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Reservation $reservation)
    {
        //
    }




    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    public function destroy($a, Request $request)
    {
        $venue = Venue::find($request->get('venue_id'));
        $reservation = Reservation::where('venue_id', $request->get('venue_id'))->where('email', $request->get('email'))->first();
        if ($reservation) {



            Mail::to($request->get('email'))->queue(new reservationDeleted($reservation, $venue));

            $reservation->delete();

            return redirect()->route('reservations.index')->with('status', 'deleted');;
        }

        return back()->withInput()->with('status', 'fail');
    }

    public function  export()
    {
        $reservations=Reservation::with('venue')->get();
       $this->ExcelDownload($reservations);
    }


    /**
     * @throws \PHPExcel_Reader_Exception
     * @throws \PHPExcel_Exception
     * @throws \PHPExcel_Writer_Exception
     */
    public function ExcelDownload(Collection $reservations)
    {

        try {
           // $reservationsExcel=new Spreadsheet();
            $excelTemplate =IOFactory::load(public_path("template/reservations.xlsx"));
            $excelTemplateReservationSheet=$excelTemplate->getSheetByName('Worksheet');
            info($excelTemplate->getSheetByName('Sheet1')->getCell('C1'));





        } catch (\PHPExcel_Reader_Exception $e) {
            dd($e);
        } catch (Exception $e) {
            dd($e);
        }
        $i=2;
        foreach ($reservations as $reservation){
            $excelTemplateReservationSheet->setCellValue('A'.$i,$reservation->venue_id);
            $excelTemplateReservationSheet->setCellValue('B'.$i,$reservation->venue->venue_date);
            $excelTemplateReservationSheet->setCellValue('C'.$i,$reservation->venue->venue_time);
            $excelTemplateReservationSheet->setCellValue('D'.$i,$reservation->username);
            $excelTemplateReservationSheet->setCellValue('E'.$i,$reservation->number_of_seats);
            $excelTemplateReservationSheet->setCellValue('F'.$i,$reservation->company);
            $excelTemplateReservationSheet->setCellValue('G'.$i,$reservation->email);
            $excelTemplateReservationSheet->setCellValue('H'.$i,$reservation->phone_nuber);



            $i++;
        }


        try {
            $objWriter = IOFactory::createWriter($excelTemplate, 'Xls');
        } catch (\PhpOffice\PhpSpreadsheet\Writer\Exception $e) {
            dd($e);
        }
        //

//        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
//        header('Content-Disposition: attachment;filename="newfile.Xlsx"');


         header('Content-Type: application/vnd.ms-excel');


       // header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');




        header('Content-Disposition: attachment;filename="01simple.xls"');
        header('Cache-Control: max-age=0');
        try {
            $objWriter->save('php://output');
        } catch (\PhpOffice\PhpSpreadsheet\Writer\Exception $e) {
            dd($e);
        }


    }
}
