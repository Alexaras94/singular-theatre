<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreVenueRequest;
use App\Models\Venue;
use Illuminate\Http\Request;

class VenueController extends Controller
{


    public function __construct()
    {
       // $this->middleware('auth', ['except' => ['index', 'show']]);
        // OR
        //  $this->middleware('auth')->only(['store','update','edit','create']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $venues = Venue::all();
        return view('venues', ['venues' => $venues]);


        //   return view('home');
        //
    }


    public function venuesId()
    {
        $venues = Venue::all();
        return view('allreservations', ['venues' => $venues]);

    }







    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        info("mphka sth create!!!!");
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




        $venue = Venue::create($request->validated());
        //$venue = new Venue();
        $venue->title = $request->get('title');
        $venue->venue_date = $request->get('venue_date');
        $venue->venue_time = $request->get('venue_time');
        $venue->capacity = $request->get('capacity');
        $venue->location = $request->get('location');
        $venue->free_seats = $request->get('capacity');
        $venue->description=$request->get('description');
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
    public function edit(Venue $venue)
    {


        return view('editvenue', ['venue' => $venue]);

        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Venue  $venue
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Venue $venue)
    {


        $venue->title = $request->get('title');
        $venue->location = $request->get('location');
        $venue->venue_date = $request->get('venue_date');
        $venue->venue_time = $request->get('venue_time');
        $venue->capacity = $request->get('capacity');
        //$venue->status=$request->get('status');

        $venue->status = "ACTIVE";

        if ($venue->save()) {
            echo "to post saved";
            return redirect('/venues')->withSuccess('Οι αλλαγές στην παράσταση αποθηκεύτηκαν');
        } else {
            return redirect('/venues')->withSuccess('Οι αλλαγές στην παράσταση DEN αποθηκεύτηκαν');
        }

        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Venue  $venue
     * @return \Illuminate\Http\Response
     */
    public function destroy(Venue $venue)
    {

        $venue->delete();

        return redirect('/venues');
    }
}
