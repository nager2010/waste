<?php

namespace App\Filament\Widgets;

use App\Models\WasteReport;
use Filament\Widgets\ChartWidget;
use Illuminate\Support\Carbon;

class WasteReportChart extends ChartWidget
{
    protected static ?string $heading = 'البلاغات خلال الأسبوع';

    protected function getData(): array
    {
        $data = $this->getReportsPerDay();

        return [
            'datasets' => [
                [
                    'label' => 'عدد البلاغات',
                    'data' => $data['counts'],
                    'backgroundColor' => '#10B981',
                    'borderColor' => '#10B981',
                ],
            ],
            'labels' => $data['labels'],
        ];
    }

    protected function getType(): string
    {
        return 'line';
    }

    private function getReportsPerDay(): array
    {
        $days = collect(range(6, 0))->map(function ($day) {
            return Carbon::now()->subDays($day)->format('Y-m-d');
        });

        $reports = WasteReport::whereBetween(
            'created_at',
            [
                Carbon::now()->subDays(6)->startOfDay(),
                Carbon::now()->endOfDay(),
            ]
        )
            ->selectRaw('DATE(created_at) as date, COUNT(*) as count')
            ->groupBy('date')
            ->pluck('count', 'date')
            ->toArray();

        $labels = $days->map(function ($date) {
            return Carbon::parse($date)->locale('ar')->isoFormat('dddd');
        })->toArray();

        $counts = $days->map(function ($date) use ($reports) {
            return $reports[$date] ?? 0;
        })->toArray();

        return [
            'labels' => $labels,
            'counts' => $counts,
        ];
    }
}
