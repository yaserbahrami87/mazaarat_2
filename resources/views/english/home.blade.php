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
    <div class="row align-items-center signup_en" id="signup">
        <div class="col-12 col-md-4 text-left mx-auto"  >
            @if($errors->any())
                @foreach($errors->all() as $error)
                    <div class="alert alert-danger">{{$error}}</div>
                @endforeach
            @endif
            <div class="collapse text-right" id="collapseGallery">
                <img src="/images/after.png" class="img-fluid mb-3 "/>
                <span class="d-block mb-3">
                    <a href="/english/gallery"  class="d-inline-block text-center">
                        First edition gallery
                    </a>
                </span>
                <span class="d-block">
                    <a href="" class="d-inline-block text-center">
                        Image Festival
                    </a>
                </span>

            </div>


            <div class="collapse float-left mb-3" id="collapseExample" >
                <a class="btn btn-primary d-block mb-1 btn-sm" data-toggle="collapse" href="#collapseLogin" role="button" aria-expanded="false" aria-controls="collapseLogin">Login</a>
                <a class="btn btn-primary btn-sm" data-toggle="collapse" href="#collapseSignup" role="button" aria-expanded="false" aria-controls="collapseSignup"      >Register</a>
            </div>

            <form class="collapse" id="collapseLogin" method="POST" action="{{ route('login') }}">
                {{csrf_field()}}
                <div class="input-group mb-3">
                    <input type="text" class="form-control" name="email" />
                    <div class="input-group-prepend">
                        <span class="input-group-text" >Email</span>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <input type="password" class="form-control" name="password" />
                    <div class="input-group-prepend">
                        <span class="input-group-text" >Password</span>
                    </div>
                </div>
                <input class="btn btn-primary" type="submit" value="Login" />
            </form>

            <form class="collapse" id="collapseSignup" method="POST" action="{{ route('register') }}">
                {{csrf_field()}}
                <div class="input-group mb-3">
                    <input type="text" class="form-control" name="fname" />
                    <div class="input-group-prepend">
                        <span class="input-group-text bg-primary" >Fname</span>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <input type="text" class="form-control" name="lname" />
                    <div class="input-group-prepend">
                        <span class="input-group-text" >Lname</span>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <input type="text" class="form-control" name="email" />
                    <div class="input-group-prepend">
                        <span class="input-group-text" >Email</span>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <input type="password" class="form-control" name="password" />
                    <div class="input-group-prepend">
                        <span class="input-group-text" >Password</span>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <input type="password" class="form-control" name="password_confirmation" />
                    <div class="input-group-prepend">
                        <span class="input-group-text" >Confirm Password</span>
                    </div>
                </div>
                <input class="btn btn-primary" type="submit" value="ثبت نام" />
            </form>

            <div class="collapse text-right" id="collapseNews">
                <img src="/images/after.png" class="img-fluid mb-3 "/>
                <span class="d-block mb-3">
                    <a href="/english/news"  class="d-inline-block text-center">
                        First edition finalists
                    </a>
                </span>
                <span class="d-block mb-3">
                    <a href="" class="d-inline-block  text-center">
                        Closing of the first edition
                    </a >
                </span>
                <span class="d-block">
                    <a href="" class="d-inline-block  text-center">
                        First edition winners
                    </a >
                </span>
            </div>

            <div class="collapse text-right" id="collapseCall">
                <img src="/images/after.png" class="img-fluid mb-3 "/>
                <span class="d-block mb-3">
                    <a href="/english/call"  class="d-inline-block text-center">
                        Exhibit
                    </a>
                </span>
            </div>

            <div class="collapse text-right" id="collapsePillars">
                <img src="/images/after.png" class="img-fluid mb-3 "/>
                <span class="d-block mb-3">
                    <a href="/english/pillars"  class="d-inline-block text-center">
                         First edition
                    </a>
                </span>
                <span class="d-block mb-3">
                    <a href="" class="d-inline-block  text-center">
                        Festival 2nd edition
                    </a >
                </span>
            </div>

        </div>

        <div class="col-12 col-md-4 text-center mx-auto">

        </div>

        <div class="col-12 col-md-4 text-left mx-auto pr-0">
            <nav class="navbar navbar-expand-lg navbar-dark bg-transparent p-0 mb-3">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class=" nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link" href="/">Home</a>
                        </li>
                        @auth
                            <li class="nav-item">
                                <a class="nav-link" href="/home"  >{{Auth::user()->fname}}</a>
                            </li>
                        @else
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample" id="link_signup" >Register / Login</a>
                            </li>
                        @endauth
                        <li class="nav-item">
                            <a class="nav-link" href="/english/upload">Upload photo</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="collapse" href="#collapseGallery" role="button" aria-expanded="true" aria-controls="collapseGallery" >Gallery</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="collapse" href="#collapseNews" role="button" aria-expanded="true" aria-controls="collapseNews">News</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="collapse" href="#collapseCall" role="button" aria-expanded="true" aria-controls="collapseCall">Open Calls</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="collapse" href="#collapsePillars" role="button" aria-expanded="true" aria-controls="collapsePillars">Team</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Archive</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Contact us</a>
                        </li>

                    </ul>
                </div>
            </nav>
        </div>



    </div>

</main>
@include('farsi.master.footer')
