@extends('admin.master.index')

@section('headerScript')
    <link href="/admin/plugins/kamadatepicker/kamadatepicker.min.css" rel="stylesheet" />
    <link href="/admin/plugins/easytimepicker/timepicker.min.css" rel="stylesheet" />
@endsection

@section('content')
    <div class="col-12">
        <div class="card">
            <h5 class="card-header">تعریف جشنواره</h5>
            <div class="card-body">
                <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
                    <button class="nav-link active" id="nav-farsi-tab" data-toggle="tab" data-target="#nav-farsi" type="button" role="tab" aria-controls="nav-farsi" aria-selected="true">بخش فارسی</button>
                    <button class="nav-link" id="nav-english-tab" data-toggle="tab" data-target="#nav-english" type="button" role="tab" aria-controls="nav-english" aria-selected="false">بخش انگلیسی </button>
                </div>
                <form method="post" action="/admin/festival/{{$festival->festival_en}}" enctype="multipart/form-data">
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
                                        <span class="input-group-text" id="festival_fa">عنوان جشنواره</span>
                                    </div>
                                    <input type="text" class="form-control"  aria-describedby="festival_fa" name="festival_fa" value="{{old('festival_fa',$festival->festival_fa)}}" />
                                </div>
                                <div class="input-group mb-3">
                                    <label for="call_fa">متن فراخوان فارسی:</label>
                                    <textarea id="call_fa" name="call_fa">{{old('call_fa',$festival->call_fa)}}</textarea>
                                </div>
                                <div class="input-group mb-3">
                                    <label for="summary_call_fa">خلاصه فراخوان فارسی:</label>
                                    <textarea id="summary_call_fa" name="summary_call_fa">{{old('summary_call_fa',$festival->summary_call_fa)}}</textarea>
                                </div>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" >تاریخ شروع</span>
                                    </div>
                                    <input type="text" class="form-control"   id="start_date_fa" name="start_date_fa" value="{{old('start_date_fa',$festival->start_date_fa)}}" />
                                </div>

                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">ساعت شروع</span>
                                    </div>
                                    <input type="text" class="form-control"  id="start_time_fa" name="start_time_fa" value="{{old('start_time_fa',$festival->start_time_fa)}}" />
                                </div>

                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" >تاریخ پایان</span>
                                    </div>
                                    <input type="text" class="form-control"  id="end_date_fa" name="end_date_fa" value="{{old('end_date_fa',$festival->end_date_fa)}}" />
                                </div>


                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">ساعت پایان</span>
                                    </div>
                                    <input type="text" class="form-control"  id="end_time_fa" name="end_time_fa" value="{{old('end_time_fa',$festival->end_time_fa)}}" />
                                </div>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" >تاریخ داوری</span>
                                    </div>
                                    <input type="text" class="form-control"  id="judgment_date_fa" name="judgment_date_fa" value="{{old('judgment_date_fa',$festival->judgment_date_fa)}}" />
                                </div>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">ساعت داوری</span>
                                    </div>
                                    <input type="text" class="form-control"  id="judgment_time_fa" name="judgment_time_fa" value="{{old('judgment_time_fa',$festival->judgment_time_fa)}}" />
                                </div>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" >تاریخ اعلام نتایج</span>
                                    </div>
                                    <input type="text" class="form-control"  id="winner_date_fa" name="winner_date_fa" value="{{old('winner_date_fa',$festival->winner_date_fa)}}">
                                </div>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" >ساعت اعلام نتایج</span>
                                    </div>
                                    <input type="text" class="form-control"  id="winner_time_fa" name="winner_time_fa" value="{{old('winner_time_fa',$festival->winner_time_fa)}}" />
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
                                            <span class="input-group-text" > عنوان جشنواره انگلیسی</span>
                                        </div>
                                        <input type="text" class="form-control"  id="festival_en" name="festival_en" value="{{old('festival_en',$festival->festival_en)}}" />
                                    </div>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" >متن فراخوان انگلیسی</span>
                                        </div>
                                        <textarea class="form-control" id="call_en" name="call_en">{{old('call_en',$festival->call_en)}}</textarea>
                                    </div>
                                    <div class="input-group mb-3">
                                        <label for="summary_call_en">خلاصه فراخوان انگلیسی:</label>
                                        <textarea id="summary_call_en" name="summary_call_en">{{old('summary_call_en',$festival->summary_call_en)}}</textarea>
                                    </div>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" >تاریخ شروع</span>
                                        </div>
                                        <input type="text" class="form-control"  id="start_date_en" name="start_date_en" value="{{old('start_date_en',$festival->start_date_en)}}" />
                                    </div>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" >ساعت شروع</span>
                                        </div>
                                        <input type="text" class="form-control"  id="start_time_en" name="start_time_en" value="{{old('start_time_en',$festival->start_time_en)}}" />
                                    </div>

                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">تاریخ پایان</span>
                                        </div>
                                        <input type="text" class="form-control"  id="end_date_en" name="end_date_en" value="{{old('end_date_en',$festival->end_date_en)}}" />
                                    </div>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" >ساعت پایان</span>
                                        </div>
                                        <input type="text" class="form-control"  id="end_time_en" name="end_time_en" value="{{old('end_time_en',$festival->end_time_en)}}"  >
                                    </div>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" >تاریخ داوری</span>
                                        </div>
                                        <input type="text" class="form-control"  id="judgment_date_en" name="judgment_date_en" value="{{old('judgment_date_en',$festival->judgment_date_en)}}" />
                                    </div>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" >ساعت داوری</span>
                                        </div>
                                        <input type="text" class="form-control"  id="judgment_time_en" name="judgment_time_en" value="{{old('judgment_time_en',$festival->judgment_time_en)}}" >
                                    </div>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" >تاریخ اعلام نتایج</span>
                                        </div>
                                        <input type="text" class="form-control"  id="winner_date_en" name="winner_date_en" value="{{old('winner_date_en',$festival->winner_date_en)}}" >
                                    </div>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">ساعت اعلام نتایج</span>
                                        </div>
                                        <input type="text" class="form-control"  id="winner_time_en" name="winner_time_en" value="{{old('winner_time_en',$festival->winner_time_en)}}" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button class="btn btn-success">بروزرسانی جشنواره</button>
                </form>

            </div>
        </div>
    </div>
