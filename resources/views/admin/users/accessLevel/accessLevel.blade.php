@extends('admin.master.index')

@section('content')
    <div class="col-12 col-md-6 mx-auto">
        <div class="card">
            <div class="card-header">
                 تغییر اطلاعات <b>{{$user->fname.' '.$user->lname}}</b>
            </div>
            <div class="card-body">
                <form method="post" action="/admin/user/{{$user->id}}">
                    {{csrf_field()}}
                    {{method_field('PATCH')}}
                    <div class="form-group">
                        <label for="fname">نام:</label>
                        <input type="text" class="form-control" id="fname" name="fname" value="{{$user->fname}}" >
                    </div>
                    <div class="form-group">
                        <label for="fname">نام خانوادگی:</label>
                        <input type="text" class="form-control" id="fname" name="lname" value="{{$user->lname}}" >
                    </div>
                    <button class="btn btn-success">بروزرسانی</button>
                </form>
            </div>
        </div>
    </div>
    <div class="col-12 col-md-6">
        <!--    -->
        <div class="card">
            <div class="card-header">
                اعطای سطح دسترسی برای <b>{{$user->fname.' '.$user->lname}}</b>
            </div>
            <div class="card-body">
                <form method="post" action="/admin/user/{{$user->id}}/accessLevel">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label for="accessLevel">سطح دسترسی</label>

                        <select class="form-control" id="accessLevel" name="accessLevel">
                            <option selected disabled>انتخاب کنید</option>
                            <option @if($user->type==1) selected @endif value="1" >کاربر ساده</option>
                            <option @if($user->type==2) selected @endif value="2" >داور</option>
                            <option @if($user->is_admin==1) selected @endif value="3">مدیر</option>
                        </select>
                    </div>
                    <button class="btn btn-success">بروزرسانی</button>
                </form>
            </div>
        </div>
    </div>
    <div class="col-12 col-md-6">
        <!--    -->
        <div class="card">
            <div class="card-header">
                تغییر رمز <b>{{$user->fname.' '.$user->lname}}</b>
            </div>
            <div class="card-body">
                <form method="post" action="/admin/user/{{$user->id}}/changePassword">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label for="password">رمز عبور:</label>
                        <input type="password" class="form-control" id="password" name="password"   >
                    </div>
                    <div class="form-group">
                        <label for="password_confirmation">رمز عبور:</label>
                        <input type="password" class="form-control" id="password_confirmation" name="password_confirmation"   >
                    </div>
                    <button class="btn btn-success">بروزرسانی</button>
                </form>
            </div>
        </div>
    </div>
@endsection
