<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
// for sql debug
use DB;
use Event;
use Illuminate\Foundation\Http\Events\RequestHandled;

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
    if (env('APP_ENV') === 'local') {
      DB::connection()->enableQueryLog();
      Event::listen(RequestHandled::class, function ($event) {
        if ($event->request->has('sql-debug')) {
          $queries = DB::getQueryLog();
          dd($queries);
        }
      });
    }
    \Illuminate\Support\Facades\Schema::defaultStringLength(191);
  }
}
