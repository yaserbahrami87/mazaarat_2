@extends('admin.master.index')

@section('content')
    <div class="col-12 col-md-6 mx-auto">
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
@endsection
