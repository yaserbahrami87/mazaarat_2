<?php

namespace App\Providers;

use App\festival;
use Hekmatinasser\Verta\Verta;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $dateJalali=Verta::now()->formatDate();
        View::share('dateJalali',$dateJalali);
        $festivals=festival::orderby('id','desc')
                        ->get();
        $festival=festival::latest()->first();

        View::share('festivals',$festivals);
        View::share('festival',$festival);
    }
}
