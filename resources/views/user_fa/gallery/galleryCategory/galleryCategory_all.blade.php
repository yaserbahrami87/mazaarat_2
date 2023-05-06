@extends('admin.master.index')
@section('content')
    <div class="col-12 col-md-3">
        <a href="/admin/gallery_category/create" class="btn btn-primary mb-3">افزودن دسته بندی</a>
    </div>
    <div class="col-12 table-responsive">
        <table class="table table-bordered table-hover table-striped">
            <thead>
                <th>دسته بندی</th>
                <th>وضعیت</th>
                <th>ویرایش</th>
                <th>حذف</th>
            </thead>
            <tbody>
            @foreach($gallery_categories as $gallery_categoriy)
                <tr>
                    <td>{{$gallery_categoriy->category_fa}}</td>
                    <td>{{$gallery_categoriy->status}}</td>
                    <td>
                        <a href="/admin/gallery_category/{{$gallery_categoriy->category_en}}/edit" class="btn btn-warning">
                            <i class="bi bi-pencil-square"></i>
                        </a>
                    </td>
                    <td>
                        <form method="post" action=""  onsubmit="return window.confirm('آیا از حذف دسته بندی اطمینان دارید؟')">
                            <button class="btn btn-danger" type="submit">

                                    <i class="bi bi-trash-fill"></i>

                            </button>
                        </form>
                    </td>

                </tr>
            @endforeach
            </tbody>
        </table>
        {{$gallery_categories->links()}}
    </div>
@endsection
