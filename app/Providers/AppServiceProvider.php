<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use App\Model\mis\Bio;
use App\Model\interview\B_profile;

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
        $b_profile = B_profile::all();
        View::share('b_profile',$b_profile);

        //upload รูป
        // Schema::defaultStringLength(191);
    }

}
