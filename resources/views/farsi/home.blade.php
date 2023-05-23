@extends('farsi.master.index')

@section('content')
    <div class="container">
        <div class="row pb-5">
            <div class="col-12 mb-5">
                <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="/images/banner-2stfestival.jpg" class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="/images/banner1.jpg" class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="/images/banner-02.jpg" class="d-block w-100" alt="...">
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
            <div class="col-12 col-md-3 text-center p-3">
                <div class="card" >
                    <div class="card-body bg_silver ">
                        <a href="/documents/EN.pdf" class="text-light" >open call
                            <img src="/images/PDF_icon.png" width="25px" />
                        </a>

                    </div>
                </div>
            </div>
            <div class="col-12 col-md-3 text-center p-3">
                <div class="card" >
                    <div class="card-body bg_silver ">
                        <a href="/documents/FA.pdf" class="text-light" >فراخوان فارسی
                            <img src="/images/PDF_icon.png" width="25px" />
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-3 text-center p-3">
                <div class="card" >
                    <div class="card-body bg_silver ">
                        <a href="/documents/AR.pdf" class="text-light" >دعوة المهرجان
                            <img src="/images/PDF_icon.png" width="25px" />
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-3 text-center p-3">
                <div class="card" >
                    <div class="card-body bg_silver ">
                        <a href="/documents/Ordu.pdf" class="text-light" >اردو کال
                            <img src="/images/PDF_icon.png" width="25px" />
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection



