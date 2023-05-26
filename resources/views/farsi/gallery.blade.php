@extends('farsi.master.index')
@section('headerScript')
    <style>

        .gallery-title
        {
            font-size: 36px;
            color: #2e3192;
            text-align: center;
            font-weight: 500;
            margin-bottom: 70px;
        }
        .gallery-title:after {
            content: "";
            position: absolute;
            width: 7.5%;
            left: 46.5%;
            height: 45px;
            border-bottom: 1px solid #5e5e5e;
        }
        .filter-button
        {
            font-size: 18px;
            border: 1px solid #2e3192;
            border-radius: 5px;
            text-align: center;
            color: #2e3192;
            margin-bottom: 30px;

        }
        .filter-button:hover
        {
            font-size: 18px;
            border: 1px solid #2e3192;
            border-radius: 5px;
            text-align: center;
            color: #ffffff;
            background-color: #2e3192;

        }
        .btn-default:active .filter-button:active
        {
            background-color: #2e3192;
            color: white;
        }

        .port-image
        {
            width: 100%;
        }

        .gallery_product
        {
            margin-bottom: 30px;
        }

    </style>
@endsection
@section('content')
    <div class="container text-center">
        <div class="row align-items-center mt-3 mb-3 gallery" id="gallery">
            <div class="col-12 mx-auto" >
                <button class="btn btn-default filter-button" data-filter="all">همه</button>
                <button class="btn btn-default filter-button" data-filter="Prayer">نیایش</button>
                <button class="btn btn-default filter-button" data-filter="Mausoleums">مزارات</button>
            </div>

            @foreach($galleries as $pic)
                <div class="col-12 col-md-4 col-lg-3 mb-4 box_image text-center filter {{$pic->gallery_category->category_en}}">
                    <a href="/images/gallery/{{$pic->image}}" rel="{{$pic->fname_fa.' '.$pic->lname_fa}}" data-caption="{{$pic->fname_fa.' '.$pic->lname_fa}}" >
                        <img src="/images/gallery/thumbnail_{{$pic->image}}" height="100%" width=""  />
                    </a>
                </div>
            @endforeach


        </div>
        <div class="row">
            <div class="col-12  text-center">
                {{$galleries->links()}}
            </div>
        </div>

    </div>
@endsection

@section('footerScript')
    <script src="/js/jquery-3.6.4.min.js"></script>
    <script src="/lightbox-gallery-blurred/jquery.lightbox.js"></script>
    <script>
        $(function() {
            $('.gallery a').lightbox();
        });


        $(document).ready(function()
        {

            $(".filter-button").click(function(){
                var value = $(this).attr('data-filter');

                if(value == "all")
                {
                    //$('.filter').removeClass('hidden');
                    $('.filter').show('1000');
                }
                else
                {
                    $(".filter").not('.'+value).hide('3000');
                    $('.filter').filter('.'+value).show('3000');

                }
            });

            if ($(".filter-button").removeClass("active")) {
                $(this).removeClass("active");
            }
            $(this).addClass("active");

        });
    </script>

@endsection
