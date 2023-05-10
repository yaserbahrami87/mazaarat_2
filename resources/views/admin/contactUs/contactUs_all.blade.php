@extends('admin.master.index')

@section('content')
    <div class="col-12 table-responsive">
        <table class="table table-bordered table-striped">
            <tr>
                <th>مشخصات</th>
                <th>پست الکترونیکی</th>
                <th>پیام</th>
                <th>وضعیت</th>
                <th>تاریخ ارسال</th>
                <th></th>
            </tr>
            @foreach($contacts as $contact)
                <tr>
                    <td>{{$contact->name}}</td>
                    <td>{{$contact->email}}</td>
                    <td>{{$contact->comment}}</td>
                    <td>{{$contact->status()}}</td>
                    <td>{{$contact->created_at}}</td>
                    <td>
                        @if($contact->status)
                            <form method="post" action="/admin/ContactUs/{{$contact->id}}">
                                {{csrf_field()}}
                                {{method_field('PATCH')}}
                                <input type="hidden" value="0" name="status" />
                                <input type="hidden" value="{{$contact->id}}" name="id" />
                                <button type="submit" class="btn btn-warning">خوانده شد</button>
                            </form>
                        @endif
                    </td>
                </tr>
            @endforeach

        </table>
        {{$contacts->links()}}
    </div>
@endsection
