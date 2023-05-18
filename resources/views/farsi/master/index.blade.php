<!doctype html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="author" content="یاسر بهرامی">

    <title>جشنواره بین المللی عکس مزارات | Mazaarat International Photo Festival</title>
    <meta name="description" content="Online Tutorials for all type of brains">


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
<main class="container-fluid" id="main_gallery" dir="rtl">
    <div class="container">
        <div class="row">

                <nav class="col-12 navbar navbar-expand-lg navbar-light bg-transparent mb-2">
                    <button class="navbar-toggler bg-light" type="button" data-toggle="collapse" data-target="#navbarVerticalContent" aria-controls="navbarVerticalContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarVerticalContent">
                        <ul class="navbar-nav mr-auto p-0">
                            <li class="nav-item">
                                <a class="nav-link text-light" href="/farsi/home">خانه</a>
                            </li>
                            @guest
                                <li class="nav-item active">
                                    <a class="nav-link text-light" href="/farsi/login">عضویت <span class="sr-only">(current)</span></a>
                                </li>
                            @else
                                <li class="nav-item dropdown">

                                    <a class="nav-link dropdown-toggle text-light" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
                                        {{Auth::user()->fname}}
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                        @if(Auth::user()->is_admin==1)
                                            <a class="dropdown-item" href="/admin/panel">داشبورد</a>
                                        @else
                                            <a class="dropdown-item" href="/panel">داشبورد</a>
                                        @endif
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                           onclick="event.preventDefault();
                                                             document.getElementById('logout-form').submit();">
                                            {{ __('خروج') }}
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                            {{csrf_field()}}
                                        </form>
                                    </div>
                                </li>
                            @endif
                            <li class="nav-item">
                                <a class="nav-link text-light" href="/panel/competiton/create">ارسال عکس</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle text-light" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
                                    گالری
                                </a>
                                <div class="dropdown-menu">
                                    @foreach($festivals as $festival)
                                        <a class="dropdown-item" href="/farsi/gallery/{{$festival->festival_en}}">{{$festival->festival_fa}}</a>
                                    @endforeach
                                </div>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle text-light" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
                                    اخبار
                                </a>
                                <div class="dropdown-menu">
                                    @foreach($festivals as $festival)
                                        <a class="dropdown-item" href="/farsi/news/{{$festival->festival_en}}">{{$festival->festival_fa}}</a>
                                    @endforeach

                                </div>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle text-light" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
                                    فراخوان
                                </a>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="/farsi/call">نمایش متن فراخوان</a>
                                </div>
                            </li>

                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle text-light" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
                                    ارکان جشنواره
                                </a>
                                <div class="dropdown-menu">
                                    @foreach($festivals as $festival)
                                        <a class="dropdown-item" href="/farsi/pillars/{{$festival->festival_en}}">{{$festival->festival_fa}}</a>
                                    @endforeach

                                </div>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-light" href="/english/home">
                                    EN
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-light" href="/farsi/contactUs/create_fa">تماس با ما</a>
                            </li>
                        </ul>
                    </div>
                </nav>

        </div>
    </div>
    <div class="container">
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
@include('farsi.master.footer')
