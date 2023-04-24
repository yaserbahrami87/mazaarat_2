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

                <nav class="col-12 navbar navbar-expand-lg navbar-light bg-transparent mb-5">
                    <button class="navbar-toggler bg-light" type="button" data-toggle="collapse" data-target="#navbarVerticalContent" aria-controls="navbarVerticalContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarVerticalContent">
                        <ul class="navbar-nav mr-auto p-0">
                            <li class="nav-item">
                                <a class="nav-link text-light" href="/">خانه</a>
                            </li>
                            @guest
                                <li class="nav-item active">
                                    <a class="nav-link text-light" href="/farsi/login">ثبت نام / عضویت <span class="sr-only">(current)</span></a>
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
                                            {{ __('خروج') }}
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                            @csrf
                                        </form>
                                    </div>
                                </li>
                            @endif
                            <li class="nav-item">
                                <a class="nav-link text-light" href="/farsi/upload">ارسال عکس</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle text-light" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
                                    گالری
                                </a>
                                <div class="dropdown-menu">
                                    <!--
                                    <a class="dropdown-item" href="/farsi/gallery">عکس های نخستین جشنواره</a>
                                    -->
                                    <a class="dropdown-item" href="/farsi/gallery">تصویر جشنواره</a>
                                </div>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle text-light" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
                                    اخبار
                                </a>
                                <div class="dropdown-menu">
                                    <!--
                                    <a class="dropdown-item" href="/farsi/news">راه یافتگان نخستین جشنواره</a>
                                    <a class="dropdown-item" href="#">اختتامیه نخستین جشنواره</a>
                                    <a class="dropdown-item" href="#">برگزیدگان نخستین جشنواره</a>
                                    -->

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
                                    <!--
                                    <a class="dropdown-item" href="#">نخستین دوره جشنواره</a>
                                    -->
                                    <a class="dropdown-item" href="/farsi/pillars">دومین دوره جشنواره</a>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-light" href="#">آرشیو</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-light" href="#">تماس با ما</a>
                            </li>
                        </ul>
                    </div>
                </nav>

        </div>
    </div>

    @yield('content')
</main>
@include('farsi.master.footer')
