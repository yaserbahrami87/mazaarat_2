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
        <div class="col-md-4 text-right mx-auto pr-0">
            <ul class=" nav flex-column">
                <li class="nav-item">
                    <a class="nav-link" href="/">خانه</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample" id="link_signup" >ثبت نام / عضویت</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">ارسال عکس</a>
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

        <div class="col-md-4 text-center mx-auto">

        </div>

        <div class=" col-md-4 text-left mx-auto"  >
            <div class="collapse text-left" id="collapseGallery">
                <img src="/images/after.png" class="img-fluid mb-3 "/>
                <span class="d-block mb-3">
                    <a href="/farsi/gallery"  class="d-inline-block text-center">
                        عکس های نخستین جشنواره
                    </a>
                </span>
                <span class="d-block">
                    <a href="" class="d-inline-block text-center">
                        تـصــویــر جشـــنــواره
                    </a >
                </span>

            </div>


            <div class="collapse float-right mb-3" id="collapseExample" >
                <a class="btn btn-primary d-block mb-1 btn-sm" data-toggle="collapse" href="#collapseLogin" role="button" aria-expanded="false" aria-controls="collapseLogin">ورود اعضا</a>
                <a class="btn btn-primary btn-sm" data-toggle="collapse" href="#collapseSignup" role="button" aria-expanded="false" aria-controls="collapseSignup"      >ثبت نام</a>
            </div>

            <form class="collapse" id="collapseLogin">

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
                    <input type="password" class="form-control" name="pass" />
                </div>
                <input class="btn btn-primary" type="submit" value="ورود" />
            </form>

            <form class="collapse" id="collapseSignup">
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
                    <input type="password" class="form-control" name="pass" />
                </div>
                <input class="btn btn-primary" type="submit" value="ثبت نام" />
            </form>

            <div class="collapse text-left" id="collapseNews">
                <img src="/images/after.png" class="img-fluid mb-3 "/>
                <span class="d-block mb-3">
                    <a href="/farsi/gallery"  class="d-inline-block text-center">
                        راه یافتگان نخستین جشنواره
                    </a>
                </span>
                <span class="d-block mb-3">
                    <a href="" class="d-inline-block  text-center">
                        اختتامیه نخستین جشنواره
                    </a >
                </span>
                <span class="d-block">
                    <a href="" class="d-inline-block  text-center">
                        برگزیدگان نخستین جشنواره
                    </a >
                </span>
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
                <span class="d-block mb-3">
                    <a href="/farsi/pillars"  class="d-inline-block text-center">
                         نخستین دوره جشنواره
                    </a>
                </span>
                <span class="d-block mb-3">
                    <a href="" class="d-inline-block  text-center">
                        دوره دومین جشنواره
                    </a >
                </span>
            </div>

        </div>

    </div>

</main>
@include('farsi.master.footer')
