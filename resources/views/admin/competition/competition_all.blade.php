@extends('admin.master.index')

@section('headerScript')

    <link rel="stylesheet" href="/plugins/Persian_Jalali_Calendar_DataPicker/dist/kamadatepicker.min.css" />
@endsection


@section('content')
    <div class="col-12 card " >

        <div class="card-header">
            عکسهای فرستاده شده
            <form method="GET" action="{{ url()->current() }}" class="row g-3">
                <div class="col-md-4">
                    <label for="start_date" class="form-label">از تاریخ</label>
                    <input type="text" class="form-control" id="start_date" name="start_date"
                           value="{{ request('start_date') }}" autocomplete="off">
                </div>
                <div class="col-md-4">
                    <label for="end_date" class="form-label">تا تاریخ</label>
                    <input type="text" class="form-control" id="end_date" name="end_date"
                           value="{{ request('end_date') }}" autocomplete="off">
                </div>
                <div class="col-md-4 d-flex align-items-end">
                    <button type="submit" class="btn btn-primary">فیلتر</button>
                    <a href="{{ url()->current() }}" class="btn btn-outline-secondary mr-2">حذف فیلتر</a>
                </div>
            </form>
        </div>

        <div class="card-body">
            <div class="row">
                @foreach($competitions as $competition)
                    <div class="col-12 col-md-3">

                        <div class="card" >
                            <img src="/images/competition/thumbnail_{{$competition->image}}" class="card-img-top" alt="..." height="160px">
                            <div class="card-body">
                                <p > نام مکان: <b class="card-title">{{$competition->name_place}}</b></p>

                                <p>آدرس: <b class="card-text">{{$competition->location}}</b></p>

                                <p>توضیحات: <b class="card-text">{{$competition->description}}</b></p>

                            </div>
                            <div class="card-footer">
                                <a href="/images/competition/{{$competition->image}}" class="btn btn-primary btn-sm   " target="_blank">
                                    مشاهده
                                </a>
                                <a class="btn btn-outline-warning btn-sm   " href="{{ route('admin.competition.scores', ['festival'=>$festival->festival_en,'competiton'=>$competition->id,]) }}">امتیازات</a>
                                <span class="float-left">{{($competition->competition_category->category_fa)}}</span>
                                <a  class="btn btn-block btn-outline-info mt-2" href="/panel/competiton/{{$competition->id}}/complaint" >ثبت اعتراض {{$competition->complaints->count()}}</a>
                            </div>
                        </div>

                    </div>
                @endforeach
                <div class="col-12">
                    {{ $competitions->appends(request()->query())->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection

@section('footerScript')
    <script src="/plugins/Persian_Jalali_Calendar_DataPicker/src/kamadatepicker.js"></script>
    <script>
        $(document).ready(function() {
            kamaDatepicker('start_date');
            kamaDatepicker('end_date');
        });
    </script>
@endsection
