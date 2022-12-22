@extends('layouts.layout')


@section('content')




    <div class="card w-50" style="display: flex; flex-direction: column; align-items:center; justify-content:space-evenly">
        <form action="{{route('reservation.store')}}" method="POST">

            @csrf

            <input type="text" name="username" placeholder="username" class="form-control" >

            <input type="number" name="number_of_seats" placeholder="seats" class="form-control">

            <input type="email" name="email" placeholder="email" class="form-control">

            <input type="text" name="company" placeholder="company" class="form-control">

             <input type="hidden" name="venue_id" value="{{$venue_id}}" class="form-control">




            <button type="submit" class="btn btn-primary" action > ΑΠΟΘΗΚΕΥΣΗ </button>

        </form>
    </div>

@endsection
{{----}}
