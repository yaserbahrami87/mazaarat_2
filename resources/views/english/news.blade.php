@extends('english.master.index')
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
            <div class="col-12 text-center mb-3 en">
                <img src="/images/news_en.png" class="img-fluid " />
            </div>
            <div class="col-12  mb-5 " id="news" >
                <div class="row"  dir="ltr">
                    @foreach($festival->news as $news)
                        <div class="col-12 col-md-3 mb-2">
                            <div class="card" >
                                <img src="/images/news/{{$news->image}}" class="card-img-top" alt="...">
                                <div class="card-body text-right">
                                    <a href="/farsi/news/{{$news->title_en}}/show" >
                                        <h5 class="card-title">{{$news->title_en}}</h5>
                                    </a>
                                </div>
                                <div class="card-footer text-muted text-right">
                                    <small>{{$news->diff_en()}}</small>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>





                <div class="news_item " >
                    @foreach($festival->news as $news)
                        <div class="card border-0 bg-transparent p-3 text-light">
                            <img src="/images/news/{{$news->image}}" class="card-img-top mb-3" alt="...">
                            <div class="card-body p-0 en">
                                <a href="/english/news/{{$news->title_en}}/show" class="btn w-100 mb-3 text-light">{{$news->title_en}}</a>
                            </div>
                        </div>
                    @endforeach
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
