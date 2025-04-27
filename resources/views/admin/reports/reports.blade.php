@extends('admin.master.index')

@section('headerScript')
    <link href="/plugins/dataTables/datatables.css" rel="stylesheet" />
    <link href="/plugins/dataTables/buttons.dataTables.min.css" rel="stylesheet" />
@endsection


@section('content')


    <div class="col-12 table-responsive pt-4 mb-5 border">
        <h5>گزارش بر اساس کشور</h5>
        <table class="table table-bordered table-hover table-striped dataTable"  dir="rtl">
            <thead>
                <th>ردیف</th>
                <th>کشور</th>
                <th>تعداد شرکت کننده</th>
            </thead>
            <tbody>
            @foreach($users->groupby('country') as $user)

                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$user[0]->country}}</td>
                    <td>{{$user->count()}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>

    </div>

    <div class="col-12 table-responsive pt-4 border">
        <h5>گزارش بر اساس استان</h5>
        <table class="table table-bordered table-hover table-striped dataTable"  dir="rtl">
            <thead>
            <th>ردیف</th>
            <th>استان</th>
            <th>تعداد شرکت کننده</th>
            </thead>
            <tbody>
            @foreach($users->groupby('state_id') as $user)

                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{!is_null($user[0]->state_id)?$user[0]->state->name:'نامشخص' }}</td>
                    <td>{{$user->count()}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>

    </div>

    <div class="col-12 table-responsive pt-4 border">
        <h5>گزارش بر اساس شهرستان</h5>
        <table class="table table-bordered table-hover table-striped dataTable"  dir="rtl">
            <thead>
            <th>ردیف</th>
            <th>شهرستان</th>
            <th>تعداد شرکت کننده</th>
            </thead>
            <tbody>
            @foreach($users->groupby('city_id') as $user)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{!is_null($user[0]->city_id)?$user[0]->city->name:'نامشخص' }}</td>
                    <td>{{$user->count()}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>

    </div>

    <div class="col-12 table-responsive pt-4 border">
        <h5>گزارش بر اساس جنسیت</h5>
        <table class="table table-bordered table-hover table-striped dataTable"  dir="rtl">
            <thead>
            <th>ردیف</th>
            <th>جنسیت</th>
            <th>تعداد شرکت کننده</th>
            </thead>
            <tbody>
            @foreach($users->groupby('gender') as $user)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>@if($user[0]->gender===1)مرد @elseif($user[0]->gender===0)زن @else نامشخص @endif </td>
                    <td>{{$user->count()}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>

    </div>


    <div class="col-12 table-responsive pt-4 border">
        <h5>گزارش بر اساس تحصیلات</h5>
        <table class="table table-bordered table-hover table-striped dataTable"  dir="rtl">
            <thead>
            <th>ردیف</th>
            <th>تحصیلات</th>
            <th>تعداد شرکت کننده</th>
            </thead>
            <tbody>
            @foreach($users->groupby('education') as $user)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$user[0]->education}} </td>
                    <td>{{$user->count()}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>

    </div>


@endsection

@section('footerScript')
    <script src="/plugins/dataTables/datatables.js"></script>
    <script src="/plugins/dataTables/dataTables.bootstrap4.min.js"></script>
    <script src="/plugins/dataTables/dataTables.buttons.min.js"></script>
    <script src="/plugins/dataTables/jszip.min.js"></script>
    <script src="/plugins/dataTables/vfs_fonts.js"></script>

    <script src="/plugins/dataTables/buttons.html5.min.js"></script>
    <script src="/plugins/dataTables/buttons.print.min.js"></script>




    <script>
        $(document).ready(function () {
            $('.dataTable').DataTable({

                dom: 'Bfrltip',
                buttons: [
                    'copy',  'excel'
                ],

            });
        });
    </script>
@endsection
