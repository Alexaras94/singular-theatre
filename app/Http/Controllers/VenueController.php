<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreVenueRequest;
use App\Http\Requests\UpdateVenueRequest;
use App\Models\Reservation;
use App\Models\Venue;
use Illuminate\Http\Request;

class VenueController extends Controller
{



    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('newvenue');


        //   return view('home');
        //
    }











    // public function venuesId()
    // {
    //     $venues = Venue::all();
    //     $reserations = Reservation::all();
    //     return view('allreservations', ['venues' => $venues, 'reservations' => $reserations]);
    // }







    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('newvenue');
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreVenueRequest $request)
    {

        $venue = Venue::create($request->validated() + ['free_seats' => $request->get('capacity')]);
        $venue->save();




        //na gyrisw to view
        //

        return view('newvenue');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Venue  $venue
     * @return \Illuminate\Http\Response
     */
    public function show(Venue $venue)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Venue  $venue
     * @return \Illuminate\Http\Response
     */
    public function edit($a)
    {
        $venues = Venue::all();

        return view('editvenue', ['venues' => $venues]);

        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Venue  $venue
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateVenueRequest $request, $a)
    {

        $venue = Venue::find($request->get('venue_id'));

        $venue->update($request->validated());

        $venue->status = "ACTIVE";

        if (!$venue->save()) {
            return redirect()->to('/venues/venue/edit')->with('status', 'fail');
        }

        return redirect()->to('/venues/venue/edit')->with('status', 'success');

        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Venue  $venue
     * @return \Illuminate\Http\Response
     */
    public function destroy($a, Request $request)
    {
        $venue = Venue::find($request->get('hidden_id'));
        $venue->delete();

        return redirect()->to('/venues/venue/edit');
    }
}
