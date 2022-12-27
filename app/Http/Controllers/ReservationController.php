<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreReservationRequest;
use App\Models\Reservation;
use App\Models\Venue;
use Illuminate\Http\Request;
use Ramsey\Uuid\Type\Integer;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($venue_id)
    {

        return view('newReservation', ['venue_id' => $venue_id]);

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



    public function store(Request $request)
    {

        if ($request->method() == 'POST') {

            Reservation::create([
                'username' => $request->get('username'),
                'number_of_seats' => $request->get('number_of_seats'),
                'venue_id'=> $request->get('venue_id'),
                'email' => $request->get('email'),
                'company' => $request->get('company'),


            ]);
//            $reservation = new Reservation();
//            $reservation->venue_id = $request->get('venue_id');
//            $reservation->username = $request->get('username');
//            $reservation->number_of_seats = $request->get('number_of_seats');
//            $reservation->company = $request->get('company');
//            $reservation->email = $request->get('email');
//
//            $reservation->save();

        }

        return redirect()->route('venues.index')->withSuccess('Η κράτηση σας έγινε επιτυχώς');

        //
        //return View
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)

    {
        dd($request);


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
    public function destroy($venue_id, Request $request)
    {
        Reservation::where('venue_id', $venue_id)->where('email', $request->get('email'))->delete();
        return redirect('/venues');
    }
}
