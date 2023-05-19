@extends('english.master.index')

@section('headerScript')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <style>
        .files input {
            outline: 2px dashed #92b0b3;
            outline-offset: -10px;
            -webkit-transition: outline-offset .15s ease-in-out, background-color .15s linear;
            transition: outline-offset .15s ease-in-out, background-color .15s linear;
            padding: 120px 0px 85px 35%;
            text-align: center !important;
            margin: 0;
            width: 100% !important;
        }
        .files input:focus{     outline: 2px dashed #92b0b3;  outline-offset: -10px;
            -webkit-transition: outline-offset .15s ease-in-out, background-color .15s linear;
            transition: outline-offset .15s ease-in-out, background-color .15s linear; border:1px solid #92b0b3;
        }
        .files{ position:relative}
        .files:after {  pointer-events: none;
            position: absolute;
            top: 60px;
            left: 0;
            width: 50px;
            right: 0;
            height: 56px;
            content: "";
            background-image: url(https://image.flaticon.com/icons/png/128/109/109612.png);
            display: block;
            margin: 0 auto;
            background-size: 100%;
            background-repeat: no-repeat;
        }
        .color input{ background-color:#f1f1f1;}
        .files:before {
            position: absolute;
            bottom: 10px;
            left: 0;  pointer-events: none;
            width: 100%;
            right: 0;
            height: 57px;
            content: " or drag it here. ";
            display: block;
            margin: 0 auto;
            color: #2ea591;
            font-weight: 600;
            text-transform: capitalize;
            text-align: center;
        }
    </style>
@endsection

@section('content')
    <div class="container en text-right" dir="ltr">
        <div class="row">

            <div class="col-12">
                <div class="card p-5 mb-5 bg_silver text-light">
                    <h3 class="text-center">Summary of the call</h3>
                    <p class="font-weight-bold">Categories:</p>
                    <ol>
                        <li>Islamic mausoleums</li>
                        <li>Prayer in divine religions </li>
                    </ol>
                    <p class="font-weight-bold">Regulations and requirements: </p>
                    <ol>
                        <li>The largest side of the photo must be less than 2000 pixels. That is, neither width nor height of any photo should exceed 2000 pixels. </li>
                        <li>The format of the photos needs to be JPEG, and, maximum size of each photo should be 2 megabytes.</li>
                        <li>Each photographer is allowed to send 7 photos per category, thus a total of 14 photos all in all.</li>

                    </ol>
                    <p class="font-weight-bold">Timeline: </p>
                    <p>Registration and submissions start on: May 6, 2023</p>
                    <p>Submissions close on: June 16, 2023</p>
                    <p>Judging the entries start on: June 18, 2023</p>
                    <p>Publishing the results and the nominees for prizes via e-mail: July 1, 2023</p>
                    <div class="alert alert-warning">
                        <p><i class="bi bi-exclamation-triangle-fill ml-2"></i> Dear participant, should you advertise Mazaarat International Photo Festival on your social media platforms and provide us with the respective link, you will be permitted to upload yet another photo.</p>
                        @if(is_null(Auth::user()->requestLinks->where('festival_id','=',$festival->id)->first()) )

                            <form method="post" action="/panel/RequestLink">
                                {{csrf_field()}}
                                <div class="input-group mb-3" dir="ltr">

                                    <input type="text" class="form-control" placeholder="" name="link" />
                                    <div class="input-group-prepend">
                                        <button class="btn btn-outline-secondary" type="submit" id="button-addon1">submit</button>
                                    </div>
                                </div>
                            </form>
                        @else
                            @if(Auth::user()->requestLinks->where('festival_id','=',$festival->id)->first()->status==1)
                                <div class="alert alert-success">
                                    Your request to upload one more photo at the festival has been approved
                                </div>
                            @elseif(Auth::user()->requestLinks->where('festival_id','=',$festival->id)->first()->status==2)
                                <div class="alert alert-danger">
                                    Unfortunately, your request to upload one more photo at the festival was not approved
                                </div>
                            @elseif(Auth::user()->requestLinks->where('festival_id','=',$festival->id)->first()->status==0)
                                <div class="alert alert-warning">
                                    Your request to upload one more photo at the festival is being reviewed
                                </div>
                            @endif

                        @endif
                    </div>
                </div>
                <div class="card bg-transparent">
                    <div class="card-header text-center">
                        <img src="/images/mausolea_en.png" class="img-fluid" />
                    </div>
                    <div class="card-body bg-transparent upload_pictures" >
                        <div class="row">
                            @foreach(Auth::user()->competitions->where('festival_id','=',$festival->id)->where('competiton_category_id','=',1) as $competiton )
                                <div class="col-12 col-md-3 mb-3 mx-auto"  >
                                    <div class="card bg-transparent">
                                        <img src="/images/competition/{{$competiton->image}}" class="card-img-top mb-2 " alt="..." height="182px">
                                        <div class="card-body p-0  text-center">
                                            <h5 class="card-title text-light p-2 w-100">Name place: {{$competiton->name_place}}</h5>
                                            <h5 class="card-title text-light p-2 w-100">Location:{{$competiton->location}}</h5>
                                        </div>
                                        <div class="card-footer text-muted text-center">
                                            <a href="/panel/english/competiton/{{$competiton->id}}/edit" class="btn btn-warning">
                                                <i class="bi bi-pencil-fill"></i>
                                            </a>
                                            <form class="d-inline" method="post" action="/panel/competiton/{{$competiton->id}}" onsubmit="return window.confirm('Are you sure you want to delete the photo?')">
                                                {{csrf_field()}}
                                                {{method_field('DELETE')}}
                                                <input type="hidden" value="{{$competiton->id}}" name="competition_id" />
                                                <button type="submit" class="btn btn-danger">
                                                    <i class="bi bi-trash3-fill"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                            @if(Auth::user()->requestLinks->where('festival_id','=',$festival->id)->first()['status']==1)
                                @php
                                    $num=8;
                                @endphp
                            @else
                                @php
                                    $num=7;
                                @endphp
                            @endif



                            @if(count(Auth::user()->competitions->where('festival_id','=',$festival->id)->where('competiton_category_id','=',1))<$num)

                                <div class="col-12 col-md-3 mx-auto" >
                                    <div class="card bg-transparent" >
                                        <form class="form" method="post" action="/panel/competiton" enctype="multipart/form-data">
                                            {{csrf_field()}}
                                            <div class="row mb-5">
                                                <div class="card col-12  mb-3 bg-transparent ">
                                                    <div class="form-group files">
                                                        <input type="file" class="form-control" name="image">
                                                    </div>
                                                    <input type="hidden" name="competiton_category_id" value="1" />
                                                    <div class="form-group">
                                                        <label >Description:
                                                        </label>
                                                        <textarea class="form-control" name="description" rows="3" placeholder="description"></textarea>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Name place:
                                                            <span class="alert text-danger m-0 p-0">*</span>
                                                        </label>
                                                        <input type="text" class="form-control"  name="name_place">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Location:
                                                        </label>
                                                        <input type="text" class="form-control"  name="location">
                                                    </div>
                                                </div>
                                                <div class="col-12 text-center">
                                                    <button type="submit" class="btn btn-success">
                                                        submit
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>

                            @else
                                <div class="col-12 alert alert-warning">
                                    The maximum number of desired photos of the festival has been sent
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="card bg-transparent">
                    <div class="card-header text-center">
                        <img src="/images/prayer_en.png" class="img-fluid" />
                    </div>
                    <div class="card-body bg-transparent upload_pictures" >
                        <div class="row">
                            @foreach(Auth::user()->competitions->where('festival_id','=',$festival->id)->where('competiton_category_id','=',2) as $competiton )
                                <div class="col-12 col-md-3 mb-5 mx-auto"  >
                                    <div class="card bg-transparent">
                                        <img src="/images/competition/{{$competiton->image}}" class="card-img-top mb-2 " alt="..." height="182px">
                                        <div class="card-body p-0  text-center">
                                            <h5 class="card-title text-light p-2 w-100">Name place: {{$competiton->name_place}}</h5>
                                            <h5 class="card-title text-light p-2 w-100">Location:{{$competiton->location}}</h5>
                                        </div>
                                        <div class="card-footer text-muted text-center">
                                            <a href="/panel/competiton/{{$competiton->id}}/edit" class="btn btn-warning">
                                                <i class="bi bi-pencil-fill"></i>
                                            </a>
                                            <form class="d-inline" method="post" action="/panel/competiton/{{$competiton->id}}" onsubmit="return window.confirm('Are you sure you want to delete the photo?')">
                                                {{csrf_field()}}
                                                {{method_field('DELETE')}}
                                                <input type="hidden" value="{{$competiton->id}}" name="competition_id" />
                                                <button type="submit" class="btn btn-danger">
                                                    <i class="bi bi-trash3-fill"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            @endforeach



                            @if(count(Auth::user()->competitions->where('festival_id','=',$festival->id)->where('competiton_category_id','=',2))<$num)


                                    <div class="col-12 col-md-3 mb-5 mx-auto" >
                                        <div class="card bg-transparent" >
                                            <form class="form" method="post" action="/panel/competiton" enctype="multipart/form-data">
                                                {{csrf_field()}}
                                                <div class="row mb-3">
                                                    <div class="card col-12   bg-transparent ">
                                                        <div class="form-group files">
                                                            <input type="file" class="form-control" name="image">
                                                        </div>
                                                        <input type="hidden" name="competiton_category_id" value="2" />
                                                        <div class="form-group">
                                                            <label >Description:
                                                            </label>
                                                            <textarea class="form-control" name="description" rows="3" placeholder="description"></textarea>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Name place:
                                                                <span class="alert text-danger m-0 p-0">*</span>
                                                            </label>
                                                            <input type="text" class="form-control"  name="name_place">
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Location:
                                                            </label>
                                                            <input type="text" class="form-control"  name="location">
                                                        </div>
                                                    </div>
                                                    <div class="col-12 text-center">
                                                        <button type="submit" class="btn btn-success">
                                                            submit
                                                        </button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>

                            @else
                                <div class="col-12 alert alert-warning">
                                    The maximum number of desired photos of the festival has been sent
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
