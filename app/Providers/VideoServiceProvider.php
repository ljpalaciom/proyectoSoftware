<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Interfaces\VideoStorage;
use App\Util\VideoLocalStorage;

class VideoServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(VideoStorage::class, function (){
            return new VideoLocalStorage();
        });
    }
}
