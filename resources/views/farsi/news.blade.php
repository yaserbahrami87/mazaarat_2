@extends('farsi.master.index')
@section('headerScript')
    <link href="/slick/slick.scss" rel="stylesheet" />
    <link href="/slick/slick-theme.scss" rel="stylesheet" />
@endsection
@section('content')
    <div class="col-12 text-center mb-3">
        <img src="/images/news.png" class="img-fluid " />
    </div>
    <div class="col-12  mb-5" id="news">

        <div class="news_item" >
            <div class="card border-0 bg-transparent p-3 text-light">
                <img src="/images/gallery/2.jpg" class="card-img-top mb-3" alt="...">
                <div class="card-body p-0">
                    <a href="#" class="btn w-100 mb-3 text-light">راه یافتگان نخستین جشنواره</a>

                    <p class="card-text text-justify">تست متن خبر تست متن خبر تست متن خبر تست متن خبر تست متن خبر </p>

                </div>
            </div>
            <div class="card border-0 bg-transparent p-3 text-light">
                <img src="/images/gallery/2.jpg" class="card-img-top mb-3" alt="...">
                <div class="card-body p-0">
                    <a href="#" class="btn w-100 mb-3 text-light">راه یافتگان نخستین جشنواره</a>

                    <p class="card-text text-justify">تست متن خبر تست متن خبر تست متن خبر تست متن خبر تست متن خبر </p>

                </div>
            </div>
            <div class="card border-0 bg-transparent p-3 text-light">
                <img src="/images/gallery/2.jpg" class="card-img-top mb-3" alt="...">
                <div class="card-body p-0">
                    <a href="#" class="btn w-100 mb-3 text-light">راه یافتگان نخستین جشنواره</a>

                    <p class="card-text text-justify">تست متن خبر تست متن خبر تست متن خبر تست متن خبر تست متن خبر </p>

                </div>
            </div>
            <div class="card border-0 bg-transparent p-3 text-light">
                <img src="/images/gallery/2.jpg" class="card-img-top mb-3" alt="...">
                <div class="card-body p-0">
                    <a href="#" class="btn w-100 mb-3 text-light">راه یافتگان نخستین جشنواره</a>

                    <p class="card-text text-justify">تست متن خبر تست متن خبر تست متن خبر تست متن خبر تست متن خبر </p>

                </div>
            </div>
            <div class="card border-0 bg-transparent p-3 text-light">
                <img src="/images/gallery/2.jpg" class="card-img-top mb-3" alt="...">
                <div class="card-body p-0">
                    <a href="#" class="btn w-100 mb-3 text-light">راه یافتگان نخستین جشنواره</a>

                    <p class="card-text text-justify">تست متن خبر تست متن خبر تست متن خبر تست متن خبر تست متن خبر </p>

                </div>
            </div>
            <div class="card border-0 bg-transparent p-3 text-light">
                <img src="/images/gallery/2.jpg" class="card-img-top mb-3" alt="...">
                <div class="card-body p-0">
                    <a href="#" class="btn w-100 mb-3 text-light">راه یافتگان نخستین جشنواره</a>

                    <p class="card-text text-justify">تست متن خبر تست متن خبر تست متن خبر تست متن خبر تست متن خبر </p>

                </div>
            </div>
            <div class="card border-0 bg-transparent p-3 text-light">
                <img src="/images/gallery/2.jpg" class="card-img-top mb-3" alt="...">
                <div class="card-body p-0">
                    <a href="#" class="btn w-100 mb-3 text-light">راه یافتگان نخستین جشنواره</a>

                    <p class="card-text text-justify">تست متن خبر تست متن خبر تست متن خبر تست متن خبر تست متن خبر </p>

                </div>
            </div>
            <div>your content</div>
            <div>your content</div>
        </div>
    </div>
@endsection

@section('footerScript')
    <script src="/slick/slick.js"></script>
    <script>
        $('.news_item').slick({
            infinite: true,
            slidesToShow: 5,
            slidesToScroll: 5,
            rtl:true,
            speed:1000,
            autoplay:true,
            arrows:true,
        });
    </script>
@endsection
