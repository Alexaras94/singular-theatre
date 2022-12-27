@extends('layouts.layout')
@section('content')

<div class=" " >
    <div class="card">

       <p class="text-lg-center">Κράτηση θέσεων στην θεατρική παράσταση</p>
        <h1 class="card-header text-center p-2 ">Interview</h1>
    <div class="card-text" >



        Η θεατρική ομάδα των εταιρειών SingularLogic και Epsilon Singularlogic  παρουσιάζει στις 29 και 30 Ιανουαρίου καθώς και 2 και 5 Φεβρουαρίου 2023 το έργο «Interview» γραμμένο από την Ομάδα «Εμείς», στο θέατρο Αλάμπρα.
        Το έργο, μια  κοινωνικοπολιτική μαύρη κωμωδία, που με άξονα την εξουσία και τις εργασιακές σχέσεις εξερευνά και περιγράφει τις συμπεριφορές των ανθρώπων, τους ανταγωνισμούς που αναπτύσσονται μεταξύ τους, τις αξίες τους, τις αντοχές τους σε συνθήκες πίεσης και τους συμβιβασμούς που είναι διατεθειμένοι να κάνουν.
    </div>
        <div class="card  row justify-content-center "  >
            <form class="row justify-content-center" action="{{route('reservation.store')}}" method="POST">

                @csrf

                <select class="js-states browser-default select2 col-lg-5" name=reservation_id" required id="reservation_id">

                    @foreach($venues as $venue)
                        <option value="{{ $venue->id }}" {{$venue->id == $venue->id  ? 'selected' : ''}}>
                            {{$venue->venue_date}}

                        </option>
                    @endforeach

                </select>
                <input type="number" name="number_of_seats" placeholder="Θέσεις" class="form-control col-lg-5">

                <input type="text" name="username" placeholder="Οναματεπώνυμο" class="form-control col-lg-5" >

                <input type="text" name="company" placeholder="Εταιρία" class="form-control col-lg-5">



                <input type="email" name="email" placeholder="email" class="form-control col-lg-5 ">



                <input type="text" name="phone" placeholder="Κινητό Τηλέφωνο" class="form-control col-lg-5">




                <button type="submit" class="btn btn-primary" action > Υποβολή </button>

            </form>
        </div>


        <div  style="display:flex; justify-content:space-evenly; align-self: center;">
        @if( !(Auth::user()))



            {{-- <a href="{{route('reservation.create',$venue)}}">   <button class='btn btn-success'  >Κράτηση</button> </a> --}}


{{--            <button type="button" class="btn btn-success mx-2" onclick="location.href='{{route('reservation.create',$venue)}}'">Κράτηση</button>--}}
{{--            <button class='btn btn-danger mx-2' onclick="location.href='{{route('reservation.edit',$venue)}}'">Ακύρωση Κράτησης</button>--}}

        @else


{{--            <button type="button" class="btn btn-primary mx-3" onclick="location.href='{{route('venues.edit',$venue)}}'">Επεξεργασία</button>--}}
{{--            <button class='btn btn-danger mx-3' onclick="location.href='{{route('venues.delete',$venue)}}'" >Διαγραφή</button>--}}




        @endif
    </div>
    </div>
</div>

@endsection
