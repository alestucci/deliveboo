<?php

namespace App\Providers;

use Braintree\Gateway;
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
        $gateway = new Gateway([
            'environment' => 'sandbox',
            'merchantId' => 'd5p5v68sp25kr37b',
            'publicKey' => 'dwqhtjyrtywsnhvw',
            'privateKey' => 'd2251f7b217e2680e54ef4beb6ab4512'
        ]);

        return $gateway;
    }
}
