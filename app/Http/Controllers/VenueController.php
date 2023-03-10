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
    }


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


        if (!$venue) {
            return redirect()->to('/venues')->with('status', 'fail');
        }

        return redirect()->to('/venues')->with('status', 'success');
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
        if ($venue->capacity < $request->get('capacity') && $venue->status == "SOLD OUT") {
            $new_seats = $request->get('capacity') - $venue->capacity;
            $venue->update($request->validated() + ['status' => "ACTIVE", 'free_seats' => ($venue->free_seats + $new_seats)]);
        } else if ($venue->capacity < $request->get('capacity')) {
            $new_seats = $request->get('capacity') - $venue->capacity;
            $venue->update($request->validated() + ['free_seats' => ($venue->free_seats + $new_seats)]);
        } else {
            $venue->update($request->validated());
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
