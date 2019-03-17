<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

//necessary to exclude data wrapping when returning a single object on API request...
//use Illuminate\Http\Resources\Json\Resource;

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
        //
        //to exclude data wrapping when returning a single object on API request...
//        Resource::withoutWrapping();
    }
}
