@extends('admin.master.index')

@section('headerScript')
    <link href="/admin/plugins/datatables/datatables.min.css" rel="stylesheet" />
@endsection

@section('content')
    <div class="col-md-6 mx-auto">
        <div class="card">
            <div class="card-header">
                تنظیمات اصلی سایت
            </div>
            <div class="card-body">
                <div class="col-12">
                    <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
                        <button class="nav-link active" id="nav-farsi-tab" data-toggle="tab" data-target="#nav-farsi" type="button" role="tab" aria-controls="nav-farsi" aria-selected="true">بخش فارسی</button>
                        <button class="nav-link" id="nav-english-tab" data-toggle="tab" data-target="#nav-english" type="button" role="tab" aria-controls="nav-english" aria-selected="false">بخش انگلیسی </button>
                    </div>
                    <div class="tab-content" id="nav-tabContent">
                        <div class="tab-pane fade show active" id="nav-farsi" role="tabpanel" aria-labelledby="nav-farsi-tab">
                            <form method="post" action="/admin/setting/basic" enctype="multipart/form-data">
                                {{csrf_field()}}
                                <div class="col-12">

                                    <img src="/images/{{$settings->where('setting','logo')->first()['value']}}" width="150px" />
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="logo">لگوی سایت</label>
                                        <input type="file" class="form-control-file" id="logo" name="logo">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="address">آدرس:</label>
                                    <input type="text" class="form-control" id="address" name="address" value="{{$settings->where('setting','address')->first()['value']}}">
                                </div>
                                <div class="form-group">
                                    <label for="tel">تلفن  تماس:</label>
                                    <input type="text" class="form-control" id="tel" name="tel" value="{{$settings->where('setting','tel')->first()['value']}}">
                                </div>
                                <div class="form-group">
                                    <label for="email">پست الکترونیکی:</label>
                                    <input type="text" class="form-control" id="email" name="email" value="{{$settings->where('setting','email')->first()['value']}}">
                                </div>
                                <div class="form-group">
                                    <label for="email">فیس بوک:</label>
                                    <input type="text" class="form-control" id="facebook" name="facebook" value="{{$settings->where('setting','facebook')->first()['value']}}">
                                </div>
                                <div class="form-group">
                                    <label for="email">تلگرام:</label>
                                    <input type="text" class="form-control" id="telegram" name="telegram" value="{{$settings->where('setting','telegram')->first()['value']}}">
                                </div>
                                <div class="form-group">
                                    <label for="email">اینستاگرام:</label>
                                    <input type="text" class="form-control" id="instagram" name="instagram" value="{{$settings->where('setting','instagram')->first()['value']}}">
                                </div>
                                <div class="form-group">
                                    <label for="email">واتساپ:</label>
                                    <input type="text" class="form-control" id="whatsapp" name="whatsapp" value="{{$settings->where('setting','whatsapp')->first()['value']}}">
                                </div>
                                <button type="submit" class="btn btn-outline-primary" >بروزرسانی</button>
                            </form>
                        </div>
                        <div class="tab-pane fade show" id="nav-english" role="tabpanel" aria-labelledby="nav-english-tab">
                            <form method="post" action="/admin/setting/basic" enctype="multipart/form-data">
                                {{csrf_field()}}
                                <div class="col-12">

                                    <img src="/images/{{$settings->where('setting','logo')->first()['value']}}" width="150px" />
                                </div>
                                <div class="form-group">
                                    <label for="address">آدرس انگلیسی:</label>
                                    <input type="text" class="form-control" id="address" name="address_en" value="{{$settings->where('setting','address_en')->first()['value']}}">
                                </div>
                                <div class="form-group">
                                    <label for="tel">تلفن  تماس انگلیسی:</label>
                                    <input type="text" class="form-control" id="tel" name="tel_en" value="{{$settings->where('setting','tel_en')->first()['value']}}">
                                </div>
                                <div class="form-group">
                                    <label for="email">پست الکترونیکی انگلیسی:</label>
                                    <input type="text" class="form-control" id="email" name="email_en" value="{{$settings->where('setting','email_en')->first()['value']}}">
                                </div>
                                <button type="submit" class="btn btn-outline-primary" >بروزرسانی</button>
                            </form>
                        </div>
                    </div>

                </div>









            </div>
        </div>
    </div>

@endsection

@section('footerScript')
    <script src="/admin/plugins/datatables/datatables.min.js"></script>

    <script>
        $(function () {

            $('#table_example').DataTable({
                "language": {
                    "paginate": {
                        "next": "بعدی",
                        "previous" : "قبلی"
                    }
                },
                "info" : false,
                "paging": true,
                "lengthChange": false,
                "searching": true,
                "ordering": true,
                "autoWidth": false
            });
        });
    </script>
@endsection
