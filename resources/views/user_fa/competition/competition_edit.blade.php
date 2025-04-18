@extends('farsi.master.index')

@section('headerScript')
    <style>
        .files input {
            outline: 2px dashed #92b0b3;
            outline-offset: -10px;
            -webkit-transition: outline-offset .15s ease-in-out, background-color .15s linear;
            transition: outline-offset .15s ease-in-out, background-color .15s linear;
            padding: 120px 0px 85px 35%;
            text-align: center !important;
            margin: 0;
            width: 100% !important;
        }
        .files input:focus{     outline: 2px dashed #92b0b3;  outline-offset: -10px;
            -webkit-transition: outline-offset .15s ease-in-out, background-color .15s linear;
            transition: outline-offset .15s ease-in-out, background-color .15s linear; border:1px solid #92b0b3;
        }
        .files{ position:relative}
        .files:after {  pointer-events: none;
            position: absolute;
            top: 60px;
            left: 0;
            width: 50px;
            right: 0;
            height: 56px;
            content: "";
            background-image: url(https://image.flaticon.com/icons/png/128/109/109612.png);
            display: block;
            margin: 0 auto;
            background-size: 100%;
            background-repeat: no-repeat;
        }
        .color input{ background-color:#f1f1f1;}
        .files:before {
            position: absolute;
            bottom: 10px;
            left: 0;  pointer-events: none;
            width: 100%;
            right: 0;
            height: 57px;
            content: " or drag it here. ";
            display: block;
            margin: 0 auto;
            color: #2ea591;
            font-weight: 600;
            text-transform: capitalize;
            text-align: center;
        }
    </style>


    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
@endsection

@section('content')
    <div class="container">
    <div class="row">
        <div class="col-12 col-md-3  mx-auto mb-b ">
            <div class="card col-12 mb-3 upload_pictures bg-transparent" >
                <h3 class="text-muted text-center pb-3">ویرایش محتوی عکس</h3>
                <form class="form" method="post" action="/panel/competiton/{{$competiton->id}}" enctype="multipart/form-data">
                    {{csrf_field()}}
                    {{method_field('PATCH')}}
                    <div class="row text-center">
                        <div class="card col-12  mb-3 bg-transparent">

                            <img src="/images/competition/{{$competiton->image}}" class="img-fluid mb-3" />
                            <input type="hidden" name="competiton_category_id" value="1" />
                            <div class="form-group">
                                <label >توضیحات:
                                </label>
                                <textarea class="form-control" name="description" rows="3">{{$competiton->description}}</textarea>
                            </div>
                            <div class="form-group">
                                <label>نام مکان:
                                    <span class="alert text-danger m-0 p-0">*</span>
                                </label>
                                <input type="text" class="form-control"  name="name_place" value="{{$competiton->name_place}}">
                            </div>
                            <div class="form-group">
                                <label>آدرس مکان:
                                </label>
                                <input type="text" class="form-control"  name="location" value="{{$competiton->location}}">
                            </div>
                            <div  class="form-group"    >
                                <label for="location_map">انتخاب موقعیت مکانی:</label>
                                <div id="map" style="height: 400px;"></div>
                                <input type="text" id="location_map" name="location_map" value="{{$competiton->location_map}}"  readonly required>
                            </div>
                        </div>
                        <div class="col-12">
                            <button type="submit" class="btn btn-success">
                                بروزرسانی
                            </button>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>
    </div>
@endsection

@section('footerScript')
    <script>
        var map = L.map('map').setView([35.6892, 51.3890], 13); // موقعیت پیش‌فرض (تهران)

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '© OpenStreetMap contributors'
        }).addTo(map);
        var tmp="{{$competiton->location_map}}";
        console.log(typeof(tmp));
        var location1 = tmp.split(',');
        console.log(location1);

        var marker = L.marker([location1[0], location1[1]]).addTo(map);
        map.setView([location1[0], location1[1]], 13);

        map.on('click', function(e) {
            if (marker) {
                map.removeLayer(marker);
            }
            marker = L.marker([e.latlng.lat, e.latlng.lng]).addTo(map);
            document.getElementById('location_map').value = e.latlng.lat + ',' + e.latlng.lng;
        });

    </script>
@endsection
