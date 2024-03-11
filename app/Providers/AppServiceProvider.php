<?php

namespace App\Providers;

use App\Models\GeneralSetting;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\View;
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
       Paginator::useBootstrap();
       $generalSettings = GeneralSetting::first();
       $timezone = $generalSettings ? $generalSettings->timezone : config('app.timezone');
       Config::set('app.timezone', $timezone);
   
       // Share settings with all views
       View::composer('*', function($view) use ($generalSettings) {
           $view->with('settings', $generalSettings);
       });
    }
}
