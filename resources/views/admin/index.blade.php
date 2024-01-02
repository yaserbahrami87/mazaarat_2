@extends('admin.master.index')
@section('content')
    <div class="col-12 mb-3">
        <div class="col-12 col-md-3">
            <form method="get" action="">
                <div class="input-group mb-3">

                    <select class="custom-select" id="festivals" name="festivals" >
                        <option selected disabled>انتخاب کنید</option>
                        @foreach($festivals as $item)
                            <option value="{{$item->festival_en}}" @if($festival->festival_en                                    ==$item->festival_en) selected @endif>{{$item->festival_fa}}</option>
                        @endforeach
                    </select>
                    <div class="input-group-prepend">
                        <button class="btn btn-outline-secondary" type="submit">نمایش آمار</button>
                    </div>
                </div>
            </form>
            <small> آمار: {{$festival->festival_fa}}</small>

        </div>
    </div>
    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-warning">
            <div class="inner">
                <h3>{{($competition->groupby('user_id')->count())}}</h3>

                <p>افراد شرکت کننده</p>
            </div>
            <div class="icon">
                <i class="ion ion-person-add"></i>
            </div>
            <a href="/admin/user" class="small-box-footer">اطلاعات بیشتر <i class="fa fa-arrow-circle-left"></i></a>
        </div>
    </div>
    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-info">
            <div class="inner">
                <h3>{{$competition->count()}}</h3>

                <p>تعداد عکس ارسالی</p>
            </div>
            <div class="icon">
                <i class="ion ion-bag"></i>
            </div>
            <a href="#" class="small-box-footer">اطلاعات بیشتر <i class="fa fa-arrow-circle-left"></i></a>
        </div>
    </div>

    <!-- ./col -->
    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-success">
            <div class="inner">
                <h3>{{$competition->where('competiton_category_id','=','1')->count()}}</h3>

                <p>تعداد عکس مزارات</p>
            </div>
            <div class="icon">
                <i class="ion ion-stats-bars"></i>
            </div>
            <a href="/admin/competiton/{{$festival->festival_en}}/1" class="small-box-footer">اطلاعات بیشتر <i class="fa fa-arrow-circle-left"></i></a>
        </div>
    </div>
    <!-- ./col -->

    <!-- ./col -->
    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-danger">
            <div class="inner">
                <h3>{{$competition->where('competiton_category_id','=','2')->count()}}</h3>

                <p>تعداد عکس نیایش</p>
            </div>
            <div class="icon">
                <i class="ion ion-pie-graph"></i>
            </div>
            <a href="/admin/competiton/{{$festival->festival_en}}/2" class="small-box-footer">اطلاعات بیشتر <i class="fa fa-arrow-circle-left"></i></a>
        </div>
    </div>

    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-danger">
            <div class="inner">
                <h3>{{$iranian->count()}}</h3>

                <p>ایرانی ها</p>
            </div>
            <div class="icon">
                <i class="ion ion-pie-graph"></i>
            </div>
            <a href="/admin/user?festivals={{$festival->festival_en}}&nationality=iranian" class="small-box-footer">اطلاعات بیشتر <i class="fa fa-arrow-circle-left"></i></a>
        </div>
    </div>

    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-danger">
            <div class="inner">
                <h3>{{$notIranian->count()}}</h3>

                <p>خارجی ها</p>
            </div>
            <div class="icon">
                <i class="ion ion-pie-graph"></i>
            </div>
            <a href="/admin/user?festivals={{$festival->festival_en}}&nationality=foreign" class="small-box-footer">اطلاعات بیشتر <i class="fa fa-arrow-circle-left"></i></a>
        </div>
    </div>

    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-danger">
            <div class="inner">
                <h3>{{$NullNationality->count()}}</h3>

                <p>ملیت نامشخص</p>
            </div>
            <div class="icon">
                <i class="ion ion-pie-graph"></i>
            </div>
            <a href="/admin/user?festivals={{$festival->festival_en}}&nationality=null" class="small-box-footer">اطلاعات بیشتر <i class="fa fa-arrow-circle-left"></i></a>
        </div>
    </div>
@endsection
