@extends('admin.master.index')

@section('headerScript')
    <link rel="stylesheet" href="/plugins/intl-tel-input/build/css/intlTelInput.css">
@endsection

@section('content')
    <div class="container mb-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('ثبت نام') }}</div>

                    <div class="card-body">
                        <form method="POST" action="/admin/user">
                            {{csrf_field()}}

                            <div class="form-group row">
                                <label for="fname" class="col-md-4 col-form-label text-md-right">{{ __('نام:') }}</label>

                                <div class="col-md-6">
                                    <input id="fname" type="text" class="form-control @error('fname') is-invalid @enderror" name="fname" value="{{ old('fname') }}" required autocomplete="fname" autofocus>

                                    @error('fname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="lname" class="col-md-4 col-form-label text-md-right">{{ __('نام خانوادگی:') }}</label>

                                <div class="col-md-6">
                                    <input id="lname" type="text" class="form-control @error('lname') is-invalid @enderror" name="lname" value="{{ old('lname') }}" required autocomplete="lname" autofocus>

                                    @error('lname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('پست الکترونیکی:') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row" dir="">
                                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('تلفن:') }}</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control text-right" id="tel_"  />
                                    <input type="hidden" class="form-control" name="tel" id="tel"  />
                                    <input type="hidden" class="form-control" name="country" id="country"  />
                                    <input type="hidden" class="form-control" name="code" id="code"  />
                                    @error('tel')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row" id="states_register">
                                <label for="state" class="col-md-4 col-form-label text-md-right">{{ __('استان:') }}</label>
                                <div class="col-md-6">
                                    <select class="form-control" id="state" name="state_id">
                                        <option disabled selected>انتخاب کنید</option>
                                        @foreach($states as $state)
                                            <option value="{{$state->id}}">{{$state->name}}</option>
                                        @endforeach
                                    </select>
                                    @error('state')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row" id="cities_register">
                                <label for="state" class="col-md-4 col-form-label text-md-right">{{ __('شهرستان:') }}</label>
                                <div class="col-md-6">
                                    <select class="form-control" id="cities" name="city_id">
                                        <option disabled selected>انتخاب کنید</option>



                                    </select>
                                    @error('state')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>


                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('رمز عبور:') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('تکرار رمز عبور:') }}</label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('ثبت نام') }}
                                    </button>
                                    <a class="btn btn-link" href="/farsi/login">
                                        {{ __('ورود') }}
                                    </a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('footerScript')
    <script src="/js/jquery-3.6.1.min.js"></script>
    <script>
        $("#state").change(function(){
            let city=$('#state').val();
            $.ajax({
                type:'GET',
                url:'/state/'+city,
                success:function (data)
                {
                    let cities='';
                    $.each(data,function(key,value){
                        cities+="<option value='"+value.id+"'>"+value.name+"</option>"
                    })
                    $('#cities').html(cities);

                }

            });
        });
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

    <script src="/js/jquery.flipper-responsive.js"></script>
    <script>
        $(function(){
            $('#myFlipper').flipper('init');
        });
    </script>
@endsection
