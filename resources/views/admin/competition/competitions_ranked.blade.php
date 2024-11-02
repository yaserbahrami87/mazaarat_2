@extends('admin.master.index')

@section('content')
    <div class="container mt-5">
        <h2 class="text-center mb-4">نتایج داوری (فقط آثاری که داوری شده‌اند)</h2>

        <!-- نمایش لیست اثرات با جمع امتیازها -->
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>نام و نام خانوادگی</th>

                <th>جمع امتیازات داورها</th>
                <th>اثر</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($competitions as $competition)
                <tr>
                    <td>
                        <a href="/admin/user/{{$competition->user_id}}">
                            {{ $competition->user->fname.' '.$competition->user->lname }}
                        </a>
                    </td>
                    <td>{{ $competition->total_score }}</td>
                    <td>
                        <a href="/admin/competiton/{{$festival->festival_en}}/{{$competition->id}}/scores" class="btn btn-primary btn-sm   " target="_blank">
                            مشاهده
                        </a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>


        <h2 class="text-center mb-4">نتایج داوری مردمی (فقط آثاری که مردمی داوری شده‌اند)</h2>

        <!-- نمایش لیست اثرات با جمع امتیاز مردمی -->
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>نام و نام خانوادگی</th>

                <th>جمع امتیازات </th>
                <th>اثر</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($competitions_public as $competition)
                <tr>
                    <td>{{ $competition->user->fname.' '.$competition->user->lname }}</td>
                    <td>{{ $competition->total_score }}</td>
                    <td>
                        <a href="/admin/competiton/{{$festival->festival_en}}/{{$competition->id}}/scores" class="btn btn-primary btn-sm   " target="_blank">
                            مشاهده
                        </a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

    </div>

@endsection
