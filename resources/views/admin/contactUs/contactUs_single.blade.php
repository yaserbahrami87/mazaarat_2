@extends('admin.master.index')
@section('content')
    <div class="col-12 col-md-4">



            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">مشخصات</span>
                </div>
                <input type="text" class="form-control" value="{{$contactUs->name}}" disabled />
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">پیام:</span>
                </div>
                <textarea class="form-control text-left" disabled >{{$contactUs->comment}}</textarea>
            </div>


        <hr/>
        <h3>سوابق پیام ها</h3>
        @foreach($contactUs->comments->sortbydesc('id') as $comment)
            <small>تاریخ: {{substr($comment->created_at,0,10)}}</small>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">{{$comment->user->fname.' '.$comment->user->lname}}:</span>
                </div>
                <textarea class="form-control text-left" name="comment" disabled>{{$comment->comment}}</textarea>
            </div>

        @endforeach
        <form method="post" action="/admin/comment">
            {{csrf_field()}}
            <input type="hidden" name="product_id" value="{{$contactUs->id}}">
            <input type="hidden" name="type" value="contactUs">
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">متن:</span>
                </div>
                <textarea class="form-control text-left" name="comment" ></textarea>
            </div>
            <input type="submit" value="ارسال پیام" class="btn btn-success" />
        </form>

    </div>
@endsection
