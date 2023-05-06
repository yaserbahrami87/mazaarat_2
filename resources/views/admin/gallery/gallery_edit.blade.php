@extends('admin.master.index')
@section('content')
    <div class="col-12">
        <div class="card">
            <h5 class="card-header">ویرایش عکس</h5>
            <div class="card-body">
                <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
                    <button class="nav-link active" id="nav-farsi-tab" data-toggle="tab" data-target="#nav-farsi" type="button" role="tab" aria-controls="nav-farsi" aria-selected="true">بخش فارسی</button>
                    <button class="nav-link" id="nav-english-tab" data-toggle="tab" data-target="#nav-english" type="button" role="tab" aria-controls="nav-english" aria-selected="false">بخش انگلیسی </button>
                </div>
                <form method="post" action="/admin/gallery/{{$gallery->id}}" enctype="multipart/form-data">
                    {{csrf_field()}}
                    {{method_field('PATCH')}}
                    <div class="tab-content" id="nav-tabContent">
                        <div class="tab-pane fade show active" id="nav-farsi" role="tabpanel" aria-labelledby="nav-farsi-tab">
                            <div class="alert alert-warning mt-1 mb-5">
                                پر کردن فیلدهای ستاره دار اجباریست
                            </div>
                            <div class="col-12 col-md-6">

                                <div class="input-group mb-3 text-center">
                                    <img src="/images/gallery/thumbnail_{{$gallery->image}}" class="img-fluid" />
                                </div>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" > نام صاحب عکس:<span class="text-danger">*</span></span>
                                    </div>
                                    <input type="text" class="form-control"   id="fname_fa" name="fname_fa" value="{{old('fname_fa',$gallery->fname_fa)}}" />
                                </div>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" > نام خانوادگی صاحب عکس:<span class="text-danger">*</span></span>
                                    </div>
                                    <input type="text" class="form-control"   id="lname_fa" name="lname_fa" value="{{old('lname_fa',$gallery->lname_fa)}}" />

                                </div>
                                <div class="input-group mb-3">
                                    <label for="description_fa">توضیحات عکس:<span class="text-danger">*</span></label>
                                    <textarea id="description_fa" name="description_fa">{{old('description_fa',$gallery->description_fa)}}</textarea>
                                </div>

                                <div class="form-group">
                                    <label for="festival_id">دسته عکس</label>
                                    <select class="form-control" id="gallery_category_id" name="gallery_category_id">
                                        <option disabled selected>انتخاب کنید</option>
                                        @foreach($gallery_categories as $gallery_category)
                                            <option value="{{$gallery_category->id}}" @if(old('gallery_category_id',$gallery->gallery_category_id)==$gallery_category->id) selected @endif >{{$gallery_category->category_fa}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="festival_id">جشنواره</label>
                                    <select class="form-control" id="festival_id" name="festival_id">
                                        <option disabled selected>انتخاب کنید</option>
                                        @foreach($festivals as $festival)
                                            <option value="{{$festival->id}}" @if(old('festival_id',$gallery->festival_id)==$festival->id) selected @endif >{{$festival->festival_fa}}</option>
                                        @endforeach
                                    </select>
                                </div>

                            </div>
                        </div>
                        <div class="tab-pane fade" id="nav-english" role="tabpanel" aria-labelledby="nav-english-tab">
                            <!-- English -->
                            <div class="tab-pane fade show active" id="nav-farsi" role="tabpanel" aria-labelledby="nav-farsi-tab">
                                <div class="alert alert-warning mt-1 mb-5">
                                    پر کردن فیلدهای ستاره دار اجباریست
                                </div>
                                <div class="col-12 col-md-6">

                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" > نام صاحب عکس به انگلیسی:<span class="text-danger">*</span></span>
                                        </div>
                                        <input type="text" class="form-control"   id="fname_en" name="fname_en" value="{{old('fname_en',$gallery->fname_en)}}" />
                                    </div>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" > نام خانوادگی صاحب عکس به انگلیسی:<span class="text-danger">*</span></span>
                                        </div>
                                        <input type="text" class="form-control"   id="lname_en" name="lname_en" value="{{old('lname_en',$gallery->lname_en)}}" />
                                    </div>
                                    <div class="input-group mb-3">
                                        <label for="description_en">توضیحات عکس به انگلیسی:<span class="text-danger">*</span></label>
                                        <textarea id="description_en" name="description_en">{{old('description_en',$gallery->description_en)}}</textarea>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <button class="btn btn-success">بروزرسانی</button>
                </form>

            </div>
        </div>
    </div>
@endsection


@section('footerScript')

    <script src="/admin/ckeditor/ckeditor.js"></script>
    <script src="/admin/ckeditor/lang/fa.js"></script>
    <script>
        CKEDITOR.replace('description_fa',
            {
                language:'fa',
            });

        CKEDITOR.replace('description_en');
    </script>
@endsection
