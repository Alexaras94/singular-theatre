@extends('layouts.layout')
@section('content')

<div class="h-5/6 flex flex-col items-center" >
    <div class="text-center w-4/6 border border-1 border-slate-900 my-4">

        <p class="text-xl my-3">Κράτηση θέσεων στην θεατρική παράσταση</p>
        <h1 class="text-3xl underline my-4"><strong>Interview</strong></h1>
        <p class="m-5 text-lg" >
            Η θεατρική ομάδα των εταιρειών SingularLogic και Epsilon Singularlogic  παρουσιάζει στις 29 και 30 
            Ιανουαρίου καθώς και 2 και 5 Φεβρουαρίου 2023 το έργο «Interview» γραμμένο από την Ομάδα «Εμείς», 
            στο θέατρο Αλάμπρα. 
        </p>

        <p class="m-5 text-lg" >
            
            Το έργο, μια  κοινωνικοπολιτική μαύρη κωμωδία, που με άξονα την εξουσία και τις 
            εργασιακές σχέσεις εξερευνά και περιγράφει τις συμπεριφορές των ανθρώπων, τους ανταγωνισμούς που 
            αναπτύσσονται μεταξύ τους, τις αξίες τους, τις αντοχές τους σε συνθήκες πίεσης και τους συμβιβασμούς 
            που είναι διατεθειμένοι να κάνουν.
        </p>
    </div>



    <div class="my-4 w-3/6"  >
        <form class="grid lg:grid-cols-2 gap-4" action="{{route('reservation.store')}}" method="POST">

            @csrf

            <select required name="reservation_id"  id="reservation_id" class="m-3 border-2 border-slate-900 rounded-lg focus:border-slate-900 focus:ring-0">
                <option value="" hidden >
                    Επιλέξτε ημερομηνία
                </option>
                @foreach($venues as $venue)
                    <option value="{{ $venue->id }}" >
                        {{$venue->venue_date}}
                    </option>
                @endforeach

            </select>
            
            <input required type="number" name="number_of_seats" min=1 max=4 placeholder="Αριθμός Θέσεων" class="m-3 border-2 border-slate-900 rounded-lg focus:border-slate-900 focus:ring-0">

            

           

            <input required type="text" name="username" placeholder="Οναματεπώνυμο" class="m-3 border-2 border-slate-900 rounded-lg focus:border-slate-900 focus:ring-0" >

            <input required type="text" name="company" placeholder="Εταιρεία" class="m-3 border-2 border-slate-900 rounded-lg focus:border-slate-900 focus:ring-0">

           

            <input required type="email" name="email" placeholder="Email" class="m-3 border-2 border-slate-900 rounded-lg focus:border-slate-900 focus:ring-0">

            <input required type="text" name="phone" placeholder="Κινητό Τηλέφωνο" class="m-3 border-2 border-slate-900 rounded-lg focus:border-slate-900 focus:ring-0">

           

            <button type="submit" class="w-1/6 lg:col-span-2 bg-slate-900 text-white justify-self-center p-2 mt-4 rounded-lg" action >Κράτηση</button>

            {{-- <a class="underline lg:col-span-2 text-center mt-2" href="">Ακύρωση κράτησης</a> --}}


        </form>
    </div>


    
</div>

@endsection


{{-- {{$venue->id == $venue->id  ? 'selected' : ''}} --}}