@extends('layouts.layout')


@section('content')



    <div class="card w-75">
        <form action="{{route('reservation.delete',$venue_id)}}" method="GET">
           
            @csrf

            <input type="email" name="email" placeholder="email" class="form-control m-3">




            <button type="submit" class="btn btn-danger" > Ακύρωση Κράτησης</button>

        </form>
    </div>

@endsection