<footer class="container" dir="rtl">
    <div class="col-12 text-center">
        <img src="/images/footer.png" width="60px" class="position-relative" id="bolt-footer"/>
    </div>
    <div class="row pt-4  mb-3">

        <div class="col-md-4">
            <b class="d-block">ارتباط با ما</b>
            <p class="m-0 text-justify">مشـهـد مقدس. خیـابـان کـوهـسنـگی 11. عـدالـت 18. پـلاک 9
                مـوسســــه آفــرینـش‌هــــای هـنـــــری آستـــــان قــــدس رضــــــوی</p>
            <a href="tel:09390482732" class="mr-3">09390482732</a>
            <a href="mailto:info@mazaar.net" class="d-block">info@mazaar.net</a>
        </div>
        <div class="col-md-2 align-items-center text-justify">

            <p>مالکیت حقوقی و معنوی این تارنما متعلق به دبیرخانه جشنواره بین المللی عکس مزارات می باشد</p>
        </div>
        <div class="col-md-2 align-items-center text-center p-0">
            <a href="https://www.facebook.com/mazaar.photo/" target="_blank" class="d-inline-block social mr-3" id="facebook_footer"></a>
            <a href="https://t.me/Mazaarat_2023" target="_blank" class="d-inline-block social mr-3" id="telegram_footer"></a>
            <a href="" class="d-inline-block social mr-3" id="insta_footer"></a>
            <a href="" class="d-inline-block social mr-3" id="whatsapp_footer"></a>
        </div>
        <div class="col-md-4">
            <a href="https://www.aqart.ir/Maktab-Rezvan.aspx" target="_blank">
                <img src="/images/logo_maktab.png" width="100px" class="mr-2" />
            </a>

            <a href="https://www.aqart.ir/" target="_blank">
                <img src="/images/logo_aq.png" width="100px" />
            </a>
            <a href="https://www.aqart.ir/" target="_blank">
                <img src="/images/logo_moavenat.png" width="100px" />
            </a>

        </div>

    </div>
</footer>

<script src="/js/jquery.slim.min.js" ></script>
<script src="/js/bootstrap.bundle.min.js" ></script>
<script>
    $('#collapseGallery').on('show.bs.collapse', function ()
        {
            $('#collapseExample').collapse('hide');
            $('#collapseLogin').collapse('hide');
            $('#collapseSignup').collapse('hide');
            $('#collapseNews').collapse('hide');
            $('#collapseCall').collapse('hide');
            $('#collapsePillars').collapse('hide');
            $('#collapseAuth').collapse('hide');
        }
    )

    $('#link_signup').on('show.bs.collapse', function ()
        {
            $('#collapseGallery').collapse('hide');
            $('#collapseNews').collapse('hide');
            $('#collapseCall').collapse('hide');
            $('#collapsePillars').collapse('hide');
            $('#collapseAuth').collapse('hide');
        }
    )

    $('#collapseLogin').on('show.bs.collapse', function ()
    {
        $('#collapseSignup').collapse('hide');
        $('#collapseNews').collapse('hide');
        $('#collapseCall').collapse('hide');
        $('#collapsePillars').collapse('hide');
        $('#collapseAuth').collapse('hide');
    });

    $('#collapseSignup').on('show.bs.collapse', function ()
    {
        $('#collapseLogin').collapse('hide');
        $('#collapseNews').collapse('hide');
        $('#collapseCall').collapse('hide');
        $('#collapsePillars').collapse('hide');
        $('#collapseAuth').collapse('hide');
    });


    $('#collapseExample').on('hide.bs.collapse', function ()
    {
        $('#collapseLogin').collapse('hide');
        $('#collapseSignup').collapse('hide');
        $('#collapseNews').collapse('hide');
        $('#collapseCall').collapse('hide');
        $('#collapsePillars').collapse('hide');
        $('#collapseAuth').collapse('hide');
    });

    $('#collapseExample').on('show.bs.collapse', function ()
        {
            $('#collapseGallery').collapse('hide');
            $('#link_signup').collapse('hide');
            $('#collapseNews').collapse('hide');
            $('#collapseCall').collapse('hide');
            $('#collapsePillars').collapse('hide');
            $('#collapseAuth').collapse('hide');
        }
    );

    $('#collapseNews').on('show.bs.collapse', function ()
        {
            $('#collapseGallery').collapse('hide');
            $('#collapseExample').collapse('hide');
            $('#collapseCall').collapse('hide');
            $('#collapsePillars').collapse('hide');
            $('#collapseAuth').collapse('hide');

        }
    );

    $('#collapseCall').on('show.bs.collapse', function ()
        {
            $('#collapseGallery').collapse('hide');
            $('#collapseExample').collapse('hide');
            $('#collapseNews').collapse('hide');
            $('#collapsePillars').collapse('hide');
            $('#collapseAuth').collapse('hide');

        }
    );

    $('#collapsePillars').on('show.bs.collapse', function ()
        {
            $('#collapseGallery').collapse('hide');
            $('#collapseExample').collapse('hide');
            $('#collapseNews').collapse('hide');
            $('#collapseCall').collapse('hide');
            $('#collapseAuth').collapse('hide');

        }
    );

    $('#collapseAuth').on('show.bs.collapse', function ()
        {
            $('#collapseGallery').collapse('hide');
            $('#collapseExample').collapse('hide');
            $('#collapseNews').collapse('hide');
            $('#collapseCall').collapse('hide');
            $('#collapsePillars').collapse('hide');

        }
    );


</script>
@yield('footerScript')
</body>
</html>
