@extends('layouts.layout')


@section('content')
    <div class="flex flex-col items-center mt-20">

        <p class="text-center pb-16 font-bold underline text-xl text-white">Νέα Παράσταση</p>

        <form class="grid lg:grid-cols-2 gap-3 mb-36" action="{{ route('venues.store') }}" method="POST">

            @csrf

            @if (session('status') == 'success')
                <p class="text-success font-bold lg:col-span-2 text-center justify-self-center">
                    Η παράσταση αποθηκεύτηκε επιτυχώς!
                </p>
            @elseif(session('status') == 'fail')
                <p class="text-slg-red font-bold lg:col-span-2 text-center justify-self-center">
                    Η παράσταση δεν αποθηκεύτηκε.
                </p>
            @endif


            {{-- <input required type="text" name="title" placeholder="Τίτλος"
                class="m-3 border-2 border-shadow rounded-lg focus:border-shadow focus:ring-0">



            <textarea id="description" placeholder="Περιγραφή Παράστασης" name="description" rows="4" cols="50"
                class="m-3 border-2 border-shadow rounded-lg focus:border-shadow focus:ring-0"></textarea> --}}


            <input required type="text" name="location" placeholder="Τοποθεσία"
                class="m-3 border-2 border-shadow rounded-lg focus:border-shadow focus:ring-0">

            <input required type="number" name="capacity" placeholder="Χωρητικότητα"
                class="m-3 border-2 border-shadow rounded-lg focus:border-shadow focus:ring-0">

            <input required type="date" name="venue_date" placeholder="Ημερομηνία"
                class="m-3 border-2 border-shadow rounded-lg focus:border-shadow focus:ring-0">

            <input required type="time" name="venue_time" placeholder="Ώρα"
                class="m-3 border-2 border-shadow rounded-lg focus:border-shadow focus:ring-0">


            <button type="submit"
                class="lg:col-span-2 bg-slg-red text-white justify-self-center p-2 my-4 rounded-lg active:bg-button" action>
                Αποθήκευση </button>



        </form>
    </div>
@endsection
