@extends('layouts.layout')


@section('content')
    <div class="">
        <form action="{{ route('venues.store') }}" method="POST">

            @csrf

            <input type="text" name="title" placeholder="Τίτλος"
                class="m-3 border-2 border-slate-900 rounded-lg focus:border-slate-900 focus:ring-0">


            {{-- <div class="form-group">
                <textarea id="description" placeholder="Περιγραφή Παράστασης" name="description" rows="4" cols="50"
                    class="m-3 border-2 border-slate-900 rounded-lg focus:border-slate-900 focus:ring-0"></textarea>
            </div> --}}

            <input type="number" name="capacity" placeholder="Χωρητικότητα"
                class="m-3 border-2 border-slate-900 rounded-lg focus:border-slate-900 focus:ring-0">

            <input type="text" name="location" placeholder="Τοποθεσία"
                class="m-3 border-2 border-slate-900 rounded-lg focus:border-slate-900 focus:ring-0">

            <input type="date" name="venue_date" placeholder="Ημερομηνία"
                class="m-3 border-2 border-slate-900 rounded-lg focus:border-slate-900 focus:ring-0">

            <input type="time" name="venue_time" placeholder="Ώρα"
                class="m-3 border-2 border-slate-900 rounded-lg focus:border-slate-900 focus:ring-0">


            <button type="submit" class="bg-slate-900 text-white p-2 mt-4 rounded-lg" action> Αποθήκευση </button>

            <a class="underline lg:col-span-2 text-center mt-2" href="">Νέα ημερομηνία υπάρχουσας παράστασης</a>

        </form>
    </div>
@endsection
