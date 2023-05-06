@extends('english.master.index')

@section('content')
    <div class="container en">
        <div class="row align-items-center mt-3 mb-3 gallery" id="gallery" >
            <div class="col-12 col-md-4 col-lg-3 mb-4 box_image text-center">
                <a href="/images/gallery/mazaar/13-11.jpg" rel="rel1" data-caption="" >
                    <img src="/images/gallery/mazaar/13-11.jpg" class="h-100"  />
                </a>
            </div>
            <div class="col-12 col-md-4 col-lg-3 mb-4 box_image text-center">
                <a href="/images/gallery/mazaar/13-13.jpg" rel="rel1"  >
                    <img src="/images/gallery/mazaar/13-13.jpg" class="h-100"  />
                </a>

            </div>
            <div class="col-12 col-md-4 col-lg-3 mb-4 box_image text-center">
                <a href="/images/gallery/mazaar/27-12.jpg" rel="rel1"  >
                    <img src="/images/gallery/mazaar/27-12.jpg" class="h-100"  />
                </a>

            </div>
            <div class="col-12 col-md-4 col-lg-3 mb-4 box_image text-center">
                <a href="/images/gallery/mazaar/43-13.jpg" rel="rel1"  >
                    <img src="/images/gallery/mazaar/43-13.jpg" class="h-100"  />
                </a>

            </div>
            <div class="col-12 col-md-4 col-lg-3 mb-4 box_image text-center">
                <a href="/images/gallery/mazaar/44-14.jpg" rel="rel1"  >
                    <img src="/images/gallery/mazaar/44-14.jpg" class="h-100"  />
                </a>

            </div>
            <div class="col-12 col-md-4 col-lg-3 mb-4 box_image text-center">
                <a href="/images/gallery/mazaar/86-13.jpg" rel="rel1"  >
                    <img src="/images/gallery/mazaar/86-13.jpg" class="h-100"  />
                </a>

            </div>
            <div class="col-12 col-md-4 col-lg-3 mb-4 box_image text-center">
                <a href="/images/gallery/mazaar/94-11.jpg" rel="rel1"  >
                    <img src="/images/gallery/mazaar/94-11.jpg" class="h-100"  />
                </a>

            </div>
            <div class="col-12 col-md-4 col-lg-3 mb-4 box_image text-center">
                <a href="/images/gallery/mazaar/161-11.jpg" rel="rel1"  >
                    <img src="/images/gallery/mazaar/161-11.jpg" class="h-100"  />
                </a>

            </div>
            <div class="col-12 col-md-4 col-lg-3 mb-4 box_image text-center">
                <a href="/images/gallery/mazaar/179-11.jpg" rel="rel1"  >
                    <img src="/images/gallery/mazaar/179-11.jpg" class="h-100"  />
                </a>

            </div>
            <div class="col-12 col-md-4 col-lg-3 mb-4 box_image text-center">
                <a href="/images/gallery/mazaar/246-11.jpg" rel="rel1"  >
                    <img src="/images/gallery/mazaar/246-11.jpg" class="h-100"  />
                </a>

            </div>
            <div class="col-12 col-md-4 col-lg-3 mb-4 box_image text-center">
                <a href="/images/gallery/mazaar/260-13.jpg" rel="rel1"  >
                    <img src="/images/gallery/mazaar/260-13.jpg" class="h-100"  />
                </a>

            </div>
            <div class="col-12 col-md-4 col-lg-3 mb-4 box_image text-center">
                <a href="/images/gallery/mazaar/277-14.jpg">
                    <img src="/images/gallery/mazaar/277-14.jpg" class="h-100"  />
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
