@extends('farsi.master.index')
@section('headerScript')
    <link href="/slick/slick.css" rel="stylesheet" />
    <link href="/slick/slick-theme.css" rel="stylesheet" />
@endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 text-center mb-3">
                <img src="/images/news.png" class="img-fluid " />
            </div>
            <div class="col-12 text-center mb-3">
                <img src="/images/news/{{$news->image}}" class="img-fluid " />
            </div>
            <div class="col-12  mb-5 " id="news">
                <div class="card p-5" id="news_single">
                    <h1 class="text-center">{{$news->title_fa}}</h1>
                    {!! $news->content_fa !!}
                </div>
            </div>
        </div>
    </div>
@endsection

@section('footerScript')
@endsection
