@extends('admin.master.index')

@section('content')
<div class="col-12 table-responsive">
    <a href="/admin/gallery/create" class="btn btn-primary mb-3">افزودن عکس</a>
    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <td>عکس</td>
                <td>عکاس</td>
                <td>جشنواره مربوطه</td>
                <td>دسته بندی</td>
                <td>ویرایش</td>
                <td>حذف</td>
            </tr>
        </thead>
        <tbody>
            @foreach($galleries as $gallery)

                <tr>
                    <td>
                        <img src="/images/gallery/thumbnail_{{$gallery->image}}" width="50px" height="50px"  />
                    </td>
                    <td>
                        {{$gallery->fname_fa.' '.$gallery->lname_fa}}
                    </td>
                    <td>
                        {{($gallery->festival->festival_fa)}}
                    </td>
                    <td>
                        {{($gallery->gallery_category->category_fa)}}
                    </td>
                    <td>
                        <a href="/admin/gallery/{{$gallery->id}}/edit" class="btn btn-warning">
                            <i class="bi bi-pencil-square"></i>
                        </a>
                    </td>
                    <td>
                        <form method="post" action="/admin/gallery/{{$gallery->id}}" onsubmit="return window.confirm('آیا از حذف رکن اطمینان دارید؟')">
                            {{method_field('DELETE')}}
                            {{csrf_field()}}
                            <button class="btn btn-danger" type="submit">
                                <i class="bi bi-trash-fill"></i>
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach

        </tbody>
    </table>

    {{$galleries->links()}}
</div>

@endsection
