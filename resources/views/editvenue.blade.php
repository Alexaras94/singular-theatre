@extends('layouts.layout')


@section('content')
    <div class="flex flex-col items-center mt-20">

        <p class="text-center mb-16 font-bold underline text-xl text-white">Επεξεργασία Παράστασης</p>

        <form class="grid lg:grid-cols-2 gap-3 mb-36" id="edit_form" method="POST"
            action="{{ route('venues.update', 'venue') }}">
            @method('PUT')
            @csrf

            @if (session('status') == 'success')
                <p class="text-success font-bold lg:col-span-2 text-center justify-self-center">
                    Οι αλλαγές αποθηκεύτηκαν επιτυχώς!
                </p>
            @elseif(session('status') == 'fail')
                <p class="text-slg-red font-bold lg:col-span-2 text-center justify-self-center">
                    Οι αλλαγές δεν αποθηκεύτηκαν!
                </p>
            @endif


            <select required name="venue_id" id="venue_id" onchange="fillInputs({{ $venues }})"
                class="lg:col-span-2 lg:w-1/2 justify-self-center m-3 border-2 border-shadow rounded-lg focus:border-shadow focus:ring-0">

                <option value="" hidden>
                    Επιλέξτε παράσταση
                </option>
                @foreach ($venues as $venue)
                    <option value="{{ $venue->id }}" class="">
                        {{ $venue->venue_date }}
                    </option>
                @endforeach

            </select>



            {{-- <input type="text" name="title" id="title" placeholder="Τίτλος"
                class="m-3 border-2 border-shadow rounded-lg focus:border-shadow focus:ring-0"> --}}

            <input type="number" name="capacity" id="capacity" placeholder="Χωρητικότητα"
                class="m-3 border-2 border-shadow rounded-lg focus:border-shadow focus:ring-0">

            <input type="text" name="location" id="location" placeholder="Τοποθεσία"
                class="m-3 border-2 border-shadow rounded-lg focus:border-shadow focus:ring-0">

            <input type="date" name="venue_date" id="venue_date" placeholder="Ημερομηνία"
                class="m-3 border-2 border-shadow rounded-lg focus:border-shadow focus:ring-0">

            <input type="time" name="venue_time" id="venue_time" placeholder="Ώρα"
                class="m-3 border-2 border-shadow rounded-lg focus:border-shadow focus:ring-0">


            <button class='bg-positive text-white justify-self-center p-2 my-4 rounded-lg active:bg-b-positive'
                type='submit' form="edit_form">Αποθήκευση</button>

            <button class='bg-slg-red text-white justify-self-center p-2 my-4 rounded-lg active:bg-button' type='submit'
                form="delete_form">Διαγραφή</button>

        </form>

        <form method="POST" id="delete_form" action="{{ route('venues.destroy', 'venue') }}">
            @method('DELETE')
            @csrf

            <input required type="hidden" name="hidden_id" id="hidden_id">
        </form>

    </div>
@endsection


<script>
    function fillInputs(venues) {
        var id = document.getElementById('venue_id').value;
        var v = venues.filter(function(venue) {
            return venue.id == id;
        })[0]
        // document.getElementById('title').value = v.title;
        document.getElementById('capacity').value = v.capacity;
        document.getElementById('location').value = v.location;
        document.getElementById('venue_date').value = v.venue_date;
        document.getElementById('venue_time').value = v.venue_time;
        document.getElementById('hidden_id').value = id;

    }
</script>
