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
                {{dd($gallery)}}
                <tr>
                    <td>
                        <img src="/images/gallery/" width="250px" />
                    </td>
                    <td></td>
                </tr>
            @endforeach

        </tbody>
    </table>
</div>

@endsection
