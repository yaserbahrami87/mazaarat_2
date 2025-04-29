@extends('referee_fa.master.index')

@section('content')
    <div class="col-12">
        <div class="card">
            <h5 class="card-header">آثار داوری شده</h5>
            <div class="card-body">
                <div class="row">
                    @foreach($refereeing as $referee)
                        <div class="card col-12 col-md-3" >
                            <img src="/images/competition/{{$referee->competition->image}}" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">{{$referee->competition->name_place}}</h5>

                            </div>
                            <div class="card-footer text-muted">
                                <small >امتیاز: {{$referee->competition->referees->sum('score')}}</small>
                                <a  class="btn btn-block btn-outline-info mt-2" href="/referee/competiton/{{$referee->competition->id}}/complaint" >ثبت اعتراض {{$referee->competition->complaints->count()}}</a>
                            </div>
                        </div>
                    @endforeach
                    <div class="col-12">
                        {{$refereeing->links()}}
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
