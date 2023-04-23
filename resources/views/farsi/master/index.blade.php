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
    <div class="row">
        <nav class="navbar navbar-expand-lg navbar-light bg-transparent mb-5">
            <button class="navbar-toggler bg-light" type="button" data-toggle="collapse" data-target="#navbarVerticalContent" aria-controls="navbarVerticalContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarVerticalContent">
                <ul class="navbar-nav mr-auto p-0">
                    <li class="nav-item">
                        <a class="nav-link text-light" href="/">خانه</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link text-light" href="#">ثبت نام / عضویت <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light" href="#">ارسال عکس</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light" href="#">گالری</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light" href="#">اخبار</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light" href="#">فراخوان</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light" href="#">ارکان جشنواره</a>
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

    @yield('content')
</main>
@include('farsi.master.footer')
