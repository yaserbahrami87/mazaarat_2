@extends('admin.master.index')

@section('content')
<div class="col-12">
    <div class="card">
        <div class="card-header">
            <h3>{{$user->fname.' '.$user->lname}}</h3>
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

                                <a href="/images/competition/{{$competition->image}}" class="btn btn-primary" target="_blank">
                                    مشاهده
                                </a>
                            </div>
                        </div>

                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
