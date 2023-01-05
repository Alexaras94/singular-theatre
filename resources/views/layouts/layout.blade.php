{{-- @vite(['resources/sass/app.scss', 'resources/js/app.js', 'resources/css/app.css']) --}}
@vite('resources/css/app.css')

<body class="h-full bg-white flex flex-col">

    <header class="flex flex-col ">

        <div class="flex justify-between items-center px-6">
            <img src="{{ asset('images/slg.png') }}">
            <a class="text-center text-4xl font-medium">Θεατρική Ομάδα</a>
            <img src="{{ asset('images/epsilon-singular.png') }}">
        </div>

        <div class="border-t border-slg-blue h-16 w-full flex flex-row items-center ">
            <img src="{{ asset('images/masks.png') }}" class="h-28 mx-20">


            <div class="basis-4/5 mx-4" id="navbarSupportedContent">

                <ul class="flex">
                    @if (Auth::user())
                        <li class="mx-3">
                            <a class="{{ request()->is('venues/create') ? 'font-bold text-slg-blue' : '' }}"
                                href="{{ route('venues.create') }}">Προσθήκη Παράστασης</a>
                        </li>

                        <li class="mx-3">
                            <a class="{{ request()->is('venues/venue/edit') ? 'font-bold text-slg-blue' : '' }}"
                                href="{{ route('venues.edit', 'venue') }}">Επεξεργασία
                                Παράστασης</a>
                        </li>

                        <li class="mx-3">
                            <a href="{{ route('reservation.export') }}">Λήψη Κρατήσεων</a>
                        </li>
                    @else
                        <li class="mx-3">
                            <a class="{{ request()->is('reservations') ? 'font-bold text-slg-blue' : '' }}"
                                href="/reservations">Πραγματοποίηση
                                Κράτησης</a>
                        </li>


                        <li class="mx-3">
                            <a class="{{ request()->is('reservations/create') ? 'font-bold text-slg-blue' : '' }}"
                                href="{{ route('reservations.create') }}">Ακύρωση Κράτησης</a>
                        </li>
                    @endif
                </ul>


            </div>


            <div class="text-right underline">
                @if (Route::has('login'))
                    <div class="">
                        @auth
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf

                                <a class="" href="route('logout')"
                                    onclick="event.preventDefault();
                                        this.closest('form').submit();">
                                    Log out
                                </a>
                            </form>
                        @else
                            <a href="{{ route('login') }}" class="">Log in</a>


                        @endauth
                    </div>
                @endif
            </div>
        </div>
    </header>

    <div class="bg-slg-blue flex-1">

        @yield('content')

    </div>


    <footer class="self-end bg-footer w-full  flex flex-row justify-evenly py-2">
        <img src="{{ asset('images/epsilon-slg.png') }}" class="h-12">
        <img src="{{ asset('images/epsilon.png') }}" class="h-12">
        <img src="{{ asset('images/space.png') }}" class="h-10">
        <img src="{{ asset('images/slg.png') }}" class="h-12">
    </footer>





</body>


{{-- #003876 blue --}}
{{-- #c12e1a red --}}
