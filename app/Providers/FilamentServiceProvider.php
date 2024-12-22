<?php

namespace App\Providers;

use Filament\Support\Assets\Css;
use Filament\Support\Facades\FilamentAsset;
use Illuminate\Support\ServiceProvider;

class FilamentServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        // تحميل ملف CSS المخصص
        FilamentAsset::register([
            Css::make('custom-theme', __DIR__ . '/../../resources/css/filament/admin/theme.css'),
        ]);

        // تعيين اتجاه الواجهة للغة العربية
        $this->app->bind('filament.direction', function () {
            return 'rtl';
        });
    }
}
