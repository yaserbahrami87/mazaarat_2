@extends('admin.master.index')

@section('content')
    <div class="container mt-5 text-right" dir="rtl">
        <div class="row">
            <div class="col-12 text-center">
                <h2 class="text-center mb-4">امتیازات اثر: {{ $competition->title }}</h2>
                <img src="/images/competition/thumbnail_{{$competition->image}}" class="img-fluid" />
                <a href="/images/competition/{{$competition->image}}" class=" btn btn-primary btn-sm   " target="_blank">
                    دانلود اثر
                </a>
            </div>
            <div class="col-12">
                <!-- نمایش امتیازات داورها -->
                <h3>امتیازات داورها:</h3>
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th>شناسه داور</th>
                        <th>امتیاز</th>
                        <th>تاریخ رای</th>
                        <th>ساعت رای</th>
                        <th>توضیحات</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($competition->refereeScores as $refereeScore)
                        <tr>
                            <td>{{ $refereeScore->user->fname.' '.$refereeScore->user->lname }}</td>
                            <td>{{ $refereeScore->score }}</td>
                            <td>{{ $refereeScore->date_fa }}</td>
                            <td>{{ $refereeScore->time_fa }}</td>
                            <td>{{ $refereeScore->description }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

                <!-- نمایش امتیاز مردمی -->
                <h3>امتیاز مردمی:</h3>
                @if ($competition->publicScore)
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>امتیاز</th>
                            <th>توضیحات</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>{{ $competition->publicScore->score }}</td>
                            <td>{{ $competition->publicScore->description }}</td>
                        </tr>
                        </tbody>
                    </table>
                @else
                    <p>هنوز امتیاز مردمی ثبت نشده است.</p>
                @endif
            </div>
        </div>

    </div>

@endsection
