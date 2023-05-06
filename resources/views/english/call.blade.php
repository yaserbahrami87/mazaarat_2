@extends('english.master.index')

@section('content')
    <div class="container mb-5 en" dir="ltr">
        <div class="col-12 text-light text-justify rounded-lg p-3 " id="call_fa">
            <h3 class="font-weight-bold text-center">{{$festival->festival_en}}</h3>
            {!! $festival->call_en !!}
        </div>
    </div>
@endsection
