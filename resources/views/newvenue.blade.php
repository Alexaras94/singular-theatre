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


            <textarea name="description" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Περιγραφή"></textarea>


            <button type="submit" class="bg-slate-900 text-white p-2 mt-4 rounded-lg" action> Αποθήκευση </button>

            <a class="underline lg:col-span-2 text-center mt-2" href="">Νέα ημερομηνία υπάρχουσας παράστασης</a>

        </form>
    </div>
@endsection
