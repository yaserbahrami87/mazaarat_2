@extends('admin.master.index')

@section('content')
    <div class="col-12 table-responsive">
        <table class="table table-striped table-bordered text-center">
            <tr>
                <th>نام جشنواره</th>
                <th>تاریخ شروع</th>
                <th>تاریخ پایان</th>
                <th>ویرایش</th>
            </tr>
            @foreach($festivals as $festival)
                <tr>
                    <td>{{$festival->festival_fa}}</td>
                    <td>{{$festival->start_date_fa}}</td>
                    <td>{{$festival->end_date_fa}}</td>
                    <td>
                        <a href="/admin/festival/{{$festival->festival_en}}/edit" class="btn btn-warning">
                            <i class="bi bi-pencil-square"></i>
                        </a>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
@endsection
