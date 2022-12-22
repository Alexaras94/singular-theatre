<div class="card my-3 mx-1 bg-dark text-white border border-4 border-secondary rounded-4 col  col-xxl-3 col-xl-4  col-lg-5 col-sm-10" style="height:50vh; min-height:350px; ">
    <h4 class="card-title text-center p-2 ">{{$venue->title}}</h4>
    <div class="card-body" style="display:flex; flex-direction: column; justify-content:space-evenly">

        <p><strong>Τοποθεσία:</strong>&nbsp; {{$venue->location}}</p>
        <p><strong>Ημερομηνία:</strong>&nbsp; {{$venue->venue_date}} </p>
        <p><strong>Ώρα:</strong>&nbsp; {{$venue->venue_time}}</p>
        <p><strong>Ελεύθερες θέσεις:</strong>&nbsp; {{$venue->capacity}}</p>

        <div  style="display:flex; justify-content:space-evenly; align-self: center;">
        @if( !(Auth::user()))

        

            {{-- <a href="{{route('reservation.create',$venue)}}">   <button class='btn btn-success'  >Κράτηση</button> </a> --}}
            <button type="button" class="btn btn-success mx-2" onclick="location.href='{{route('reservation.create',$venue)}}'">Κράτηση</button>
            <button class='btn btn-danger mx-2' onclick="location.href='{{route('reservation.edit',$venue)}}'">Ακύρωση Κράτησης</button>

        @else


            <button type="button" class="btn btn-primary mx-3" onclick="location.href='{{route('venues.edit',$venue)}}'">Επεξεργασία</button>
            <button class='btn btn-danger mx-3' onclick="location.href='{{route('venues.delete',$venue)}}'" >Διαγραφή</button>




        @endif
    </div>
    </div>
</div>

