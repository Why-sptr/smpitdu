<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
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
        Paginator::useBootstrap(); //https://laravel.com/docs/9.x/pagination#using-bootstrap
    }

}