@extends('farsi.master.index')

@section('content')
<div class="container mb-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('سایت جشنواره مزارات از 16 اردیبهشت ماه 1402 برای بارگذاری عکسها قابل دسترس خواهد بود') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
