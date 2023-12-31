<?php

namespace App\Providers;

use BezhanSalleh\FilamentLanguageSwitch\Enums\Placement;
use BezhanSalleh\FilamentLanguageSwitch\LanguageSwitch;
use Illuminate\Support\Facades\Schema;
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
        Schema::defaultStringLength(191);
        LanguageSwitch::configureUsing(function (LanguageSwitch $switch) {
            $switch
                ->locales(['fr','en'])
                ->visible(outsidePanels: true)
                ->outsidePanelPlacement(Placement::BottomRight)
                ->outsidePanelRoutes([
                    'profile',
                    'admin',
                    // Additional custom routes where the switcher should be visible outside panels
                ]); // also accepts a closure
        });
    }
}
