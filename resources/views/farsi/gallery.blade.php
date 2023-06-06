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





        .green{
            background-color:#6fb936;
        }
        .thumb{
            margin-bottom: 30px;
        }

        .page-top{
            margin-top:85px;
        }


        img.zoom {
            width: 100%;
            height: 200px;
            border-radius:5px;
            object-fit:cover;
            -webkit-transition: all .3s ease-in-out;
            -moz-transition: all .3s ease-in-out;
            -o-transition: all .3s ease-in-out;
            -ms-transition: all .3s ease-in-out;
        }


        .transition {
            -webkit-transform: scale(1.2);
            -moz-transform: scale(1.2);
            -o-transform: scale(1.2);
            transform: scale(1.2);
        }
        .modal-header {

            border-bottom: none;
        }
        .modal-title {
            color:#000;
        }
        .modal-footer{
            display:none;
        }

    </style>



    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">

@endsection
@section('content')
    <div class="container page-top">



        <div class="row">
            @foreach($galleries as $pic)

            <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                <a href="/images/gallery/{{$pic->image}}" class="fancybox" rel="ligthbox" title="{{$pic->fname_fa.' '.$pic->lname_fa}}">
                    <img  src="/images/gallery/thumbnail_{{$pic->image}}" class="zoom img-fluid "  alt="">
                </a>
            </div>
            @endforeach
            <div class="col-12  text-center">
                {{$galleries->links()}}
            </div>
        </div>
    </div>





    <div class="container text-center">
        <!--
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
        -->


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



    <script src="//cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js"></script>
    <script>
        $(document).ready(function(){
            $(".fancybox").fancybox({
                openEffect: "none",
                closeEffect: "none"
            });

            $(".zoom").hover(function(){

                $(this).addClass('transition');
            }, function(){

                $(this).removeClass('transition');
            });
        });

    </script>
@endsection
