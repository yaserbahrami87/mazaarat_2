@extends('english.master.index')

@section('content')
    <div class="container">
        <div class="row align-items-center mt-3 mb-3 gallery" id="gallery">
            <div class="col-6 col-md-3 mb-4 box_image">
                <a href="/images/gallery/2.jpg" rel="rel1"  >
                    <img src="/images/gallery/1.jpg" class="img-fluid"  />
                </a>

            </div>
            <div class="col-6 col-md-3 mb-4 box_image">
                <a href="/images/gallery/1.jpg" rel="rel1"  >
                    <img src="/images/gallery/1.jpg" class="img-fluid"  />
                </a>

            </div>
            <div class="col-6 col-md-3 mb-4 box_image">
                <a href="/images/gallery/2.jpg" rel="rel1"  >
                    <img src="/images/gallery/1.jpg" class="img-fluid"  />
                </a>

            </div>
            <div class="col-6 col-md-3 mb-4 box_image">
                <a href="/images/gallery/1.jpg" rel="rel1"  >
                    <img src="/images/gallery/1.jpg" class="img-fluid"  />
                </a>

            </div>
            <div class="col-6 col-md-3 mb-4 box_image">
                <a href="/images/gallery/2.jpg" rel="rel1"  >
                    <img src="/images/gallery/1.jpg" class="img-fluid"  />
                </a>

            </div>
            <div class="col-6 col-md-3 mb-4 box_image">
                <a href="/images/gallery/1.jpg" rel="rel1"  >
                    <img src="/images/gallery/1.jpg" class="img-fluid"  />
                </a>

            </div>
            <div class="col-6 col-md-3 mb-4 box_image">
                <a href="/images/gallery/2.jpg" rel="rel1"  >
                    <img src="/images/gallery/1.jpg" class="img-fluid"  />
                </a>

            </div>
            <div class="col-6 col-md-3 mb-4 box_image">
                <a href="/images/gallery/1.jpg" rel="rel1"  >
                    <img src="/images/gallery/1.jpg" class="img-fluid"  />
                </a>

            </div>
            <div class="col-6 col-md-3 mb-4 box_image">
                <a href="/images/gallery/2.jpg" rel="rel1"  >
                    <img src="/images/gallery/2.jpg" class="img-fluid"  />
                </a>

            </div>
            <div class="col-6 col-md-3 mb-4 box_image">
                <a href="/images/gallery/1.jpg" rel="rel1"  >
                    <img src="/images/gallery/2.jpg" class="img-fluid"  />
                </a>

            </div>
            <div class="col-6 col-md-3 mb-4 box_image">
                <a href="/images/gallery/2.jpg" rel="rel1"  >
                    <img src="/images/gallery/1.jpg" class="img-fluid"  />
                </a>

            </div>
            <div class="col-6 col-md-3 mb-4 box_image">
                <a href="/images/gallery/1.jpg">
                    <img src="/images/gallery/2.jpg" class="img-fluid"  />
                </a>

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
