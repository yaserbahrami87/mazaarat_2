@extends('english.master.index')
@section('headerScript')
    <link href="/slick/slick.css" rel="stylesheet" />
    <link href="/slick/slick-theme.css" rel="stylesheet" />
@endsection
@section('content')
    <div class="col-12 text-center mb-3">
        <img src="/images/news.png" class="img-fluid " />
    </div>
    <div class="col-12  mb-5 en" id="news" >
        <div class="news_item"  dir="ltr">
            @foreach($festival->news as $news)
                <div class="card border-0 bg-transparent p-3 text-light">
                    <img src="/images/news/{{$news->image}}" class="card-img-top mb-3" alt="...">
                    <div class="card-body p-0">
                        <a href="#" class="btn w-100 mb-3 text-light">{{$news->title_en}}</a>
                        <p class="card-text text-justify">{{$news->description_en}} </p>
                    </div>
                </div>
            @endforeach
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
            speed:1000,
            autoplay:true,
            arrows:true,
            responsive: [
                {
                    breakpoint: 1024,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 3,
                        infinite: true,
                        dots: true
                    }
                },
                {
                    breakpoint: 600,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 2
                    }
                },
                {
                    breakpoint: 480,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1
                    }
                }

            ]
        });
    </script>
@endsection
