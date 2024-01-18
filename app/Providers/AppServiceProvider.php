<?php

namespace App\Providers;

use App\Models\AddtoCart;
use Illuminate\Contracts\View\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        view()->composer('*', function ($view) {

        $view->with('carts',AddtoCart::with('products')->orderBy('id','desc')->where('ip_address',request()->ip())->get());

       });
    }
}
