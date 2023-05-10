@extends('admin.master.index')
@section('content')
    <div class="col-12">
        <div class="card">
            <h5 class="card-header">تعریف ارکان</h5>
            <div class="card-body">
                <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
                    <button class="nav-link active" id="nav-farsi-tab" data-toggle="tab" data-target="#nav-farsi" type="button" role="tab" aria-controls="nav-farsi" aria-selected="true">بخش فارسی</button>
                    <button class="nav-link" id="nav-english-tab" data-toggle="tab" data-target="#nav-english" type="button" role="tab" aria-controls="nav-english" aria-selected="false">بخش انگلیسی </button>
                </div>
                <form method="post" action="/admin/pillar" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="tab-content" id="nav-tabContent">
                        <div class="tab-pane fade show active" id="nav-farsi" role="tabpanel" aria-labelledby="nav-farsi-tab">
                            <div class="alert alert-warning mt-1 mb-5">
                                پر کردن فیلدهای ستاره دار اجباریست
                            </div>
                            <div class="col-12 col-md-6">

                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="image">عکس رکن<span class="text-danger">*</span></span>
                                    </div>
                                    <input type="file" class="form-control"  id="image" name="image" value="{{old('image')}}" />
                                </div>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" >نام<span class="text-danger">*</span></span>
                                    </div>
                                    <input type="text" class="form-control"   id="fname_fa" name="fname_fa" value="{{old('fname_fa')}}" />
                                </div>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">نام خانوادگی<span class="text-danger">*</span></span>
                                    </div>
                                    <input type="text" class="form-control"  id="lname_fa" name="lname_fa" value="{{old('lname_fa')}}" />
                                </div>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" >سمت<span class="text-danger">*</span></span>
                                    </div>
                                    <input type="text" class="form-control"  id="position_fa" name="position_fa" value="{{old('position_fa')}}" />
                                </div>

                                <div class="input-group mb-3">
                                    <label for="biography_fa">بیوگرافی:<span class="text-danger">*</span></label>
                                    <textarea id="biography_fa" name="biography_fa">{{old('biography_fa')}}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="festival_id">جشنواره</label>
                                    <select class="form-control" id="festival_id" name="festival_id">
                                        <option disabled selected>انتخاب کنید</option>
                                        @foreach($festivals as $festival)
                                            <option value="{{$festival->id}}" @if(old('festival_id')==$festival->id) selected @endif >{{$festival->festival_fa}}</option>
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
                                            <span class="input-group-text" >نام انگلیسی<span class="text-danger">*</span></span>
                                        </div>
                                        <input type="text" class="form-control"   id="fname_en" name="fname_en" value="{{old('fname_en')}}" />
                                    </div>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">نام خانوادگی انگلیسی<span class="text-danger">*</span></span>
                                        </div>
                                        <input type="text" class="form-control"  id="lname_en" name="lname_en" value="{{old('lname_en')}}" />
                                    </div>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" > سمت انگلیسی<span class="text-danger">*</span></span>
                                        </div>
                                        <input type="text" class="form-control"  id="position_fa" name="position_en" value="{{old('position_en')}}" />
                                    </div>

                                    <div class="input-group mb-3">
                                        <label for="biography_en">بیوگرافی انگلیسی:<span class="text-danger">*</span></label>
                                        <textarea id="biography_fa" name="biography_en">{{old('biography_en')}}</textarea>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <button class="btn btn-success">ایجاد جشنواره</button>
                </form>

            </div>
        </div>
    </div>
@endsection


@section('footerScript')

    <script src="/admin/ckeditor/ckeditor.js"></script>
    <script src="/admin/ckeditor/lang/fa.js"></script>
    <script>
        CKEDITOR.replace('biography_fa');

        CKEDITOR.replace('biography_en');
    </script>
@endsection
