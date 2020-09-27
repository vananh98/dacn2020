<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\typeProduct;
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
        view()->composer('menu',function($view){
            $type= typeProduct::all();
            $view->with('type',$type);
        });
    }
}
