{{-- @vite(['resources/sass/app.scss', 'resources/js/app.js', 'resources/css/app.css']) --}}
@vite('resources/css/app.css')

<body class="h-full bg-white flex flex-col justify-between">

    <div class="bg-slate-900  h-20 w-screen text-white flex flex-row items-center">
        <a class="basis-80 text-2xl border-r border-1 border-white text-center p-2 mx-4 h-full flex items-center">Θεατρική
            Ομάδα «Εμείς»</a>


        <div class="basis-4/6 mx-4" id="navbarSupportedContent">

            <ul class="flex">
                @if (Auth::user())
                    <li class="mx-3">
                        <a class="{{ request()->is('venues*') ? 'font-bold' : '' }}" href="/venues">Επεξεργασία
                            Παράστασης</a>
                    </li>


                    <li class="mx-3">
                        <a class="{{ request()->is('newvenue*') ? 'font-bold' : '' }}"
                            href="{{ route('venues.create') }}">Προσθήκη Παράστασης</a>
                    </li>
                @else
                    <li class="mx-3">
                        <a class="{{ request()->is('reservations') ? 'font-bold' : '' }}"
                            href="/reservations">Πραγματοποίηση
                            Κράτησης</a>
                    </li>


                    <li class="mx-3">
                        <a class="{{ request()->is('reservations/create') ? 'font-bold' : '' }}"
                            href="{{ route('reservations.create') }}">Ακύρωση Κράτησης</a>
                    </li>
                @endif
            </ul>


        </div>


        <div class="basis-1/6 text-right mx-4 underline ">
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
            {{-- @section('content') --}}
        </div>
    </div>

    <div class="">

        @yield('content')

    </div>


    <div class="self-end bg-white w-screen h-16 flex flex-row justify-evenly border border-t-1 border-slate-900 py-2">
        <img src="{{ asset('images/epsilon-singular.png') }}">
        <img src="{{ asset('images/epsilon-singular.png') }}">
        <img src="{{ asset('images/space.png') }}">
        <img src="{{ asset('images/slg.png') }}">
    </div>





</body>
