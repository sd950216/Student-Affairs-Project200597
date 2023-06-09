<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">    @yield('styles')

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.css" rel="stylesheet" />

</head>
<body>
<div id="app">
    <nav class="navbar navbar-expand-md navbar-dark bg-black shadow-sm">
        <div class="container">

            @if(Auth::guest())
                <a class="navbar-brand" href="{{ url('/') }}">

                    <img src="https://ui-avatars.com/api/?name=t" width="30" height="30" class="d-inline-block align-top" alt="">

                    {{ config('app.name', 'TRAP') }}
                </a>
            @else
                <a class="navbar-brand" href="{{ url('/home') }}">

                    <img src="https://ui-avatars.com/api/?name=t" width="30" height="30" class="d-inline-block align-top" alt="">

                    {{ config('app.name', 'TRAP') }}
                </a>
            @endif

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav me-auto">

                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ms-auto">
                    <!-- Authentication Links -->
                    @guest
                        @if (Route::has('login'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                        @endif
                    @else
                        @if (Auth::user()->role == 'admin')

                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" >
                                    Add
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="/AddDepartment">Department</a>
                                    <a class="dropdown-item" href="/AddSubject">Subject</a>

                                </div>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">Create account</a>
                            </li>

                        @endif
                        @if (Auth::user()->role == 'student')
                            <li class="nav-item">
                                <a class="nav-link " href="/StudentSubject">AddStudentSubject</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link " href="/list/files">Files</a>
                            </li>
                        @endif
                        @if (Auth::user()->role == 'doctor')
                            <li class="nav-item">
                                <a class="nav-link " href="/list/files">Files</a>
                            </li>
                        @endif

                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>

    <main class="py-4" style="margin-top: 15%;">
        <div class="container text-center">
            <h1 class="display-4">Welcome to our academic System!</h1>
            <p class="lead">Our system is designed to Unlock academic success with our Student Subject Selection System. simplifying subject choices to ensure a seamless journey towards your upcoming semester. Begin your journey to academic success with our Student Subject Selection System today!
            </p>
        </div>


    </main>
</div>
@yield('scripts')
</body>

</html>
