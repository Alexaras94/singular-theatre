@extends('layouts.layout')

@section('content')
    <div class="flex flex-row justify-center">


        <select required name="venue_id" id="venue_id" onchange="showReservations({{ $reservations }})"
            class="m-3 border-2 border-slate-900 rounded-lg focus:border-slate-900 focus:ring-0">

            <option value="" hidden>
                Επιλέξτε ημερομηνία
            </option>
            @foreach ($venues as $venue)
                <option value="{{ $venue->id }}" class="">
                    {{ $venue->venue_date }}
                </option>
            @endforeach

        </select>
        <div class="">











        </div>
    </div>




    <script>
        function showReservations(reservations) {
            var id = document.getElementById('venue_id').value;
            var selected = reservations.filter(function(r) {
                return r.venue_id == id;
            })
            console.log(selected);


        }
    </script>
@endsection
