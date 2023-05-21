@extends('admin.master.index')

@section('headerScript')
    <link href="/plugins/dataTables/datatables.css" rel="stylesheet" />
@endsection


@section('content')

    <div class="12 col-md-3">
        <form method="post" action="/admin/">
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <button class="btn btn-outline-secondary" type="button" id="button-addon1">
                        <i class="bi bi-search"></i>
                    </button>
                </div>
                <input type="text" class="form-control" placeholder="" aria-label="Example text with button addon" aria-describedby="button-addon1">
            </div>
        </form>
    </div>
    <div class="col-12 table-responsive">
        <table class="table table-bordered table-hover table-striped " id="dataTable">
            <thead>

            <th>مشخصات</th>
            <th>جشنواره</th>
            <th>لینک ارائه شده</th>
            <th>وضعیت</th>
            <th>تاریخ درخواست</th>
            <th>مشاهده</th>
            </thead>
            <tbody>
            @foreach($requestLinks as $requestLink)

                <tr>
                    <td>
                        <a href="/admin/user/{{$requestLink->user->id}}" >
                            {{$requestLink->user->fname.' '.$requestLink->user->lname}}
                        </a>
                    </td>

                    <td dir="ltr">{{$requestLink->festival->festival_fa}}</td>
                    <td dir="ltr"> {{$requestLink->link}}</td>
                    <td dir="ltr"> {{$requestLink->status()}}</td>
                    <td dir="ltr"> {{$requestLink->created_at}}</td>

                    <td>
                        <a href="/admin/RequestLink/{{$requestLink->id}}" class="btn btn-warning">
                            <i class="bi bi-eye-fill"></i>
                        </a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

    </div>
@endsection

@section('footerScript')
    <script src="/plugins/dataTables/datatables.js"></script>
    <script>
        $(document).ready(function () {
            $('#dataTable').DataTable({
                'order':[[4,'desc']],
            });
        });
    </script>
@endsection
