@extends('admin.master.index')
@section('content')
    <div class="col-12">
        <div class="card">
            <h5 class="card-header">ایجاد دسته بندی</h5>
            <div class="card-body">

                <form method="post" action="/admin/gallery_category" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="tab-content" id="nav-tabContent">
                        <div class="tab-pane fade show active" id="nav-farsi" role="tabpanel" aria-labelledby="nav-farsi-tab">
                            <div class="alert alert-warning mt-1 mb-5">
                                پر کردن فیلدهای ستاره دار اجباریست
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" > دسته بندی گالری به فارسی:<span class="text-danger">*</span></span>
                                    </div>
                                    <input type="text" class="form-control"   id="category_fa" name="category_fa" value="{{old('category_fa')}}" />
                                </div>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" > دسته بندی گالری به انگلیسی:<span class="text-danger">*</span></span>
                                    </div>
                                    <input type="text" class="form-control"   id="category_fa" name="category_en" value="{{old('category_en')}}" />
                                </div>



                            </div>
                        </div>

                    </div>
                    <button class="btn btn-success">ایجاد دسته بندی</button>
                </form>

            </div>
        </div>
    </div>
@endsection


@section('footerScript')

    <script src="/admin/ckeditor/ckeditor.js"></script>
    <script src="/admin/ckeditor/lang/fa.js"></script>
    <script>
        CKEDITOR.replace('content_fa',
            {
                language:'fa',
            });

        CKEDITOR.replace('content_en');
    </script>
@endsection