@endsection

@section('footerScript')

    <script src="/admin/ckeditor/ckeditor.js"></script>
    <script src="/admin/ckeditor/lang/fa.js"></script>
    <script>
        CKEDITOR.replace('call_fa',
            {
                language:'fa',
            });

        CKEDITOR.replace('call_en');
        CKEDITOR.replace('summary_call_fa');
        CKEDITOR.replace('summary_call_en');
    </script>
    <script src="/admin/ckeditor/file-manager.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {

            document.getElementById('button-image').addEventListener('click', (event) => {
                event.preventDefault();

                window.open('/file-manager/fm-button', 'fm', 'width=900,height=800');
            });
        });

        // set file link
        function fmSetLink($url) {
            document.getElementById('image_label').value = $url;
        }
    </script>

    <script src="/admin/plugins/kamadatepicker/kamadatepicker.min.js"></script>
    <script src="/admin/plugins/kamadatepicker/kamadatepicker.holidays.js"></script>
    <script>
        kamaDatepicker('start_date_fa',{
            // enable 2 digits
            twodigit: true,
            // close calendar after select
            closeAfterSelect: true,
            // nexy / prev buttons
            nextButtonIcon: "بعدی",
            previousButtonIcon: "قبلی ",
            // highlight holidays
            markHolidays: false,
        });

        kamaDatepicker('end_date_fa',{
            // enable 2 digits
            twodigit: true,
            // close calendar after select
            closeAfterSelect: true,
            // nexy / prev buttons
            nextButtonIcon: "بعدی",
            previousButtonIcon: "قبلی ",
            // highlight holidays
            markHolidays: false,
        });

        kamaDatepicker('judgment_date_fa',{
            // enable 2 digits
            twodigit: true,
            // close calendar after select
            closeAfterSelect: true,
            // nexy / prev buttons
            nextButtonIcon: "بعدی",
            previousButtonIcon: "قبلی ",
            // highlight holidays
            markHolidays: false,
        });

        kamaDatepicker('winner_date_fa',{
            // enable 2 digits
            twodigit: true,
            // close calendar after select
            closeAfterSelect: true,
            // nexy / prev buttons
            nextButtonIcon: "بعدی",
            previousButtonIcon: "قبلی ",
            // highlight holidays
            markHolidays: false,
        });

        //
        kamaDatepicker('start_date_en',{
            // enable 2 digits
            twodigit: true,
            // close calendar after select
            closeAfterSelect: true,
            // nexy / prev buttons
            nextButtonIcon: "بعدی",
            previousButtonIcon: "قبلی ",
            // highlight holidays
            markHolidays: false,
        });

        kamaDatepicker('end_date_en',{
            // enable 2 digits
            twodigit: true,
            // close calendar after select
            closeAfterSelect: true,
            // nexy / prev buttons
            nextButtonIcon: "بعدی",
            previousButtonIcon: "قبلی ",
            // highlight holidays
            markHolidays: false,
        });

        kamaDatepicker('judgment_date_en',{
            // enable 2 digits
            twodigit: true,
            // close calendar after select
            closeAfterSelect: true,
            // nexy / prev buttons
            nextButtonIcon: "بعدی",
            previousButtonIcon: "قبلی ",
            // highlight holidays
            markHolidays: false,
        });

        kamaDatepicker('winner_date_en',{
            // enable 2 digits
            twodigit: true,
            // close calendar after select
            closeAfterSelect: true,
            // nexy / prev buttons
            nextButtonIcon: "بعدی",
            previousButtonIcon: "قبلی ",
            // highlight holidays
            markHolidays: false,
        });




    </script>

    <script src="/admin/plugins/easytimepicker/timepicker.js"></script>
    <script>
        $('#start_time_fa').timepicker();
        $('#end_time_fa').timepicker();
        $('#judgment_time_fa').timepicker();
        $('#winner_time_fa').timepicker();
        $('#start_time_en').timepicker();
        $('#end_time_en').timepicker();
        $('#judgment_time_en').timepicker();
        $('#winner_time_en').timepicker();
    </script>

@endsection
