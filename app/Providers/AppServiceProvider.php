<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Http\View\Composers\NavbarComposer;
use App\Http\View\Composers\SidebarComposer;
use Illuminate\Support\Facades\View;

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
        View::composer('admin.includes.nav', NavbarComposer::class);
        View::composer('admin.includes.sidebar', SidebarComposer::class);


    }
}
