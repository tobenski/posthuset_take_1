<?php

namespace App\Providers;

use App\Cart\Cart;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\App;

class CartServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('cart',function(){

            return new Cart();

            });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
