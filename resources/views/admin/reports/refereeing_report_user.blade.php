@extends('admin.master.index')

@section('content')
    <div class="row">

        @foreach($user->refereeings->where('festival_id','=',$festival->id) as $referee)

            <div class="col-12 col-md-3">

                <div class="card" >
                    <img src="/images/competition/{{$referee->competition->image}}" class="card-img-top" alt="..." height="160px">
                    <div class="card-body">
                        <p > نام مکان: <b class="card-title">{{$referee->competition->name_place}}</b></p>

                        <p>آدرس: <b class="card-text">{{$referee->competition->location}}</b></p>

                        <p>توضیحات: <b class="card-text">{{$referee->competition->description}}</b></p>

                    </div>
                    <div class="card-footer">
                        <small class="text-muted">{{$referee->competition->time_fa}}</small>
                        <small class="text-muted">{{$referee->competition->date_fa}}</small>
                        <hr/>
                        <a href="/images/competition/{{$referee->competition->image}}" class="btn btn-primary btn-sm   " target="_blank">
                            مشاهده
                        </a>
                        <a class="btn btn-outline-warning btn-sm   " href="{{ route('admin.competition.scores', ['festival'=>$festival->festival_en,'competiton'=>$referee->competition->id,]) }}">امتیازات</a>

                        <span class="float-left">{{($referee->competition->competition_category->category_fa)}}</span>
                    </div>
                </div>

            </div>
        @endforeach
    </div>
@endsection
