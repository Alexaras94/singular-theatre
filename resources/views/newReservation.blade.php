@extends('layouts.layout')


@section('content')




    <div class="card w-75">
        <form action="{{route('reservation.store')}}" method="POST">

            @csrf

            <input type="text" name="username" placeholder="username" class="form-control m-3">

            <input type="number" name="number_of_seats" placeholder="number_of_seats" class="form-control m-3">

            <input type="email" name="email" placeholder="email" class="form-control m-3">

            <input type="text" name="company" placeholder="company" class="form-control m-3">

             <input type="hidden" name="venue_id" value="{{$venue_id}}" class="form-control m-3">




            <button type="submit" class="btn btn-primary" action > ΑΠΟΘΗΚΕΥΣΗ </button>

        </form>
    </div>

@endsection
{{----}}
