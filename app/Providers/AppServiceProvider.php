<?php

namespace App\Providers;

use App\Models\GeneralSetting;
use Illuminate\Pagination\Paginator;
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
        $general_settings = GeneralSetting::first();
        if($general_settings){
            // view()->composer('*', HomeComposer::class);

            View::share ( 'general_settings', $general_settings );
        }
        Paginator::useBootstrapFour();
    }
}
