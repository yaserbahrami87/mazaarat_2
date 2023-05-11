@extends('admin.master.index')

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
        <table class="table table-bordered table-hover table-striped ">
            <thead>

                <th>مشخصات</th>
                <th>ایمیل</th>
                <th>تلفن</th>
                <th>کشور</th>
                <th>تاریخ ثبت نام</th>
                <th>تعداد عکس ارسالی</th>
                <th>مشاهده</th>
            </thead>
            <tbody>
            @foreach($users as $user)
                <tr>
                    <td>
                        <a href="/admin/user/{{$user->id}}" >
                                {{$user->fname.' '.$user->lname}}
                        </a>
                    </td>
                    <td dir="ltr">{{$user->email}}</td>
                    <td dir="ltr"> {{$user->tel}}</td>
                    <td dir="ltr"> {{$user->country}}</td>
                    <td class="text-center">{{$user->created_at}}</td>
                    <td class="text-center">{{$user->competitions->where('festival_id','=',$festival->id)->count()}}</td>
                    <td>
                        <a href="/admin/user/{{$user->id}}" class="btn btn-warning">
                            <i class="bi bi-eye-fill"></i>
                        </a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        {{$users->links()}}
    </div>
@endsection
