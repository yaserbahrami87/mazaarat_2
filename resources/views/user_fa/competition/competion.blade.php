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
                    <form class="form" method="post" action="/panel/competition" enctype="multipart/form-data">
                        <div class="row">
                            @if(count(Auth::user()->competitions->where('festival_id','=',$festival->id))<7)
                                {{csrf_field()}}
                                <div class="col-12 col-md-3 mb-3">
                                    <div class="form-group files">
                                        <label>Upload Your File </label>
                                        <input type="file" class="form-control" name="image">
                                    </div>
                                    <input type="hidden" name="competiton_category_id" value="1" />
                                    <div class="form-group">
                                        <label >توضیحات:
                                            <span class="alert text-danger m-0 p-0">*</span>
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
                                            <span class="alert text-danger m-0 p-0">*</span>
                                        </label>
                                        <input type="text" class="form-control"  name="location">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <button type="submit" class="btn btn-success">
                                        ثبت
                                    </button>
                                </div>
                            @else
                                <div class="col-12 alert alert-warning">
                                    حداکثر تعداد عکس های مورد نظر جشنواره ارسال شده است
                                </div>
                            @endif

                        </div>
                    </form>
            </div>
        </div>
        <div class="card">
            <h5 class="card-header">بخش نیایش</h5>
            <div class="card-body">
                <form class="form" method="post" action="/panel/competition" enctype="multipart/form-data">
                    <div class="row">
                        @if(count(Auth::user()->competitions->where('festival_id','=',$festival->id))<7)
                            {{csrf_field()}}
                            <div class="col-12 col-md-3 mb-3">
                                <div class="form-group files">
                                    <label>Upload Your File </label>
                                    <input type="file" class="form-control" name="image">
                                </div>
                                <input type="hidden" name="competiton_category_id" value="2" />
                                <div class="form-group">
                                    <label >توضیحات:
                                        <span class="alert text-danger m-0 p-0">*</span>
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
                                        <span class="alert text-danger m-0 p-0">*</span>
                                    </label>
                                    <input type="text" class="form-control"  name="location">
                                </div>
                            </div>
                            <div class="col-12">
                                <button type="submit" class="btn btn-success">
                                    ثبت
                                </button>
                            </div>
                        @else
                            <div class="col-12 alert alert-warning">
                                حداکثر تعداد عکس های مورد نظر جشنواره ارسال شده است
                            </div>
                        @endif

                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
