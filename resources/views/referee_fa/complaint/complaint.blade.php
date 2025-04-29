@extends('referee_fa.master.index')

@section('content')
    <div class="col-12 col-md-8 mx-auto">
        <div class="card">
            <div class="card-header">پیام و اعتراض</div>
            <div class="card-body">
                @foreach($competiton->complaints as $complaint)
                    @if($complaint->user_id==Auth::user()->id)
                        <div class="p-2 rounded-lg border border-1 mb-2">
                            <span class="{{Auth::user()->id==$complaint->user_id?'text-success':'text-danger'}}">{{$complaint->user->fname.' '.$complaint->user->lname}}:</span>
                            <p class="m-0 ">{{($complaint->comment)}}</p>
                        </div>
                    @elseif($complaint->status==1)
                        <div class="p-2 rounded-lg border border-1 mb-2">
                            <span class="{{Auth::user()->id==$complaint->user_id?'text-success':'text-danger'}}">{{$complaint->user->fname.' '.$complaint->user->lname}}:</span>
                            <p class="m-0 ">{{($complaint->comment)}}</p>
                        </div>
                    @endif
                @endforeach


                <form method="post" action="/referee/competiton/{{$competiton->id}}/complaint">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label for="comment">پیام</label>
                        <textarea class="form-control" id="comment" rows="3" name="comment"></textarea>
                    </div>
                    <button type="submit" class="btn btn-outline-success">ارسال</button>
                </form>
            </div>
        </div>
    </div>
@endsection
