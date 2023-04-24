<!doctype html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <title></title>


    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="/css/bootstrap.min.css" />
    <link href="/css/bootstrap-rtl.min.css" rel="stylesheet" />
    <link href="/css/style.css" rel="stylesheet" />
    <link href="/lightbox-gallery-blurred/jquery.lightbox.css" rel="stylesheet" />
    @yield('headerScript')

</head>
<body>
<main class="container-fluid" id="main_gallery" dir="rtl">
    <div class="container">
        <div class="row">
            <nav class="col-12 navbar navbar-expand-lg navbar-light bg-transparent mb-5" dir="ltr">
                <button class="navbar-toggler bg-light" type="button" data-toggle="collapse" data-target="#navbarVerticalContent" aria-controls="navbarVerticalContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarVerticalContent_en">
                    <ul class="navbar-nav mr-auto p-0">
                        <li class="nav-item">
                            <a class="nav-link text-light" href="/">Home</a>
                        </li>
                        @guest
                        <li class="nav-item active">
                            <a class="nav-link text-light" href="#">Register / Login <span class="sr-only">(current)</span></a>
                        </li>
                        @else
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle text-light" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
                                    {{Auth::user()->fname}}
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                                        {{ __('Exit') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endif
                        <li class="nav-item">
                            <a class="nav-link text-light" href="/english/upload">Upload photo</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-light" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
                                Gallery
                            </a>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="/english/gallery">First edition gallery</a>
                                <a class="dropdown-item" href="#">Image Festival</a>
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-light" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
                                News
                            </a>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="/english/news">First edition finalists</a>
                                <a class="dropdown-item" href="#">Closing of the first edition</a>
                                <a class="dropdown-item" href="#">First edition winners</a>
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-light" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
                                Open Calls
                            </a>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="/english/call">Exhibit</a>
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-light" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
                                Team
                            </a>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="">First edition</a>
                                <a class="dropdown-item" href="/english/pillars">Festival 2nd edition</a>
                            </div>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link text-light" href="#">Archive</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-light" href="#">Contact us</a>
                        </li>


                    </ul>

                </div>
            </nav>
        </div>
    </div>

    @yield('content')
</main>
@include('farsi.master.footer')
