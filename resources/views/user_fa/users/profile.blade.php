@extends('user_fa.master.index')

@section('headerScript')
    <link rel="stylesheet" href="/plugins/Persian_Jalali_Calendar_DataPicker/dist/kamadatepicker.min.css">
@endsection

@section('content')
<div class="col-6 mx-auto">
    <div class="card">
        <div class="card-header">اطلاعات پروفایل</div>
        <div class="card-body">

            <form method="POST" action="/panel/profile" enctype="multipart/form-data">
                {{csrf_field()}}
                {{method_field('PATCH')}}

                <div class="form-group row">
                    <label for="fname" class="col-md-4 col-form-label text-md-right">{{ __('نام:') }}<span class="text-danger">*</span></label>

                    <div class="col-md-6">
                        <input id="fname" type="text" class="form-control @error('fname') is-invalid @enderror" name="fname" value="{{ old('fname',Auth::user()->fname) }}" required autocomplete="fname" autofocus>

                        @error('fname')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="lname" class="col-md-4 col-form-label text-md-right">{{ __('نام خانوادگی:') }}<span class="text-danger">*</span></label>

                    <div class="col-md-6">
                        <input id="lname" type="text" class="form-control @error('lname') is-invalid @enderror" name="lname" value="{{ old('lname',Auth::user()->lname) }}" required autocomplete="lname" autofocus>
                        @error('lname')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('پست الکترونیکی:') }}<span class="text-danger">*</span></label>

                    <div class="col-md-6">
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email',Auth::user()->email) }}" required autocomplete="email">

                        @error('email')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row" dir="">
                    <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('تلفن:') }}<span class="text-danger">*</span></label>
                    <div class="col-md-6">
                        <input type="text" class="form-control text-right" id="tel_" value="{{ old('tel',Auth::user()->tel) }}" disabled dir="ltr" />

                        @error('tel')
                            <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row" dir="">
                    <label for="datebirth" class="col-md-4 col-form-label text-md-right">{{ __('تاریخ تولد:') }}</label>
                    <div class="col-md-6">
                        <input type="text" class="form-control text-right" id="datebirth" value="{{ old('datebirth',Auth::user()->datebirth) }}" autocomplete="off" name="datebirth"  />

                        @error('datebirth')
                            <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row" id="states_register">
                    <label for="state" class="col-md-4 col-form-label text-md-right">{{ __('استان:') }}<span class="text-danger">*</span></label>
                    <div class="col-md-6">
                        <select class="form-control" id="state" name="state_id">
                            <option disabled selected>انتخاب کنید</option>
                            @foreach($states as $state)
                                <option value="{{$state->id}}" {{Auth::user()->state_id==$state->id?'selected':''}}  >{{$state->name}}</option>
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
                    <label for="state" class="col-md-4 col-form-label text-md-right">{{ __('شهرستان:') }}<span class="text-danger">*</span></label>
                    <div class="col-md-6">
                        <select class="form-control" id="cities" name="city_id">
                            <option disabled selected>انتخاب کنید</option>
                            @foreach($cities as $city)
                                <option value="{{$city->id}}" {{Auth::user()->city_id==$city->id?'selected':''}}  >{{$city->name}}</option>
                            @endforeach

                        </select>
                        @error('city_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="form-row row">
                    <label for="gender" class="col-md-4 col-form-label text-md-right">{{ __('جنسیت:') }}<span class="text-danger">*</span></label>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="gender" id="man" value="1" {{Auth::user()->gender==1?'checked':''}}  >
                        <label class="form-check-label" for="man">
                            مرد
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="gender" id="woman" value="0"  {{Auth::user()->gender==0?'checked':''}} >
                        <label class="form-check-label" for="woman">
                            زن
                        </label>
                    </div>
                </div>
                <div class="form-group row" dir="">
                    <label for="shenasnameh" class="col-md-4 col-form-label text-md-right">{{ __('شماره شناسنامه:') }}</label>
                    <div class="col-md-6">
                        <input type="number" class="form-control text-right" id="shenasnameh" value="{{ old('shenasnameh',Auth::user()->shenasnameh) }}"  name="shenasnameh" />

                        @error('shenasnameh')
                        <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row" dir="">
                    <label for="codemelli" class="col-md-4 col-form-label text-md-right">{{ __('کد ملی:') }}</label>
                    <div class="col-md-6">
                        <input type="number" class="form-control text-right" id="codemelli" value="{{ old('codemelli',Auth::user()->codemelli) }}" name="codemelli"  />

                        @error('codemelli')
                            <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row" dir="">
                    <label for="education" class="col-md-4 col-form-label text-md-right">{{ __('تحصیلات:') }}</label>
                    <div class="col-md-6">
                        <select class="form-control" id="education" name="education">
                            <option disabled selected>انتخاب کنید</option>
                            <option value="زیردیپلم" {{Auth::user()->education=='زیردیپلم'?'selected':''}} >زیردیپلم</option>
                            <option value="دیپلم" {{Auth::user()->education=='دیپلم'?'selected':''}}  >دیپلم</option>
                            <option value="کاردانی" {{Auth::user()->education=='کاردانی'?'selected':''}} >کاردانی</option>
                            <option value="کارشناسی" {{Auth::user()->education=='کارشناسی'?'selected':''}} >کارشناسی</option>
                            <option value="کارشناسی ارشد و دکتری" {{Auth::user()->education=='کارشناسی ارشد و دکتری'?'selected':''}} >کارشناسی ارشد و دکتری</option>
                        </select>

                        @error('codemelli')
                        <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row" dir="">
                    <label for="reshteh" class="col-md-4 col-form-label text-md-right">{{ __('رشته تحصیلی:') }}</label>
                    <div class="col-md-6">
                        <input type="text" class="form-control text-right" id="reshteh" name="reshteh" value="{{ old('reshteh',Auth::user()->reshteh) }}"  />

                        @error('reshteh')
                            <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row" dir="">
                    <label for="image" class="col-md-4 col-form-label text-md-right">{{ __('عکس پروفایل:') }}</label>
                    <div class="col-md-6">
                        <input type="file" class="form-control text-right" id="image" name="image" value="{{ old('image',Auth::user()->image) }}"  />
                        @if(!is_null(Auth::user()->image))
                            <a href="/images/users/{{Auth::user()->image}}" target="_blank">دانلود عکس</a>
                        @endif
                        @error('image')
                            <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row" dir="">
                    <label for="resume" class="col-md-4 col-form-label text-md-right">{{ __('رزومه:') }}</label>
                    <div class="col-md-6">
                        <input type="file" class="form-control text-right" id="resume" name="resume" value="{{ old('resume',Auth::user()->resume) }}"  />
                        @if(!is_null(Auth::user()->resume))
                            <a href="/images/users/{{Auth::user()->resume}}" target="_blank">دانلود رزومه</a>
                        @endif
                        @error('resume')
                            <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row mb-0">
                    <div class="col-md-6 offset-md-4">
                        <button type="submit" class="btn btn-primary">
                            {{ __('بروزرسانی') }}
                        </button>
                    </div>
                </div>
            </form>

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


    <script src="/plugins/Persian_Jalali_Calendar_DataPicker/dist/kamadatepicker.min.js"></script>
    <script>
        kamaDatepicker('datebirth');
    </script>
@endsection
