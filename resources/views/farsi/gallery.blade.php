@extends('farsi.master.index')

@section('content')
    <div class="container text-center">
        <div class="row align-items-center mt-3 mb-3 gallery" id="gallery">

            @foreach($galleries as $pic)
                <div class="col-12 col-md-4 col-lg-3 mb-4 box_image text-center">
                    <a href="/images/gallery/{{$pic->image}}" rel="{{$pic->fname_fa.' '.$pic->lname_fa}}" data-caption="{{$pic->fname_fa.' '.$pic->lname_fa}}" >
                        <img src="/images/gallery/thumbnail_{{$pic->image}}" height="100%" width=""  />
                    </a>
                </div>
            @endforeach


        </div>
        <div class="row">
            <div class="col-12">
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
    </script>

@endsection
