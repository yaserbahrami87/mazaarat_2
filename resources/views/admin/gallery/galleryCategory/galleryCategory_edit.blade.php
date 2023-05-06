@extends('admin.master.index')
@section('content')
    <div class="col-12">
        <div class="card">
            <h5 class="card-header">ایجاد دسته بندی</h5>
            <div class="card-body">

                <form method="post" action="/admin/gallery_category/{{$gallery_category->category_en}}" enctype="multipart/form-data">
                    {{csrf_field()}}
                    {{method_field('PATCH')}}
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
                                    <input type="text" class="form-control"   id="category_fa" name="category_fa" value="{{old('category_fa',$gallery_category->category_fa)}}" />
                                </div>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" > دسته بندی گالری به انگلیسی:<span class="text-danger">*</span></span>
                                    </div>
                                    <input type="text" class="form-control"   id="category_fa" name="category_en" value="{{old('category_en',$gallery_category->category_en)}}" />
                                </div>
                                <div class="form-group">
                                    <label for="status">وضعیت</label>
                                    <select class="form-control" id="status" name="status">
                                        <option disabled selected>انتخاب کنید</option>
                                        <option value="0" @if(old('status',$gallery_category->status)==0) selected @endif >غیرفعال</option>
                                        <option value="1" @if(old('status',$gallery_category->status)==1) selected @endif >فعال</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                    </div>
                    <button class="btn btn-success">بروزرسانی دسته بندی</button>
                </form>

            </div>
        </div>
    </div>
@endsection
