@extends('farsi.master.index')
@section('content')
    <div class="container-fluid mb-5" id="pillars">
        <div class="row">
            <div class="col-8 col-md-2 mx-auto rounded-circle mb-5" id="pillars_title" >
                <!-- <img src="/images/first-festival.png" class="img-fluid" /> -->
            </div>
        </div>
        <div class="container">
            <div class="row">
                @foreach($festival->pillars as $pillar)
                <div class="col-12 col-md-6 position-relative p-3">
                    <img src="/images/pillars/{{'thumbnail_'.$pillar->image}}" width="150px" height="150px"/>
                    <p class="name_referee position-relative">{{$pillar->fname_fa.' '.$pillar->lname_fa}}</p>
                    <p class="position_referee position-relative pt-3">{{$pillar->position_fa}}</p>
                    <div class="info_referee position-relative text-light text-justify">
                        {!! $pillar->biography_fa !!}
                    </div>
                </div>
                @endforeach

            </div>
        </div>

    </div>
@endsection
