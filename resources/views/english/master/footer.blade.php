<footer class="container" dir="rtl">
    <div class="col-12 text-center">
        <img src="/images/footer.png" width="60px" class="position-relative" id="bolt-footer"/>
    </div>
    <div class="row pt-4  mb-3 en" dir="ltr">

        <div class="col-md-4 text-right mb2">
            <b class="d-block">Contact us</b>
            <p class="m-0 text-justify">Address: Astan Quds Razavi Art Institution of Afarineshha, No. 9 Kouhsangi Street, Edalat 18, Mashhad, Iran</p>
            <a href="tel:+989390482732" class="ml-3">Tel: +989390482732</a>
            <a href="mailto:info@mazaar.net" class="d-block">Email: info@mazaar.net</a>
        </div>
        <div class="col-md-2 align-items-center text-justify mb-2">

            <p>All rights reserved by Mazaarat International Photo Festival</p>
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
