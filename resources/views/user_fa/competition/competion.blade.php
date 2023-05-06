@extends('user_fa.master.index')

@section('headerScript')
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
    <div class="col-12">
        <div class="card">
            <h5 class="card-header">بخش مزارات</h5>
            <div class="card-body">
                    <div class="row">
                        @foreach(Auth::user()->competitions->where('festival_id','=',$festival->id)->where('competiton_category_id','=',1) as $competiton )
                            <div class="card col-12 col-md-3" >
                                <img src="/images/competition/{{$competiton->image}}" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">{{$competiton->name_place}}</h5>

                                </div>
                                <div class="card-footer text-muted">
                                    <a href="/panel/competiton/{{$competiton->id}}/edit" class="btn btn-warning">
                                        <i class="bi bi-pencil-fill"></i>
                                    </a>
                                    <form class="form-inline" method="post" action="/panel/competiton/{{$competiton->id}}" onsubmit="return window.confirm('آیا از حذف عکس مورد نظر اطمینان دارید؟')">
                                        {{csrf_field()}}
                                        {{method_field('DELETE')}}
                                        <input type="hidden" value="{{$competiton->id}}" name="competition_id" />
                                        <button type="submit" class="btn btn-danger">
                                            <i class="bi bi-trash3-fill"></i>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        @endforeach



                        @if(count(Auth::user()->competitions->where('festival_id','=',$festival->id)->where('competiton_category_id','=',1))<7)
                            <div class="card col-12 col-md-3" >
                                <form class="form" method="post" action="/panel/competiton" enctype="multipart/form-data">
                                    {{csrf_field()}}
                                    <div class="row">
                                        <div class="card col-12  mb-3">
                                            <div class="form-group files">

                                                <input type="file" class="form-control" name="image">
                                            </div>
                                            <input type="hidden" name="competiton_category_id" value="1" />
                                            <div class="form-group">
                                                <label >توضیحات:
                                                </label>
                                                <textarea class="form-control" name="description" rows="3"></textarea>
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
                                        </div>
                                        <div class="col-12">
                                            <button type="submit" class="btn btn-success">
                                                ثبت
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>

                        @else
                            <div class="col-12 alert alert-warning">
                                حداکثر تعداد عکس های مورد نظر جشنواره ارسال شده است
                            </div>
                        @endif



                    </div>
            </div>
        </div>
        <div class="card">
            <h5 class="card-header">بخش نیایش</h5>
            <div class="card-body">
                <div class="row">
                    @foreach(Auth::user()->competitions->where('festival_id','=',$festival->id)->where('competiton_category_id','=',2) as $competiton )
                        <div class="card col-12 col-md-3" >
                            <img src="/images/competition/{{$competiton->image}}" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">{{$competiton->name_place}}</h5>

                            </div>
                            <div class="card-footer text-muted">
                                <a href="/panel/competiton/{{$competiton->id}}/edit" class="btn btn-warning">
                                    <i class="bi bi-pencil-fill"></i>
                                </a>
                                <form class="form-inline" method="post" action="/panel/competiton/{{$competiton->id}}" onsubmit="return window.confirm('آیا از حذف عکس مورد نظر اطمینان دارید؟')">
                                    {{csrf_field()}}
                                    {{method_field('DELETE')}}
                                    <input type="hidden" value="{{$competiton->id}}" name="competition_id" />
                                    <button type="submit" class="btn btn-danger">
                                        <i class="bi bi-trash3-fill"></i>
                                    </button>
                                </form>
                            </div>
                        </div>
                    @endforeach



                    @if(count(Auth::user()->competitions->where('festival_id','=',$festival->id)->where('competiton_category_id','=',2))<7)
                        <div class="card col-12 col-md-3" >
                            <form class="form" method="post" action="/panel/competiton" enctype="multipart/form-data">
                                {{csrf_field()}}
                                <div class="row">
                                    <div class="card col-12  mb-3">
                                        <div class="form-group files">

                                            <input type="file" class="form-control" name="image">
                                        </div>
                                        <input type="hidden" name="competiton_category_id" value="2" />
                                        <div class="form-group">
                                            <label >توضیحات:
                                            </label>
                                            <textarea class="form-control" name="description" rows="3"></textarea>
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
                                    </div>
                                    <div class="col-12">
                                        <button type="submit" class="btn btn-success">
                                            ثبت
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>

                    @else
                        <div class="col-12 alert alert-warning">
                            حداکثر تعداد عکس های مورد نظر جشنواره ارسال شده است
                        </div>
                    @endif



                </div>
            </div>
        </div>
    </div>
@endsection
