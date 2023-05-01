@extends('admin.master.index')

@section('headerScript')
    <link href="/admin/plugins/datatables/datatables.min.css" rel="stylesheet" />
@endsection

@section('content')
    <div class="col-12">
        <a href="/admin/news/create" class="btn btn-primary">اضافه کردن خبر</a>
    </div>
    <div class="col-12 table-responsive">
        <table class="table table-bordered table-striped text-center" id="table_example">
            <thead>
            <tr>
                <th>#</th>
                <th></th>
                <th>خبر</th>
                <th> جشنواره مربوطه</th>
                <th>ویرایش</th>
                <th>حذف</th>
            </tr>
            </thead>


            <tbody>
            @foreach($news as $item)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>
                        <img src="/images/news/{{$item->image}}" width="50px" height="50px" />
                    </td>
                    <td>{{$item->title_fa}}</td>
                    <td>{{($item->festival->festival_fa)}}</td>
                    <td>
                        <a href="/admin/news/{{$item->title_en}}/edit" class="btn btn-warning">
                            <i class="bi bi-pencil-square"></i>
                        </a>
                    </td>
                    <td>
                        <form method="post" action="/admin/news/{{$item->title_en}}" onsubmit="return window.confirm('آیا از حذف رکن اطمینان دارید؟')">
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
