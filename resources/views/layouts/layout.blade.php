{{-- @vite(['resources/sass/app.scss', 'resources/js/app.js', 'resources/css/app.css']) --}}
@vite('resources/css/app.css')

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Θεατρική Ομάδα</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="{{ asset('fonts/nunito-latin-400-normal.woff2') }}">
    <link rel="stylesheet" href="{{ asset('fonts/nunito-latin-600-normal.woff2') }}">
    <link rel="stylesheet" href="{{ asset('fonts/nunito-latin-700-normal.woff2') }}">

</head>


<body class="h-full bg-white flex flex-col">

    <header class="flex flex-col ">

        <div class="flex justify-between items-center px-6">
            <a href="https://portal.singularlogic.eu/en"><img src="{{ asset('images/slg.svg') }}"
                    class="lg:h-12 sm:h-8 h-6"></a>
            <a class="text-slg-blue text-center
                lg:text-4xl sm:text-3xl text-xl font-medium">Θεατρική
                Ομάδα</a>
            <a href="https://epsilon-singularlogic.eu/"><img src="{{ asset('images/epsilon-slg.svg') }}"
                    class="lg:h-16 sm:h-10 h-8"></a>
        </div>

        <div class="border-t border-slg-blue h-16  flex flex-row items-center justify-between">
            <a href="{{ Auth::user() ? route('venues.create') : route('reservations.index') }}"><img
                    src="{{ asset('images/masks.svg') }}" class="lg:h-28 lg:mx-20 h-20 mx-10"></a>


            <div class="hidden sm:block basis-4/5 mx-4" id="navbarSupportedContent">

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
                                href="{{ route('reservations.index') }}">Πραγματοποίηση
                                Κράτησης</a>
                        </li>


                        <li class="mx-3">
                            <a class="{{ request()->is('reservations/create') ? 'font-bold text-slg-blue' : '' }}"
                                href="{{ route('reservations.create') }}">Ακύρωση Κράτησης</a>
                        </li>

                        <li class="mx-3">
                            <a href="{{ route('poster') }}" target="_blank">Αφίσα Παράστασης</a>
                        </li>
                    @endif
                </ul>


            </div>


            <div class="hidden sm:block text-right underline mr-6">
                @if (Route::has('login'))
                    <div class="">
                        @auth
                            <div class="flex">
                                <a href="{{ route('profile.edit') }}" class="mx-5">Προφίλ</a>
                                <form class="mx-1" method="POST" action="{{ route('logout') }}">
                                    @csrf

                                    <a class="" href="route('logout')"
                                        onclick="event.preventDefault();
                                        this.closest('form').submit();">
                                        Log&nbsp;out
                                    </a>

                                </form>

                            </div>
                        @else
                            <a href="{{ route('login') }}" class="">Log&nbsp;in</a>


                        @endauth
                    </div>
                @endif
            </div>


            <div class="sm:hidden flex items-center mr-3">
                <button class="outline-none mobile-menu-button">
                    <svg class="w-6 h-6 text-slg-blue" x-show="!showMenu" fill="none" stroke-linecap="round"
                        stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                        <path d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                </button>
            </div>
        </div>

        <div class="hidden sm:hidden mobile-menu border-t-2 border-slg-blue">
            <ul class="">
                @if (Auth::user())
                    <li class="my-3 text-center">
                        <a class="{{ request()->is('venues/create') ? 'font-bold text-slg-blue block' : 'block' }}"
                            href="{{ route('venues.create') }}">Προσθήκη Παράστασης</a>
                    </li>

                    <li class="my-3 text-center">
                        <a class="{{ request()->is('venues/venue/edit') ? 'font-bold text-slg-blue block' : 'block' }}"
                            href="{{ route('venues.edit', 'venue') }}">Επεξεργασία
                            Παράστασης</a>
                    </li>

                    <li class="my-3 text-center">
                        <a class="block" href="{{ route('reservation.export') }}">Λήψη Κρατήσεων</a>
                    </li>
                @else
                    <li class="my-3 text-center">
                        <a class="{{ request()->is('reservations') ? 'font-bold text-slg-blue block' : 'block' }}"
                            href="/reservations">Πραγματοποίηση
                            Κράτησης</a>
                    </li>


                    <li class="my-3 text-center">
                        <a class="{{ request()->is('reservations/create') ? 'font-bold text-slg-blue block' : 'block' }}"
                            href="{{ route('reservations.create') }}">Ακύρωση Κράτησης</a>
                    </li>
                @endif
            </ul>

            <div class="underline text-center border-t border-dashed border-slg-blue py-2">
                @if (Route::has('login'))
                    <div class="">

                        <a href="{{ route('profile.edit') }}" class="">Προφίλ</a>
                        @auth
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf

                                <a class="" href="route('logout')"
                                    onclick="event.preventDefault();
                                        this.closest('form').submit();">
                                    Log&nbsp;out
                                </a>
                            </form>
                        @else
                            <a href="{{ route('login') }}" class="">Log&nbsp;in</a>


                        @endauth
                    </div>
                @endif
            </div>
        </div>


    </header>

    <div class="bg-slg-blue flex-1 ">

        @yield('content')

    </div>


    <footer class="self-center bg-footer  grid grid-cols-4 gap-3 py-2 items-center">
        <a href="https://epsilon-singularlogic.eu/"><img src="{{ asset('images/epsilon-slg.svg') }}"
                class="md:h-14  h-9"></a>
        <a href="https://www.epsilonnet.gr/"><img src="{{ asset('images/epsilon.svg') }}" class="md:h-12  h-8"></a>
        <a href="https://www.space.gr/en"><img src="{{ asset('images/space.svg') }}" class="md:h-10  h-6"></a>
        <a href="https://portal.singularlogic.eu/en"> <img src="{{ asset('images/slg.svg') }}"
                class="md:h-12  h-8"></a>
    </footer>





</body>

<script>
    const btn = document.querySelector("button.mobile-menu-button");
    const menu = document.querySelector(".mobile-menu");

    btn.addEventListener("click", () => {
        menu.classList.toggle("hidden");
    });
</script>

</html>
