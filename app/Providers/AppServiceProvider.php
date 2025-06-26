<?php
namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Auth;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        view()->composer('*', function () {
            if (Auth::check()) {
                Auth::user()->update([
                    'last_activity' => now()
                ]);
            }
        });
    }
}
