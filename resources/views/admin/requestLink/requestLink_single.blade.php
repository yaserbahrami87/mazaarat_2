@extends('admin.master.index')
@section('content')
    <div class="col-12 col-md-4">
        <form method="post" action="/admin/RequestLink/{{$RequestLink->id}}">
            {{csrf_field()}}
            {{method_field('PATCH')}}
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">مشخصات</span>
                </div>
                <input type="text" class="form-control" value="{{$RequestLink->user->fname.' '.$RequestLink->user->lname}}" disabled />
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">لینک:</span>
                </div>
                <textarea class="form-control text-left" disabled >{{$RequestLink->link}}</textarea>
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <label class="input-group-text" for="status">وضعیت</label>
                </div>
                <select class="custom-select" id="status"  name="status">
                    <option selected disabled>انتخاب کنید</option>
                    <option value="1" @if($RequestLink->status==1) selected @endif>تایید شد</option>
                    <option value="2" @if($RequestLink->status==2) selected @endif >رد شد</option>
                    <option value="0" @if($RequestLink->status==0) selected @endif>در حال بررسی</option>
                </select>
            </div>
            <button type="submit" class="btn btn-success" >بروزرسانی</button>
        </form>
    </div>
@endsection
