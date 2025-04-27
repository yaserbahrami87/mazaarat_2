@extends('admin.master.index')

@section('content')
    @foreach($refereis as $referee)
        <div class="col-12 col-md-3">
            <div class="media border shadow p-2">
                <img src="/images/users/{{$referee->image}}" class="align-self-start ml-3" width="100px">
                <div class="media-body">
                    <h5 class="mt-0">
                       <a href="/admin/report/refereeing/{{$referee->id}}" >
                           {{$referee->fname.' '.$referee->lname}}
                       </a>
                    </h5>
                    <p>تعداد رای صادر شده:{{$referee->refereeings->where('festival_id',$festival->id)->count()}} از {{$competitons->count()}}</p>
                </div>
            </div>
        </div>

    @endforeach
@endsection
