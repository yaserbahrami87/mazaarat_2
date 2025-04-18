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

    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>

@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card p-5 mb-5  bg_silver text-light">
                    <h3 class="text-center">خلاصه فراخوان</h3>
                    {!! $festival->summary_call_fa !!}

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
                    @if(!is_null(Auth::user()->requestLinks->where('festival_id','=',$festival->id)->first()))
                        @if(!is_null(Auth::user()->requestLinks->where('festival_id','=',$festival->id)->first()->comments))
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="text-dark">پیام های ارسال شده</h5>
                                    @foreach(Auth::user()->requestLinks->where('festival_id','=',$festival->id)->first()->comments as $comment)
                                        <div class="alert alert-info">
                                            {{$comment->comment}}
                                            <small class="d-block">{{substr($comment->created_at,0,10)}}</small>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endif
                    @endif

                </div>
                <div class="card bg-transparent">
                    <div class="card-header text-center">
                        <img src="/images/mazaarat.png" class="img-fluid" />
                    </div>
                    <div class="card-body bg-transparent upload_pictures" >
                        <div class="row">
                            @if(Auth::user()->competitions->count()>0)
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
                                                <a href="/panel/competiton/{{$competiton->id}}/qrcode" class="btn btn-primary">
                                                    <i class="bi bi-qr-code"></i>
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
                            @endif


                            @if(!is_null(Auth::user()->requestLinks->where('festival_id','=',$festival->id)->first()))
                                @if(Auth::user()->requestLinks->where('festival_id','=',$festival->id)->first()['status']==1)
                                    @php
                                        $num=8;
                                    @endphp
                                @else
                                    @php
                                        $num=7;
                                    @endphp
                                @endif
                            @else
                                @php
                                    $num=7;
                                @endphp

                            @endif




                           @if(!is_null(Auth::user()->competitions->where('festival_id','=',$festival->id)->where('competiton_category_id','=',1)))
                               @if(isset($num))
                                    @if(count(Auth::user()->competitions->where('festival_id','=',$festival->id)->where('competiton_category_id','=',1))<$num)
                                        <div class="col-12 col-md-3 mx-auto" >
                                            <div class="card bg-transparent" >
                                                <form class="form" method="post" action="/panel/competiton" enctype="multipart/form-data">
                                                    {{csrf_field()}}
                                                    <div class="row mb-5">
                                                        <div class="card col-12  mb-3 bg-transparent ">
                                                            <div class="form-group">
                                                                <label >عکس</label>
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

                                                            <div  class="form-group"    >
                                                                <label for="location_map">انتخاب موقعیت مکانی:</label>
                                                                <div id="map" style="height: 400px;"></div>
                                                                <input type="text" id="location_map" name="location_map" readonly required>
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

                                @endif

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


                            @if(isset($num))
                                @if(count(Auth::user()->competitions->where('festival_id','=',$festival->id)->where('competiton_category_id','=',2))<$num)


                                        <div class="col-12 col-md-3 mb-5 mx-auto" >
                                            <div class="card bg-transparent" >
                                                <form class="form" method="post" action="/panel/competiton" enctype="multipart/form-data">
                                                    {{csrf_field()}}
                                                    <div class="row mb-3">
                                                        <div class="card col-12   bg-transparent ">
                                                            <div class="form-group">
                                                                <label >عکس</label>
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
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('footerScript')
    <script>
        var map = L.map('map').setView([35.6892, 51.3890], 13); // موقعیت پیش‌فرض (تهران)

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '© OpenStreetMap contributors'
        }).addTo(map);

        var marker;

        map.on('click', function(e) {
            if (marker) {
                map.removeLayer(marker);
            }
            marker = L.marker([e.latlng.lat, e.latlng.lng]).addTo(map);
            document.getElementById('location_map').value = e.latlng.lat + ',' + e.latlng.lng;
        });
    </script>
@endsection
