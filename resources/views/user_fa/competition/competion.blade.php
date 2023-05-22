@extends('farsi.master.index')

@section('headerScript')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <style>
        .files input {
            outline: 2px dashed #92b0b3;
            outline-offset: -10px;
            -webkit-transition: outline-offset .15s ease-in-out, background-color .15s linear;
            transition: outline-offset .15s ease-in-out, background-color .15s linear;
            padding: 120px 0px 85px 35%;
            text-align: center !important;
            margin: 0;
            width: 100% !important;
        }
        .files input:focus{     outline: 2px dashed #92b0b3;  outline-offset: -10px;
            -webkit-transition: outline-offset .15s ease-in-out, background-color .15s linear;
            transition: outline-offset .15s ease-in-out, background-color .15s linear; border:1px solid #92b0b3;
        }
        .files{ position:relative}
        .files:after {  pointer-events: none;
            position: absolute;
            top: 60px;
            left: 0;
            width: 50px;
            right: 0;
            height: 56px;
            content: "";
            background-image: url(https://image.flaticon.com/icons/png/128/109/109612.png);
            display: block;
            margin: 0 auto;
            background-size: 100%;
            background-repeat: no-repeat;
        }
        .color input{ background-color:#f1f1f1;}
        .files:before {
            position: absolute;
            bottom: 10px;
            left: 0;  pointer-events: none;
            width: 100%;
            right: 0;
            height: 57px;
            content: " or drag it here. ";
            display: block;
            margin: 0 auto;
            color: #2ea591;
            font-weight: 600;
            text-transform: capitalize;
            text-align: center;
        }
    </style>
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card p-5 mb-5  bg_silver text-light">
                    <h3 class="text-center">خلاصه فراخوان</h3>
                    <p class="font-weight-bold">موضوعات جشنواره:</p>
                    <ol>
                        <li>مزارات (مزارهای اسلامی)</li>
                        <li>نیایش (در ادیان آسمانی ) </li>
                    </ol>
                    <p class="font-weight-bold">شرایط شرکت در جشنواره: </p>
                    <ol>
                        <li>لازم است اندازه بزرگترین ضلع عکس 2000 پیکسل باشد. بدین ترتیب که عرض یا ارتفاع هیچ عکسی از 2000 پیکسل بیشتر نباشد. </li>
                        <li>حجم هر فایل نیز نباید از 2 مگابایت بیشتر باشد. </li>
                        <li>	عکس‌ها باید با فرمت JPEG  ذخیره شوند</li>
                        <li>هر عکاس مجاز است در هر بخش 7 عکس (در مجموع 14 عکس برای دو بخش) ارسال کند</li>
                    </ol>
                    <p class="font-weight-bold">تقویم جشنواره: </p>
                    <p>آغاز ثبت نام و دریافت عکس‌ها: 16 اردیبهشت 1402</p>
                    <p>آخرین مهلت ثبت نام و دریافت عکس‌ها: 26 خرداد 1402</p>
                    <p>داوری: 28 خرداد 1402</p>
                    <p>اعلام پذیرفته شدگان و نامزدهای جوایز از طریق ایمیل: 10 تیرماه1402 </p>

                    <div class="alert alert-warning">
                        <p><i class="bi bi-exclamation-triangle-fill mr-2"></i>شرکت کننده گرامی شما می‌توانید با تبلیغ جشنواره در صفحات اجتماعی خود و ارسال لینک آن اجازه ارسال یک اثر دیگر را به دست آورید.</p>
                        @if(is_null(Auth::user()->requestLinks->where('festival_id','=',$festival->id)->first()) )

                            <form method="post" action="/panel/RequestLink">
                                {{csrf_field()}}
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <button class="btn btn-outline-secondary" type="submit" id="button-addon1">ارسال درخواست</button>
                                    </div>
                                    <input type="text" class="form-control" placeholder="" name="link" />
                                </div>
                            </form>
                        @else
                            @if(Auth::user()->requestLinks->where('festival_id','=',$festival->id)->first()->status==1)
                                <div class="alert alert-success">
                                    درخواست شما برای بارگذاری یک عکس بیشتر در جشنواره تایید شد
                                </div>
                            @elseif(Auth::user()->requestLinks->where('festival_id','=',$festival->id)->first()->status==2)
                                <div class="alert alert-danger">
                                    متاسفانه درخواست شما برای بارگذاری یک عکس بیشتر در جشنواره مورد تایید قرار نگرفت
                                </div>
                            @elseif(Auth::user()->requestLinks->where('festival_id','=',$festival->id)->first()->status==0)
                                <div class="alert alert-warning">
                                    درخواست شما برای بارگذاری یک عکس بیشتر در جشنواره در حال بررسی است
                                </div>
                            @endif

                        @endif
                    </div>

                </div>
                <div class="card bg-transparent">
                    <div class="card-header text-center">
                        <img src="/images/mazaarat.png" class="img-fluid" />
                    </div>
                    <div class="card-body bg-transparent upload_pictures" >
                        <div class="row">
                            @foreach(Auth::user()->competitions->where('festival_id','=',$festival->id)->where('competiton_category_id','=',1) as $competiton )
                                <div class="col-12 col-md-3 mb-3 mx-auto"  >
                                    <div class="card bg-transparent">
                                        <img src="/images/competition/{{$competiton->image}}" class="card-img-top mb-2 " alt="..." height="182px">
                                        <div class="card-body p-0  text-center">
                                            <h5 class="card-title text-light p-2 w-100">مکان: {{$competiton->name_place}}</h5>
                                            <h5 class="card-title text-light p-2 w-100">آدرس:{{$competiton->location}}</h5>
                                        </div>
                                        <div class="card-footer text-muted text-center">
                                            <a href="/panel/competiton/{{$competiton->id}}/edit" class="btn btn-warning">
                                                <i class="bi bi-pencil-fill"></i>
                                            </a>
                                            <form class="d-inline" method="post" action="/panel/competiton/{{$competiton->id}}" onsubmit="return window.confirm('آیا از حذف عکس مورد نظر اطمینان دارید؟')">
                                                {{csrf_field()}}
                                                {{method_field('DELETE')}}
                                                <input type="hidden" value="{{$competiton->id}}" name="competition_id" />
                                                <button type="submit" class="btn btn-danger">
                                                    <i class="bi bi-trash3-fill"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            @endforeach


                            @if(Auth::user()->requestLinks->where('festival_id','=',$festival->id)->first()['status']==1)
                                @php
                                    $num=8;
                                @endphp
                            @else
                                    @php
                                        $num=7;
                                    @endphp
                            @endif
                            @if(count(Auth::user()->competitions->where('festival_id','=',$festival->id)->where('competiton_category_id','=',1))<$num)
                                <div class="col-12 col-md-3 mx-auto" >
                                    <div class="card bg-transparent" >
                                        <form class="form" method="post" action="/panel/competiton" enctype="multipart/form-data">
                                            {{csrf_field()}}
                                            <div class="row mb-5">
                                                <div class="card col-12  mb-3 bg-transparent ">
                                                    <div class="form-group files">
                                                        <input type="file" class="form-control" name="image">
                                                    </div>
                                                    <input type="hidden" name="competiton_category_id" value="1" />
                                                    <div class="form-group">
                                                        <label >توضیحات:
                                                        </label>
                                                        <textarea class="form-control" name="description" rows="3" placeholder="توضیحات"></textarea>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>نام مکان:
                                                            <span class="alert text-danger m-0 p-0">*</span>
                                                        </label>
                                                        <input type="text" class="form-control"  name="name_place">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>آدرس مکان:
                                                        </label>
                                                        <input type="text" class="form-control"  name="location">
                                                    </div>
                                                    <!--
                                                    <div class="form-group">
                                                        <label for="competiton_category_id">موضوع
                                                            <span class="alert text-danger m-0 p-0">*</span>
                                                        </label>


                                                        <select class="form-control" name="competiton_category_id" id="competiton_category_id">
                                                            <option disabled selected>انتخاب کنید</option>
                                                            <option value="1">مزارات</option>
                                                            <option value="2">نیایش</option>
                                                        </select>

                                                    </div>
                                                    -->
                                                </div>
                                                <div class="col-12 text-center">
                                                    <button type="submit" class="btn btn-success">
                                                        ثبت
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>

                            @else
                                <div class="col-12 alert alert-warning">
                                    حداکثر تعداد عکس‌های مجاز در این بخش ارسال شده است
                                </div>
                            @endif




                        </div>
                    </div>
                </div>
                <div class="card bg-transparent">
                    <div class="card-header text-center">
                        <img src="/images/niayesh.png" class="img-fluid" />
                    </div>
                    <div class="card-body bg-transparent upload_pictures" >
                        <div class="row">
                            @foreach(Auth::user()->competitions->where('festival_id','=',$festival->id)->where('competiton_category_id','=',2) as $competiton )
                                <div class="col-12 col-md-3 mb-5 mx-auto"  >
                                    <div class="card bg-transparent">
                                        <img src="/images/competition/{{$competiton->image}}" class="card-img-top mb-2 " alt="..." height="182px">
                                        <div class="card-body p-0  text-center">
                                            <h5 class="card-title text-light p-2 w-100">مکان: {{$competiton->name_place}}</h5>
                                            <h5 class="card-title text-light p-2 w-100">آدرس:{{$competiton->location}}</h5>
                                        </div>
                                        <div class="card-footer text-muted text-center">
                                            <a href="/panel/competiton/{{$competiton->id}}/edit" class="btn btn-warning">
                                                <i class="bi bi-pencil-fill"></i>
                                            </a>
                                            <form class="d-inline" method="post" action="/panel/competiton/{{$competiton->id}}" onsubmit="return window.confirm('آیا از حذف عکس مورد نظر اطمینان دارید؟')">
                                                {{csrf_field()}}
                                                {{method_field('DELETE')}}
                                                <input type="hidden" value="{{$competiton->id}}" name="competition_id" />
                                                <button type="submit" class="btn btn-danger">
                                                    <i class="bi bi-trash3-fill"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            @endforeach



                            @if(count(Auth::user()->competitions->where('festival_id','=',$festival->id)->where('competiton_category_id','=',2))<$num)


                                    <div class="col-12 col-md-3 mb-5 mx-auto" >
                                        <div class="card bg-transparent" >
                                            <form class="form" method="post" action="/panel/competiton" enctype="multipart/form-data">
                                                {{csrf_field()}}
                                                <div class="row mb-3">
                                                    <div class="card col-12   bg-transparent ">
                                                        <div class="form-group files">
                                                            <input type="file" class="form-control" name="image">
                                                        </div>
                                                        <input type="hidden" name="competiton_category_id" value="2" />
                                                        <div class="form-group">
                                                            <label >توضیحات:
                                                            </label>
                                                            <textarea class="form-control" name="description" rows="3" placeholder="توضیحات"></textarea>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>نام مکان:</label>
                                                            <input type="text" class="form-control"  name="name_place">
                                                        </div>
                                                        <div class="form-group">
                                                            <label>آدرس مکان:
                                                            </label>
                                                            <input type="text" class="form-control"  name="location">
                                                        </div>
                                                    </div>
                                                    <div class="col-12 text-center">
                                                        <button type="submit" class="btn btn-success">
                                                            ثبت
                                                        </button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>

                            @else
                                <div class="col-12 alert alert-warning">
                                    حداکثر تعداد عکس‌های مجاز در این بخش ارسال شده است
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
