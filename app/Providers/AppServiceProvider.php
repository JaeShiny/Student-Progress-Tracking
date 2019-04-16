<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use App\Model\Bio;
use App\Model\InterviewProfile;

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
        View::share('key', 'value');
        Schema::defaultStringLength(191);

        $bio= Bio::all();
        View::share('bio',$bio);
        $b_profile = InterviewProfile::all();
        View::share('b_profile',$b_profile);


    }
}
