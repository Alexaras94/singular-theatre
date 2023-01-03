<?php

namespace App\Http\Controllers;

use App\Exports\ReservationsExport;
use App\Http\Requests\StoreReservationRequest;
use App\Http\Requests\StoreVenueRequest;
use App\Models\Reservation;
use App\Models\Venue;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;



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
    //    public function store(StoreReservationRequest $request)
    //    {
    //        $reservation=Reservation::create($request->validated());
    //
    //        //
    //        //return View
    //    }



    public function store(StoreReservationRequest $request)
    {
        $reservation = Reservation::where('venue_id', $request->get('venue_id'))->where('email', $request->get('email'))->get();

        if (!$reservation) {
            $venue = Venue::find($request->get('venue_id'));

            if ($venue->free_seats >= $request->get('number_of_seats')) {

                $reservation = Reservation::create($request->validated());
            } else {

                return back()->withInput()->with('status', 'invalid number of seats');
            }
        } else {
            return back()->withInput()->with('status', 'repeated');
        }



        if (!$reservation) {

            return redirect()->to('/reservations')->with('status', 'fail');
        }

        return redirect()->to('/reservations')->with('status', 'success');

        //
        //return View
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

        Reservation::where('venue_id', $request->get('venue_id'))->where('email', $request->get('email'))->first()->delete();
        return redirect()->to('/reservations');
    }

    public function  export()
    {
        return Excel::download(new ReservationsExport(), "reservations.xlsx");
    }
}
