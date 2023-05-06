@extends('farsi.master.index')

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
    <div class="container">
    <div class="row">
        <div class="col-12 col-md-3  mx-auto mb-b ">
            <div class="card col-12 mb-3 upload_pictures bg-transparent" >
                <h3 class="text-muted text-center pb-3">ویرایش محتوی عکس</h3>
                <form class="form" method="post" action="/panel/competiton/{{$competiton->id}}" enctype="multipart/form-data">
                    {{csrf_field()}}
                    {{method_field('PATCH')}}
                    <div class="row text-center">
                        <div class="card col-12  mb-3 bg-transparent">

                            <img src="/images/competition/{{$competiton->image}}" class="img-fluid mb-3" />
                            <input type="hidden" name="competiton_category_id" value="1" />
                            <div class="form-group">
                                <label >توضیحات:
                                </label>
                                <textarea class="form-control" name="description" rows="3">{{$competiton->description}}</textarea>
                            </div>
                            <div class="form-group">
                                <label>نام مکان:
                                    <span class="alert text-danger m-0 p-0">*</span>
                                </label>
                                <input type="text" class="form-control"  name="name_place" value="{{$competiton->name_place}}">
                            </div>
                            <div class="form-group">
                                <label>آدرس مکان:
                                </label>
                                <input type="text" class="form-control"  name="location" value="{{$competiton->location}}">
                            </div>
                        </div>
                        <div class="col-12">
                            <button type="submit" class="btn btn-success">
                                بروزرسانی
                            </button>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>
    </div>
@endsection
