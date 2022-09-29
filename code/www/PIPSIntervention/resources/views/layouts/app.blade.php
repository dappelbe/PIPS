<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="icon" type="image/x-icon" href="{{asset('images/pips.ico')}}">
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{asset('js/fontawesome.js')}}" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js" crossorigin="anonymous"></script>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body style="background-color: #000000; background-image: url('{{asset("images/pips-bg.png")}}'); background-repeat: no-repeat; background-size: cover;">
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}" data-cy="navlink-pips-home">
                    <img src="{{asset('images/pips-logo.png')}}" alt="PIPS Logo" class="img-thumbnail" style="height: 2em;"/>
                </a>
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
                                    <a class="nav-link" href="{{ route('login') }}" data-cy="link-login">{{ __('Login') }}</a>
                                </li>
                            @endif

                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown"
                                   class="nav-link dropdown-toggle"
                                   href="#" role="button"
                                   data-bs-toggle="dropdown"
                                   aria-haspopup="true"
                                   aria-expanded="false"
                                    data-cy="link-username">
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"
                                        data-cy="link-logout">
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

        <main class="py-4">
            @guest
            @else
                @canany(['user-list','role-list', 'consent-list', 'study-list'])
                <div class="container">
                    <div class="card" data-cy="admin-card">
                        <div class="card-body bg-light">
                            <button class="btn btn-success" data-cy="admin-home-button">
                                <em class="fa-solid fa-home"></em>&#160;
                                <a
                                    class="text-decoration-none text-white"
                                    href="{{ route('home') }}" role="button"
                                    data-cy="link-manage-users">
                                    Home page
                                </a>
                            </button>

                            @can(['user-list'])
                                <button class="btn btn-primary" data-cy="admin-users-button">
                                    <em class="fa-solid fa-users"></em>&#160;
                                    <a
                                        class="text-decoration-none text-white"
                                        href="{{ route('users.index') }}" role="button"
                                        data-cy="link-manage-users">
                                        User Management
                                    </a>
                                </button>
                            @endcan
                            @can(['role-list'])
                                <button class="btn btn-primary" data-cy="admin-roles-button">
                                    <em class="fa-solid fa-people-roof"></em>&#160;
                                    <a
                                        class="text-decoration-none text-white"
                                        href="{{ route('roles.index') }}" role="button"
                                        data-cy="link-manage-roles">
                                        Role Management
                                    </a>
                                </button>
                            @endcan
                            @can(['study-list'])
                                <button class="btn btn-primary" data-cy="admin-study-button">
                                    <em class="fa-solid fa-building-columns"></em>&#160;
                                    <a
                                        class="text-decoration-none text-white"
                                        href="{{ route('study.index') }}" role="button"
                                        data-cy="link-manage-consents">
                                        Study Management
                                    </a>
                                </button>
                            @endcan
                            @can(['consent-list'])
                                <button class="btn btn-primary" data-cy="admin-consent-button">
                                    <em class="fa-solid fa-clipboard-check"></em>&#160;
                                    <a
                                        class="text-decoration-none text-white"
                                        href="{{ route('consentforms.pips.list') }}" role="button"
                                        data-cy="link-manage-consents">
                                        Consent Management
                                    </a>
                                </button>
                            @endcan
                        </div>
                    </div>
                </div>

                <div class="row">
                    &#160;
                </div>
                @endcanany
            @endguest
            @yield('content')
        </main>
    </div>

    <footer id="footer" class="m-2 bg-white">

        <div class="footer1">
            <div class="container">
                <div class="row">

                    <div class="col-md-3 widget">
                        <h3 class="widget-title">Contact</h3>
                        <div class="widget-body">
                            <p>
                                <a href="mailto:Vicki.Barber@ndorms.ox.ac.uk" data-cy="mailto-vb">Vicki.Barber@ndorms.ox.ac.uk</a><br>
                                <a href="mailto:duncan.appelbe@ndorms.ox.ac.uk" data-cy="mailto-da">duncan.appelbe@ndorms.ox.ac.uk</a><br>
                                <br>
                            </p>
                        </div>
                    </div>

                    <div class="col-md-3 widget h-100">
                        <h3 class="widget-title">Funded By</h3>
                        <div class="widget-body">
                            <p>
                                <img class="img-responsive" src="{{asset('images/logo-nihr-1000w-1.png')}}"
                                     alt="NIHR Funded By Logo"
                                     data-cy="logo-nihr"
                                    height="70em"/>
                            </p>
                        </div>
                    </div>

                    <div class="col-md-3 widget h-100">
                        <h3 class="widget-title">Hosted By</h3>
                        <div class="widget-body">
                            <p>
                                <a href="https://www.ndorms.ox.ac.uk/octru" target="_blank">
                                    <img class="img-responsive" src="{{asset('images/octru-logo.jpg')}}"
                                         alt="OCTRU Logo"
                                         data-cy="logo-octru"
                                         height="70em"/>
                                </a>
                            </p>
                        </div>
                    </div>
                    <div class="col-md-3 widget h-100">
                        <h3 class="widget-title"></h3>
                        <div class="widget-body">
                            <p>
                                <a href="//compliance.admin.ox.ac.uk/submit-foi" target="_blank" rel="noopener"
                                   class="link-external" data-cy="link_foi">Freedom of Information</a> <br/><br/>
                                <a href="//www.ndorms.ox.ac.uk/about/data-privacy-notice" target="_blank"
                                   rel="noopener" data-cy="link_privacy">Privacy Policy</a> <br/><br/>
                                <a href="//www.ndorms.ox.ac.uk/accessibility-statement" target="_blank"
                                   rel="noopener" class="link-external" data-cy="link_accessibility">Accessibility Statement</a>
                            </p>
                        </div>
                    </div>
                </div> <!-- /row of widgets -->
            </div>
        </div>

        <div class="footer2">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 widget text-center">
                        <div class="widget-body">
                            <p class="text-right">
                                Copyright &copy; 2022, OCTRU.
                            </p>
                        </div>
                    </div>
                </div> <!-- /row of widgets -->
            </div>
        </div>
    </footer>
</body>
</html>
