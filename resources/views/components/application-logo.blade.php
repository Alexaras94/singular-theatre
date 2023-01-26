<a href="{{ Auth::user() ? route('venues.create') : route('reservations.index') }}"><img
        src="{{ asset('images/masks.svg') }}" class="lg:h-28  h-20 mx-auto"></a>
