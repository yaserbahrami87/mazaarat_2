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
    <link rel="icon" type="image/x-icon" href="/favicon.png">
    <link rel="stylesheet" href="/plugins/intl-tel-input/build/css/intlTelInput.css">
    @yield('headerScript')

</head>
<body>
@include('sweetalert::alert')
<main class="container-fluid en" id="main_gallery" dir="rtl">
    <div class="container">
        <div class="row">
            <nav class="col-12 navbar navbar-expand-lg navbar-light bg-transparent mb-5 en text-left" dir="ltr">
                <button class="navbar-toggler bg-light" type="button" data-toggle="collapse" data-target="#navbarVerticalContent_en" aria-controls="navbarVerticalContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarVerticalContent_en">
                    <ul class="navbar-nav mr-auto p-0">
                        <li class="nav-item">
                            <a class="nav-link text-light" href="/">Home</a>
                        </li>
                        @guest
                        <li class="nav-item active">
                            <a class="nav-link text-light" href="/english/login">Register <span class="sr-only">(current)</span></a>
                        </li>

                        @else
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle text-light" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
                                    {{Auth::user()->fname}}
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="/panel/english">Dashboard</a>
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
                            <a class="nav-link text-light" href="/panel/english/competiton/create">Upload photo</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-light" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
                                Gallery
                            </a>
                            <div class="dropdown-menu">
                                @foreach($festivals as $festival)
                                    <a class="dropdown-item" href="/english/gallery/{{$festival->festival_en}}">{{$festival->festival_en}}</a>
                                @endforeach
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-light" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
                                News
                            </a>

                            <div class="dropdown-menu">
                                @foreach($festivals as $festival)
                                    <a class="dropdown-item" href="/english/news/{{$festival->festival_en}}">{{$festival->festival_en}}</a>
                                @endforeach
                            </div>

                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-light" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
                                Call for Entries
                            </a>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="/english/call">Open Calls</a>
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-light" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
                                Team
                            </a>
                            <div class="dropdown-menu">
                                <!--
                                <a class="dropdown-item" href="">First edition</a>
                                -->
                                @foreach($festivals as $festival)
                                <a class="dropdown-item" href="/english/pillars/{{$festival->festival_en}}">{{$festival->festival_en}}</a>
                                @endforeach
                            </div>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link text-light" href="/farsi/home">Farsi</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-light" href="mailto:info@mazaar.net">Contact us</a>
                        </li>


                    </ul>

                </div>
            </nav>
        </div>
    </div>

    <div class="container en text-right" dir="ltr">
        <div class="row">
            <div class="col-12">
                @if($errors->any())
                    @foreach($errors->all() as $error)
                        <div class="alert alert-danger">{{$error}}</div>
                    @endforeach
                @endif
            </div>
        </div>
    </div>

    @yield('content')
</main>
@include('english.master.footer')
