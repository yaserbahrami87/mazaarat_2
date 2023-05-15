@extends('farsi.master.index')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 mb-5">
                <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="/images/banner-2stfestival.jpg" class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="/images/banner-02.jpg" class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="/images/banner1.jpg" class="d-block w-100" alt="...">
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-target="#carouselExampleControls" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-target="#carouselExampleControls" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </button>
                </div>
            </div>
        </div>
        <div class="col-12 mb-5">
            <div class="card" >
                <div class="card-header ">
                    <h3>آخرین اخبار</h3>
                </div>
                <div class="card-body" >
                    <div class="row">
                        @foreach($news as $item)
                            <div class="col-12 col-md-3">
                                <div class="card " >
                                    <img src="/images/news/{{$item->image}}" class="card-img-top" alt="..." height="160px">
                                    <div class="card-body text-justify">
                                        <p > <b class="card-title">{{$item->title_fa}}</b></p>

                                    </div>
                                    <div class="card-footer text-center">
                                        <a href="/farsi/news/{{$item->title_en}}/show" class="btn btn-primary btn-sm   ">
                                            بیشتر
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



