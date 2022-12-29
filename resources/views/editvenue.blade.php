@extends('layouts.layout')


@section('content')
    <div class="container" id="venuecards">


        <h1>Επεξεργασία Παράστασης</h1>
        <div class="">

            <form method="POST" action="{{ route('venues.update', 0) }}">
                @method('PUT')
                @csrf



                <input type="text" name="title"
                    class="m-3 border-2 border-slate-900 rounded-lg focus:border-slate-900 focus:ring-0">
                <input type="number" name="capacity"
                    class="m-3 border-2 border-slate-900 rounded-lg focus:border-slate-900 focus:ring-0">

                <input type="text" name="location"
                    class="m-3 border-2 border-slate-900 rounded-lg focus:border-slate-900 focus:ring-0">

                <input type="date" name="venue_date"
                    class="m-3 border-2 border-slate-900 rounded-lg focus:border-slate-900 focus:ring-0">

                <input type="time" name="venue_time"
                    class="m-3 border-2 border-slate-900 rounded-lg focus:border-slate-900 focus:ring-0">


                <button class='w-1/6 lg:col-span-2 bg-slate-900 text-white justify-self-center p-2 mt-4 rounded-lg'
                    type='submit'>Αποθήκεσυη</button>


            </form>
        </div>
    </div>
@endsection
