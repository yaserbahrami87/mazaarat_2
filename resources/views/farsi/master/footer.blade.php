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
        <div class="col-md-3 align-items-center text-center p-0 d-flex justify-content-around">
            <a href="https://www.facebook.com/mazaar.photo/" target="_blank" class="d-inline-block social" id="facebook_footer"></a>
            <a href="https://t.me/Mazaarat_2023" target="_blank" class="d-inline-block social" id="telegram_footer"></a>
            <a href="https://instagram.com/mazaar.photo" target="_blank" class="d-inline-block social" id="insta_footer"></a>
            <a href="https://wa.me/message/JL4FATR7TRFPE1" target="_blank" class="d-inline-block social" id="whatsapp_footer"></a>
        </div>
        <div class="col-md-3 d-flex justify-content-around align-items-center">
            <a href="https://www.aqart.ir/Maktab-Rezvan.aspx" target="_blank">
                <img src="/images/logo_maktab.png" width="80px"  />
            </a>

            <a href="https://www.aqart.ir/" target="_blank">
                <img src="/images/logo_aq.png" width="80px" />
            </a>
            <a href="https://www.aqart.ir/" target="_blank">
                <img src="/images/logo_moavenat.png" width="80px" />
            </a>

        </div>

    </div>
</footer>

<script src="/js/jquery.slim.min.js" ></script>
<script src="/js/bootstrap.bundle.min.js" ></script>

<script type="text/javascript">window.$crisp=[];window.CRISP_WEBSITE_ID="d23eccc1-8bfc-4ee2-915d-3f1c6dc68a16";(function(){d=document;s=d.createElement("script");s.src="https://client.crisp.chat/l.js";s.async=1;d.getElementsByTagName("head")[0].appendChild(s);})();</script>

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

<script src="/plugins/intl-tel-input/build/js/intlTelInput.js"></script>
<script src="/plugins/intl-tel-input/build/js/utils.js"></script>
<script>
    var input = document.querySelector("#tel_");

    var intl=intlTelInput(input,{
        formatOnDisplay:false,
        separateDialCode:true,
        autoPlaceholder:'off',
        preferredCountries:["ir", "gb"],
        excludeCountries:["il"]
    });

    input.addEventListener("countrychange", function() {
        document.querySelector("#tel").value=intl.getNumber();
        document.querySelector("#country").value="+"+intl.getSelectedCountryData().name;
        document.querySelector("#code").value="+"+intl.getSelectedCountryData().dialCode;
        if(intl.getSelectedCountryData().dialCode==98)
        {
            document.querySelector('#states_register').setAttribute('class','form-group row');
            document.querySelector('#cities_register').setAttribute('class','form-group row');
        }
        else
        {
            document.querySelector('#states_register').setAttribute('class','form-group row d-none');
            document.querySelector('#cities_register').setAttribute('class','form-group row d-none');
        }
    });

    $('#tel_').change(function()
    {
        document.querySelector("#tel").value=intl.getNumber();
        document.querySelector("#country").value="+"+intl.getSelectedCountryData().name;
        document.querySelector("#code").value="+"+intl.getSelectedCountryData().dialCode;

    });
</script>

<script>
    let pass=document.querySelector('#password');
    let show_pass=document.querySelector('#show_pass');
    show_pass.addEventListener('click',function ()
    {
        if(pass.getAttribute('type')=='password')
        {
            pass.setAttribute('type','text')
        }
        else
        {
            pass.setAttribute('type','password')
        }

    });

</script>

@yield('footerScript')
</body>
</html>
