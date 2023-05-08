@extends('english.master.index')
@section('headerScript')
    <link href="/slick/slick.css" rel="stylesheet" />
    <link href="/slick/slick-theme.css" rel="stylesheet" />
@endsection
@section('content')
    <div class="container" dir="ltr">
        <div class="row">
            <div class="col-12 text-center mb-3">
                <img src="/images/news_en.png" class="img-fluid " />
            </div>
            <div class="col-12 text-center mb-3">
                <img src="/images/news/{{$news->image}}" class="w-50" />
            </div>
            <div class="col-12  mb-5 en" id="news">
                <div class="card p-5 text-right" id="news_single" >
                    <h1 class="text-center">{{$news->title_en}}</h1>
                    {!! $news->content_en !!}
                </div>
            </div>
        </div>
    </div>
@endsection

@section('footerScript')
@endsection
