@extends('farsi.master.index')
@section('content')
    <form method="POST" action="/test" enctype="multipart/form-data">
        {{csrf_field()}}

        <div class="form-group row">
            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('عکس:') }}</label>
            <div class="col-md-6">
                <input id="email" type="file" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                @error('email')
                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                @enderror
            </div>
            <button class="btn btn-success">ارسال</button>
        </div>

    </form>
@endsection
