@extends('admin.master.index')
@section('content')
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                پوستر صفحه های اول
            </div>
            <div class="card-body">
                <img src="/images/{{$setting->value}}" width="350px" />
                <form class="mb-5" method="post" action="/admin/setting/sliders_home/{{$setting->id}}" enctype="multipart/form-data">
                    {{csrf_field()}}
                    {{method_field('PATCH')}}
                    <div class="col-12">
                        <div class="form-group">
                            <label for="value">عکس</label>
                            <input type="file" class="form-control-file" id="value" name="value">
                            <small class="text-muted">فرمت مورد قبول JPG,PNG - حداکثر 2 مگابایت</small>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="option">مسیر کلیک:</label>
                        <input type="text" class="form-control" id="option" name="option" value="{{old('option',$setting->option)}}">
                    </div>
                    <button type="submit" class="btn btn-success">بروزرسانی</button>
                </form>
            </div>
        </div>
    </div>
@endsection
