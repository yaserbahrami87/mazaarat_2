@extends('english.master.index')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 mb-5">
                <img src="/images/banner-2stfestival.jpg" class="img-fluid" />
            </div>
        </div>
        <div class="col-12 mb-5">
            <div class="card" dir="ltr">
                <div class="card-header text-right">
                    <h3>Latest News</h3>
                </div>
                <div class="card-body" >
                    <div class="row">
                        @foreach($news as $item)
                            <div class="col-12 col-md-3">
                                <div class="card " >
                                    <img src="/images/news/{{$item->image}}" class="card-img-top" alt="..." height="160px">
                                    <div class="card-body text-justify">
                                        <p > <b class="card-title">{{$item->title_en}}</b></p>

                                    </div>
                                    <div class="card-footer text-center">
                                        <a href="/english/news/{{$item->title_en}}/show" class="btn btn-primary btn-sm   ">
                                            More
                                        </a>

                                    </div>
                                </div>

                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection



