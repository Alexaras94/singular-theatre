@extends('layouts.layout')


@section('content')

    <div class="container" >


        <h1>Προβολή Κρατήσεων</h1>
        <div class="card  w-75">

            <select class="js-states browser-default select2" name=reservation_id" required id="reservation_id">
                <option value="option_select" disabled selected>Reservations</option>
                @foreach($venues as $venue)
                    <option value="{{ $venue->id }}" {{$venue->id == $venue->id  ? 'selected' : ''}}>{{$venue->title}}

                    </option>
                @endforeach
            </select>

            </form>
        </div>
    </div>


@endsection
