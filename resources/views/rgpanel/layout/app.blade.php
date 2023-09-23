<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Responsive Admin Dashboard Template">
    <meta name="keywords" content="admin,dashboard">
    <meta name="author" content="stacks">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- The above 6 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title -->
    <title>
        RGPANEL |
        @isset($title)
            {{ $title }}
        @endisset
    </title>

    <!-- Styles -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;300;400;500;600;700;800&display=swap"
        rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css?family=Material+Icons|Material+Icons+Outlined|Material+Icons+Two+Tone|Material+Icons+Round|Material+Icons+Sharp"
        rel="stylesheet">
    <link href="{{ asset('dist/rgpanel/assets') }}/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('dist/rgpanel/assets') }}/plugins/perfectscroll/perfect-scrollbar.css" rel="stylesheet">
    <link href="{{ asset('dist/rgpanel/assets') }}/plugins/pace/pace.css" rel="stylesheet">
    <link href="{{ asset('dist/rgpanel/assets') }}/plugins/highlight/styles/github-gist.css" rel="stylesheet">


    <!-- Theme Styles -->
    <link href="{{ asset('dist/rgpanel/assets') }}/css/main.min.css" rel="stylesheet">
    <link href="{{ asset('dist/rgpanel/assets') }}/css/custom.css" rel="stylesheet">

    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('dist/rgpanel/assets') }}/images/neptune.png" />
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('dist/rgpanel/assets') }}/images/neptune.png" />
    @yield('styles')
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
</head>

<body>
    <div class="app align-content-stretch d-flex flex-wrap">
        @include('rgpanel.layout.sidebar')
        <div class="app-container">
            <div class="search">
                <form>
                    <input class="form-control" type="text" placeholder="Type here..." aria-label="Search">
                </form>
                <a href="#" class="toggle-search"><i class="material-icons">close</i></a>
            </div>
            <div class="app-header">
                <nav class="navbar navbar-light navbar-expand-lg">
                    <div class="container-fluid">
                        <div class="navbar-nav" id="navbarNav">
                            <ul class="navbar-nav">
                                <li class="nav-item">
                                    <a class="nav-link hide-sidebar-toggle-button" href="#"><i
                                            class="material-icons">first_page</i></a>
                                </li>
                            </ul>

                        </div>
                        <div class="d-flex">
                            <ul class="navbar-nav">
                                {{-- <li class="nav-item ">
                                    <a class="nav-link toggle-search" href="#"><i
                                            class="material-icons">search</i></a>
                                </li> --}}

                                <li class="nav-item d-xl-none"><a class="nav-link" href="#"><img width="20"
                                            src="{{ asset('dist/rgpanel/assets') }}/images/flags/us.png"
                                            alt=""></a>
                                </li>
                                <li class="nav-item hidden-on-mobile">
                                    <a class="nav-link language-dropdown-toggle" href="#" id="languageDropDown"
                                        data-bs-toggle="dropdown"><img
                                            src="{{ asset('dist/rgpanel/assets') }}/images/flags/us.png"
                                            alt=""></a>
                                    <ul class="dropdown-menu dropdown-menu-end language-dropdown"
                                        aria-labelledby="languageDropDown">
                                        <li><a class="dropdown-item" href="#"><img
                                                    src="{{ asset('dist/rgpanel/assets') }}/images/flags/us.png"
                                                    alt="">US</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>
            </div>
            <div class="app-content">
                <div class="content-wrapper">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col">
                                <div class="page-description">
                                    <h1>
                                        @isset($title)
                                            {{ $title }}
                                        @else
                                            @lang('menu.dashboard')
                                        @endisset
                                    </h1>

                                </div>
                            </div>
                        </div>
                        @yield('content')
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Javascripts -->
    <script src="{{ asset('dist/rgpanel/assets') }}/plugins/jquery/jquery-3.5.1.min.js"></script>
    <script src="{{ asset('dist/rgpanel/assets') }}/plugins/bootstrap/js/popper.min.js"></script>
    <script src="{{ asset('dist/rgpanel/assets') }}/plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="{{ asset('dist/rgpanel/assets') }}/plugins/perfectscroll/perfect-scrollbar.min.js"></script>
    <script src="{{ asset('dist/rgpanel/assets') }}/plugins/pace/pace.min.js"></script>
    <script src="{{ asset('dist/rgpanel/assets') }}/plugins/highlight/highlight.pack.js"></script>
    <script src="{{ asset('dist/rgpanel/assets') }}/js/main.min.js"></script>
    <script src="{{ asset('dist/rgpanel/assets') }}/js/custom.js"></script>
    @vite('resources/js/rgpanel/app.js')
    @yield('js')
</body>

</html>
