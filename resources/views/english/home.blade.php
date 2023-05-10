<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=0, shrink-to-fit=no">
    <meta name="author" content="Yaser Bahrami">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="/css/bootstrap.min.css" />
    <link href="/css/bootstrap-rtl.min.css" rel="stylesheet" />
    <link href="/css/style.css" rel="stylesheet" />
    <link rel="icon" type="image/x-icon" href="/favicon.png">
    <title> Mazaarat International Photo Festival</title>
    <link rel="stylesheet" href="/plugins/intl-tel-input/build/css/intlTelInput.css">



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
                @foreach($festivals as $festival)
                    <span class="d-block">
                        <a href="/english/gallery/{{$festival->festival_en}}" class="d-inline-block text-center mb-2">
                            {{$festival->festival_en}}
                        </a>
                    </span>
                @endforeach
            </div>


            <div class="collapse float-left mb-3" id="collapseExample" >
                <a class="btn btn-primary d-block mb-1 btn-sm" data-toggle="collapse" href="#collapseLogin" role="button" aria-expanded="false" aria-controls="collapseLogin">Login</a>
                <a class="btn btn-primary btn-sm" data-toggle="collapse" href="#collapseSignup" role="button" aria-expanded="false" aria-controls="collapseSignup"      >Register</a>
            </div>

            <form class="collapse" id="collapseLogin" method="POST" action="{{ route('login') }}">
                <div class="row">
                    <div class="col-10 mx-auto">
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
                        <a class="btn btn-link" href="{{ route('password.request') }}">
                            {{ __('Forgot Your Password?') }}
                        </a>
                        <input class="btn btn-primary" type="submit" value="Login" />
                    </div>
                </div>

            </form>

            <form class="collapse" id="collapseSignup" method="POST" action="{{ route('register') }}">
                <div class="row">
                    <div class="col-10 mx-auto">
                        {{csrf_field()}}
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" name="fname" />
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-primary" >Name</span>
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" name="lname" />
                            <div class="input-group-prepend">
                                <span class="input-group-text" >Surname</span>
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" name="email" />
                            <div class="input-group-prepend">
                                <span class="input-group-text" >Email</span>
                            </div>
                        </div>
                        <div class="input-group mb-3" dir="ltr">
                            <label for="tel_">Tel</label>
                            <input type="text" class="form-control" id="tel_"  />
                            <input type="hidden" class="form-control" name="tel" id="tel"  />
                            <input type="hidden" class="form-control" name="country" id="country"  />
                            <input type="hidden" class="form-control" name="code" id="code"  />
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
                        <input class="btn btn-primary" type="submit" value="Register" />
                    </div>
                </div>
            </form>

            <div class="collapse text-right" id="collapseAuth">
                <img src="/images/after.png" class="img-fluid mb-3 "/>
                <span class="d-block mb-2">
                    <a href="/panel/english"  class="d-inline-block text-center mb-2">
                        Dashboard
                    </a>
                </span>
                <span class="d-block mb-2">

                    <form  action="{{ route('logout') }}" method="POST" >
                        {{csrf_field()}}
                        <button class="btn btn-primary">Exit</button>

                    </form>


                </span>
            </div>



            <div class="collapse text-right" id="collapseNews">
                <img src="/images/after.png" class="img-fluid mb-3 "/>
                @foreach($festivals as $festival)
                    <span class="d-block mb-3">
                        <a href="/english/news/{{$festival->festival_en}}"  class="d-inline-block text-center">
                            {{$festival->festival_en}}
                        </a>
                    </span>
                @endforeach
            </div>

            <div class="collapse text-right" id="collapseCall">
                <img src="/images/after.png" class="img-fluid mb-3 "/>
                <span class="d-block mb-3">
                    <a href="/english/call"  class="d-inline-block text-center">
                        Open Calls
                    </a>
                </span>
            </div>

            <div class="collapse text-right" id="collapsePillars">
                <img src="/images/after.png" class="img-fluid mb-3 "/>
                @foreach($festivals as $festival)
                    <span class="d-block mb-3">
                        <a href="/english/pillars/{{$festival->festival_en}}" class="d-inline-block  text-center">
                            {{$festival->festival_en}}
                        </a >
                    </span>
                @endforeach
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
                                <a class="nav-link"  data-toggle="collapse" href="#collapseAuth" role="button" aria-expanded="false" aria-controls="collapseAuth" id="link_auth"  >{{Auth::user()->fname}}</a>
                            </li>
                        @else
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample" id="link_signup" >Register / Login</a>
                            </li>
                        @endauth
                        <li class="nav-item">
                            <a class="nav-link" href="/panel/english/competiton/create">Upload photo</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="collapse" href="#collapseGallery" role="button" aria-expanded="true" aria-controls="collapseGallery" >Gallery</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="collapse" href="#collapseNews" role="button" aria-expanded="true" aria-controls="collapseNews">News</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="collapse" href="#collapseCall" role="button" aria-expanded="true" aria-controls="collapseCall">Call for Entries </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="collapse" href="#collapsePillars" role="button" aria-expanded="true" aria-controls="collapsePillars">Team</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/farsi/home">Farsi</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/english/contactUs/create">Contact us</a>
                        </li>

                    </ul>
                </div>
            </nav>
        </div>
    </div>

</main>
@include('english.master.footer')
