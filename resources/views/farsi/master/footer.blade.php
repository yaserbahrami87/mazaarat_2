<footer class="container" dir="rtl">
    <div class="row pt-4">

        <div class="col-md-4">
            <b class="d-block">ارتباط با ما</b>
            <p class="m-0 text-justify">مشـهـد. خیـابـان کـوهـسنـگی.کوهسنـگی 11. عـدالـت 18. پـلاک 9.1
                مـوسســــه آفــرینـش‌هــــای هـنـــــری آستـــــان قــــدس رضــــــوی</p>
            <a href="tel:05132001146" class="mr-3">051-32001146</a>
            <span class="text-light">.</span>
            <a href="tel:05132001146" class="ml-3">051-3225058</a>
            <a href="mailto:tarh.bamame@aqrazavi.org" class="d-block">tarh.bamame@aqrazavi.org</a>
        </div>
        <div class="col-md-2 align-items-center text-justify">
            <b>&nbsp;</b>
            <p>تمام حقــوق این وبـگاه متعلق به آستان قدس رضوی است</p>
        </div>
        <div class="col-md-3 align-items-center text-center">

            <a href="https://www.facebook.com/mazaar.photo/" target="_blank" class="d-inline-block social mr-3" id="facebook_footer"></a>
            <a href="https://t.me/Mazaarat_2023" target="_blank" class="d-inline-block social mr-3" id="telegram_footer"></a>
            <a href="" class="d-inline-block social mr-3" id="insta_footer"></a>
            <a href="" class="d-inline-block social mr-3" id="whatsapp_footer"></a>
        </div>
        <div class="col-md-3">
            <a href="https://www.aqart.ir/Maktab-Rezvan.aspx" target="_blank">
                <img src="/images/logo_maktab.png" width="120px" class="mr-2" />
            </a>

            <a href="https://www.aqart.ir/" target="_blank">
                <img src="/images/logo_aq.png" width="120px" />
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
        }
    )

    $('#link_signup').on('show.bs.collapse', function ()
        {
            $('#collapseGallery').collapse('hide');
            $('#collapseNews').collapse('hide');
            $('#collapseCall').collapse('hide');
            $('#collapsePillars').collapse('hide');
        }
    )

    $('#collapseLogin').on('show.bs.collapse', function ()
    {
        $('#collapseSignup').collapse('hide');
        $('#collapseNews').collapse('hide');
        $('#collapseCall').collapse('hide');
        $('#collapsePillars').collapse('hide');
    });

    $('#collapseSignup').on('show.bs.collapse', function ()
    {
        $('#collapseLogin').collapse('hide');
        $('#collapseNews').collapse('hide');
        $('#collapseCall').collapse('hide');
        $('#collapsePillars').collapse('hide');
    });


    $('#collapseExample').on('hide.bs.collapse', function ()
    {
        $('#collapseLogin').collapse('hide');
        $('#collapseSignup').collapse('hide');
        $('#collapseNews').collapse('hide');
        $('#collapseCall').collapse('hide');
        $('#collapsePillars').collapse('hide');
    });

    $('#collapseExample').on('show.bs.collapse', function ()
        {
            $('#collapseGallery').collapse('hide');
            $('#link_signup').collapse('hide');
            $('#collapseNews').collapse('hide');
            $('#collapseCall').collapse('hide');
            $('#collapsePillars').collapse('hide');
        }
    );

    $('#collapseNews').on('show.bs.collapse', function ()
        {
            $('#collapseGallery').collapse('hide');
            $('#collapseExample').collapse('hide');
            $('#collapseCall').collapse('hide');
            $('#collapsePillars').collapse('hide');

        }
    );

    $('#collapseCall').on('show.bs.collapse', function ()
        {
            $('#collapseGallery').collapse('hide');
            $('#collapseExample').collapse('hide');
            $('#collapseNews').collapse('hide');
            $('#collapsePillars').collapse('hide');

        }
    );

    $('#collapsePillars').on('show.bs.collapse', function ()
        {
            $('#collapseGallery').collapse('hide');
            $('#collapseExample').collapse('hide');
            $('#collapseNews').collapse('hide');
            $('#collapseCall').collapse('hide');

        }
    );


</script>
@yield('footerScript')
</body>
</html>
