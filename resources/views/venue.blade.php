<div class="card  w-75">
    <h5 class="card-title">{{$venue->title}}</h5>
    <div class="card-body">

        <p>{{$venue->location}}</p>
        <p>{{$venue->venue_date}} </p>
        <p>{{$venue->venue_time}}</p>
        <p>{{$venue->capacity}}</p>

        @if( !(Auth::user()))

            {{-- <a href="{{route('reservation.create',$venue)}}">   <button class='btn btn-success'  >Κράτηση</button> </a> --}}
            <button type="button" class="btn btn-success" onclick="location.href='{{route('reservation.create',$venue)}}'">Κράτηση</button>
            <button class='btn btn-danger' onclick="location.href='{{route('reservation.edit',$venue)}}'">Ακύρωση Κράτησης</button>

        @else


            <button type="button" class="btn btn-primary" onclick="location.href='{{route('venues.edit',$venue)}}'">Επεξεργασία</button>
            <button class='btn btn-danger' onclick="location.href='{{route('venues.delete',$venue)}}'" >Διαγραφή</button>




        @endif
    </div>
</div>

