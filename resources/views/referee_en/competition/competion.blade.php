@extends('referee_en.master.index')

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
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 text-center">
                <h2>امتیازدهی به عکس</h2>

                <!-- نمایش عکس -->
                <div>
                    <img src="/images/competition/{{$competition->image}}" alt="عکس مسابقه" class="img-fluid">
                </div>
            </div>
        </div>


    <!-- فرم امتیازدهی -->
    <form action="/referee/refereeing" method="POST" dir="rtl" class="text-right p-3">
        {{csrf_field()}}

    <!-- مخفی کردن competition_id و user_id -->
        <input type="hidden" name="competition_id" value="{{ $competition->id }}">

            <!-- امتیازدهی از 1 تا 10 -->
            <div class="mb-3">

                <label for="score" class="form-label">امتیاز خود را انتخاب کنید / Please choose your score:<span class="text-danger">*</span></label>
                <select name="score" id="score" class="form-select" required>
                    <option selected disabled >Choose/انتخاب کنید</option>
                    @for ($i = 1; $i <= 10; $i++)
                        <option value="{{ $i }}">{{ $i }}</option>
                    @endfor
                </select>
            </div>

            <!-- توضیحات داور -->
            <div class="mb-3">
                <label for="description" class="form-label">توضیحات شما / Please your description :</label>
                <textarea name="description" id="description" rows="4" class="form-control" placeholder="توضیحات خود را وارد کنید.../ Please enter your description"></textarea>
            </div>

            <button type="submit" class="btn btn-primary w-100">ثبت امتیاز / Register point</button>
    </form>
    </div>
@endsection
