@extends('user_fa.master.index')

@section('content')
    <div class="col-12">
        <div class="card">
            <h5 class="card-header">بخش مزارات</h5>
            <div class="card-body">
                <div class="row">
                    @foreach(Auth::user()->competitions as $competiton)
                        <div class="card col-12 col-md-3" >
                            <img src="/images/competition/{{$competiton->image}}" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">{{$competiton->name_place}}</h5>

                            </div>
                            <div class="card-footer text-muted">
                                <form method="post" action="/panel/competition/{{$competiton->id}}" onsubmit="return window.confirm('آیا از حذف عکس مورد نظر اطمینان دارید؟')">
                                    {{csrf_field()}}
                                    {{method_field('DELETE')}}
                                    <input type="hidden" value="{{$competiton->id}}" name="competition_id" />
                                    <button type="submit" class="btn btn-danger">
                                        <i class="bi bi-trash3-fill"></i>
                                    </button>
                                </form>

                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
