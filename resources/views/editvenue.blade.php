@extends('layouts.layout')


    @section('content')

<div class="container" id="venuecards">


    <h1>Επεξεργασία Παράστασης</h1>
        <div class="card  w-75">
            <h5 class="card-title">{{$venue->title}}</h5>

            <form method="POST" action="{{route('venues.update',$venue)}}">
                @method('PUT')
                @csrf



                <input type="text"  name="title" value="{{$venue->title}}" class="form-control m-3">
                <input type="number" name="capacity"  value="{{$venue->capacity}}" class="form-control m-3">

                <input type="text" name="location"   value="{{$venue->location}}" class="form-control m-3">

                <input type="date" name="venue_date"  value="{{$venue->venue_date}}" class="form-control m-3">

                <input type="time" name="venue_time"  value="{{$venue->venue_time}}" class="form-control m-3">


                <button class='btn btn-success' type='submit' >Αποθήκεσυη</button>


            </form>
        </div>
</div>


@endsection