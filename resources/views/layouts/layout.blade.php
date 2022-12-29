


{{-- @vite(['resources/sass/app.scss', 'resources/js/app.js', 'resources/css/app.css']) --}}
@vite('resources/css/app.css')

<body class="bg-white">

<div class="bg-slate-900 sticky top-0 h-20 w-screen text-white flex flex-row items-center">
    <a class="basis-80 text-2xl border-r border-1 border-white text-center p-2 mx-4 h-full flex items-center" >Θεατρική Ομάδα «Εμείς»</a>


    <div class="basis-4/6 mx-4" id="navbarSupportedContent">
        
        <ul class="flex">
            @if( (Auth::user()))
                <li class="mx-3">
                    <a  class="{{ request()->is('venues*') ? 'font-bold' : '' }}" href="/venues">Επεξεργασία Παράστασης</a>
                </li>

                
                <li class="mx-3">
                    <a class="{{ request()->is('newvenue*') ? 'font-bold' : '' }}" href="{{ route('venues.create') }}">Προσθήκη Παράστασης</a>
                </li>
            @else
                <li class="mx-3">
                    <a  class="{{ request()->is('venues*') ? 'font-bold' : '' }}" href="/venues">Πραγματοποίηση Κράτησης</a>
                </li>

                
                <li class="mx-3">
                    <a class="{{ request()->is('newvenue*') ? 'font-bold' : '' }}" href="{{ route('venues.create') }}">Ακύρωση Κράτησης</a>
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


@yield('content')


<div class="fixed bg-white w-screen bottom-0 h-16 flex flex-row justify-evenly border border-t-1 border-slate-900 py-2">
    <img src="{{ asset('images/epsilon-singular.png') }}">
    <img src="{{ asset('images/epsilon-singular.png') }}">
    <img src="{{ asset('images/space.png') }}">
    <img src="{{ asset('images/slg.png') }}">
</div>





</body>





{{-- <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
            </li>


            @if (Auth::check())
                <li class="nav-item active">
                    <a class="nav-link" href="{{route('newvenue')}}">Νέα Παράσταση <span class="sr-only">(current)</span></a>
                </li>
            @endif


            <li class="nav-item">
                <a class="nav-link" href="#">Link</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Dropdown
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="#">Action</a>
                    <a class="dropdown-item" href="#">Another action</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">Something else here</a>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link disabled" href="#">Disabled</a>
            </li>
        </ul>

    </div> --}}
