@extends('farsi.master.index')
@section('headerScript')
    <link href="/slick/slick.css" rel="stylesheet" />
    <link href="/slick/slick-theme.css" rel="stylesheet" />
    <style>
        #news img
        {
            border-radius:0px;
        }

        #news a:hover
        {
            background-color: transparent;
            color: #000000;
        }

        #news .card
        {
            min-height: 425px;
        }
    </style>
@endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 text-center mb-3">
                <img src="/images/news.png" class="img-fluid " />
            </div>
            <div class="col-12  mb-5" id="news">
                <div class="row">
                    @foreach($festival->news as $news)
                        <div class="col-12 col-md-3 mb-2">
                            <div class="card" >
                                <img src="/images/news/{{$news->image}}" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <a href="/farsi/news/{{$news->title_en}}/show" >
                                        <h5 class="card-title">{{$news->title_fa}}</h5>
                                    </a>
                                </div>
                                <div class="card-footer text-muted">
                                    {{$news->diff()}}
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="news_item" >



                </div>
            </div>
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
