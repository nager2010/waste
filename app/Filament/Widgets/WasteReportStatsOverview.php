<?php

namespace App\Filament\Widgets;

use App\Models\WasteReport;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class WasteReportStatsOverview extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('إجمالي البلاغات', WasteReport::count())
                ->description('جميع البلاغات المسجلة')
                ->descriptionIcon('heroicon-m-document-text')
                ->color('success'),

            Stat::make('البلاغات المعلقة', WasteReport::where('status', 'pending')->count())
                ->description('بلاغات تحتاج للمعالجة')
                ->descriptionIcon('heroicon-m-clock')
                ->color('warning'),

            Stat::make('البلاغات المكتملة', WasteReport::where('status', 'completed')->count())
                ->description('بلاغات تم معالجتها')
                ->descriptionIcon('heroicon-m-check-circle')
                ->color('success'),
        ];
    }
}
