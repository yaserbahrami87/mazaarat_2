@extends('admin.master.index')

@section('headerScript')
    <link href="/admin/plugins/datatables/datatables.min.css" rel="stylesheet" />
@endsection

@section('content')
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                شرکا / همکاران
            </div>
            <div class="card-body">
                <form class="mb-5" method="post" action="/admin/setting/colleagues" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="col-12">
                        <div class="form-group">
                            <label for="value">عکس</label>
                            <input type="file" class="form-control-file" id="value" name="value">
                            <small class="text-muted">فرمت مورد قبول JPG,PNG - حداکثر 2 مگابایت</small>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="option">مسیر کلیک:</label>
                        <input type="text" class="form-control" id="option" name="option" value="{{old('option')}}">
                    </div>
                    <button type="submit" class="btn btn-success">افزودن</button>
                </form>

                <table class="table table-bordered table-striped text-center" id="table_example">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>عکس</th>
                        <th>مسیر</th>
                        <th>ویرایش</th>
                        <th>حذف</th>
                    </tr>
                    </thead>


                    <tbody>

                    @foreach($colleagues as $colleague)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>
                                <img src="/images/thumbnail_{{$colleague->value}}" width="100px"  />
                            </td>
                            <td>{{$colleague->option}}</td>
                            <td>
                                <a href="/admin/setting/colleagues/{{$colleague->id}}/edit" class="btn btn-warning">
                                    <i class="bi bi-pencil-square"></i>
                                </a>
                            </td>
                            <td>
                                <form method="post" action="/admin/setting/colleagues/{{$colleague->id}}" onsubmit="return window.confirm('آیا از حذف اسلایدر اطمینان دارید؟')">
                                    {{method_field('DELETE')}}
                                    {{csrf_field()}}
                                    <button class="btn btn-danger" type="submit">
                                        <i class="bi bi-trash-fill"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach

                    </tbody>

                </table>

            </div>
        </div>


    </div>
    <div class="col-12 table-responsive">

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
