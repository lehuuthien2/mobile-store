<?php

namespace mobileS\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

require_once app_path().'\const.php';

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
