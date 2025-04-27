@extends('admin.master.index')

@section('content')
<div class="col-12">
    <div class="card">
        <div class="card-header">
            @if(is_null($user->image) )
                <img src="/admin/dist/img/avatar.png" width="50px" height="50px" class="img-circle" />
            @else
                <img src="/images/users/{{$user->image}}" width="50px" height="50px" class="img-circle" />
            @endif
            <h3 class="d-inline">{{$user->fname.' '.$user->lname}}</h3>
            <form method="post" action="/admin/user/{{$user->id}}/login">
                {{csrf_field()}}
                <button type="post" class="btn btn-primary btn-sm">ورود با اکانت کاربر</button>
            </form>

        </div>
        <div class="card-body">
            <div class="row mb-3">
                <div class="col-12 col-md-6">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" >نام:</span>
                        </div>
                        <input id="fname" type="text" class="form-control @error('fname') is-invalid @enderror" name="fname" value="{{ old('fname',$user->fname) }}" required autocomplete="fname" autofocus disabled />
                        @error('fname')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" >نام خانوادگی:</span>
                        </div>
                        <input id="fname" type="text" class="form-control @error('lname') is-invalid @enderror" name="lname" value="{{ old('lname',$user->lname) }}" required autocomplete="lname" autofocus disabled />
                        @error('lname')
                        <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" >پست الکترونیکی:</span>
                        </div>
                        <input id="email" type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email',$user->email) }}" required autocomplete="email" autofocus disabled dir="ltr" />
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" >تلفن:</span>
                        </div>
                        <input id="tel" type="text" class="form-control @error('tel') is-invalid @enderror" name="tel" value="{{ old('tel',$user->tel) }}" required autocomplete="tel" autofocus disabled dir="ltr" />
                        @error('tel')
                        <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" >کشور:</span>
                        </div>
                        <input id="country" type="text" class="form-control @error('country') is-invalid @enderror" name="country" value="{{ old('country',$user->country) }}" required autocomplete="country" autofocus disabled />
                        @error('country')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" >استان:</span>
                        </div>
                        <input id="state" type="text" class="form-control @error('state') is-invalid @enderror" name="state" value="{{(!is_null($user->state)? $user->state->name:'') }}" required autocomplete="state" autofocus disabled />
                        @error('state')
                        <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" >شهرستان:</span>
                        </div>
                        <input id="city" type="text" class="form-control @error('city') is-invalid @enderror" name="city" value="{{(!is_null($user->city)? $user->city->name:'') }}" required autocomplete="city" autofocus disabled />
                        @error('city')
                        <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" >جنسیت:</span>
                        </div>
                        <input id="gender" type="text" class="form-control @error('gender') is-invalid @enderror" name="gender" value="@if($user->gender==1) مرد@elseif($user->gender==2)  زن @endif" required autocomplete="gender" autofocus disabled />
                        @error('city')
                        <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" >تاریخ تولد:</span>
                        </div>
                        <input id="datebirth" type="text" class="form-control @error('datebirth') is-invalid @enderror" name="datebirth" value="{{$user->datebirth}}" required autocomplete="datebirth" autofocus disabled />
                        @error('datebirth')
                        <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" >شناسنامه:</span>
                        </div>
                        <input id="shenasnameh" type="text" class="form-control @error('shenasnameh') is-invalid @enderror" name="shenasnameh" value="{{$user->shenasnameh}}" required autocomplete="shenasnameh" autofocus disabled />
                        @error('shenasnameh')
                        <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" >کد ملی:</span>
                        </div>
                        <input id="codemelli" type="text" class="form-control @error('codemelli') is-invalid @enderror" name="codemelli" value="{{$user->codemelli}}" required autocomplete="codemelli" autofocus disabled />
                        @error('codemelli')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" >تحصیلات:</span>
                        </div>
                        <input id="education" type="text" class="form-control @error('education') is-invalid @enderror" name="education" value="{{$user->education}}" required autocomplete="education" autofocus disabled />
                        @error('education')
                        <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" >رشته:</span>
                        </div>
                        <input id="reshteh" type="text" class="form-control @error('reshteh') is-invalid @enderror" name="reshteh" value="{{$user->reshteh}}" required autocomplete="reshteh" autofocus disabled />
                        @error('reshteh')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" >نام پدر:</span>
                        </div>
                        <input id="father_name" type="text" class="form-control @error('father_name') is-invalid @enderror" name="father_name" value="{{$user->father_name}}" required autocomplete="father_name" autofocus disabled />
                        @error('father_name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" >آدرس:</span>
                        </div>
                        <input id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{$user->address}}" required autocomplete="address" autofocus disabled />
                        @error('address')
                        <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" >کدپستی:</span>
                        </div>
                        <input id="ر" type="text" class="form-control @error('zipcode') is-invalid @enderror" name="zipcode" value="{{$user->zipcode}}" required autocomplete="zipcode" autofocus disabled />
                        @error('zipcode')
                        <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <a href="/images/users/{{$user->resume}}" class="btn btn-outline-primary" target="_blank">رزومه</a>
                </div>

            </div>

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
