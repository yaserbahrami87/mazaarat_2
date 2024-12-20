@extends('admin.master.index')

@section('content')
<div class="col-12">
    <div class="card">
        <div class="card-header">
            <h3>{{$user->fname.' '.$user->lname}}</h3>
            <form method="post" action="/admin/user/{{$user->id}}/login">
                {{csrf_field()}}
                <button type="post" class="btn btn-primary">ورود با اکانت کاربر</button>
            </form>
        </div>
        <div class="card-body">
            <div class="row">
                @foreach($user->competitions->where('festival_id','=',$festival->id) as $competition)
                    <div class="col-12 col-md-3">

                        <div class="card" >
                            <img src="/images/competition/{{$competition->image}}" class="card-img-top" alt="..." height="160px">
                            <div class="card-body">
                                <p > نام مکان: <b class="card-title">{{$competition->name_place}}</b></p>

                                <p>آدرس: <b class="card-text">{{$competition->location}}</b></p>

                                <p>توضیحات: <b class="card-text">{{$competition->description}}</b></p>

                            </div>
                            <div class="card-footer">
                                <small class="text-muted">{{$competition->time_fa}}</small>
                                <small class="text-muted">{{$competition->date_fa}}</small>
                                <hr/>
                                <a href="/images/competition/{{$competition->image}}" class="btn btn-primary btn-sm   " target="_blank">
                                    مشاهده
                                </a>
                                <a class="btn btn-outline-warning btn-sm   " href="{{ route('admin.competition.scores', ['festival'=>$festival->festival_en,'competiton'=>$competition->id,]) }}">امتیازات</a>

                                <span class="float-left">{{($competition->competition_category->category_fa)}}</span>
                            </div>
                        </div>

                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
