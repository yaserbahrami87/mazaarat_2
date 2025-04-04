@extends('admin.master.index')

@section('headerScript')
    <link href="/plugins/dataTables/datatables.css" rel="stylesheet" />
    <link href="/plugins/dataTables/buttons.dataTables.min.css" rel="stylesheet" />
@endsection


@section('content')

    <div class="col-12 col-md-3">
        <form method="get" action="">
            <div class="input-group mb-3">

                <select class="custom-select" id="festivals" name="festivals" >
                    <option selected disabled>انتخاب کنید</option>
                    <option value="all">همه کاربرها</option>
                    @foreach($festivals as $item)
                        <option value="{{$item->festival_en}}" @if($festival->festival_en                                    ==$item->festival_en) selected @endif>{{$item->festival_fa}}</option>
                    @endforeach
                </select>
                <div class="input-group-prepend">
                    <button class="btn btn-outline-secondary" type="submit">نمایش آمار</button>
                </div>
            </div>
        </form>
        <small> آمار: {{$festival->festival_fa}}</small>

    </div>

    <div class="col-12 table-responsive">
        <table class="table table-bordered table-hover table-striped " id="dataTable">
            <thead>
                <th>مشخصات</th>
                <th>ایمیل</th>
                <th>تلفن</th>
                <th>کشور</th>
                <th>استان</th>
                <th>شهرستان</th>
                <th>تاریخ ثبت نام</th>
                <th>تعداد عکس ارسالی</th>
                <th>مزارات</th>
                <th>نیایش</th>
                <th>دسترسی</th>
                <th>تغییر دسترسی</th>
                <th>مشاهده</th>
            </thead>
            <tbody>
            @foreach($users as $user)

                <tr>
                    <td>
                        <a href="/admin/user/{{$user->id}}" >
                                {{$user->fname.' '.$user->lname}}
                        </a>
                    </td>
                    <td dir="ltr">{{$user->email}}</td>
                    <td dir="ltr">
                        <a href="tel:{{$user->tel}}">{{$user->tel}}</a>

                    </td>
                    <td dir="ltr"> {{$user->country}}</td>
                    <td dir="ltr">
                        @if(!is_null($user->state))
                            {{$user->state['name']}}
                        @endif
                    </td>
                    <td dir="ltr">
                        @if(!is_null($user->city))
                            {{$user->city['name']}}
                        @endif
                    </td>
                    <td class="text-center">{{$user->created_at}}</td>
                    <td class="text-center">{{$user->competitions->where('festival_id','=',$festival->id)->count()}}</td>
                    <td class="text-center">{{($user->competitions->where('festival_id','=',$festival->id)->where('competiton_category_id','=','1')->count())}}</td>
                    <td class="text-center">{{($user->competitions->where('festival_id','=',$festival->id)->where('competiton_category_id','=','2')->count())}}</td>
                    <td class="text-center">

                        @if(($user->type==1) && ($user->is_admin==0))
                            کاربر ساده
                        @elseif($user->type==2)
                            داور
                        @elseif($user->is_admin==1)
                            مدیر
                        @endif
                    </td>
                    <td class="text-center">
                        <a href="/admin/user/{{$user->id}}/accessLevel" class="btn btn-outline-primary">
                            <i class="bi bi-award-fill"></i>
                        </a>
                    </td>
                    <td>
                        <a href="/admin/user/{{$user->id}}" class="btn btn-warning">
                            <i class="bi bi-eye-fill"></i>
                        </a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

    </div>
@endsection

@section('footerScript')
    <script src="/plugins/dataTables/datatables.js"></script>
    <script src="/plugins/dataTables/dataTables.bootstrap4.min.js"></script>
    <script src="/plugins/dataTables/dataTables.buttons.min.js"></script>
    <script src="/plugins/dataTables/jszip.min.js"></script>
    <script src="/plugins/dataTables/vfs_fonts.js"></script>

    <script src="/plugins/dataTables/buttons.html5.min.js"></script>
    <script src="/plugins/dataTables/buttons.print.min.js"></script>




    <script>
        $(document).ready(function () {
            $('#dataTable').DataTable({

                dom: 'Bfrltip',
                buttons: [
                    'copy',  'excel'
                ],
                'order':[[6,'desc']],
            });
        });
    </script>
@endsection
