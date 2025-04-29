@extends('admin.master.index')
@section('content')
    <div class="col-12 col-md-8 mx-auto">
        <div class="card">
            <div class="card-header">اعتراضات</div>
            <div class="card-body">
                <table class="table table-bordered table-striped">
                    <tr>
                        <td>ارسال کننده</td>
                        <td>متن</td>
                        <td>اثر</td>
                        <td>وضعیت</td>

                    </tr>
                    @foreach($complaints as $complaint)
                        <tr>
                            <td>
                                <a href="/admin/user/{{$complaint->user->id}}">{{$complaint->user->fname.' '.$complaint->user->lname}}</a>
                            </td>
                            <td>
                                {{$complaint->comment}}
                            </td>
                            <td>
                                <img src="/images/competition/{{$complaint->competiton->image}}" width="50px" height="50px" />
                            </td>
                            <td>
                                <form method="post" action="/admin/complaint/{{$complaint->id}}/changeStatus">
                                    {{csrf_field()}}
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <button class="btn btn-outline-secondary" type="submit">اعمال</button>
                                        </div>
                                        <select class="custom-select" id="status" name="status"  >
                                            <option value="1" {{($complaint->status==1?'selected':'')}} >تایید</option>
                                            <option value="0" {{($complaint->status==0?'selected':'')}} >رد</option>
                                        </select>
                                    </div>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
@endsection
