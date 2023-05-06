<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=0, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="/css/bootstrap.min.css" />
    <link href="/css/bootstrap-rtl.min.css" rel="stylesheet" />
    <link href="/css/style.css" rel="stylesheet" />
    <title></title>
</head>
<body>
<main class="container-fluid" id="main_signup" dir="rtl">
    <div class="row align-items-center signup_fa" id="signup">
        <div class="col-12 col-md-4 text-right mx-auto pr-0" dir="ltr">
            <nav class="navbar navbar-expand-lg navbar-dark bg-transparent p-0 mb-3">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link" href="/">خانه</a>
                        </li>
                        @auth
                            <li class="nav-item">
                                <a class="nav-link" href="/home"  >{{Auth::user()->fname}}</a>
                            </li>
                        @else
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample" id="link_signup" >ثبت نام / عضویت</a>
                            </li>
                        @endguest
                        <li class="nav-item">
                            <a class="nav-link" href="/panel/competition/create">ارسال عکس</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="collapse" href="#collapseGallery" role="button" aria-expanded="true" aria-controls="collapseGallery" >گالری</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="collapse" href="#collapseNews" role="button" aria-expanded="true" aria-controls="collapseNews">اخبار</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="collapse" href="#collapseCall" role="button" aria-expanded="true" aria-controls="collapseCall">فراخوان</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="collapse" href="#collapsePillars" role="button" aria-expanded="true" aria-controls="collapsePillars">ارکان جشنواره</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">آرشیو</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">تماس با ما</a>
                        </li>

                    </ul>
                </div>
            </nav>
        </div>

        <div class="col-12 col-md-4 text-center mx-auto">

        </div>

        <div class="col-12 col-md-4 text-left mx-auto"  >
            @if($errors->any())
                @foreach($errors->all() as $error)
                    <div class="alert alert-danger">{{$error}}</div>
                @endforeach
            @endif
            <div class="collapse text-left mb-3" id="collapseGallery">
                <img src="/images/after.png" class="img-fluid mb-3 "/>
                @foreach($festivals as $festival)
                    <span class="d-block">
                        <a href="/farsi/gallery/{{$festival->festival_fa}}" class="d-inline-block text-center mb-2">
                            {{$festival->festival_fa}}
                        </a>
                    </span>
                @endforeach

            </div>


            <div class="collapse float-right mb-3" id="collapseExample" >
                <a class="btn btn-primary d-block mb-1 btn-sm" data-toggle="collapse" href="#collapseLogin" role="button" aria-expanded="false" aria-controls="collapseLogin">ورود اعضا</a>
                <a class="btn btn-primary btn-sm" data-toggle="collapse" href="#collapseSignup" role="button" aria-expanded="false" aria-controls="collapseSignup"      >ثبت نام</a>
            </div>

            <form class="collapse" id="collapseLogin" method="POST" action="{{ route('login') }}">
                {{csrf_field()}}
                <div class="row">
                    <div class="col-10 mx-auto">

                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" >ایمیل</span>
                            </div>
                            <input type="text" class="form-control" name="email" />
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" >رمز عبور</span>
                            </div>
                            <input type="password" class="form-control" name="password" />
                        </div>
                        <input class="btn btn-primary" type="submit" value="ورود" />
                    </div>
                </div>
            </form>

            <form class="collapse" id="collapseSignup" method="POST" action="{{ route('register') }}">
                {{csrf_field()}}
                <div class="row">
                    <div class="col-10 mx-auto">

                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-primary" >نام</span>
                            </div>
                            <input type="text" class="form-control" name="fname" />
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" >نام خانوادگی</span>
                            </div>
                            <input type="text" class="form-control" name="lname" />
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" >ایمیل</span>
                            </div>
                            <input type="text" class="form-control" name="email" />
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" >رمز عبور</span>
                            </div>
                            <input type="password" class="form-control" name="password" />
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" >تکرار رمز عبور</span>
                            </div>
                            <input type="password" class="form-control" name="password_confirmation" />
                        </div>

                        <input class="btn btn-primary" type="submit" value="ثبت نام" />
                    </div>
                </div>
            </form>

            <div class="collapse text-left" id="collapseNews">
                <img src="/images/after.png" class="img-fluid mb-3 "/>
                @foreach($festivals as $festival)
                    <span class="d-block mb-2">
                        <a href="/farsi/news/{{$festival->festival_en}}"  class="d-inline-block text-center mb-2">
                            {{$festival->festival_fa}}
                        </a>
                    </span>
                @endforeach
            </div>

            <div class="collapse text-left" id="collapseCall">
                <img src="/images/after.png" class="img-fluid mb-3 "/>
                <span class="d-block mb-3">
                    <a href="/farsi/call"  class="d-inline-block text-center">
                        نمایش متن فراخوان
                    </a>
                </span>
            </div>

            <div class="collapse text-left" id="collapsePillars">
                <img src="/images/after.png" class="img-fluid mb-3 "/>
                @foreach($festivals as $festival)
                    <span class="d-block mb-3">
                        <a href="/farsi/pillars/{{$festival->festival_en}}" class="d-inline-block  text-center">
                             {{$festival->festival_fa}}
                        </a >
                </span>
                @endforeach
            </div>

        </div>

    </div>

</main>
@include('farsi.master.footer')
