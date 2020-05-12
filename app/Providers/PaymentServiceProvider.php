<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Interfaces\PaymentSystem;
use App\Util\PaymentLocalSystem;

class PaymentServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(PaymentSystem::class, function (){
            return new PaymentLocalSystem();
        });
    }
}
