

<!-- CSS only -->
<style>
    .page-footer{
        position: absolute;
        bottom: 0px;
    }

</style>


@vite(['resources/sass/app.scss', 'resources/js/app.js'])

<body style="background: #ddd;">

<nav class="navbar navbar-expand-lg navbar-light bg-dark bg-gradient sticky-top">
    <a class="navbar-brand fs-3 text-white mx-5" h ref="#">ΘΕΑΤΡΙΚΗ ΟΜΑΔΑ</a>



    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link text-white mx-3" href="/venues">Παραστάσεις</a>
            </li>

            @if( (Auth::user()))
            <li class="nav-item active">
                <a class="nav-link text-white mx-3" href="{{ route('venues.create') }}">Νέα Παράσταση</a>
            </li>

            @endif
        </ul>
    </div>


    <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
        @if (Route::has('login'))
            <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block mx-5">
                @auth
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <a class="text-sm text-white underline" href="route('logout')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        Log out
                </a>
                </form>
                @else
                    <a href="{{ route('login') }}" class="text-sm text-white underline">Log in</a>


                @endauth
            </div>
        @endif
       @section('content')
    </div>
</nav>


@yield('content')





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
